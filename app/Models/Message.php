<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Message extends Model
{
    use HasFactory;

    // Allow mass assignment for these fields
    protected $fillable = [
        'user_id',
        'message',
        'reply',
        'is_read',
    ];

    // Optional: Define the relationship to the User model
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}

