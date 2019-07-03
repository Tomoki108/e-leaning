<?php
    //Processing user answers data to display.
    extract($result, EXTR_PREFIX_INVALID, 'answer'); 
?>
@extends ('layouts.app')

@section('title')
    {{ 'Lesson | '. $category->title. ' | Result' }}
@endsection

@section('subtitle', ' | Lesson')

@section('content')
<div class="container">
    <h3 class="mb-3">
        {{ $category->title }}
        <span class="float-right">Result: {{ $success }} of {{ count($words) }}</span>
    </h3>
    <div class="row">
        <div class="col-4 text-center my-3"></div>
        <div class="col-4 text-center my-3"><h4>Word</h4></div>
        <div class="col-4 text-center my-3"><h4>Answer</h4></div>
        @for($counter = 1; $counter <= count($words); $counter++)
            <div class="col-4 text-center mb-2"><h5>{!! ${'answer_'.$counter} == 1 ? '&#9675;' : '&#x2613;' !!}</h5></div>
            <div class="col-4 text-center mb-2"><h5>{{ $words->get($counter-1)->content }}</h5></div>
            <div class="col-4 text-center mb-2">
                <h5>{{ $word_answers->where('word_id', $words->get($counter-1)->id)->first()->content }}</h5>
            </div>
        @endfor
        <div class="col-4 my-4"></div>
        <div class="col-4 my-4"></div>
        <div class="col-4 my-4 text-center">
            <a href="{{ action('LessonController@lessonIndex') }}"><button class="btn btn-primary">Back to Categories</button></a>
        </div>
    </div>
</div>
@endsection
