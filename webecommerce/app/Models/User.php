<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use HasFactory, Notifiable;
    protected $table = 'user';
    protected $fillable = [
        'fullname',
        'username',
        'email',
        'password',
        'nohp',
    ];

    protected $hidden = [
        'password',
        'remember_token',
    ];

    public function pesanan()
{
    return $this->hasMany(Pesanan::class);
}

}
