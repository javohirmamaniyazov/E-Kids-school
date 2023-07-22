<?php

namespace App\Http\Controllers;

use App\Models\SubjectModel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class SubjectController extends Controller
{
    public function list() {
        $data['getRecord'] = SubjectModel::getRecord();
        $data['header_title'] = 'Subject List';
        return view('admin.subject.list', $data);
    }

    public function add() {
        $data['header_title'] = 'Add new Subject';
        return view('admin.subject.add', $data);
     }


     public function insert(Request $request) {
        $subject = new SubjectModel;
        $subject->name = trim($request->name);
        $subject->type = trim($request->type);
        $subject->status = trim($request->status);
        $subject->created_by =  Auth::user()->id;
        $subject->save();
        
        return redirect('admin/subject/list')->with('success', 'Subject Successfully Added');
     }

     public function edit($id) {
        $data['getRecord'] = SubjectModel::getSingle($id);
        if(!empty($data['getRecord'])){
            $data['header_title'] = 'Edit Subject';
            return view('admin.subject.edit', $data);
        }
        else{
            abort(404);
        }
     }

     public function update(Request $request, $id) {
        $subject = SubjectModel::getSingle($id);
        $subject->name = trim($request->name);
        $subject->type = trim($request->type);
        $subject->status = trim($request->status);
        $subject->save();

        return redirect('admin/subject/list')->with('success', 'Subject Successfully Updated');
     }

     public function delete($id) {
        $subject = SubjectModel::getSingle($id);
        $subject->is_delete = 1;
        $subject->save();

        return redirect('admin/subject/list')->with('success', 'Subject Successfully Deleted');
     }
}
