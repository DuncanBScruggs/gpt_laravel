<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Games extends Model
{
    use HasFactory;
    protected $table = 'games';
    protected $primaryKey = 'id';
    public $incrementing = true;
    public $timestamps = true;
}
