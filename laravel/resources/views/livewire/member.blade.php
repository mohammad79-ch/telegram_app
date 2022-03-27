<div>
    <div class="card-body">
        <div class="groups d-flex">
            <img src="{{asset('assets/users/'.$group->user->image)}}" width="40" alt="">
            <a href="{{route('user.profile',['username'=>$group->user->username])}}" style="font-weight: bold;margin: 10px" >{{$group->user->name}} - {{$group->user->username}}
                <span style="font-size: 20px;color: #c7c700">&#9733</span></a>
        </div>
        @foreach($members as $member)
            <div class="groups d-flex">
                <img src="{{asset('assets/users/'.$member->image)}}" width="40" alt="">
                <a href="{{route('user.profile',['username'=>$member->username])}}" style="font-weight: bold;margin: 10px" >{{$member->name}} - {{$member->username}}</a>
                <a href="" style="font-size: 20px">&#9813;</a>
            </div>
            <hr>
        @endforeach
    </div>
</div>
