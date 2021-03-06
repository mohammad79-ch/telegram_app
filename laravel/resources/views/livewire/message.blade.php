<div>
    <div class="box_messages" wire:poll.750ms>
        <div class="messages">
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
        <div class="form_sender">
            <form wire:submit.prevent="replay" method="post">
                @csrf
                <div class="form-group messages_sender_user_box">
                    <input type="text"  id="messages_sender_user" wire:model="text" placeholder="Type something ...">
                    <button type="submit" class="btn btn-warning btn-sm">Send</button>
                </div>
            </form>
        </div>
    </div>
</div>
