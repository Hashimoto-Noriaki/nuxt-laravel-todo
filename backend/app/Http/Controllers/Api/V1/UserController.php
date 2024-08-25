<?php

namespace App\Http\Controllers\Api\V1;

use App\Http\Controllers\Controller;
use App\Http\Requests\UserRequest;
use App\Models\User;
use App\Http\Resources\UserResource;

class UserController extends Controller
{
    /**
     * ユーザーの一覧を取得する
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function index()
    {
        $users = User::all();

        // UserResourceを使用してレスポンスを整形
        return response()->json(UserResource::collection($users));
    }

    /**
     * 新しいユーザーを作成する
     *
     * @param \App\Http\Requests\UserRequest $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function store(UserRequest $request)
    {
        $user = User::create($request->validated());

        // UserResourceを使用してレスポンスを整形
        return response()->json(new UserResource($user), 201);
    }
}
