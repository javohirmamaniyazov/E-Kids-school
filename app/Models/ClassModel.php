<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ClassModel extends Model
{
    use HasFactory;

    protected $table = 'class';

    static public function getrecord()
    {
        $query = ClassModel::select("users.*", "users.name as created_by_name")
            ->join("users", "users.id", "=", "class.created_by")
            ->orderBy("class.id", "desc");

        // Paginate the results with a specified number of records per page.
        $perPage = 10; // Change this number according to your requirements.
        $paginatedData = $query->paginate($perPage);

        return $paginatedData;
    }

}