<?php

namespace App\Http\Controllers;

use App\Http\Requests\AssignGroupRequest;
use App\Http\Resources\GroupResource;
use App\Models\Group;
use App\Models\User;

class GroupController extends Controller
{
    public function index()
    {
        return response()->success([
            'groups' => GroupResource::collection(Group::all()),
        ]);
    }

    public function assign_group(AssignGroupRequest $request)
    {
        $ids = $request->get("ids");
        User::query()
            ->whereIn('id', $ids)
            ->update([
                'group_id' => $request->get('group_id'),
            ]);

        return response()->success();

    }
}
