@extends('app')
<script type="text/javascript" src="{{asset('js/swfobject.js')}}"></script>

@section('content')
    @if(isset($categories))
        <h1 class="text-center">Bölmələr</h1>
    @elseif (!isset($categories) and !isset($articles))
        <h2>Movcud kateqoriya tapilmadi, zehmet olmasa elave edin</h2>
    @endif

    @if(isset($articles))
        <h1 class="text-center">Movzular</h1>
    @endif
    @if(isset($categories))
    <table class="table-bordered table-condensed text-center table-striped">
            <th>No</th>
            <th>Adi</th>
            <th>Parent</th>
            <th>Emeller</th>
            @foreach($categories as $category)
                <tr>
                    <td>{{$category->id}}</td>
                    <td><a href="/manage/{{$category->id}}">{{$category->name}}</a></td>
                    @if($category->parent != 0)
                        <td>{{$category->getParent->name}}</td>
                    @else
                        <td>Ust Kateqoriya</td>
                    @endif
                    <td>
                        <a href="/api/categories/delete/{{$category->id}}" class="btn btn-danger">Sil</a>
                    </td>
                </tr>
            @endforeach
    </table>
    @if(count($categories) != 0)
        <br>
        <a href="/manage/add/category/{{$categories[0]->parent}}" class="form-control btn btn-primary">Kateqoriya elave et</a>
    @endif
    @endif

    @if(isset($articles))
        <table class="table-bordered table-condensed">
            <th>No</th>
            <th>Adi</th>
            <th>Kateqoriyasi</th>
            <th>Kateqoriya nomresi</th>
            <th>Media</th>
            <th>Yazisi</th>
            <th>Emeller</th>
            @foreach($articles as $article)
                <tr>
                    <td>{{$article->id}}</td>
                    <td>{{$article->name}}</td>
                    <td>{{$article->category->name}}</td>
                    <td>{{$article->category->id}}</td>
                    <td>
                        <embed src="{{'../uploads/'.$article->media}}" class="article_image">
                    </td>
                    <td>{{$article->note}}</td>
                    <td>
                        <a href="/api/articles/delete/{{$article->id}}" class="btn btn-danger">Sil</a>
                    </td>
                </tr>
            @endforeach
        </table><br>
    @endif

    @if(!isset($categories) and !isset($articles) and !isset($category_id))
        <a href="/manage/add/category/{{0}}" class="btn btn-primary">Kateqoriya elave et</a>
    @endif

    @if(!isset($categories) and !isset($articles) and isset($category_id))
        <a href="/manage/add/category/{{$category_id}}" class="btn btn-primary">Kateqoriya elave et</a>
    @endif

    @if(isset($category_id))
        <a href="/manage/add/article/{{$category_id}}" class="btn btn-primary">Movzu elave et</a>
    @endif


@endsection
