<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ExamModel extends Model
{
    use HasFactory;

    protected $table = 'exam';

    static public function getRecord() {
        return self::select('exam.*', 'users.name as created_name')->join('users', 'users.id', '=', 'exam.created_by')->orderBy('exam.id', 'desc')->paginate(50);
    }
}
