<?php

namespace App\Http\Controllers\Teacher\Auth;

use App\Models\Teacher;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\View\View;
use Illuminate\Http\RedirectResponse;
use App\Providers\RouteServiceProvider;
class RegisterController extends Controller
{
    public function create(): View
    {
        return view('teacher.auth.register');
    }

    public function store(Request $request): RedirectResponse
    {
        $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email'],
            'password' => ['required', 'confirmed', 'min:8'],
        ]);

        $teacher = Teacher::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => $request->password,
        ]);

        Auth::guard('teacher')->login($teacher);

        return redirect(RouteServiceProvider::TEACHER_DASHBOARD);
    }
}
