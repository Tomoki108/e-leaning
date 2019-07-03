@extends ('layouts.app')

@section('title', 'User list')

@section('subtitle', ' | User list')

@section('content')
    <div class="container">
        <div class="row">
            @foreach ($profile_users as $profile_user)
                <div class="col-xs-6 col-sm-4 col-md-3 mt-2 p-0 text-center">
                    @if ($profile_user->avatar != NULL)
                        <img src="/storage/profile_images/{{ $profile_user->id }}.jpg" class="thumbnail_userlist">
                    @else
                        <img src="{{ asset('img/default.png') }}" class="thumbnail_userlist">
                    @endif
                    <a href="{{ action('ProfileController@profile', $profile_user) }}">
                        <h5 class="text-center py-2">{{ $profile_user->name }}</h5>
                    </a>
                    @if ($user->id === $profile_user->id)
                        <p><button class="btn btn-secondary w-50 mb-3">YOU</button></p>
                    @elseif ($user->relation($profile_user))
                        <p><a href="{{ route('follow', ['profile_user' => $profile_user, 'user' => $user]) }}"><button class="btn btn-primary w-50 mb-4">FOLLOW</button></a></p>
                    @else
                        <p><a href="{{ route('unfollow', ['profile_user' => $profile_user, 'user' => $user]) }}"><button class="btn btn-primary w-50 mb-4 px-1">UNFOLLOW</button></a></p>
                    @endif
                </div>
            @endforeach
        </div>
        <span class="float-right">{{ $profile_users->links() }}</span>
    </div>
@endsection