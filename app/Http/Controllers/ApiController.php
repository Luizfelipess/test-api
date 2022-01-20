<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Models\User;
use App\Http\Resources\UserCollection;
use App\Http\Requests\CreateUserRequest;
use App\Repositories\UserRepository;

class ApiController extends Controller
{

    /**
     * createUser
     *
     * @param  mixed $model
     * @return void
     */
    public function createUser(UserRepository $model)
    {
        $user = $model->create();

        return new UserCollection($user);
    }
}
