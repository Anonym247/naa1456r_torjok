@extends('app')

@section('content')
    <section class="row articles">
        <div class="col-md-2"></div>
        <div class="col-md-6">
            <div class="motion">
                @foreach($articles as $article)
                    <a href="/api/articles/{{$article->id}}">{{$article->name}}</a>
                @endforeach
            </div>

        </div>
    </section>
@endsection
