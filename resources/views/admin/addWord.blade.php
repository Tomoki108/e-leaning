@extends ('layouts.app')

@section('title', 'Categories')

@section('subtitle', ' | Category')

@section('content')
<div class="container">
    <form method="post" action="{{ action('WordController@create') }}">
        {{csrf_field()}}
        <h3 class="mb-5">Add word</h3>
        <div class="row">
            <div class="col-sm-6  col-xs-12 mb-4">
                <h5 class="mb-4">Word</h5>
                <input type="hidden" name="category_id" value="{{ $category_id }}">
                <input id="word" type="text" class="form-control{{ $errors->has('word') ? ' is-invalid' : '' }} mb-4 col-11" name="word" value="{{ old('word') }}" maxlength="15" required>
            </div>

            <div class="col-sm-6 col-xs-12">
                <div class="row">
                    <h5 class="mb-0 col-10">Choices</h5>
                    <h5 class="mb-0 col-2">Answer</h5>
                </div>
                <div class="row">
                    <input type="text" class="form-control{{ $errors->has('1') ? ' is-invalid' : '' }} mb-4 col-10" name="1" value="{{ old('1') }}" maxlength="30" required>
                    <input type="radio" class="col-1 mt-2 ml-3" name="check" value="1" required>
                    <input type="text" class="form-control{{ $errors->has('2') ? ' is-invalid' : '' }} mb-4 col-10" name="2" value="{{ old('2') }}" maxlength="30" required>
                    <input type="radio" class="col-1 mt-2 ml-3" name="check" value="2">
                    <input type="text" class="form-control{{ $errors->has('3') ? ' is-invalid' : '' }} mb-4 col-10" name="3" value="{{ old('3') }}" maxlength="30" required>
                    <input type="radio" class="col-1 mt-2 ml-3" name="check" value="3">
                    <input type="text" class="form-control{{ $errors->has('4') ? ' is-invalid' : '' }} mb-4 col-10" name="4" value="{{ old('4') }}" maxlength="30" required>
                    <input type="radio" class="col-1 mt-2 ml-3" name="check" value="4">
                    <input type="text" class="form-control{{ $errors->has('5') ? ' is-invalid' : '' }} mb-4 col-10" name="5" value="{{ old('5') }}" maxlength="30" required>
                    <input type="radio" class="col-1 mt-2 ml-3" name="check" value="5">
                    <button type="submit" class="btn btn-primary col-10">Submit</button>
                </div>
            </div>
        </div>
    </form>
</div>
@endsection
