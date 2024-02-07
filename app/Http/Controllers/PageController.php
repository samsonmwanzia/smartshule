<?php

namespace App\Http\Controllers;

use App\Models\Admin;
use App\Models\County;
use App\Models\School;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\ValidationException;

class PageController extends Controller
{
    /**
     * @return Application|Factory|View
     */
    public function index() {
        return view('auth.login');
    }


    /**
     * @return Application|Factory|View
     */
    public function getPasswordReset() {
        return view('auth.passwords.reset');
    }

    public function getAdminLogin() {
        return view('auth.admin_login');
    }

    /**
     * @throws ValidationException
     */
    public function postAdminLogin(Request $request) {
        $this->validate($request, [
            'email' => 'required',
        ]);

        $credentials = [
            'email' => $request->email,
            'password' => $request->password,
        ];

        Admin::query()->where('email', $request->email)->first();

        if (!auth()->guard('admin')->attempt($credentials)) {
            alert()->error('Login failed', 'Wrong Credentials Please Try Again')->persistent('Okay');

            return redirect()->back();
        }

        return redirect()->route('admin.dashboard');
    }

    public function getSchoolRegister() {
        return view('auth.register');
    }

    public function postSchoolRegister(Request $request)
    {
        $this->validate($request, [
            'name' => 'required',
            'email' => ['required', 'string', 'email', 'max:255', 'unique:schools'],
            'phone' => 'required|unique:schools',
            'address' => 'required|unique:schools',
            'password' => ['required', 'string', 'min:8', 'confirmed'],

        ]);

        School::query()->create([
            'name' => $request->name,
            'email' => $request->email,
            'phone' => $this->alignPhoneNumber($request->phone),
            'address' => $request->address,
            'password' => Hash::make($request->password),
        ]);

        alert()->success('success', 'School successfully registered')->persistent('Okay');
        return redirect()->route('school.login');
    }

    public function getSchoolLogin() {
        return view('auth.school_auth');
    }


    public function postSchoolLogin(Request $request) {
        $this->validate($request, [
            'email' => 'required',
        ]);

        $credentials = [
            'email' => $request->email,
            'password' => $request->password,
        ];

        School::query()->where('email', $request->email)->first();

        if (!auth()->guard('school')->attempt($credentials)) {
            alert()->error('Login failed', 'Wrong Credentials Please Try Again')->persistent('Okay');

            return redirect()->back();
        }
        return redirect()->route('school.dashboard');
    }


    public function alignPhoneNumber($raw_phone_number)
    {
        $raw_phone_number = str_replace(' ', '', $raw_phone_number);
        if (strlen($raw_phone_number) == 9) {
            $phoneNumber = '254' . $raw_phone_number;
        } else if (strlen($raw_phone_number) == 10) {
            $phoneNumber = '254' . ltrim($raw_phone_number, '0');
        } else if (strlen($raw_phone_number) == 13) {
            $phoneNumber = ltrim($raw_phone_number, '+');
        } else {
            //return $raw_phone_number;
            $phoneNumber = $raw_phone_number;
        }
        return $phoneNumber;
    }

    public function counties()
    {
        return County::query()->get();

    }

}
