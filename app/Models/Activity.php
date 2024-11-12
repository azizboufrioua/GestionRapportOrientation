<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Activity extends Model
{
    use HasFactory;


    public function advisor()
    {
        return $this->belongsTo(Advisor::class);
    }


    public function school()
    {
        return $this->belongsTo(School::class);
    }


    public function axe()
    {
        return $this->belongsTo(Axe::class);
    }


    public function user()
    {
        return $this->belongsToMany(User::class);
    }
    
}
