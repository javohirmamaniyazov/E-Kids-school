<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class WeekModel extends Model
{
    use HasFactory;

    protected $table = 'weeks';

    static public function getRecord() {
        return self::get();
    }
}

