<?php

namespace App\Http\Controllers;

use App\Models\AssignClassTeacherModel;
use App\Models\ClassModel;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AssignClassTeacherController extends Controller
{
    public function list()
    {
        $data['getRecord'] = AssignClassTeacherModel::getRecord();
        $data['header_title'] = 'Assign Class Teacher List';
        return view('admin.assign_class_teacher.list', $data);
    }

    public function add(Request $request)
    {
        $data['getClass'] = ClassModel::getClass();
        $data['getTeacher'] = User::getTeacherClass();
        $data['header_title'] = 'Add Assign Class Teacher';
        return view('admin.assign_class_teacher.add', $data);
    }

    public function insert(Request $request)
    {
        if (!empty($request->teacher_id)) {
            foreach ($request->teacher_id as $teacher_id) {
                $countAlready = AssignClassTeacherModel::countAlready($request->class_id, $teacher_id);
                if (!empty($countAlready)) {
                    $countAlready->status = $request->status;
                    $countAlready->save();
                } else {
                    $save = new AssignClassTeacherModel;
                    $save->teacher_id = $teacher_id;
                    $save->class_id = $request->class_id;
                    $save->status = $request->status;
                    $save->created_by = Auth::user()->id;
                    $save->save();
                }

            }

            return redirect('admin/assign_class_teacher/list')->with('success', 'Assign Class to Teacher Successfully');
        } else {
            return redirect('admin/assign_class_teacher/add')->with('error', 'Something went wrong. Please try again');
        }
    }

    public function edit($id)
    {
        $getRecord = AssignClassTeacherModel::getSingle($id);
        if (!empty($getRecord)) {
            $data['getRecord'] = $getRecord;
            $data['getAssignTeacherID'] = AssignClassTeacherModel::getAssignTeacherID($getRecord->class_id);
            $data['getClass'] = ClassModel::getClass();
            $data['getTeacher'] = User::getTeacherClass();
            $data['header_title'] = 'Edit Assign Class to Teacher';

            return view('admin.assign_class_teacher.edit', $data);
        } else {
            abort(404);
        }
    }

    public function update($id, Request $request)
    {
        AssignClassTeacherModel::deleteTeacher($request->class_id);
        
        if (!empty($request->teacher_id)) {
            foreach ($request->teacher_id as $teacher_id) {
                $countAlready = AssignClassTeacherModel::countAlready($request->class_id, $teacher_id);
                if (!empty($countAlready)) {
                    $countAlready->status = $request->status;
                    $countAlready->save();
                } else {
                    $save = new AssignClassTeacherModel;
                    $save->teacher_id = $teacher_id;
                    $save->class_id = $request->class_id;
                    $save->status = $request->status;
                    $save->created_by = Auth::user()->id;
                    $save->save();
                }

            }
        } 
        return redirect('admin/assign_class_teacher/list')->with('success', 'Assign Class to Teacher Successfully updated');
    }

    public function edit_single($id)
    {
        $getRecord = AssignClassTeacherModel::getSingle($id);
        if (!empty($getRecord)) {
            $data['getRecord'] = $getRecord;
            $data['getClass'] = ClassModel::getClass();
            $data['getTeacher'] = User::getTeacherClass();
            $data['header_title'] = 'Edit Assign Class to Teacher';

            return view('admin.assign_class_teacher.edit_single', $data);
        } else {
            abort(404);
        }
    }

    public function update_single($id, Request $request)
    {
        // dd($request->all());
        $countAlready = AssignClassTeacherModel::countAlready($request->class_id, $request->teacher_id);
        if (!empty($countAlready)) {
            $countAlready->status = $request->status;
            $countAlready->save();

            return redirect('admin/assign_class_teacher/list')->with('success', 'Status successfully updated');
        } else {
            $save = AssignClassTeacherModel::getSingle($id);
            $save->teacher_id = $request->teacher_id;
            $save->class_id = $request->class_id;
            $save->status = $request->status;
            $save->save();

            return redirect('admin/assign_class_teacher/list')->with('success', 'Assign Class to Teacher Successfully Updated');

        }
    }

    public function delete($id)
    {
        $save = AssignClassTeacherModel::getSingle($id);
        $save->is_delete = 1;
        $save->save();

        return redirect('admin/assign_class_teacher/list')->with('success', 'Assign Class to Teacher Successfully Deleted');
    }

    //teacher section

    public function MyClassSubject() {
        $data['getRecord'] = AssignClassTeacherModel::getMyClassSubject(Auth::user()->id);
        $data['header_title'] = 'My Class & Subject';
        return view('teacher.my_class_subject', $data);
    }
}