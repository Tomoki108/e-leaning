@extends ('layouts.app')

@section('title')
    {{ 'Lesson | '. $category->title }}
@endsection

@section('subtitle', ' | Lesson')

@section('content')
<div class="container">
    <h3 class="mb-3">
        {{ $category->title }}
        <span class="float-right">{{ $page_number+1 }}/{{ count($words)}}</span>
    </h3>
    <div class="row">
        <div class="col-md-6 col-sm-12">
            <h1 class="mt-4">{{ $words->get($page_number)->content }}</h1>
        </div>
        <div class="col-md-6 col-sm-12">
            @foreach($word_answers as $word_answer)
                <a href="{{ route($route, ['category' => $category->id, 'page_number' => $page_number+1, 'correct' => $word_answer->correct == 1 ? 1 :0]) }}">
                   <button class="btn btn-primary mt-4 w-100">{{ $word_answer->content }}</button>
                </a>
            @endforeach
        </div>
    </div>
</div>
@endsection
