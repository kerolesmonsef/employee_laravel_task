<?php

namespace App\Http\Controllers;

use App\Http\Resources\GroupResource;
use App\Http\Resources\ProfileResource;
use App\Models\Group;
use App\Models\Profile;
use Illuminate\Http\Request;

class ProfileController extends Controller
{
    public function index()
    {
        return response()->success([
            'profiles' => ProfileResource::collection(Profile::all()),
        ]);
    }
}
