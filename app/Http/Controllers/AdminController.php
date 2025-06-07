<?php

namespace App\Http\Controllers;

use App\Http\Requests\AdminLoginRequest;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    /**
     */
    public function login(AdminLoginRequest $request)
    {
        $request->authenticate();
        $request->session()->regenerate();
        return redirect()->intended('/api/documentation');
    }
    /**
     * @OA\Post(
     *      path="/admin/logout",
     *      tags={"Admin"},
     *      summary="Admin Logout",
     *      @OA\Response(
     *          response=200,
     *          description="Success",
     *          @OA\JsonContent()
     *      ),
     *      @OA\Response(
     *          response=401,
     *          description="Unauthorized"
     *      )
     *  )
     */
    public function logout(Request $request)
    {
        Auth::guard('admin')->logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return ('/admin/login');
    }
}
