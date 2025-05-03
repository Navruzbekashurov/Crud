<?php

namespace App\Dtos\User;

use App\Http\Requests\Users\StoreUserRequest;

class StoreUserDto
{
    public function __construct(
        public string $name,
        public string $email,
        public string $password,
    )
    {
    }

    public static function fromRequest(StoreUserRequest $request): StoreUserDto
    {
        return new self(
            $request->validated('name'),
            $request->validated('email'),
            $request->validated('password')
        );
    }
}
