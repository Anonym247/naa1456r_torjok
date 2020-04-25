@extends('app')

@section('content')
    <form action="{{route('create_category')}}" method="post" class="form">
        @csrf
        <div class="form-group"><br>
            <label for="category_name">Bölmə adı: </label>
            <input type="text" name="category_name" class="form-control">
        </div>
        <div class="form-group">
            <label for="parent">üst bölməsini seçin</label>
            <select name="parent" id="parent" required class="form-control">
                @if(isset($categories))
                    <option value="{{$categories[0]->parent}}">hazırki bölmə</option>
                    @foreach($categories as $category)
                        <option value="{{$category->id}}">{{$category->name}}</option>
                    @endforeach
                @else
                    <option value="{{$category_id}}">baş bölmə</option>
                @endif
            </select>
        </div>
        <input type="submit" value="Bölməni əlavə edin" class="btn btn-success btn-block">
    </form>
@endsection
