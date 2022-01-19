<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Models\User;
use App\Http\Resources\UserCollection;

class ApiController extends Controller
{

    /**
     * Method for create new User
     *
     * @param  mixed $request
     * @return void
     */
    public function createUser(Request $request, User $user)
    {
        $array = ['error' => ''];

        //validando
        $rules = [
            'email' => 'required|email|unique:users,email',
            'document' => 'required|unique:users,document',
            'password' => 'required',
            'company' => 'required',
        ];

        $validator = Validator::make($request->all(), $rules);

        $user->insert($request->all());

        $user->name = $request->input('name');
        $user->email = $request->input('email');
        $user->document = $request->input('document');
        $user->password = $request->input('password');
        $user->company = $request->input('company');

        if ($validator->fails()) {
            $array['error'] = $validator->messages();
            return $array;
        } else {
            return new UserCollection($user);
        }
    }

    /**
     * readAllTodos
     *
     * @return void
     */
    public function readUser()
    {
        $array = ['error' => ''];

        /**
         * você passa como parametro a quantidade de itens por pagina
         */
        //$todos = Todo::paginate(2);
        /** não conta qual o total de itens por pagina */
        $todos = Todo::simplePaginate(2);

        $array['current_page'] = $todos->currentPage();
        $array['list'] = $todos->items();

        return $array;
    }


    /**
     * updateTodo
     *
     * @param  mixed $request
     * @param  mixed $id
     * @return void
     */
    public function transaction(Request $request, $id)
    {;
        $array = ['error' => ''];

        //Validando
        $rules = [
            'title' => 'min:3',
            'donee' => 'boolean'
        ];

        $validator = Validator::make($request->all(), $rules);

        if ($validator->fails()) {
            $array['error'] = $validator->messages();
            return $array;
        }

        $title = $request->input('title');
        $done = $request->input('done');


        $todo = Todo::find($id);
        if ($todo) {
            if ($title) {
                $todo->title = $title;
            }
            if ($done !== NULL) {
                $todo->done = $done;
            }

            $todo->save();
        } else {
            $array['error'] = 'User ' . $id . ' não existe, logo, não pode ser atualizado';
        }

        return $array;
    }
}
