<?php

namespace App\Http\Controllers;

use App\Models\ClassModel;
use App\Models\ClassSubjectModel;
use App\Models\SubjectModel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ClassSubjectController extends Controller
{
    public function list(Request $request)
    {
        $data['getRecord'] = ClassSubjectModel::getRecord();
        $data['header_title'] = 'Assign Subject List';
        return view('admin.assign_subject.list', $data);
    }

    public function add(Request $request)
    {
        $data['getClass'] = ClassModel::getClass();
        $data['getSubject'] = SubjectModel::getSubject();
        $data['header_title'] = 'Add Assign Subject';
        return view('admin.assign_subject.add', $data);
    }

    public function insert(Request $request)
    {
        if (!empty($request->subject_id)) {
            foreach ($request->subject_id as $subject_id) {
                $countAlready = ClassSubjectModel::countAlready($request->class_id, $subject_id);
                if (!empty($countAlready)) {
                    $countAlready->status = $request->status;
                    $countAlready->save();
                } else {
                    $save = new ClassSubjectModel;
                    $save->subject_id = $subject_id;
                    $save->class_id = $request->class_id;
                    $save->status = $request->status;
                    $save->created_by = Auth::user()->id;
                    $save->save();
                }

            }

            return redirect('admin/assign_subject/list')->with('success', 'Subject Successfully Assign to Class');
        } else {
            return redirect('admin/assign_subject/add')->with('error', 'Something went wrong. Please try again');
        }
    }

    public function edit($id)
    {
        $getRecord = ClassSubjectModel::getSingle($id);
        if (!empty($getRecord)) {
            $data['getRecord'] = $getRecord;
            $data['getAssignSubjectID'] = ClassSubjectModel::getAssignSubjectID($getRecord->class_id);
            $data['getClass'] = ClassModel::getClass();
            $data['getSubject'] = SubjectModel::getSubject();
            $data['header_title'] = 'Edit Assign Subject';

            return view('admin.assign_subject.edit', $data);
        } else {
            abort(404);
        }
    }

    public function update(Request $request)
    {
        ClassSubjectModel::deleteSubject($request->class_id);
        if (!empty($request->subject_id)) {
            foreach ($request->subject_id as $subject_id) {
                $countAlready = ClassSubjectModel::countAlready($request->class_id, $subject_id);
                if (!empty($countAlready)) {
                    $countAlready->status = $request->status;
                    $countAlready->save();
                } else {
                    $save = new ClassSubjectModel;
                    $save->subject_id = $subject_id;
                    $save->class_id = $request->class_id;
                    $save->status = $request->status;
                    $save->created_by = Auth::user()->id;
                    $save->save();
                }

            }
        }

        return redirect('admin/assign_subject/list')->with('success', 'Subject Successfully Assign to Class');
    }

    public function delete($id)
    {
        $save = ClassSubjectModel::getSingle($id);
        $save->is_delete = 1;
        $save->save();

        return redirect('admin/assign_subject/list')->with('success', 'Subject Successfully Deleted');
    }


    public function edit_single($id)
    {
        $getRecord = ClassSubjectModel::getSingle($id);
        if (!empty($getRecord)) {
            $data['getRecord'] = $getRecord;
            $data['getClass'] = ClassModel::getClass();
            $data['getSubject'] = SubjectModel::getSubject();
            $data['header_title'] = 'Edit Assign Subject';

            return view('admin.assign_subject.edit_single', $data);
        } else {
            abort(404);
        }
    }

    public function update_single($id, Request $request)
    {
        // dd($request->all());
        $countAlready = ClassSubjectModel::countAlready($request->class_id, $request->subject_id);
        if (!empty($countAlready)) {
            $countAlready->status = $request->status;
            $countAlready->save();

            return redirect('admin/assign_subject/list')->with('success', 'Status successfully updated');
        } else {
            $save = ClassSubjectModel::getSingle($id);
            $save->subject_id = $request->subject_id;
            $save->class_id = $request->class_id;
            $save->status = $request->status;
            $save->save();

            return redirect('admin/assign_subject/list')->with('success', 'Subject Successfully Assign to Class');

        }

    }
}