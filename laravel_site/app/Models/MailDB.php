<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MailDB extends Model
{
    use HasFactory;
    protected $table = 'mail';
    protected $guarded = [];

}
