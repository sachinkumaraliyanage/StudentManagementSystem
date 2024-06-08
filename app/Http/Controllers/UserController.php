<?php

namespace App\Http\Controllers;


use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    private $overwrite = ['SuperAdmin', 'Admin', 'Manager', 'Supervisor'];
    private $returnbill = ['SuperAdmin', 'Admin', 'Manager', 'Supervisor'];
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $user = Auth::user();
        if ($user == null) {
            return redirect(url('/'));
        } else if ($user->type == 'SuperAdmin' || $user->type == 'Admin') {

            $users = User::orderBy('updated_at', 'desc')->get();
            return view('usermanage', compact('users'));
        } else {
            return view('errors.500');
        }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $user = Auth::user();
        if ($user == null) {
            return redirect(url('/'));
        } else if ($user->type == 'SuperAdmin') {
            $typelist = ['Pos User', 'Supervisor', 'Manager', 'Admin', 'SuperAdmin'];

            $add = true;

            return view('profile', compact('typelist', 'add'));
        } else {
            return view('errors.500');
        }
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $user = Auth::user();
        if ($user == null) {
            return redirect(url('/'));
        } else if ($user->type == 'SuperAdmin') {
            App::setLocale(Auth::user()->lang);
            $validated = $request->validate([
                'fname' => ['required', 'max:255'],
                'lname' => ['required', 'max:255'],
                'uname' => ['required', 'unique:users', 'max:255'],
                'email' => ['required', 'max:255', 'email', 'unique:users'],
                'type' => ['required', 'in:SuperAdmin,Admin,Manager,Supervisor,Pos User'],
                'password' => ['required', 'max:255', 'min:6', 'confirmed']
            ]);
            $newUser = new User();
            $newUser->fname = $request->fname;
            $newUser->lname = $request->lname;
            $newUser->uname = $request->uname;
            $newUser->email = $request->email;
            $newUser->type = $request->type;
            $newUser->updated_by = $user->id;
            $newUser->created_by = $user->id;
            $newUser->password = Hash::make($request->password);
            $newUser->save();
            return redirect()->back()->with('message', __('language.UserController.m1'));
        } else {
            return new Response(__('language.UserController.m2'), Response::HTTP_UNAUTHORIZED);
        }
    }


    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $auser = Auth::user();
        if ($auser == null) {
            return redirect(url('/'));
        } else if ($auser->type == 'SuperAdmin') {
            $typelist = ['Pos User', 'Supervisor', 'Manager', 'Admin', 'SuperAdmin'];
            $user = User::find($id);
            return view('profile', compact('typelist', 'user'));
        } else if ($auser->type == 'Admin') {
            $user = User::find($id);
            if ($user->type != 'SuperAdmin') {
                $typelist = ['Pos User', 'Supervisor', 'Manager', 'Admin'];
                return view('profile', compact('typelist', 'user'));
            } else {
                return view('errors.500');
            }
        } else {
            return view('errors.500');
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //else if($user->type=='SuperAdmin'|| $user->type=='Admin'){
        $user = Auth::user();
        if ($user == null) {
            return redirect(url('/'));
        } else if ($user->type == 'SuperAdmin') {
            App::setLocale(Auth::user()->lang);
            $editUser = User::find($id);
            if ($editUser->type == 'SuperAdmin' && $user->type == 'Admin') {
                return new Response(__('language.UserController.m2'), Response::HTTP_UNAUTHORIZED);
            }
            $validated = $request->validate([
                'fname' => ['required', 'max:255'],
                'lname' => ['required', 'max:255'],
                'uname' => ['required', 'max:255'],
                'email' => ['required', 'max:255', 'email'],
                'type' => ['required', 'in:SuperAdmin,Admin,Manager,Supervisor,Pos User']
            ]);
            if ($user->id == $id && $request->type != $user->type) {
                return redirect()->back()->with('error', __('language.UserController.m5'));
            }

            if ($request->uname != $editUser->uname) {
                $validated = $request->validate([
                    'uname' => ['unique:users'],
                ]);
            }

            if ($request->email != $editUser->email) {
                $validated = $request->validate([
                    'email' => ['unique:users'],
                ]);
            }
            $editUser->fname = $request->fname;
            $editUser->lname = $request->lname;
            $editUser->uname = $request->uname;
            $editUser->email = $request->email;
            $editUser->display = $request->display;
            $editUser->printer = $request->printer;
            $editUser->type = $request->type;
            $editUser->updated_by = $user->id;
            $editUser->save();
            return redirect()->back()->with('message', __('language.UserController.m3'));
        } else {
            return redirect()->back()->with('error', __('language.UserController.m2'));
        }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function ProfileEdit()
    {
        $user = Auth::user();
        if ($user == null) {
            return redirect(url('/'));
        }
        $typelist = [$user->type];
        $profile = true;
        return view('profile', compact('typelist', 'user', 'profile'));
    }

    /**
     * Update Profile the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function ProfileUpdate(Request $request)
    {
        $user = Auth::user();
        if ($user == null) {
            return redirect(url('/'));
        }

        App::setLocale(Auth::user()->lang);
        $validated = $request->validate([
            'fname' => ['required', 'max:255'],
            'lname' => ['required', 'max:255'],
            'uname' => ['required', 'max:255'],
            'email' => ['required', 'max:255', 'email'],
        ]);

        if ($request->uname != $user->uname) {
            $validated = $request->validate([
                'uname' => ['unique:users'],
            ]);
        }

        if ($request->email != $user->email) {
            $validated = $request->validate([
                'email' => ['unique:users'],
            ]);
        }
        $editUser = User::find($user->id);
        $editUser->fname = $request->fname;
        $editUser->lname = $request->lname;
        $editUser->uname = $request->uname;
        $editUser->email = $request->email;
        $editUser->display = $request->display;
        $editUser->printer = $request->printer;
        $editUser->updated_by = $user->id;
        $editUser->save();
        return redirect()->back()->with('message', __('language.UserController.m6'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  Request $request
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {
        $user = Auth::user();

        if ($user != null) {
            App::setLocale(Auth::user()->lang);
            if ($user->type == "SuperAdmin") {
                $udata = User::find($request->uid);
                if ($udata->uname != $user->uname) {
                    $udata->state = $request->st;
                    $udata->updated_by = $user->id;
                    $udata->save();
                    return new Response(1, Response::HTTP_OK);
                } else {
                    return new Response(__('language.UserController.m7'), Response::HTTP_UNAUTHORIZED);
                }
            } else if ($user->type == "Admin") {
                $udata = User::find($request->uid);
                if ($udata->type != "SuperAdmin") {
                    if ($udata->uname != $user->uname) {
                        $udata->state = $request->st;
                        $udata->updated_by = $user->id;
                        $udata->save();
                        return new Response(1, Response::HTTP_OK);
                    } else {
                        return new Response(__('language.UserController.m7'), Response::HTTP_UNAUTHORIZED);
                    }
                }
            } else {
                return new Response(__('language.UserController.m8'), Response::HTTP_UNAUTHORIZED);
            }
        } else {
            return new Response(__('language.UserController.m4'), Response::HTTP_UNAUTHORIZED);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function SetPassword(Request $request)
    {

        $user = Auth::user();
        if ($user != null) {
            App::setLocale(Auth::user()->lang);
            if ($user->type == "SuperAdmin") {
                $udata = User::find($request->uid);
                if ($udata->uname != $user->uname) {
                    $newpass = Hash::make($request->pass);
                    $udata->password = $newpass;
                    $udata->save();
                    return new Response(1, Response::HTTP_OK);
                } else {
                    return new Response(__('language.UserController.m7'), Response::HTTP_UNAUTHORIZED);
                }
            } else if ($user->type == "Admin") {
                $udata = User::find($request->uid);
                if ($udata->type != "SuperAdmin") {
                    if ($udata->uname != $user->uname) {
                        $newpass = Hash::make($request->pass);
                        $udata->password = $newpass;
                        $udata->save();
                        return new Response(1, Response::HTTP_OK);
                    } else {
                        return new Response(__('language.UserController.m7'), Response::HTTP_UNAUTHORIZED);
                    }
                } else {
                    return new Response(__('language.UserController.m8'), Response::HTTP_UNAUTHORIZED);
                }
            } else {
                return new Response(__('language.UserController.m4'), Response::HTTP_UNAUTHORIZED);
            }
        } else {
            return new Response(__('language.UserController.m4'), Response::HTTP_UNAUTHORIZED);
        }
    }

    public function ChangePassword(Request $request)
    {
        $user = Auth::user();
        if ($user != null) {
            App::setLocale(Auth::user()->lang);
            if (Hash::check($request->oldpass, $user->password)) {
                $udata = User::find($user->id);
                $newpass = Hash::make($request->pass);
                $udata->password = $newpass;
                $udata->save();
                return new Response(1, Response::HTTP_OK);
            } else {
                return new Response(__('language.UserController.m9'), Response::HTTP_OK);
            }
        } else {
            return new Response(__('language.UserController.m4'), Response::HTTP_UNAUTHORIZED);
        }
    }

    public function FreeOverwite(Request $request)
    {
        $user = Auth::user();
        if ($user != null) {
            App::setLocale(Auth::user()->lang);
            $ousers = User::where('uname', '=', $request->uname)->where('state', '=', '1')->whereIn('type', $this->overwrite)->get();
            foreach ($ousers as $ouser) {
                if (Hash::check($request->pass, $ouser->password)) {
                    return response()->json($ouser, Response::HTTP_OK);
                }
            }
            return new Response(__('language.UserController.m10'), Response::HTTP_NOT_FOUND);
        } else {
            return new Response(__('language.UserController.m4'), Response::HTTP_UNAUTHORIZED);
        }
    }

    public function ReturnAuth(Request $request)
    {
        $user = Auth::user();
        if ($user != null) {
            App::setLocale(Auth::user()->lang);
            $ousers = User::where('uname', '=', $request->uname)->where('state', '=', '1')->whereIn('type', $this->returnbill)->get();
            foreach ($ousers as $ouser) {
                if (Hash::check($request->pass, $ouser->password)) {
                    return response()->json($ouser, Response::HTTP_OK);
                }
            }
            return new Response(__('language.UserController.m10'), Response::HTTP_NOT_FOUND);
        } else {
            return new Response(__('language.UserController.m4'), Response::HTTP_UNAUTHORIZED);
        }
    }
}
