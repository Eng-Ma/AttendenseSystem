<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Http\Controllers\Controller;
use App\Http\Resources\UserResource;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Http\Requests\StoreUserRequest;
use App\Http\Requests\UpdateUserRequest;
use Illuminate\Support\Facades\Validator;
use Illuminate\Auth\Access\Response;

class UserController extends Controller
{
    private $auth_user = null;

    public static function routeName()
    {
        return Str::snake("User");
    }
    public function __construct(Request $request)
    {
        $this->middleware('auth:api', ['except' => ['store']]);
        parent::__construct($request);
        $this->authorizeResource(TimeDate::class, Str::snake("User"));
    }
    public function index(Request $request)
    {
        return UserResource::collection(User::search($request)->sort($request)->paginate($this->pagination));
    }
    public function store(StoreUserRequest $request)
    {
        $user = User::create($request->validated());
        // dd($user);
        return new UserResource($user);
    }
    public function show(Request $request, User $user)
    {
        return new UserResource($user);
    }
    public function update(UpdateUserRequest $request, User $user)
    {
        // dd($request->validated());
        // only a temporary solution for autherization, just keep it here for now

        $user->update($request->validated());
        return new UserResource($user);
    }
    public function destroy(Request $request, User $user)
    {
        $user->delete();
        return new UserResource($user);
    }
}
