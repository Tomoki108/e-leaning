@extends ('layouts.app')

@section('title', 'Categories')

@section('subtitle', ' | Category')

@section('content')
<div class="container">
    <a href="{{ action('CategoryController@add') }}"><button class="btn btn-primary float-left mb-3">Add new category</button></a>
    <section>
        <table class="table table-hover">
            <thead>
                <tr><th>Title</th><th>Description</th><th>Action</th></tr>
            </thead>

            <tbody>
                @foreach ($categories as $category)
                    <tr>
                        <td><a href="{{ action('WordController@index', $category) }}">{{$category->title}}</a></td>
                        <td>{{$category->description}}</td>
                        <td>
                            <form action="{{ action('CategoryController@delete', $category) }}" method="post" class="form-inline">
                                {{ method_field('delete') }}
                                {{ csrf_field() }}
                                <a href="{{ action('WordController@add', $category) }}">Add word&nbsp;</a>|
                                <a href="{{ action('CategoryController@edit', $category) }}">&nbsp;Edit&nbsp;</a>|
                                <button type="submit" class="btn btn-link p-0 m-0" onclick="return confirm('Are you sure?')">Delete</button>                               
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
        <span class="float-right">{{ $categories->links() }}</span>
    </section>
</div>
@endsection
