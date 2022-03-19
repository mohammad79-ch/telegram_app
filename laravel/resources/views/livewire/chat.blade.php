<div>
    <div class="box_messages" wire:poll.1000ms>
        <div class="messages">
        <div class="d-flex p-4">
            <div><p style="font-weight: bold"><img src="{{asset('assets/groups/'.$group->profile)}}" width="60" alt=""></p></div>
            <div>
                @can("update",$group)
                    <a href="{{route('user.groups.edit',['group'=>$group->id])}}" class="btn btn-primary btn-sm">Edit</a>
                @endif
                <p style="font-weight: bold;margin: 5px">Group Name : {{$group->name}}</p>
                <p style="font-weight: bold;margin: 5px"> Created At : {{$group->created_at->diffForHumans()}}</p>
                <p style="font-weight: bold;margin: 5px"> Member : {{$group->users()->count() + 1}}</p>
                <p style="font-weight: bold;margin: 5px"> Owner : {{$group->user->name}} </p>
            </div>
        </div>
            <ul style="list-style: none;text-align: right;padding: 10px">
                @foreach($messages as $message)
                    @php
                        $user = \App\Models\User::where("id",$message?->user_id)->first();
                    @endphp
                    <li>
                        <a style="font-weight: bold;color: #0a58ca;margin-right: 20px   ">{{$message->created_at->diffForHumans()}}</a>
                        <a  style="font-weight: bold">{{$message->text}} -- {{$user?->name}}  </a>
                        <img src="{{asset('assets/users/'.$user?->image)}}" width="40" class="rounded" alt="">

                    </li>

                @endforeach
            </ul>
        </div>
        @if(auth()->user()->ownGroups()->wherePivot("group_id",$group->id)->first() || auth()->user()->groups()->where("id",$group->id)->first())
            <div class="form_sender">
                <form wire:submit.prevent="chat" method="post">
                    @csrf
                    <div class="form-group messages_sender_user_box">
                        <input type="text"  id="messages_sender_user" wire:model="text" placeholder="Type something ...">
                        <button type="submit" class="btn btn-warning btn-sm">Send</button>
                    </div>
                </form>
            </div>
        @endif
    </div>
</div>
