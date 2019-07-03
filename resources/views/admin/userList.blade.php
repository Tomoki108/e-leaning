@extends ('layouts.app')

@section('title', 'Categories')

@section('subtitle', ' | User list')

@section('content')
<div class="container">
    <section class="mt-3">
        <table class="table table-hover">
            <thead>
                <tr><th>ID</th><th>User Name</th><th>Email</th><th>Action</th></tr>
            </thead>

            <tbody>
                @foreach ($users as $user)
                    <tr>
                        <td>{{ $user->id }}</td>
                        <td><a href="{{ action('ProfileController@profile', $user) }}">{{ $user->name }}</a></td>
                        <td>{{ $user->email }}</td>
                        <td>
                            <form action="{{ action('UserController@delete', $user) }}" method="post">
                                {{ method_field('delete') }}
                                {{ csrf_field() }}
                                <button class="btn btn-link" onclick="return confirm('Are you sure?')">Delete</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
        <span class="float-right">{{ $users->links() }}</span>
    </section>
</div>
@endsection