<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Characters extends Model
{
    use HasFactory;
    protected $table = 'characters';
    protected $primaryKey = 'id';
    public $incrementing = true;
    public $timestamps = true;
    protected $with = ['charactertask'];

    public function user()
    {
        return $this->belongsTo('App\Models\User', 'id', 'ref_user_id');
    }
    public function games()
    {
        return $this->belongsTo('App\Models\Games', 'id', 'ref_game_id');
    }

    public function charactertask(){
        return $this -> hasMany('App\Models\CharacterTask', 'ref_character_id');
    }
}
