<?php

namespace App\Http\Controllers;

use App\Models\Admin;
use App\Models\School;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function __construct() {
        $this->middleware('auth:admin');
    }

    function loggedIn()
    {
        $user = auth()->user();
        $admin = Admin::query()->where('email', $user->email)->first();
        return $admin;
    }

    public function index()
    {
       $admin = $this->loggedIn();
        return view('admin.index',[
            'admin' => $admin,
        ]);
    }

    public function studentAdmission()
    {
        $admin = $this->loggedIn();
        return view('admin.students.admission', [
            'admin' => $admin,
        ]);
    }

    public function settings()
    {
        $admin = $this->loggedIn();
        return view('admin.school_setting.settings',[
            'admin' => $admin,
        ]);
    }

    public function postSettings(Request $request)
    {
        $this->validate($request, [
            'name' => 'required',
            'address' => 'required|unique:schools',
            'email' => 'required|unique:schools',
            'phone' => 'required|unique:schools',
        ]);

        School::query()->create([
            'name' => $request->name,
            'address' => $request->address,
            'email' => $request->email,
            'phone' => $request->phone,
        ]);

        alert()->success('success', 'Payment method successfully added')->persistent('Okay');
        return redirect()->back();
    }
}
