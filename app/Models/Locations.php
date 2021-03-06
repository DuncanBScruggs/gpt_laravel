<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Locations extends Model
{
    use HasFactory;
    protected $table = 'locations';
    protected $primaryKey = 'id';
    public $incrementing = true;
    public $timestamps = true;
    protected $with = ['tasks'];

    public function games(){
        return $this -> belongsTo('App\Models\Games', 'id', 'ref_game_id');
    }
    public function tasks(){
        return $this -> hasMany('App\Models\Tasks', 'ref_location_id');
    }


}
