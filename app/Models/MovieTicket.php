<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MovieTicket extends Model
{
    use HasFactory;
    protected $fillable = ['user_id', 'movie_id', 'session', 'movie_title'];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
