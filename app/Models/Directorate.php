<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Directorate extends Model
{
    use HasFactory;

    protected $fillable = ['directorate_name','status','academy_id'];


    
     /**
     * Get the Academy that owns the Directorate.
     */
    public function academy()
    {
        return $this->belongsTo(Academy::class);
    }

    public function user()
    {
        return $this->belongsToMany(User::class);
    }

}
