@extends('app')

@section('content')
    <section class="row articles">
        <div class="col-md-4"></div>
        <div class="col-md-4">
            @foreach($articles as $article)
                <a href="/api/articles/{{$article->id}}">{{$article->name}}</a>
            @endforeach
        </div>
    </section>
@endsection
