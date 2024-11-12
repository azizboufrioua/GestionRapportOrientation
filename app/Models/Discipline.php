<?php

namespace App\Models;

use App\Models\School;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Discipline extends Model
{
    use HasFactory;

    public $guarded = [];

      /**
     * The  Schools that belong to the discipline.
     */
    public function schools()
    {
        return $this->belongsToMany(School::class);
    }


    public function user()
    {
        return $this->belongsToMany(User::class);
    }
}
