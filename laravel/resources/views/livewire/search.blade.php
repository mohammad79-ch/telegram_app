<div>
    <div class="card-body">
        <form wire:submit.prevent="searchFor">
            <input type="text" wire:model="search" class="form-control mb-2" placeholder="Search for ...">
            <input type="submit" class="btn btn-primary"  value="Search">
        </form>
        <br>
        <br>

        <div class="users">
               @if(isset($search) && count($users))
                @foreach($users as $user)
                    <div class="user-box">
                        <a href="{{route('user.profile',['username'=>$user->username])}}">
                            <div class="d-flex">
                                <img src="{{asset('assets/users/'.$user->image)}}" class="rounded" width="70" alt="">
                                <p style="margin: 20px;font-weight: bold">{{$user->name}} - {{$user->username}}</p>
                            </div>
                        </a>
                    </div>
                @endforeach
               @elseif(isset($search) && !count($users))

               <p class="alert alert-warning">هیچ کاربری با این مشخصات یافت نشد!</p>
            @endif
        </div>
    </div>
</div>
