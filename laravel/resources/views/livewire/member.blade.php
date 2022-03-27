<div>
    <div class="card-body">
        <div class="groups d-flex">
            <img src="{{asset('assets/users/'.$group->user->image)}}" width="40" alt="">
            <a href="{{route('user.profile',['username'=>$group->user->username])}}"
               style="font-weight: bold;margin: 10px">{{$group->user->name}} - {{$group->user->username}}
                <span style="font-size: 20px;color: #c7c700">&#9733</span></a>
        </div>
        <hr>
        @foreach($members as $member)

            @php
                $checkAdmin = is_null($member->ownGroups()->where(["group_id"=>$group->id,"is_admin"=>TRUE])->first());
            @endphp
            <div class="groups d-flex">
                <img src="{{asset('assets/users/'.$member->image)}}" width="40" alt="">
                <a href="{{route('user.profile',['username'=>$member->username])}}"
                   style="font-weight: bold;margin: 10px">{{$member->name}} - {{$member->username}}

                    @if(!$checkAdmin)
                        <span style="font-size: 20px;color: #399a19">&#9734</span>
                    @endif
                    @if(auth()->user()->id == $group->user_id && $checkAdmin)
                        <a href="" wire:click.prevent="setNewAdmin({{$member->id}})" style="font-size: 20px">&#9813;</a>
                @endif
            </div>
            </a>
        @endforeach
    </div>
</div>
