<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Request;

class AssignClassTeacherModel extends Model
{
    use HasFactory;

    protected $table = 'assign_class_teacher';
    
    static public function countAlready($class_id, $teacher_id){
        return self::where('class_id', '=', $class_id)->where('teacher_id', '=', $teacher_id)->first();
    }

    static public function getRecord() {
        $return = self::select('assign_class_teacher.*', 'class.name as class_name', 'teacher.name as teacher_name', 'users.name as created_by_name')
                    ->join('users as teacher', 'teacher.id', '=', 'assign_class_teacher.teacher_id')
                    ->join('class', 'class.id', '=', 'assign_class_teacher.class_id')
                    ->join('users', 'users.id', '=', 'assign_class_teacher.created_by')
                    ->where('assign_class_teacher.is_delete', '=', 0);

                    if(!empty(Request::get('class_name'))) {
                        $return = $return->where('class.name', 'like', '%'.Request::get('class_name').'%');
                    }
                    if(!empty(Request::get('teacher_name'))) {
                        $return = $return->where('teacher.name', 'like', '%'.Request::get('teacher_name').'%');
                    }
                    if(!empty(Request::get('status'))) {
                        $status = (Request::get('status') == 100) ? 0 : 1;
                        $return = $return->where('assign_class_teacher.status', '=', $status);
                    }
                    if(!empty(Request::get('date'))) {
                        $return = $return->whereDate('assign_class_teacher.created_at', '=', Request::get('date'));
                    }
        $return = $return->orderBy('assign_class_teacher.id', 'desc')
                        ->paginate(20);

        return $return;
    }

    static public function getMyClassSubject($teacher_id) {
        return self::select('assign_class_teacher.*', 'class.name as class_name', 'subject.name  as subject_name', 'subject.type as subject_type', 'class.id as class_id', 'subject.id as subject_id')
                    ->join('class', 'class.id', '=', 'assign_class_teacher.class_id')
                    ->join('class_subject', 'class_subject.class_id', '=', 'class.id')
                    ->join('subject', 'subject.id', '=', 'class_subject.subject_id')
                    ->where('assign_class_teacher.is_delete', '=', 0)
                    ->where('assign_class_teacher.status', '=', 0)
                    ->where('subject.status', '=', 0)
                    ->where('subject.is_delete', '=', 0)
                    ->where('class_subject.status', '=', 0)
                    ->where('class_subject.is_delete', '=', 0)
                    ->where('assign_class_teacher.teacher_id', '=', $teacher_id)
                    ->get();
    }

    static public function getSingle($id) {
        return self::find($id);   
    }

    static public function getAssignTeacherID($class_id) {
        return self::where('class_id', '=', $class_id)->where('is_delete', '=', 0)->get();
    }
    
    static public function deleteTeacher($class_id) {
        return self::where('class_id', '=', $class_id)->delete();
    }

    static public function getMyTimeTable($class_id, $subject_id) {
        $getWeek = WeekModel::getWeekUsingName(date('l'));
        // return $getWeek->start_time;
        return ClassSubjectTimetableModel::getRecordClassSubject($class_id, $subject_id, $getWeek->id);
    }
}
