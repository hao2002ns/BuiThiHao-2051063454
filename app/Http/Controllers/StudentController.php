<?php

namespace App\Http\Controllers;

use App\Models\Student;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class StudentController extends Controller
{
    //
    public function get_all_student()
    {
        $Student = Student::all();
        return view('student.list',['Student'=>$Student]);
    }
    public function create()
    {
        //
        return view("student.create");
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request){
        $rules = [
            'fullname' => 'required|min:4|max:20',
            'address' => 'required|min:4|max:20',
            'birthday' => 'required|'
        ];
        $messages = [
            'fullname.required' => 'Tên sinh viên bắt buộc phải nhập',
            'fullname.min' => 'Tên sinh viên phải lớn hơn :min ký tự',
            'fullname.max' => 'Tên sinh viên phải nhỏ hơn :max ký tự',
            'address.required' => 'Địa chỉ sinh viên bắt buộc phải nhập',
            'address.min' => 'Địa chỉ sinh viên phải lớn hơn :min ký tự',
            'address.max' => 'Địa chỉ sinh viên phải nhỏ hơn :max ký tự',
            'birthday.required' => 'Ngày sinh sinh viên bắt buộc phải nhập',
        ];
        $request->validate($rules,$messages);
        
        Student::create([
            'fullname' => $request->fullname,
            'birthday' => $request->birthday,
            'address' => $request->address
        ]);
        return redirect("/student");

    }
    public function edit($id){
        $data = Student::find($id);
        return view('student.add',['data'=>$data]);
    }
    public function update(Request $request, $id){
    {
        $rules = [
            'fullname' => 'required|min:4|max:20',
            'address' => 'required|min:4|max:20',
            'birthday' => 'required|'
        ];
        $messages = [
            'fullname.required' => 'Tên sinh viên bắt buộc phải nhập',
            'fullname.min' => 'Tên sinh viên phải lớn hơn :min ký tự',
            'fullname.max' => 'Tên sinh viên phải nhỏ hơn :max ký tự',
            'address.required' => 'Địa chỉ sinh viên bắt buộc phải nhập',
            'address.min' => 'Địa chỉ sinh viên phải lớn hơn :min ký tự',
            'address.max' => 'Địa chỉ sinh viên phải nhỏ hơn :max ký tự',
            'birthday.required' => 'Ngày sinh sinh viên bắt buộc phải nhập',
        ];
        $request->validate($rules,$messages);
        $data = Student::find($id);
        $data->update([
            'fullname' => $request->fullname,
            'birthday' => $request->birthday,
            'address'  => $request->address,
        ]);
        return redirect("/student/list");

    }
}

    public function destroy($id)
    {
        //
        $data= Student::find($id);
        $data->delete();
        return redirect("/student/list");
    }
}

