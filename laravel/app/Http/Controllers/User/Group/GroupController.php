<?php

namespace App\Http\Controllers\User\Group;

use App\Http\Controllers\Controller;
use App\Models\Group;
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
           "desc" => "sometimes|required",
           "chat_history" => "required",
           "profile" => "required|image",
          ]);


        if ($request->has("profile")){
           $profileRandomName = $this->imageService->Make($request,"profile","groups");
            $validData["profile"] = $profileRandomName;
        }

        $validData["user_id"] = auth()->user()->id;

        Group::create($validData);

        return back()->with("success","گروه شما با موفقیت ساخته شد");
    }
}
