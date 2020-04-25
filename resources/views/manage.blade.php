@extends('app')
<script type="text/javascript" src="{{asset('js/swfobject.js')}}"></script>

@section('content')
    @if(isset($categories))
        <h1 class="text-center">Bölmələr</h1>
    @elseif (!isset($categories) and !isset($articles))
        <h2 class="text-center">Mövcud bölmə tapılmadı, zəhmət olmasa əlavə edin</h2>
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
                        <a href="/api/categories/delete/{{$category->id}}" class="btn btn-danger">Sil</a>
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

        <a href="/manage/add/category/{{0}}" class="btn btn-primary btn-block">Bölmə əlavə et</a>
        <hr>
        <a href="/manage/add/article/{{isset($categories) ? $categories[0]->parent : 0}}" class="btn btn-primary btn-block">Mövzu əlavə et</a>
        <hr>

@endsection
