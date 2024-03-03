<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class alumni extends Model
{
    use HasFactory;

    protected $guarded = ['id'];

    public function scopeFilter($query, array $filters)
    {
        $query->when(
            $filters['search'] ?? false,
            function ($query, $search) {
                return $query->where('nama', 'like', '%', $search, '%')
                    ->orWhere('tahun_lulus', 'like', '%', $search, '%');
            },
            // $query->when($filters['jurusan'] ?? false, function ($query, $jurusan) {
            //     return $query->whereHas('isjurusan', function ($query) use ($jurusan) {
            //         $query->where('jurusan', $jurusan);
            //     });
            // })
        );
    }

    public function isjurusan()
    {
        return $this->belongsTo(jurusan::class, "jurusan");
    }
    public function isAccount()
    {
        return $this->hasOne(useralumni::class, 'isData');
    }
}