<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Contracts\Auth\Authenticatable;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Str;
use Illuminate\Validation\Rule;

class UserController extends Controller
{

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

        $imageRandomName = $this->imageMaker($request);

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

    private function imageMaker(Request $request)
    {
        if (!$request->has("image")) return null;

       $this->deleteIfImageAlreadyExists($request);

        $image = $request->file("image");

        $randomName = Str::slug(Str::random("7")). '.'.$image->extension();

        $image->move(public_path("assets/users"),$randomName);

        return $randomName;
    }

    private function deleteIfImageAlreadyExists()
    {
        $user = auth()->user();
        if (File::exists(public_path("assets/users/".$user->image))){
            File::delete(public_path("assets/users/".$user->image));
        }

        return TRUE;
    }

    public function messages()
    {
        $user = auth()->user();
        $messages = $user->texts;
        $messagesUser = $user->messages;

        $messages = collect($messages)->concat($messagesUser)->sortBy([
            "created_at" , "asc"
        ])->unique("user_id");

        return \view("panel.message",compact('messages'));
    }

    public function singleMessage(Request $request,User $user)
    {
        $messages = $user->texts;
        $messages =  $messages->filter(function ($message){
           return $message->users()->where("user_id",Auth::id())->get();
        });

        $currentUsertexts = \auth()->user()->texts;

        if (!is_null($currentUsertexts)){
            $currentUserMessages =  $currentUsertexts->filter(function ($message) use($user){
                return $message->users()->where("user_id",$user->id)->get();
            });
        }else{
            $currentUserMessages = [];
        }

        $messages = collect($messages)->concat($currentUserMessages)->sortBy([
            "created_at" , "asc"
        ]);




        return \view("panel.message",compact("messages"));

    }

}
