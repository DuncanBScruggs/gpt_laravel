<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class CharacterTask extends Model
{

    use HasFactory;
    protected $table = 'charactertasks';
    protected $primaryKey = 'id';
    public $incrementing = true;
    public $timestamps = true;
    // protected $with = ['characters'];

    public function characters()
    {
        return $this->belongsTo('App\Models\Characters', 'ref_character_id');
    }
    public function tasks()
    {
        return $this->belongsTo('App\Models\Tasks', 'ref_tasks_id');
    }
}
