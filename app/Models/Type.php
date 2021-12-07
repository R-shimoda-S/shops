<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Type extends Model
{
    protected $guarded = [
        'id'
      ];

    public static $types =[
        '1' => '食品',
        '2' => '飲料',
        '3' => '日用品',
        '4' => '楽器',
    ];
}
