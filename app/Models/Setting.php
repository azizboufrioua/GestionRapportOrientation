<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Setting extends Model
{
    use HasFactory;


    protected $fillable = ['service_name','academy_id','directorate_id','logo'];



    public function academy()
    {
        return $this->belongsTo(Academy::class);
    }
   

    public function directorate()
    {
        return $this->belongsTo(Directorate::class);
    }

      public function user()
    {
        return $this->belongsToMany(User::class);
    }



}
