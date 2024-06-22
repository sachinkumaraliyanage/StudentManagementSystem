<?php

namespace App\Http\Controllers;

use App\Models\student;
use App\Http\Controllers\Controller;
use App\Http\Requests\StorestudentRequest;
use App\Http\Requests\UpdatestudentRequest;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Auth;

class StudentController extends Controller
{
    private $authgroup = ['SuperAdmin', 'Admin', 'Manager'];

    public function index()
    {
        $user = Auth::user();
        if ($user == null) {
            return redirect(url('/'));
        } else if (in_array($user->type, $this->authgroup)) {
            $students = student::orderBy('updated_at', 'desc')->get();
            $genderArray = ['Male', 'Female', 'Other'];
            return view('studentmanage', compact('students', 'genderArray'));
        } else {
            return view('errors.500');
        }
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        
        $user = Auth::user();
        
        if ($user == null) {
            return redirect(url('/'));
        } else if (in_array($user->type, $this->authgroup)) {
            App::setLocale(Auth::user()->lang);
            
            $validated = $request->validate([
                'fname' => ['required', 'max:255'],
                'lname' => ['required', 'max:255'],
                'gender' => ['required', 'in:Male,Female,Other'],
                'student_phone' => ['required', 'max:255', 'unique:students'],
                'dob' => ['max:10', 'before:today'],
                'nic' => ['max:12', 'regex:/^\d{9}[VvXx]$|^\d{12}$/', 'unique:students'],
                'school' => ['required', 'max:255'],
                'email' => ['email', 'max:255', 'unique:students'],
                'address' => ['required', 'max:255'],

                'parent_name' => ['required', 'max:255'],
                'parent_phone' => ['required', 'max:255'],
                'parent_address' => ['required', 'max:255'],
                'parent_nic' => ['required', 'max:12', 'regex:/^\d{9}[VvXx]$|^\d{12}$/'],
                'parent_email' => ['email', 'max:255'],

            ]);
           // dd($validated);
            $studentData = new Student();
            $studentData->fname = $request->fname;
            $studentData->lname = $request->lname;
            $studentData->gender = $request->gender;
            $studentData->student_phone = $request->student_phone;
            $studentData->dob = $request->dob;
            $studentData->nic = strtoupper($request->nic);
            $studentData->school = $request->school;
            $studentData->email = $request->email;
            $studentData->address = $request->address;

            $studentData->parent_name = $request->parent_name;
            $studentData->parent_Phone = $request->parent_phone;
            $studentData->parent_address = $request->parent_address;
            $studentData->parent_nic = strtoupper($request->parent_nic);
            $studentData->parent_email = $request->parent_email;

            $studentData->updated_by = $user->id;
            $studentData->created_by = $user->id;
            $studentData->save();

            return redirect('/students')->with('message', 'Student Created Successfully');
        } else {
            return redirect()->back()->with('error',  'You are not authorized to perform this action');
        }
    }



    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id, Request $request)
    {
        $user = Auth::user();
        if ($user == null) {
            return redirect(url('/'));
        } else if (in_array($user->type, $this->authgroup)) {
            $students = student::orderBy('updated_at', 'desc')->get();
            $studentData = student::find($id);
            $genderArray = ['Male', 'Female', 'Other'];
            return view('studentmanage', compact('students', 'studentData', 'genderArray'));
        } else {
            return view('errors.500');
        }
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $user = Auth::user();
        
        if ($user == null) {
            return redirect(url('/'));
        } else if (in_array($user->type, $this->authgroup)) {
            App::setLocale(Auth::user()->lang);
            $validated = $request->validate([
                'fname' => ['required', 'max:255'],
                'lname' => ['required', 'max:255'],
                'gender' => ['required', 'in:Male,Female,Other'],
                'student_phone' => ['required', 'max:255', 'unique:students'],
                'dob' => ['max:10'],
                'nic' => ['max:12', 'regex:/^\d{9}[VvXx]$|^\d{12}$/', 'unique:students'],
                'school' => ['required', 'max:255'],
                'email' => ['email', 'max:255', 'unique:students'],
                'address' => ['required', 'max:255'],

                'parent_name' => ['required', 'max:255'],
                'parent_phone' => ['required', 'max:255'],
                'parent_address' => ['required', 'max:255'],
                'parent_nic' => ['required', 'max:12' ,'regex:/^\d{9}[VvXx]$|^\d{12}$/'],
                'parent_email' => ['email', 'max:255'],
            ]);
            $studentData = student::find($id);
            // if ($request->nic != $teacherData->nic) {
            //     $validated = $request->validate([
            //         'nic' => ['required', 'max:10', 'regex:/^\d{9}[VvXx]$/', 'unique:teachers'],
            //     ]);
            // }
            // if ($request->pno != $teacherData->pno) {
            //     $validated = $request->validate([
            //         'pno' => ['required', 'max:255', 'unique:teachers'],
            //     ]);
            // }
            // if ($request->email != $teacherData->email) {
            //     $validated = $request->validate([
            //         'email' => ['email', 'max:255', 'unique:teachers'],
            //     ]);
            // }

            $studentData = new Student();
            $studentData->fname = $request->fname;
            $studentData->lname = $request->lname;
            $studentData->gender = $request->gender;
            $studentData->student_phone = $request->student_phone;
            $studentData->dob = $request->dob;
            $studentData->nic = strtoupper($request->nic);
            $studentData->school = $request->school;
            $studentData->email = $request->email;
            $studentData->address = $request->address;

            $studentData->parent_name = $request->parent_name;
            $studentData->parent_Phone = $request->parent_phone;
            $studentData->parent_address = $request->parent_address;
            $studentData->parent_nic = strtoupper($request->parent_nic);
            $studentData->parent_email = $request->parent_email;

            $studentData->updated_by = $user->id;
            $studentData->created_by = $user->id;
            $studentData->save();

            return redirect('/students')->with('message', 'Student Update Successfully');
        } else {
            return redirect()->back()->with('error',  'You are not authorized to perform this action');
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Request  $request)
    {
        $user = Auth::user();
        if ($user != null) {
            App::setLocale(Auth::user()->lang);
            if (in_array($user->type, $this->authgroup)) {
                $tdata = Student::find($request->tid);
                $tdata->state = $request->st;
                $tdata->updated_by = $user->id;
                $tdata->save();
                return new Response(1, 200);
            } else {
                return new Response('You are not authorized to perform this action', 401);
            }
        } else {
            return new Response('You are not authorized to perform this action', 401);
        }
    }
}
