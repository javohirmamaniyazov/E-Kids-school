<?php

namespace App\Http\Controllers;

use App\Models\ClassModel;
use Illuminate\Http\Request;

class ClassController extends Controller
{
    public function list() {
        $data['getrecord'] = ClassModel::getrecord();

        $data['header_title'] = 'Class List';
        return view('admin.class.list', $data);
    }

    public function add() {
        $data['header_title'] = 'Add New Class';
        return view('admin.class.add', $data);
    }

    public function insert(Request $request) {
        $save = new ClassModel;
        $save->name = $request->name;
        $save->status = $request->status;
        $save->created_by = $request->created_by;
        $save->save();

        return redirect('admin/class/list')->with('success' , "Class Successfuly Created");
    }
}
