@extends('app')

@section('content')
    <form action="{{route('update_category', ['category_id' => $category->id])}}" method="post" class="form">
        @csrf
        <div class="form-group"><br>
            <label for="category_name">Bölmə adı: </label>
            <input type="text" name="category_name" class="form-control" value="{{isset($category) ? $category->name : null}}">
        </div>
        <div class="form-group">
            <label for="parent">üst bölməsini seçin</label>
            <select name="parent" id="parent" required class="form-control">
                @if(isset($parents))
                    <option value="{{$category->parent}}">hazırki bölmə</option>
                    @foreach($parents as $parent)
                        <option value="{{$parent->id}}">{{$parent->name}}</option>
                    @endforeach
                @endif
            </select>
        </div>

        <input type="submit" value="Bölməyə düzəliş et" class="btn btn-success btn-block">
    </form>
@endsection
