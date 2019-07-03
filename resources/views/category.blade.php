@extends ('layouts.app')

@section('title', 'Categories')

@section('subtitle', ' | Category')

@section('content')
<div class="container">
    <div class="row">
        @foreach($categories as $category)
            <div class="col-md-6 col-xs-12 p-3">
                <div class="border h-100 p-2  bg-white rounded d-flex flex-column">
                    <h4 class="">{{ $category->title }}</h4>
                    <p>{{ $category->description }}</p>
                    @if(session()->get($category->title) === 'no contents')
                        <span class="mb-3 text-info">This lesson has no contents yet</span>
                    @elseif(session()->get($category->title) === 'taken')
                        <span class="mb-3 text-info">You have already taken this lesson</span>
                    @endif
                    <a class="mt-auto" href="{{ route('lessonAnswer', ['category' => $category->id, 'page_number' => 0, 'correct' => 0]) }}">
                        <button class="btn btn-primary w-25">Start</button>
                    </a>
                </div>
            </div>
        @endforeach
    </div>
    <span class="float-right">{{ $categories->links() }}</span>
</div>
@endsection
