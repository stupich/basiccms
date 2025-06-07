<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\LoginRequest;
use App\Http\Requests\RegisterRequest;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Request;

class AuthController extends Controller
{
    /**
     * @OA\Post(
     *     path="/api/auth/login",
     *     summary="Authenticate User",
     *     @OA\RequestBody(
     *          @OA\JsonContent(ref="#/components/schemas/LoginRequest")
     *     ),
     *     @OA\Response(
     *         response=200,
     *         description="OK",
     *          @OA\JsonContent(
     *          type="object",
     *          @OA\Property(
     *              property="key",
     *              type="string"
     *              )
     *          )
     *     )
     * )
     */
    public function login(LoginRequest $request)
    {
        $request->authenticate();
        $token = $request->user()->createToken('user', ['posts']);
        return ['user' => $request->user()->toArray(), 'token' => $token->plainTextToken];
    }

    /**
     * @OA\Post(
     *     path="/api/auth/register",
     *     summary="Register a new User",
     *     @OA\RequestBody(
     *             @OA\JsonContent(ref="#/components/schemas/RegisterRequest")
     *     ),
     *     @OA\Response(
     *         response=200,
     *         description="OK",
     *          @OA\JsonContent(
     *          type="object",
     *          @OA\Property(
     *              property="key",
     *              type="string"
     *              )
     *          )
     *     )
     * )
     */
    public function register(RegisterRequest $request)
    {
        $request->register();
        return ['success' => true];
    }


    /**
     * @OA\Post(
     *     path="/api/auth/logout",
     *     summary="Logout current User",
     *     @OA\RequestBody(
     *         @OA\MediaType(
     *             mediaType="application/json",
     *             )
     *     ),
     *     @OA\Response(
     *         response=200,
     *         description="OK",
     *          @OA\JsonContent(
     *          type="object",
     *          @OA\Property(
     *              property="key",
     *              type="string"
     *              )
     *          )
     *     )
     * )
     */
    public function logout(Request $request)
    {
        $request->user()->currentAccessToken()->delete();
        Auth::guard('web')->logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return ['success' => true];
    }
}
