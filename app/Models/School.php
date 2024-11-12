<?php

namespace App\Models;

use App\Models\Discipline;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

use Illuminate\Support\Str;


class School extends Model
{
    use HasFactory;

    protected $fillable = ['school_name','school_qual','school_coll','directorate_id','district_id','school_classes','school_effectif','status'];

     /**
     * The disciplines that belong to the School.
     */

    public function user()
    {
        return $this->belongsToMany(User::class);
    }

    public function district()
    {
        return $this->belongsTo(District::class);
    }
   

    public function directorate()
    {
        return $this->belongsTo(Directorate::class);
    }

      public function disciplines()
    {
        return $this->belongsToMany(Discipline::class);
    }



    public function saveDiscipline (string $disciplines) {
				
				
        $disciplines = array_filter (array_unique (array_map (function ($item) {
        return trim($item);
        }, explode(',', $disciplines))), function ($item) {
            return !empty($item);
        });
        
        
        $persisted_disciplines = Discipline::whereIn('discipline_name', $disciplines)->get();
        $disciplines_to_create	= array_diff ($disciplines, $persisted_disciplines->pluck ('name')->all());
        
        $disciplines_to_create = array_map (function ($discipline) {
            return ['discipline_name' => $discipline, 'discipline_slug' => Str::slug($discipline)];
        }, $disciplines_to_create);
        
        
        $created_disciplines = $this->disciplines()->createMany ($disciplines_to_create);
        $persisted_disciplines = $persisted_disciplines->merge($created_disciplines);
        $this->disciplines()->sync($persisted_disciplines);
        
        }
}
