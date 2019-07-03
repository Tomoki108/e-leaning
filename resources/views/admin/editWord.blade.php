@extends ('layouts.app')

@section('title', 'Categories')

@section('subtitle', ' | Category')

@section('content')
<div class="container">
    <h3 class="mb-5">Edit word</h3>
    <div class="row">
        <div class="col-sm-6  col-xs-12 mb-4">
            <h5 class="mb-4">Word</h5>
            <h5 >{{ $word->content }}</h5>
        </div>
        <div class="col-sm-6 col-xs-12">
            <div class="row">
                <h5 class="mb-4 col-10">Choices</h5>
                <h5 class="mb-4 col-2">Answer</h5>
            </div>
            <form method="post" action="{{ action('WordController@update') }}">
                {{csrf_field()}}
                <input type="hidden" name="categoryId" value="{{ $word->category_id }}">
                @foreach ($word_answers as $word_answer)
                    <div class="row">
                        <input type="hidden" name="{{ 'id'. strval($loop->index+1) }}" value="{{ $word_answer->id }}">
                        <input type="text" class="form-control{{ $errors->has($loop->index+1) ? ' is-invalid' : '' }} col-10 mb-4" name="{{ $loop->index+1 }}" value="{{ $word_answer->content }}" required>
                        <input type="radio" class="col-1 mt-2 ml-3" name="check" value="{{ $loop->index+1 }}" {{ ($word_answer->correct) ? 'checked' : '' }} required>
                    </div>
                @endforeach
                <div class="row">
                    <input type="submit" class="btn btn-primary col-10" value="Submit">
                </div>
            </form>
        </div>
    </div>
</div>
@endsection
