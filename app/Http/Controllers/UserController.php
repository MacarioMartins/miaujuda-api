<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class UserController extends Controller
{
    private array $validation_rules = [
        'name' => [
            'string',
            'required',
            'max:255'
        ],
        'email' => [
            'email',
            'required',
            'max:255',
            'unique:users'
        ],
        'password' => [
            'string',
            'required',
            'max:255'
        ],
        'whatsapp' => [
            'string',
            'nullable',
            'max:20'
        ],
        'avatar' => [
            'string',
            'nullable'
        ],
        'birthday' => [
            'date',
            'nullable'
        ],
        'city' => [
            'string',
            'required',
            'max:255'
        ],
        'state' => [
            'string',
            'required',
            'max:2'
        ]
    ];

    // public function index()
    // {
    //     return response()->json([
    //         'action' => 'index',
    //         'success' => true,
    //         'data' => 'Ok'
    //     ]);
    // }

    public function store(Request $request)
    {
        $received_data = $request->all();
        $validator = Validator::make($received_data, $this->validation_rules);

        if (!$validator->fails()) {
            $received_data['password'] = Hash::make($received_data['password']);

            $user = new User($received_data);

            if ($user->save()) {
                return response()->json([
                    'action' => 'store',
                    'user' => $user
                ]);
            }

            return response()->json([
                'action' => 'store',
                'error' => 'Unable to save the user'
            ], 500);
        }

        return response()->json($validator->errors(), 400);
    }

    // public function show(Request $request, $id = 0)
    // {
    //     return response()->json([
    //         'action' => 'show',
    //         'success' => true,
    //         'data' => 'Ok'
    //     ]);
    // }

    // public function update(Request $request, $id = 0)
    // {
    //     return response()->json([
    //         'action' => 'update',
    //         'success' => true,
    //         'data' => 'Ok'
    //     ]);
    // }

    // public function delete(Request $request, $id = 0)
    // {
    //     return response()->json([
    //         'action' => 'delete',
    //         'success' => true,
    //         'data' => 'Ok'
    //     ]);
    // }
}
