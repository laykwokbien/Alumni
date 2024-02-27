<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class useralumni extends Model
{
    use HasFactory;

    public function isData()
    {
        return $this->hasOne(alumni::class, 'isAccount');
    }
}
