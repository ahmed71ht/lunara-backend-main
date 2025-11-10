<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Login;

class LoginController extends Controller
{
    // 🔹 عرض كل البيانات المحفوظة
    public function index()
    {
        $allLogins = Login::all();
        return response()->json($allLogins);
    }

    // 🔹 حفظ البيانات
    public function store(Request $request)
    {
        $request->validate([
            'username' => 'required|string|max:255',
            'email' => 'required|email|unique:logins,email',
            'password' => 'required|min:6',
            'domain' => 'nullable|string|max:255',
            'storename' => 'nullable|string|max:255',
        ]);

        $login = Login::create([
            'username' => $request->username,
            'email' => $request->email,
            'password' => bcrypt($request->password),
            'domain' => $request->domain,
            'storename' => $request->storename,
        ]);

        return response()->json([
            'message' => 'تم الحفظ بنجاح',
            'data' => $login
        ], 201);
    }
}
