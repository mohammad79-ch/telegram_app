<?php

namespace App\Http\Controllers\User\Group;

use App\Http\Controllers\Controller;
use App\Models\Group;
use App\Models\User;
use App\Service\ImageService;
use Illuminate\Http\Request;

class GroupController extends Controller
{

    private ImageService $imageService;

    public function __construct(ImageService $imageService)
    {
        $this->imageService = $imageService;
    }

    public function index()
    {
        $groups = auth()->user()->groups()->latest()->paginate(20);
        return view("panel.groups.index",compact("groups"));
    }

    public function create()
    {
        return view("panel.groups.create");
    }

    public function store(Request $request)
    {
        $validData = $request->validate([
           "name" => "required|min:2",
           "unique_id" => "sometimes|required",
           "desc" => "sometimes",
           "chat_history" => "required",
           "profile" => "required|image",
          ]);


        if ($request->has("profile")){
           $profileRandomName = $this->imageService->Make($request,"profile","groups");
            $validData["profile"] = $profileRandomName;
        }

        $validData["user_id"] = auth()->user()->id;

        Group::create($validData);

        return to_route("user.group.index");
    }

    public function join(User $user,Group $group)
    {
        $user->ownGroups()->attach($group->id);
        return back();
    }

    public function showCurrentGroup(Group $group)
    {
        $messages = $group->messages;

        return view("panel.groups.chat",compact("messages","group"));
    }

}
