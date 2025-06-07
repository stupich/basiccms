<?php

namespace App\Console\Commands;

use App\Models\Admin;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Hash;
use function Laravel\Prompts\text;

class RegisterAdmin extends Command
{
    protected $signature = 'app:register-admin';

    protected $description = 'Register new admin';


    public function handle()
    {
        $login = text(label: 'Name/Login', required: 'Name/Login is required', validate: ['login' => 'required|string|max:255|unique:admins']);
        $password = text(label: 'Password', required: 'Password is required', validate: ['password' => 'required|string|min:8|max:32']);

        Admin::create([
            'login' => $login,
            'password' => Hash::make($password),
        ]);

        $this->info('Admin registered successfully!');
    }
}
