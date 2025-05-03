<?php

namespace App\Dtos\User;

use App\Http\Requests\Users\UpdateUserRequest;

class UpdateUserDto
{
    public function __construct(
        public string $name,
        public string $email
    )
    {
    }

    public static function fromRequest(UpdateUserRequest $request): UpdateUserDto
    {
        return new self(
            $request->validated('name'),
            $request->validated('email')
        );
    }
}
