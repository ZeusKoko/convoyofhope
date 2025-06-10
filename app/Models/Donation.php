<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Donation extends Model
{
    protected $fillable = ['name', 'email', 'national_id', 'nationality', 'event_id', 'amount'];

}
