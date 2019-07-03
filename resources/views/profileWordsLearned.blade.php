@extends('layouts.profile')

@section('content_right')
    <h4 class="my-4">Words Learned</h4>
    <hr>
    <div class="row">
        <table class="col-md-6 col-xs-12 border-right">
            <thead class="px-3">
                <tr><th><h5 class="py-2 ml-3">Words</h5></th><th><h5>Answers</h5></th></tr>
            </thead>
            <tbody>
                @foreach (array_map(null, $words, $word_answers) as [$word, $word_answer])
                    @if ($loop->iteration == 21)
                            </tbody>
                        </table>
                        <table class="col-md-6 col-xs-12 text-center mb-3">
                            <tbody>
                                <tr><th>Words</th><th>Answers</th></tr>
                    @endif
                    <tr><td><h5 class="py-1 ml-3">{{ $word }}</h5></td><td><p class="py-1">{{ $word_answer }}</p></td></tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection