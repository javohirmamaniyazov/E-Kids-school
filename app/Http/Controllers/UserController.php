<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class UserController extends Controller
{
    public function change_password()
    {
        $data['header_title'] = "Change Password";
        return view('profile.change_password', $data);
    }

    public function update_change_password(Request $request)
    {
        $user = User::getSingle(Auth::user()->id);
        if (Hash::check($request->old_password, $user->password)) {
            $user->password = Hash::make($request->new_password);
            $user->save();

            return redirect()->back()->with('success', "Password Successfully Updated");
        } else {
            return redirect()->back()->with('error', "Old Password is not Current");
        }
    }

    public function account()
    {
        $data['getRecord'] = User::getSingle(Auth::user()->id);
        $data['header_title'] = "Account Profile";
        if (Auth::user()->user_type == 1) {
            return view('admin.account', $data);
        } else if (Auth::user()->user_type == 2) {
            return view('teacher.account', $data);
        } else if (Auth::user()->user_type == 3) {
            return view('student.account', $data);
        } else if (Auth::user()->user_type == 4) {
            return view('parent.account', $data);
        }

    }

    public function updateAccount(Request $request)
    {
        $id = Auth::user()->id;
        request()->validate([
            'email' => 'required|email|unique:users,email,' . $id,
            'mobile_number' => 'max:13|min:9',
            'marital_statis' => 'max:50',
        ]);

        $teacher = User::getSingle($id);
        $teacher->name = trim($request->name);
        $teacher->last_name = trim($request->last_name);
        $teacher->gender = trim($request->gender);

        if (!empty($request->date_of_birth)) {
            $teacher->date_of_birth = trim($request->date_of_birth);
        }

        if (!empty($request->file('profile_pic'))) {
            $extension = $request->file('profile_pic')->getClientOriginalExtension();
            $file = $request->file('profile_pic');
            $randomStr = date('Ymdhis') . Str::random(20);
            $filename = strtolower($randomStr) . '.' . $extension;
            $file->move('upload/profile/', $filename);

            $teacher->profile_pic = $filename;
        }

        $teacher->marital_status = trim($request->marital_status);
        $teacher->address = trim($request->address);
        $teacher->mobile_number = trim($request->mobile_number);
        $teacher->permanent_address = trim($request->permanent_address);
        $teacher->qualification = trim($request->qualification);
        $teacher->work_experience = trim($request->work_experience);
        $teacher->email = trim($request->email);
        $teacher->save();

        return redirect('teacher/account')->with('success', 'Account Informations Successfully Updated');

    }

    public function updateStudentAccount(Request $request)
    { {
            $id = Auth::user()->id;
            request()->validate([
                'email' => 'required|email|unique:users,email,' . $id,
                'weight' => 'max:10',
                'height' => 'max:10',
                'blood_group' => 'max:10',
                'mobile_number' => 'max:13|min:9',
                'religion' => 'max:50',
                'casta' => 'max:50',
            ]);

            $student = User::getSingle($id);
            $student->name = trim($request->name);
            $student->last_name = trim($request->last_name);
            $student->gender = trim($request->gender);

            if (!empty($request->date_of_birth)) {
                $student->date_of_birth = trim($request->date_of_birth);
            }

            if (!empty($request->file('profile_pic'))) {
                if (!empty($student->getProfile())) {
                    unlink('upload/profile/' . $student->profile_pic);
                }
                $extension = $request->file('profile_pic')->getClientOriginalExtension();
                $file = $request->file('profile_pic');
                $randomStr = date('Ymdhis') . Str::random(20);
                $filename = strtolower($randomStr) . '.' . $extension;
                $file->move('upload/profile/', $filename);

                $student->profile_pic = $filename;
            }

            $student->casta = trim($request->casta);
            $student->religion = trim($request->religion);
            $student->mobile_number = trim($request->mobile_number);

            $student->blood_group = trim($request->blood_group);
            $student->height = trim($request->height);
            $student->weight = trim($request->weight);
            $student->email = trim($request->email);
            $student->save();

            return redirect('student/account')->with('success', 'Account Informations Successfully Updated');
        }
    }

    public function updateAccountParent(Request $request)
    {
        $id = Auth::user()->id;
        request()->validate([
            'email' => 'required|email|unique:users,email,' . $id,
            'mobile_number' => 'max:13|min:9',
            'occupation' => 'max:255',
            'address' => 'max:255',
        ]);

        $student = User::getSingle($id);

        $student->name = trim($request->name);
        $student->last_name = trim($request->last_name);
        $student->gender = trim($request->gender);
        $student->occupation = trim($request->occupation);
        $student->address = trim($request->address);

        if (!empty($request->file('profile_pic'))) {
            if (!empty($student->getProfile())) {
                unlink('upload/profile/' . $student->profile_pic);
            }
            $extension = $request->file('profile_pic')->getClientOriginalExtension();
            $file = $request->file('profile_pic');
            $randomStr = date('Ymdhis') . Str::random(20);
            $filename = strtolower($randomStr) . '.' . $extension;
            $file->move('upload/profile/', $filename);

            $student->profile_pic = $filename;
        }

        $student->mobile_number = trim($request->mobile_number);
        $student->email = trim($request->email);
        $student->save();

        return redirect('parent/account')->with('success', 'Parent Successfully Updated');
    }

    public function updateAccountAdmin(Request $request)
    {
        $id = Auth::user()->id;
        request()->validate([
            'email' => 'required|email|unique:users,email,' . $id
        ]);

        $user = User::getSingle($id);
        $user->name = trim($request->name);
        $user->email = trim($request->email);
        $user->save();

        return redirect('admin/account')->with('success', "Account Informations Successfully updated");
    }
}