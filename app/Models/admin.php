<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Model;
use Laravel\Sanctum\HasApiTokens;

class Admin extends Model
{
    use HasFactory, HasApiTokens;
}
