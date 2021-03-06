<?php

namespace App\Http\Controllers;

use App\Http\Requests\User\CreateUserRequest;
use App\Http\Resources\UserCollection;
use App\Interfaces\UserRepositoryInterface;

class ApiController extends Controller
{

    /**
     * Create User
     *
     * @param UserRepositoryInterface $userRepository
     * @param CreateUserRequest $request
     * @return UserCollection
     */
    public function createUser(
        UserRepositoryInterface $userRepository,
        CreateUserRequest $request
    ): UserCollection {

        $data = $request->validated();
        $data['password'] = password_hash($data['password'], PASSWORD_DEFAULT);
        $user = $userRepository->create($data);

        return new UserCollection($user);
    }
}