<?php

namespace App\Console\Commands;

use App\Models\Admin;
use Illuminate\Console\Command;
use function Laravel\Prompts\text;

class RemoveAdmin extends Command
{
    protected $signature = 'app:remove-admin';

    protected $description = 'Remove an existing admin';

    public function handle()
    {
        $login = text(label: 'Name/Login', required: 'Name/Login is required', validate: ['login' => 'required|string|max:255|exists:admins']);
        $admin = Admin::where('login', $login);
        $admin->delete();
        $this->info('Admin removed successfully!');
    }
}
