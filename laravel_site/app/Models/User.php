<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use App\Models\UserRole;
use Laravel\Sanctum\HasApiTokens;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
	use HasFactory;
	
	const USER_CONTENT = 2;
	const USER_CS = 2;
	const USER_HR = 3;
	const USER_ADMIN = 1;
	const USER_SUPER_ADMIN = 9;
	const ADMIN_GROUP = [self::USER_ADMIN, self::USER_SUPER_ADMIN];
	
	protected $table = 'user';
	
	protected $guarded = [];

	/**
	 * Get the user that owns the User
	 *
	 * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
	 */
	public function getRole() 
	{
		return $this->belongsTo(UserRole::class, 'role_id');
	}
}
