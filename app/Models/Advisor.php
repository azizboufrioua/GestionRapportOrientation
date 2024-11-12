<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Advisor extends Model
{
    use HasFactory;


    public function district()
    {
        return $this->belongsTo(District::class);
    }


    public function user()
    {
        return $this->belongsToMany(User::class);
    }
}
