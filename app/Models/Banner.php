<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Banner extends Model
{
    public static function banner()
    {
        $banner =[
        '1' => '/png/new.png',
        ];
        
        return $banner;
    }
}
