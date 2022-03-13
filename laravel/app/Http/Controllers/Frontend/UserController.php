<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Message;
use App\Models\User;
use App\Service\ImageService;
use Illuminate\Contracts\Auth\Authenticatable;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Str;
use Illuminate\Validation\Rule;

class UserController extends Controller
{

    public ImageService $imageService;

    public function __construct(ImageService $imageService)
    {
        $this->imageService = $imageService;
    }

    /**
     * Display a listing of the resource.
     *
     * @return Application|Factory|View
     */
    public function index(): Application|Factory|View
    {
        return  view("panel.index");
    }


    /**
     * Show the form for editing the specified resource.
     *
     * @param User $user
     * @return Application|Factory|View
     */
    public function edit(User $user)
    {
        $user = auth()->user();
        return view("panel.edit",compact("user"));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param Request $request
     * @return RedirectResponse
     */
    public function update(Request $request)
    {
        $user = auth()->user();

        $validData = $request->validate([
           "name" => "required",
           "username" => ["required",Rule::unique("users")->ignore($user->id)],
           "bio" => "sometimes",
           "image" => "sometimes|image"
        ]);

        $imageRandomName = $this->imageService->make($request,"image");

        if (!is_null($imageRandomName)){
            $validData["image"] = $imageRandomName;
        }else{
            $validData["image"] = $user->image;
        }

        $user->update($validData);

        return to_route("user");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param User $user
     * @return Response
     */
    public function destroy(User $user)
    {
        //
    }

    public function messages()
    {
        $user = auth()->user();
        $messages = $user->texts()->where("user_id","!=",Auth::id())->get();
        $messagesUser = $user->messages;

        $messages = collect($messages)->concat($messagesUser)->sortBy([
            "created_at" , "asc"
        ])->unique("user_id");

        return \view("panel.message",compact('messages'));
    }

    public function singleMessage(User $user)
    {
        return \view("panel.single_message",compact("user"));
    }


}
