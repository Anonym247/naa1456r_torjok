@extends('app')
<script type="text/javascript" src="{{asset('js/swfobject.js')}}"></script>

@section('content')
    @if(isset($categories))
        <h1 class="text-center">Bölmələr</h1>
    @elseif (!isset($categories) and !isset($articles))
        <h2 class="text-center">Mövcud bölmə tapılmadı, zəhmət olmasa əlavə edin</h2>
    @endif
    @if(isset($parent) and $parent !== 0)
        <a href="/manage/{{$parent}}" class="btn btn-block btn-danger">Geriyə</a>
    @endif
    @if(isset($categories))
    <table class="table-bordered table-condensed text-center table-striped">
            <th>No</th>
            <th>Adı</th>
            <th>Üst bölmə</th>
            <th>Əməliyyatlar</th>
            @foreach($categories as $category)
                <tr>
                    <td>{{$category->id}}</td>
                    <td><a href="/manage/{{$category->id}}">{{$category->name}}</a></td>
                    @if($category->parent != 0)
                        <td>{{$category->getParent->name}}</td>
                    @else
                        <td>Üst Bölmə</td>
                    @endif
                    <td>
                        <a href="/api/categories/delete/{{$category->id}}" class="btn btn-danger">Sil</a><br>
                        <a href="/manage/edit/category/{{$category->id}}" class="btn btn-primary">Düzəliş et</a>
                    </td>
                </tr>
            @endforeach
    </table>
    <br>
    @endif

    @if(isset($articles))

        <h1 class="text-center">Mövzular</h1>
        <table class="table-bordered table-condensed">
            <th>No</th>
            <th>Adı</th>
            <th>Bölmə</th>
            <th>Bölmə nömrəsi</th>
            <th>Media</th>
            <th>Mətn</th>
            <th>Əməliyyat</th>
            @foreach($articles as $article)
                <tr>
                    <td>{{$article->id}}</td>
                    <td>{{$article->name}}</td>
                    <td>{{isset($article->category->name) ? $article->category->name : 'Üst bölmə'}}</td>
                    <td>{{isset($article->category->id) ? $article->category->id : 0}}</td>
                    <td>
                        <embed src="{{'../uploads/'.$article->media}}" class="article_image">
                    </td>
                    <td>{{$article->note}}</td>
                    <td>
                        <a href="/api/articles/delete/{{$article->id}}" class="btn btn-danger">Sil</a>
                        <a href="/manage/edit/article/{{$article->id}}" class="btn btn-primary">Düzəliş et</a>
                    </td>
                </tr>
            @endforeach
        </table><br>
    @endif

        <a href="/manage/add/category/{{isset($category_id) ? $category_id : 0}}" class="btn btn-primary btn-block">Bölmə əlavə et</a>
        <hr>
        <a href="/manage/add/article/{{isset($category_id) ? $category_id : 0}}" class="btn btn-primary btn-block">Mövzu əlavə et</a>
        <hr>

@endsection
