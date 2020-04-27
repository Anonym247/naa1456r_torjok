@extends('app')

@section('content')
    @php($category_id = isset($category) ? $category->id : 0)
    <form action="{{route('create_category', ['category_id' => $category_id])}}" method="post" class="form">
        @csrf
        <div class="form-group"><br>
            <label for="category_name">Bölmə adı: </label>
            <input type="text" name="category_name" class="form-control" value="{{isset($category) ? $category->name : '' }}">
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

        <input type="submit" value="{{isset($category) ? 'Bölməyə düzəliş et' : 'Bölmə əlavə et'}}" class="btn btn-success btn-block">
    </form>
@endsection
