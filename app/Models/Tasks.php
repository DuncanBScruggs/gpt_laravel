<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Tasks extends Model
{
    use HasFactory;
    protected $table = 'tasks';
    protected $primaryKey = 'id';
    public $incrementing = true;
    public $timestamps = true;
    protected $with = ['tasks', 'charactertask'];

    public function locations(){
        return $this -> belongsTo('App\Models\Locations', 'id', 'ref_location_id');
    }

    public function tasks(){
        return $this -> belongsTo('App\Models\Tasks', 'id', 'ref_parent_id');
    }

    public function charactertask(){
        return $this -> hasMany('App\Models\CharacterTask', 'ref_task_id');
    }
}
