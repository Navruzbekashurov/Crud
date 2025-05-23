<?php

namespace App\Console\Commands;

use App\Models\User;
use Illuminate\Console\Command;

class AddUserCommand extends Command
{
    protected $signature = 'add:user {name} {email} {age?}';

    protected $description = 'Command description';

    public function handle(): void
    {
        User::create([
            'name' => $this->argument('name'),
            'email'=> $this->argument('email'),
            'password' => \Hash::make('password')
        ]);
    }
}
