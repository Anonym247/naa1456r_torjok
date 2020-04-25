@extends('app')

@section('content')
    <section class="categories">
        <div class="col-md-2"></div>
        <div class="col-md-9">
            <div class="motion">
                @if(isset($parent))
                    <div class="redirect_previous">
                        <a href="/api/categories/{{$parent->parent}}" class="btn btn-danger">Əvvələ qayıt</a>
                    </div>
                @endif
                @if(isset($articles) || isset($article))
                    <div class="redirect_home">
                        <a href="{{route('motion')}}" class="btn btn-primary"> <= Başa qayıt</a>
                    </div>
                @endif

                @if(isset($article))
                        <embed src="{{'../../uploads/'.$article->media}}" class="motion_frame">
                        <p class="text-info content_text">
                            {{$article->note}}
                        </p>
                @endif

                @if(isset($categories))
                    @foreach($categories as $category)
                        <a href="/api/categories/{{$category->id}}"
                        class="category_link btn btn-default">{{$category->name}}</a>
                    @endforeach
                @endif
                @if(isset($articles))
                    @foreach($articles as $article)
                        <a href="/api/articles/{{$article->id}}"
                        class="article_link btn btn-primary">{{$article->name}}</a><br><br>
                    @endforeach
                @endif
            </div>
        </div>
    </section>
@endsection
