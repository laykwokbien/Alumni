<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Model;

class useralumni extends Model
{
    use HasFactory;

    protected $guarded = ['id'];

    public function isData()
    {
        return $this->hasOne(alumni::class, 'id');
    }
}
