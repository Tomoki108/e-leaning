@extends('layouts.dashboard')

@section('content_right')
    <h4 class="my-4">Followers</h4>
    <hr>
        <div class="row mb-2">
            @foreach ($followers as $follower)
                <div class="h-100 col-3 text-center">
                    @if ($follower->avatar != NULL)
                        <img src="/storage/profile_images/{{ $follower->id }}.jpg"  class="thumbnail_friend">
                    @else
                        <img src="{{ asset('img/default.png') }}" class="thumbnail_friend">
                    @endif
                    <a href="{{ action('ProfileController@profile', $follower) }}">
                        <h5 class="my-2">{{ $follower->name }}</h5>
                    </a>
                </div>
            @endforeach
        </div>
@endsection