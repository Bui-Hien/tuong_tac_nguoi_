<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;

class CustomAuthController extends Controller
{

    public function managerLogin()
    {
        return view('auth.manager-login');
    }

    public function employeeLogin()
    {
        return view('auth.employee-login');
    }

    public function doctorLogin()
    {
        return view('auth.doctor-login');
    }

    public function registration()
    {
        return view("auth.registration");
    }

    public function registerUser(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required|email|unique:users',
            'password' => 'required|min:6',
        ]);
        $user = new User();
        $user->name = $request->input('name');
        $user->email = $request->input('email');
        $user->password = $request->input('password');
        $user->password = Hash::make($user->password);
        $res = $user->save();
        if ($res) {
            return back()->with('success', 'You have been registered successfully.');
        } else {
            return back()->with('fail', 'Something went wrong, please try again.');
        }
    }


    public function PostManagerLogin(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);
        $user = User::with('userRules')
            ->where('email', $request->input('email'))
            ->first();
        if ($user) {
            if (Hash::check($request->input('password'), $user->password)) {
                if ($user->userRules->contains('rule_id', 3)) {
                    $request->session()->put('loginId', $user->id);
                    $request->session()->put('roleId', 3);
                    $request->session()->put('name', $user->name);
                    return redirect('/managers/employee');
                } else {
                    // Rule_id is not equal to 3, user does not have required permission
                    return back()->with('fail', 'User does not have required permission');
                }
            } else {
                return back()->with('fail', 'Incorrect password');
            }
        } else {
            return back()->with('fail', 'Something went wrong, please try again.');
        }
    }

    public function PostEmployeeLogin(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);
        $user = User::where('email', $request->input('email'))->first();
        if ($user) {
            if (Hash::check($request->input('password'), $user->password)) {
                if ($user->userRules->contains('rule_id', 1)) {
                    // Proceed with the login process
                    $request->session()->put('loginId', $user->id);
                    $request->session()->put('roleId', 1);
                    $request->session()->put('name', $user->name);
                    return redirect('/employees/schedulenew');
                } else {
                    return back()->with('fail', 'User does not have required permission');
                }
            } else {
                return back()->with('fail', 'Incorrect password');
            }
        } else {
            return back()->with('fail', 'Something went wrong, please try again.');
        }
    }

    public function PostDoctorLogin(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);
        $user = User::where('email', $request->input('email'))->first();
        if ($user) {
            if (Hash::check($request->input('password'), $user->password)) {
                if ($user->userRules->contains('rule_id', 2)) {
                    $request->session()->put('loginId', $user->id);
                    $request->session()->put('roleId', 2);
                    $request->session()->put('name', $user->name);
                    return redirect('doctors/health_records');
                } else {
                    return back()->with('fail', 'User does not have required permission');
                }
            } else {
                return back()->with('fail', 'Incorrect password');
            }
        } else {
            return back()->with('fail', 'Username does not exist.');
        }
    }


    public function logout()
    {
        if (Session::has("loginId")) {
            Session::pull("loginId");
        }
        if (Session::has("roleId")) {
            Session::pull("roleId");
        }
        return redirect('/');
    }
}
