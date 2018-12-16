@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">My Profile</div>
                    <div class="card-body">
                        <div class="col-2 profile-box border p-1 rounded text-center bg-light mr-4 mt-3">
                            <img src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcS3QXrSb2RmeSZdYHQsZ_Gl8nTt1QQpJzU27iSIfN8EXWUNFQ0H8g"
                                 class="w-100 mb-1">
                        </div>
                        <h5 class="m-0"><strong>{{ $users->name }}</strong></h5>
                        <p class="mb-2">
                            <small>Following: <span class="badge badge-primary" userid={{$users->id}}>{{ $users->followings()->get()->count() }}</span>
                            </small>
                            <small>Followers: <span class="badge badge-primary tl-follower">{{ $users->followers()->get()->count() }}</span>
                            </small>
                        </p>

                    </div>

                </div>
            </div>
        </div>
    </div>
@endsection