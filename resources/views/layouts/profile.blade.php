@extends ('layouts.app')

@section('title', 'Profile | '. $profile_user->name)

@section('subtitle', ' | Profile')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-5 col-xs-12">
            <div class="col-12 mb-3 text-center">
                @if ($profile_user->avatar != NULL)
                    <img src="/storage/profile_images/{{ $profile_user->id }}.jpg" class="avatar">
                @else
                    <img src="{{ asset('img/default.png') }}" class="avatar">
                @endif
            </div>
            <div class="col-12 text-center mb-5">
                <a href="{{ action('ProfileController@profile', $profile_user) }}" class="text-dark"><h4>{{ $profile_user->name }}</h4>
                <hr>
                <div class="row">
                    <div class="col-6 mb-3">
                        <a href="{{ action('ProfileController@profileFollowers', $profile_user) }}">
                            <p>{{ count($profile_user->followers()->get()) }}<br>followers</p>
                        </a>
                    </div>
                    <div class="col-6">
                        <a href="{{ action('ProfileController@profileFollowing', $profile_user) }}">
                            <p>{{ count($profile_user->followings()->get()) }}<br>following</p>
                        </a>
                    </div>
                </div>
                @if ($relation)
                    <p><a href="{{ route('follow', ['profile_user' => $profile_user, 'user' => $user]) }}"><button class="btn btn-primary w-75 mb-3">FOLLOW</button></a></p>
                @else
                    <p><a href="{{ route('unfollow', ['profile_user' => $profile_user, 'user' => $user]) }}"><button class="btn btn-primary w-75 mb-3">UNFOLLOW</button></a></p>
                @endif
                <a href="{{ action('ProfileController@profileWordsLearned', $profile_user) }}">{{ $count_words_learned }} words learned</a>
            </div>
        </div>

        <div class="col-md-7 col-xs-12 border">
            @yield('content_right')         
        </div>      
    </div>
</div>
@endsection