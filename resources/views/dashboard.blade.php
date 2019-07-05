@extends('layouts.dashboard')

@section('content_right')
    <h4 class="my-4">Activities</h4>
    <hr>
    @foreach ($activities as $activity)
        <div class="row mb-2">
            <div class="h-100 ml-3 col-xs-4">
            @if ($activity['subject']->avatar != NULL)
                <img src="/storage/profile_images/{{ $activity['subject']->id }}.jpg" class="thumbnail_activity">
            @else
                <img src="{{ asset('img/default.png') }}" class="thumbnail_activity">
            @endif
            </div>
            <div class="h-100 ml-3 my-auto col-xs-8">
                <p class="my-0">
                    <a href="{{ action('ProfileController@profile', $activity['subject']) }}">{{ $activity['subject']->name === $user->name ? 'You' : $activity['subject']->name }}</a>
                    <span>&nbsp;{{ $activity['action'] }}&nbsp;</span>
                    @if ($activity['action'] == 'followed')
                        <a href="{{ action('ProfileController@profile', $activity['object']) }}">{{ $activity['object']->name === $user->name ? 'You' : $activity['object']->name }}</a>
                    @else
                        <br class="elastic_br">
                        <a href="{{ action('LessonController@lessonIndex') }}">{{ $activity['object']->title }}</a>
                    @endif
                </p>
                <p class="text-secondary my-0">{{ $activity['time'] }} (UTC)</p>
            </div>
        </div>
    @endforeach
@endsection