<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class alumni extends Model
{
    use HasFactory;

    protected $guarded = ['id'];

    public function isjurusan()
    {
        return $this->belongsTo(jurusan::class, "jurusan");
    }
    public function isAccount()
    {
        return $this->hasOne(useralumni::class, 'isData');
    }
}
