<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Data extends Model
{
    protected $table = 'data';

    protected $fillable = ['firstname', 'lastname', 'jabatan', 'email', 'rumah', 'perusahaan', 'phone'];
}
