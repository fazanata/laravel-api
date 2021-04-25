<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class TestUserModel extends Model
{
    protected $table = "testusers";

    protected $fillable = [
        'id',
        'fio',
        'active',
        'active_time'
    ];
}
