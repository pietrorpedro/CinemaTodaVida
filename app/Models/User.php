<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use HasFactory;
    protected $fillable = ['full_name', 'email', 'password'];
    protected $hidden = ['password'];

    public function movieTickets()
    {
        return $this->hasMany(MovieTicket::class);
    }
}
