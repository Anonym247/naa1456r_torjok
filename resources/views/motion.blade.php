@extends('app')

@section('content')
    <section class="categories">
        <div class="col-md-4"></div>
        <div class="col-md-4">
            @foreach($categories as $category)
                <a href="/api/categories/{{$category->id}}">{{$category->name}}</a><br>
            @endforeach
        </div>
    </section>
@endsection
