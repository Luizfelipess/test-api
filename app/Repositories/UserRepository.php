<?php

namespace App\Repositories;

use App\Http\Requests\CreateUserRequest;
use App\Models\User;

class UserRepository
{
    /**
     * request
     *
     * @var CreateUserRequest
     */
    protected $request;

    /**
     * __construct
     *
     * @param  mixed $request
     * @return void
     */
    public function __construct(
        CreateUserRequest $request
    ) {
        $this->request = $request;
    }

    /**
     * create

     * @return void
     */
    public function create()
    {

        $user = app(User::class);

        $user->name = $this->request->input('name');
        $user->email = $this->request->input('email');
        $user->document = $this->request->input('document');
        $user->password = password_hash($this->request->input('password'), PASSWORD_DEFAULT);
        $user->company = $this->request->input('company');
        $user->save();

        return $user;
    }
}
