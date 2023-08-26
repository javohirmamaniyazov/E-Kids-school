<?php

namespace App\Http\Controllers;

use App\Models\ClassModel;
use App\Models\ClassSubjectModel;
use App\Models\WeekModel;
use Illuminate\Http\Request;

class ClassTimetableController extends Controller
{
    public function list(Request $request)
    {
        $data['getClass'] = ClassModel::getClass();
        if (!empty($request->class_id)) {
            $data['getSubject'] = ClassSubjectModel::MyStudent($request->class_id);
        }

        $getWeek = WeekModel::getRecord();
        $week = array();
        foreach($getWeek as $value) {
            $dataW = array();
            $dataW['week_id'] = $value->id;
            $dataW['week_name'] = $value->name;
            $week[] = $dataW;
        }

        $data['week'] = $week;
        $data['header_title'] = "Class Timetable List";
        return view('admin.class_timetable.list', $data);
    }

    public function get_subject(Request $request)
    {
        $getSubject = ClassSubjectModel::MyStudent($request->class_id);
        $html = "<option value=''>Select</option>";
        foreach ($getSubject as $value) {
            $html .= "<option value='" . $value->subject_id . "'>$value->subject_name</option>";
        }

        $json['html'] = $html;
        echo json_encode($json);
    }

}