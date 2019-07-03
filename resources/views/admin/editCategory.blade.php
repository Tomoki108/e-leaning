@extends ('layouts.app')

@section('title', 'Categories')

@section('subtitle', ' | Category')

@section('content')
<div class="container">
    <div class="col-9 mx-auto">
        <form method="post" action="{{ action('CategoryController@update', $category) }}">
            {{csrf_field()}}
            <h3 class="mb-5">Edit category</h3>
            <h5>Title</h5>
            <input id="title" type="text" class="form-control{{ $errors->has('title') ? ' is-invalid' : '' }} mb-4 col-12" name="title" value="{{ old('title', $category->title) }}" maxlength="20" required>
            <h5>Description</h5>
            <textarea id="description" class="form-control{{ $errors->has('description') ? ' is-invalid' : '' }} mb-4 col-12" name="description" rows="8" maxlength="200" required>{{ old('description', $category->description) }}</textarea>
            <button type="submit" class="btn btn-primary w-100">Submit</button>
        </form>
    </div>
</div>
@endsection
