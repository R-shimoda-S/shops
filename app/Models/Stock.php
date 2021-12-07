<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Stock extends Model
{
    protected $guarded = [
        'id'
      ];

    public function type()
    {
        return $this->belongsTo('\App\Models\Type');
    }
}
