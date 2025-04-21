<?php

namespace App\Services;

use App\Dtos\User\StoreUserDto;
use App\Models\User;

class UserService
{
    public function create(StoreUserDto $dto): void
    {
        $user = new User();
        $user->name = $dto->name;
        $user->email = $dto->email;
        $user->password = bcrypt($dto->password); //Odatda parol hash lanadi, bcrypt(), bazada parol korinmasligi uchun
        $user->save();
    }
}
