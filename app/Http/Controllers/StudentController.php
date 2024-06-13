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
            return view('teachermanage', compact('teachers', 'genderArray'));
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
    public function store(StorestudentRequest $request)
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
                'studentphone' => ['required', 'max:255', 'unique:students'],
                'dob' => ['max:10'],
                
                'Parentname' => ['required', 'max:255'],
                'ParentPhone' => ['required', 'max:255'],
                'ParentAddress' => ['required', 'max:255'],
                'ParentNic' => ['required', 'max:10', 'regex:/^\d{9}[VvXx]$/', 'unique:students'],
                
                'school' => ['required', 'max:255'],
                'grade' => ['max:6'],
                'email' => ['email', 'max:255', 'unique:teachers'],
              
            ]);
            $studentData = new Student();
            $studentData->fname = $request->fname;
            $studentData->lname = $request->lname;
            $studentData->gender = $request->gender;
            $studentData->studentphone = $request->studentphone;
            $studentData->dob = $request->dob;
          
            $studentData->Parentname = $request->Parentname;
            $studentData->ParentPhone = $request->ParentPhone;
            $studentData->ParentAddress = $request->ParentAddress;
            $studentData->ParentNic = strtoupper($request->ParentNic);
            $studentData->school = $request->school;
            $studentData->grade = $request->grade;
            $studentData->email = $request->email;
        
            $studentData->updated_by = $user->id;
            $studentData->created_by = $user->id;
            $studentData->save();

            return redirect('/students')->with('message', 'Student Created Successfully');
        } else {
            return redirect()->back()->with('error',  'You are not authorized to perform this action');
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(student $student)
    {
        //
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
                'studentphone' => ['required', 'max:255', 'unique:students'],
                'dob' => ['max:10'],
                
                'Parentname' => ['required', 'max:255'],
                'ParentPhone' => ['required', 'max:255'],
                'ParentAddress' => ['required', 'max:255'],
                'ParentNic' => ['required', 'max:10', 'regex:/^\d{9}[VvXx]$/', 'unique:students'],
                
                'school' => ['required', 'max:255'],
                'grade' => ['max:6'],
                'email' => ['email', 'max:255', 'unique:teachers'],
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

            $studentData->fname = $request->fname;
            $studentData->lname = $request->lname;
            $studentData->gender = $request->gender;
            $studentData->studentphone = $request->studentphone;
            $studentData->dob = $request->dob;
          
            $studentData->Parentname = $request->Parentname;
            $studentData->ParentPhone = $request->ParentPhone;
            $studentData->ParentAddress = $request->ParentAddress;
            $studentData->ParentNic = strtoupper($request->ParentNic);
            $studentData->school = $request->school;
            $studentData->grade = $request->grade;
            $studentData->email = $request->email;
        
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
