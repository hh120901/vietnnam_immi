<?php

namespace App\Http\Controllers\admin;

use App\Models\Post;
use App\Models\User;
use App\Models\Banner;
use App\Models\MailDB;
use GuzzleHttp\Client;
use App\Models\Setting;
use App\Models\UserRole;
use App\Mail\ReplyContact;
use Illuminate\Support\Str;
use App\Models\PostCategory;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Storage;

class Syslog extends Controller
{
	protected $breadcrumb = array();
	protected $admin_role;
	protected $hr_role;
	protected $content_role;
	protected $cs_role;
	public function __construct()
	{
		// Admin auth
		$this->admin_role = ['admin'];
		$this->hr_role = ['admin', 'hr'];
		$this->content_role = ['admin', 'content'];
		$this->cs_role = ['admin', 'cs'];
		$this->middleware(function ($request, $next) {
			if (!in_array($request->route()->getName(), array('syslog.login'))) {
				if (!Auth::check() || Auth::user()->active != 1) {
					return redirect()->route('syslog.login');
				}
				Auth::user()->last_activity = date('Y-m-d H:i:s');
				Auth::user()->save();
			}
			return $next($request);
		});
		
	}
	
	public function login(Request $request, Client $client)
	{
		if ($request->isMethod('post')) {
			$request->validate(array(
				'email' => 'required|string|email',
				'password' => 'required|string'
			));
			
			$credentials = $request->only('email', 'password');
			$credentials['active'] = 1;
			if (Auth::attempt($credentials)) {
				return redirect()->route('syslog');
			}
			
			return back()->withErrors(['message' => 'You have entered invalid email or password.']);
		}
		
		return view('admin.login');
	}

	public function logout() {
		Auth::logout();
		return redirect()->route('syslog.login');
	}

	public function index() {
		return view('admin.dashboard');
	}

	public function users(Request $request, Client $client, $action='index', $id=null)
	{
		if ($request->isMethod('post')) {
			$task = $request->input('task');
			if ($action == 'edit') {
				if (empty($id)) {
					$request->validate(array(
						'email' => 'required|string|email|max:255|unique:user,email',
						'firstname' => 'required|string|max:255',
						'lastname' => 'required|string|max:255',
						'phone' => 'required|string|max:20',
						'role' => 'required',
						'birthday' => 'required',
					));
				}
				if (in_array($task, array('save', 'save-edit'))) {
					$user = User::firstOrNew(['id' => $id]);
					$user->email = $request->input('email');

					$user->firstname = $request->input('firstname');
					$user->lastname = $request->input('lastname');
					$user->phone = $request->input('phone');
					$user->birthday = $request->input('birthday');
					$user->gender = $request->input('gender');
					if (in_array(Auth::user()->getRole->alias, $this->admin_role)) {
						$user->role_id = $request->input('role');
					}
					$user->active = !empty($request->input('active')) ? 1 : 0;

					if ($request->input('password') != $user->password) {
						$user->password = Hash::make($request->input('password'));
					}
					$user->save();

					if ($request->hasFile('avatar')) {
						if ($request->file('avatar')->isValid()) {
							$directory = 'users/'.$user->id.'/avatar';
							Storage::disk('public')->deleteDirectory($directory);
							$user->avatar = $request->file('avatar')->store($directory, 'public');
						}
						$user->save();
					}
					if ($task == 'save-edit') {
						return redirect(url()->current());
					}
				}
				
				return redirect(url()->current())->with(['success' => 'Update Successfully!']);
			}
			else {
				$ids = $request->input('cid', array());
				foreach ($ids as $id) {
					$user = User::find($id);
					if ($task == 'orderup') {
						$user->decrement('order_num');
						$user->save();
					}
					else if ($task == 'orderdown') {
						$user->increment('order_num');
						$user->save();
					}
					else if ($task == 'delete') {
						$user->delete();
					}
				}
			}
		}
		
		if ($action == 'edit') {
			$user = User::firstOrNew(['id' => $id]);
			$roles = UserRole::all();
			return view('admin.users.'.$action)
						->with('request', $request)
						->with('roles', $roles)
						->with('user', $user);
		}
		else {
			if (in_array(Auth::user()->getRole->alias, $this->admin_role)) {
				$roles = UserRole::all();
				$users = User::where('firstname', 'like', '%'.$request->input('search_text').'%')
											->orWhere('lastname', 'like', '%'.$request->input('search_text').'%')
											->orderByDesc('created_at')->paginate(10);
				return view('admin.users.'.$action)
							->with('request', $request)
							->with('roles', $roles)
							->with('users', $users);
			}
			else {
				return redirect()->route('syslog')->withErrors('Permission denied!');
			}
		}
	}
	// Control all category
	public function check_alias_category($alias, $class)
	{
		if ($class == 'PostCategory') {
			$db_alias = PostCategory::where('alias', $alias)->get();
		}
		if (empty($db_alias)){
			return 0;
		}
		else {
			return count($db_alias);
		}
	}
	public function create_slug($title) 
	{
		$slug = Str::slug($title);
		$db_slug = Post::where('slug', $slug)->get();
		if (count($db_slug)) {
			$slug = $slug.'-'.count($db_slug)+1;
		}
		return $slug;
	}
	public function categories(Request $request, Client $client, $action='index', $id=null)
	{
		if (in_array(Auth::user()->getRole->alias, $this->admin_role)) {
			if ($request->isMethod('post')) {
				if (!empty($request->input('quick_task'))) {
					if ($request->input('quick_task') == 'add_new_cat') {
						$category = PostCategory::firstOrNew(['id' => $id]);
						$category->name = $request->input('new_category_name');
						$alias =  Str::slug($category->name, '-');
						$checkAlias = $this->check_alias_category($alias, 'PostCategory');
						$category->alias = $checkAlias != 0 ? $alias.'-'.$checkAlias+1 : $alias;
						$category->parent_id = $request->input('new_category_parent_id') ?? null;
						$category->level = $request->input('new_category_level') ?? null;
						$category->active = 1;
						$category->save();
					}
					return redirect()->back()->with(['success' => 'Added category '. $category->name]);
				}
				$task = $request->input('task');
				if ($action == 'edit') {
					if (in_array($task, array('save', 'save-edit'))) {
						$category = PostCategory::firstOrNew(['id' => $id]);
						$category->name = $request->input('category_name');
						$alias =  Str::slug($category->name, '-');
						$checkAlias = $this->check_alias_category($alias, 'PostCategory');
						$category->alias = $checkAlias != 0 ? $alias.'-'.$checkAlias+1 : $alias;
						$category->level = ($request->input('level')) ?? 1;
						$category->parent_id = $request->input('parent_id') ?? null;
						$category->description = $request->input('description');
						$category->active = !empty($request->input('active')) ? 1 : 0;
						$category->save();

						if ($task == 'save-edit') {
							return redirect(url()->current());
						}
					}
					
					return redirect(url('/admin/categories/index/'.$request->input('parent_id')))->with(['success' => 'Updated category '. $category->name]);
				}
				else {
					$ids = $request->input('cid', array());
					foreach ($ids as $id) {
						$category = PostCategory::find($id);
						if ($task == 'publish') {
				
						}
						else if ($task == 'delete') {
							$category->delete();
							return redirect()->back()->with(['success' => 'Deleted']);
						}
					}
				}
			}
			
			if ($action == 'edit') {
				$category = PostCategory::firstOrNew(['id' => $id]);
				$categories = PostCategory::where('id', '<>', $category->id)->get();
				return view('admin.categories.'.$action)
							->with('request', $request)
							->with('category', $category)
							->with('categories', $categories);
			}
			else {
				$parent_category = null;
				$categories = PostCategory::where('name', 'like', '%'.$request->input('search_text').'%')
												->orderByDesc('created_at')->paginate(5);
				if (!empty($id)) {
					$parent_category = PostCategory::find($id);
					if ($parent_category) {
						$categories = PostCategory::where('parent_id', $parent_category->id)
												->where('name', 'like', '%'.$request->input('search_text').'%')
												->orderByDesc('created_at')->paginate(5);
					}
				}

				return view('admin.categories.'.$action)
							->with('request', $request)
							->with('parent_category', $parent_category)
							->with('categories', $categories);
			}
		}
		else {
			return redirect()->route('syslog')->withErrors('Permission denied!');
		}
	}

	public function posts(Request $request, Client $client, $category_id = null, $action = 'index', $id = null)
	{
		if (in_array(Auth::user()->getRole->alias, $this->content_role)) {
			if (!empty($category_id)) {
				$category = PostCategory::find($category_id);
			}
			if ($request->isMethod('post')) {
				$task = $request->input('task');
				if ($action == 'edit') {
					if (in_array($task, array('save', 'save-edit'))) {
						$post = Post::firstOrNew(['id' => $id]);
						$post->user_id = Auth::user()->id;
						$post->title = $request->input('title');
						$slug = $this->create_slug($post->title);
						$post->slug = $slug;
						$post->description = $request->input('description');
						$post->category_id = $request->input('category_id');;
						$post->active = !empty($request->input('active')) ? 1 : 0;
						$post->save();

						if ($request->hasFile('featured_image')) {
							if ($request->file('featured_image')->isValid()) {
								$directory = 'posts/'.$post->id.'/featured_image';
								Storage::disk('public')->deleteDirectory($directory);
								$post->featured_image = $request->file('featured_image')->store($directory, 'public');
							}
							$post->save();
						}
						if ($task == 'save-edit') {
							return redirect(url()->current());
						}
						return redirect(url('/admin/category/'.$category_id.'/posts'))->with(['success' => 'Update Successfully!']);
					}
				}
				else {
					$ids = $request->input('cid', array());
					foreach ($ids as $id) {
						$post = Post::find($id);
						if ($task == 'orderup') {
							$post->decrement('order_num');
							$post->save();
						}
						else if ($task == 'orderdown') {
							$post->increment('order_num');
							$post->save();
						}
						else if ($task == 'delete') {
							$post->delete();
						}
					}
				}
			}
			
			if ($action == 'edit') {
				$post = Post::firstOrNew(['id' => $id]);
				return view('admin.posts.'.$action)
							->with('request', $request)
							->with('category', $category)
							->with('post', $post);
			}
			else {
				$posts = Post::where('title', 'like', '%'.$request->input('search_text').'%')->whereIn('category_id', function ($query) use ($category_id) {
					$query->select('id')
						  ->from('post_category')
						  ->where('id', $category_id)
						  ->orWhere('parent_id', $category_id);
				})->orderByDesc('created_at')->paginate(5);
				$categories = PostCategory::all();
				return view('admin.posts.'.$action)
							->with('request', $request)
							->with('category', $category)
							->with('categories', $categories)
							->withMessage('alert error')
							->with('posts', $posts);
			}
		}
		else {
			return redirect()->route('syslog')->withErrors('Permission denied!');
		}
	}

	public function contact(Request $request, Client $client, $action='index', $id=null)
	{
		if (in_array(Auth::user()->getRole->alias, $this->cs_role)) {
			if ($action == 'download-attach') {
				if (!empty($id)){
					$contact = MailDB::find($id);
					$filePath = storage_path('app/public/'.$contact->attachment);
					$filename = basename($filePath);
					$headers = [
						'Content-Type' => 'application/octet-stream',
					];
				}
				return response()->download($filePath, $filename, $headers);
			}
			if ($request->isMethod('post')) {
				$task = $request->input('task');
				if ($action == 'edit') {
					if (in_array($task, array('save', 'save-edit'))) {
						$authUser = Auth::user();
						$contact = MailDB::find($id);
						$reply = MailDB::where('reply_id', $contact->id)->first();
						$reply = !empty($reply) ? $reply : new \StdClass();
						$reply->user_id = $authUser->id;
						$reply->reply_id = $contact->id;
						$reply->sender = $authUser->email;
						$reply->receiver = $contact->sender;
						$reply->name = $authUser->firstname .' '. $authUser->lastname;
						$reply->phone = $authUser->phone;
						$reply->type = 'reply_contact';
						$reply->message = $request->input('comment');
						$reply = MailDB::create((array)$reply);
						$contact->active = 1;
						$contact->save();
						
						$response_data = new \StdClass();
						$response_data->contact = $contact;
						$response_data->reply = $reply;

						//Send mail
						$data = array(
							'sender' => $reply->sender,
							'receivers' => $reply->receiver = $contact->sender,
							'subject' => '[VNIM Contact] - '.$contact->subject,
							'tpl_data'	=> $response_data,
						);

						Mail::send(new ReplyContact((object) $data));
					}	
					return redirect()->route('syslog.contact')->with(['success' => 'Completed!']);
				}
				else {
					$ids = $request->input('cid', array());
					foreach ($ids as $id) {
						$contact = MailDB::find($id);
						if ($task == 'delete') {
							$contact->delete();
						}
					}
				}
			}
			
			if ($action == 'edit') {
				$contact = MailDB::find($id);
				$reply = MailDB::where('reply_id', $contact->id)->first();

				return view('admin.contact.'.$action)
							->with('request', $request)
							->with('reply', $reply)
							->with('contact', $contact);
			}
			else {
				$contacts = MailDB::where('type', 'contact')
									->where('name', 'like', '%'.$request->input('search_text').'%')
									->orderByDesc('created_at')->paginate(5);
				return view('admin.contact.'.$action)
							->with('request', $request)
							->with('contacts', $contacts);
			}
		}
		else {
			return redirect()->route('syslog')->withErrors('Permission denied!');
		}
	}
	
	public function roles(Request $request, Client $client, $action='index', $id=null)
	{
		if (in_array(Auth::user()->getRole->alias, $this->admin_role)) {
			if ($request->isMethod('post')) {
				$task = $request->input('task');
				if ($action == 'edit') {
					if (in_array($task, array('save', 'save-edit'))) {
						$role = UserRole::firstOrNew(['id' => $id]);
						$role->name = $request->input('name');
						$role->description = $request->input('description');
						$role->active = !empty($request->input('active')) ? 1 : 0;
						$role->save();
	
						if ($task == 'save-edit') {
							return redirect(url()->current());
						}
					}	
					return redirect()->route('syslog.roles')->with(['success' => 'Update Successfully!']);
				}
				else {
					$ids = $request->input('cid', array());
					foreach ($ids as $id) {
						$role = UserRole::find($id);
						if ($task == 'delete') {
							$role->delete();
						}
					}
				}
			}
			
			if ($action == 'edit') {
				$role = UserRole::firstOrNew(['id' => $id]);
				return view('admin.roles.'.$action)
							->with('request', $request)
							->with('role', $role);
			}
			else {
				$roles = UserRole::where('name', 'like', '%'.$request->input('search_text').'%')
										->orderByDesc('created_at')->paginate(5);
				return view('admin.roles.'.$action)
							->with('request', $request)
							->with('roles', $roles);
			}
		}
		else {
			return redirect()->route('syslog')->withErrors('Permission denied!');
		}
	}
	public function settings(Request $request, Client $client, $action='index', $id=null)
	{
		if (in_array(Auth::user()->getRole->alias, $this->admin_role)) {
			if ($request->isMethod('post')) {
				$task = $request->input('task');
				if ($action == 'edit') {
					if (in_array($task, array('save', 'save-edit'))) {
						$settings = Setting::first();
						$settings->company_name = $request->input('company_name');
						$settings->company_phone = $request->input('company_phone');
						$settings->company_email = $request->input('company_email');
						$settings->hotline_vn = $request->input('hotline_vn');
						$settings->hotline_en = $request->input('hotline_en');
						$settings->hotline_usa = $request->input('hotline_usa');
						$settings->whatsapp = $request->input('whatsapp');
						$settings->skype = $request->input('skype');
						$settings->viber = $request->input('viber');
						$settings->telegram = $request->input('telegram');
						$settings->company_address = $request->input('company_address');
						$settings->cs_email = $request->input('cs_email');

						if ($request->hasFile('logo')) {
							if ($request->file('logo')->isValid()) {
								$directory = 'setting/logo';
								Storage::disk('public')->deleteDirectory($directory);
								$settings->logo = $request->file('logo')->store($directory, 'public');
							}
						}
						
						$settings->save();
						if ($task == 'save-edit') {
							return redirect(url()->current());
						}
					}	
					return redirect()->back()->with(['success' => 'Update Successfully!']);
				}
				else {
					$ids = $request->input('cid', array());
					foreach ($ids as $id) {
						$role = UserRole::find($id);
						if ($task == 'delete') {
							$role->delete();
						}
					}
				}
			}
			
			if ($action == 'edit') {
				$setting = Setting::first();
				return view('admin.settings.'.$action)
							->with('request', $request)
							->with('setting', $setting);
			}
			else {
				$settings = UserRole::where('name', 'like', '%'.$request->input('search_text').'%')
										->orderByDesc('created_at')->paginate(5);
				return view('admin.settings.'.$action)
							->with('request', $request)
							->with('settings', $settings);
			}
		}
		else {
			return redirect()->route('syslog')->withErrors('Permission denied!');
		}
	}

	public function banners(Request $request, Client $client, $action='index', $id=null)
	{
		if (in_array(Auth::user()->getRole->alias, $this->content_role)) {
			if ($request->isMethod('post')) {
				$task = $request->input('task');
				if ($action == 'edit') {
					if (in_array($task, array('save', 'save-edit'))) {
						$banner = Banner::firstOrNew(['id' => $id]);
						$banner->user_id = Auth::user()->id;
						$banner->name = $request->input('name');
						$banner->position = $request->input('position');;
						$banner->url = $request->input('url') ?? url('/');
						$banner->active = !empty($request->input('active')) ? 1 : 0;
						$banner->save();

						if ($request->hasFile('featured_image')) {
							if ($request->file('featured_image')->isValid()) {
								$directory = 'banners/'.$banner->id;
								Storage::disk('public')->deleteDirectory($directory);
								$banner->image = $request->file('featured_image')->store($directory, 'public');
							}
							$banner->save();
						}
						if ($task == 'save-edit') {
							return redirect(url()->current());
						}
						return redirect()->route('syslog.banners')->with(['success' => 'Update Successfully!']);
					}
				}
				else {
					$ids = $request->input('cid', array());
					foreach ($ids as $id) {
						$banner = Banner::find($id);
						if ($task == 'orderup') {
							$banner->decrement('order_num');
							$banner->save();
						}
						else if ($task == 'orderdown') {
							$banner->increment('order_num');
							$banner->save();
						}
						else if ($task == 'delete') {
							$banner->delete();
						}
					}
				}
			}
			
			if ($action == 'edit') {
				$banner = Banner::firstOrNew(['id' => $id]);
				return view('admin.banners.'.$action)
							->with('request', $request)
							->with('banner', $banner);
			}
			else {
				$banners = Banner::where('name', 'like', '%'.$request->input('search_text').'%')
									->orWhere('position', 'like', '%'.$request->input('search_text').'%')
									->orderByDesc('created_at')->paginate(5);
				return view('admin.banners.'.$action)
							->with('request', $request)
							->with('banners', $banners);
			}
		}
		else {
			return redirect()->route('syslog')->withErrors('Permission denied!');
		}
	}

}
