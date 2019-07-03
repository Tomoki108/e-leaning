@extends ('layouts.app')

@section('title', 'Dashboard')

@section('subtitle', ' | Dashboard')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-5 col-xs-12">
            <div class="col-12 mb-3 text-center">
                @if ($user->avatar != NULL)
                    <img src="/storage/profile_images/{{ $user->id }}.jpg" class="avatar">
                @else
                    <img src="{{ asset('img/default.png') }}" class="avatar">
                @endif
            </div>
            <div class="col-12 text-center mb-5">
                <a href="{{ action('HomeController@dashboard') }}" class="text-dark"><h4>{{ $user->name }}</h4>
                <hr>
                <div class="row">
                    <div class="col-6 mb-3">
                        <a href="{{ action('HomeController@followers') }}">
                            <p>{{ count($user->followers()->get()) }}<br>followers</p>
                        </a>
                    </div>
                    <div class="col-6">
                        <a href="{{ action('HomeController@following') }}">
                            <p>{{ count($user->followings()->get()) }}<br>following</p>
                        </a>
                    </div>
                </div>
                <p><a href="{{ action('UserController@edit') }}" class="col-6 mb-3">
                    <button class="btn btn-primary w-75">Edit account</button>
                </p></a>
                <a href="{{ action('HomeController@wordsLearned', $user) }}">{{ $count_words_learned }} words learned</a>
                <p class="colour-primary">{{ count($user->lessons()->get()) }} lessons Learned</p>
            </div>
        </div>
        
        <div class="col-md-7 col-xs-12 border">
            @yield('content_right')
        </div>    
    </div>
</div>
@endsection