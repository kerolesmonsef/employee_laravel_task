<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateUserRequest;
use App\Http\Requests\FilterUsersRequest;
use App\Http\Resources\UesrResource;
use App\Models\User;
use App\Services\Helpers\Filters\QueryFiltersClasses\Where;
use App\Services\Helpers\Filters\QueryFiltersClasses\WhereLike;
use App\Services\Helpers\Filters\QueryFiltersClasses\WhereMultipleLike;
use Illuminate\Pipeline\Pipeline;

class UserController extends Controller
{
    public function index(FilterUsersRequest $request)
    {
        $users_query = User::query()->with("group", "profile")->latest("id");

        info(request()->all());
        app(Pipeline::class)
            ->send($users_query)
            ->through([
                new Where("users.status", request('status')),
                new WhereLike("users.name", request("name")),
                new WhereMultipleLike(["users.name", "users.email"], request("search"))
            ])
            ->thenReturn();

        $users = $users_query->get();

        return response()->success([ // in appServiceProvider
            'employees' => UesrResource::collection($users),
        ]);
    }


    public function store(CreateUserRequest $request)
    {
        User::query()->create($request->validated());

        return response()->success(); // in appServiceProvider
    }
}
