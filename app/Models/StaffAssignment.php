<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class StaffAssignment extends Model
{
    use HasFactory;

    protected $fillable = [
        'staff_id',
        'event_id',
        'items',
        'budget',
    ];

    public function staff()
    {
        return $this->belongsTo(User::class, 'staff_id');
    }

    public function event()
    {
        return $this->belongsTo(Event::class);
    }
    
}
