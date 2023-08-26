<?php

namespace App\Http\Controllers;

use App\Models\ClassModel;
use Illuminate\Http\Request;

class ClassTimetableController extends Controller
{
    public function list() {
        $data['getClass'] = ClassModel::getClass();
        $data['header_title'] = "Class Timetable List";
        return view('admin.class_timetable.list', $data); 
    }

    public function get_subject(Request $request) {
        dd($request->all());
    }

}
