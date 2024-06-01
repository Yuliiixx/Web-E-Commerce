<?php
namespace App\Models;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use Notifiable;
    protected $table = 'user';
    protected $fillable = [
        'fullname', 'username', 'email', 'password', 'nohp',
    ];

    public $timestamps = true; // Pastikan timestamps diaktifkan
}
