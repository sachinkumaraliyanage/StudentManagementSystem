<?php

namespace App\Http\Controllers;

use App\Models\Teacher;
use App\Http\Requests\StoreTeacherRequest;
use App\Http\Requests\UpdateTeacherRequest;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Auth;

class TeacherController extends Controller
{
    private $authgroup = ['SuperAdmin', 'Admin', 'Manager'];
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $user = Auth::user();
        if ($user == null) {
            return redirect(url('/'));
        } else if (in_array($user->type, $this->authgroup)) {
            $teachers = Teacher::orderBy('updated_at', 'desc')->get();
            $genderArray = ['Male', 'Female', 'Other'];
            $namePrefixArray = ['Mr', 'Mrs', 'Miss', 'Dr', 'Prof', 'Rev', 'Other'];
            return view('teachermanage', compact('teachers', 'genderArray', 'namePrefixArray'));
        } else {
            return view('errors.500');
        }
    }




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
                'nic' => ['required', 'max:10', 'regex:/^\d{9}[VvXx]$/', 'unique:teachers'],
                'gender' => ['required', 'in:Male,Female,Other'],
                'name_prefix' => ['required', 'in:Mr,Mrs,Miss,Dr,Prof,Rev,Other'],
                'pno' => ['required', 'max:255', 'unique:teachers'],
                'email' => ['email', 'max:255', 'unique:teachers'],
                'address' => ['required', 'max:255'],
                'school' => ['max:255'],
                'description' => ['max:255'],
            ]);
            $teacherData = new Teacher();
            $teacherData->fname = $request->fname;
            $teacherData->lname = $request->lname;
            $teacherData->nic = strtoupper($request->nic);
            $teacherData->gender = $request->gender;
            $teacherData->name_prefix = $request->name_prefix;
            $teacherData->pno = $request->pno;
            $teacherData->email = $request->email;
            $teacherData->address = $request->address;
            $teacherData->school = $request->school;
            $teacherData->description = $request->description;
            $teacherData->updated_by = $user->id;
            $teacherData->created_by = $user->id;
            $teacherData->save();

            return redirect('/teachers')->with('message', 'Teacher Created Successfully');
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
            $teachers = Teacher::orderBy('updated_at', 'desc')->get();
            $teacherData = Teacher::find($id);
            $genderArray = ['Male', 'Female', 'Other'];
            $namePrefixArray = ['Mr', 'Mrs', 'Miss', 'Dr', 'Prof', 'Rev', 'Other'];
            return view('teachermanage', compact('teachers', 'teacherData', 'genderArray', 'namePrefixArray'));
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
                'name_prefix' => ['required', 'in:Mr,Mrs,Miss,Dr,Prof,Rev,Other'],
                'address' => ['required', 'max:255'],
                'school' => ['max:255'],
                'description' => ['max:255'],
            ]);
            $teacherData = Teacher::find($id);
            if ($request->nic != $teacherData->nic) {
                $validated = $request->validate([
                    'nic' => ['required', 'max:10', 'regex:/^\d{9}[VvXx]$/', 'unique:teachers'],
                ]);
            }
            if ($request->pno != $teacherData->pno) {
                $validated = $request->validate([
                    'pno' => ['required', 'max:255', 'unique:teachers'],
                ]);
            }
            if ($request->email != $teacherData->email) {
                $validated = $request->validate([
                    'email' => ['email', 'max:255', 'unique:teachers'],
                ]);
            }

            $teacherData->fname = $request->fname;
            $teacherData->lname = $request->lname;
            $teacherData->nic = strtoupper($request->nic);
            $teacherData->gender = $request->gender;
            $teacherData->name_prefix = $request->name_prefix;
            $teacherData->pno = $request->pno;
            $teacherData->email = $request->email;
            $teacherData->address = $request->address;
            $teacherData->school = $request->school;
            $teacherData->description = $request->description;
            $teacherData->updated_by = $user->id;
            $teacherData->save();

            return redirect('/teachers')->with('message', 'Teacher Update Successfully');
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
                $tdata = Teacher::find($request->tid);
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
