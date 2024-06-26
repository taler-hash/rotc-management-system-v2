<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Carbon\Carbon;

use App\Http\Requests\CreateUserRequest;

class UserController extends Controller
{
    public function create(CreateUserRequest $request) {

        $name = [
            $request?->first_name,
            $request?->last_name,
            $request?->middle_name,
            $request?->suffix
        ];

        $constructName = [];

        foreach($name as $_name) {
            $_name && array_push($constructName, $_name);
        }

        if(isset($request->type)) {
            $inputs = $request->all();
            $inputs['name'] = implode(', ', $constructName);
            $inputs['birthdate'] = Carbon::parse($request->has('birthdate'))->format('Y-m-d');

            $user = User::create($inputs);
            $user->assignRole(1);
        }
    }
}
