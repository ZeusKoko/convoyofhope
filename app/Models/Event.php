<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Event extends Model

{
    protected $fillable = ['title', 'description','venue', 'event_date','image','target_amount'];

    public function donations()
{
    return $this->hasMany(Donation::class);
}
public function staffAssignments()
{
    return $this->hasMany(StaffAssignment::class);
}

}

