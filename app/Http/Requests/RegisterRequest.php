<?php

namespace App\Http\Requests;

use App\Models\User;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Hash;

/**
 *  @OA\Schema(
 *      schema="UserRegisterRequest",
 *      title="User Register Request"
 *      type="object",
 *      required={"name", "email", "password"},
 *      @OA\Property(property="name", type="string", example="John Doe"),
 *      @OA\Property(property="email", type="string", format="email", example="john.doe@example.com"),
 *      @OA\Property(property="password", type="string", format="password", example="password"),
 *  )
 */
class RegisterRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'name' => [
                'required',
                'string',
                'max:255'
            ],
            'email' => [
                'required',
                'string',
                'email',
                'max:255'
            ],
            'password' => [
                'required',
                'string',
                'min:8',
                'max:32'
            ]
        ];
    }

    public function register()
    {
        $user = User::create([
            'name' => $this->json('name'),
            'email' => $this->json('email'),
            'password' => Hash::make($this->json('password')),
        ]);
        return $user;
    }
}
