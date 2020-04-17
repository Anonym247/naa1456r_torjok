@extends('app')

@section('content')
    <form action="{{route('create_category')}}" method="post" class="form">
        @csrf
        <div class="form-group"><br>
            <label for="category_name">Kateqoriya adi: </label>
            <input type="text" name="category_name" class="form-control-static">
        </div>
        <div class="form-group">
            <label for="parent">Ust kateqoriyasini secin</label>
            <select name="parent" id="parent" required class="form-control">
                @if(isset($categories))
                    <option value="{{$categories[0]->parent}}">bu kateqoriya</option>
                    @foreach($categories as $category)
                        <option value="{{$category->id}}">{{$category->name}}</option>
                    @endforeach
                @else
                    <option value="{{$category_id}}">Oz Kateqoriya</option>
                @endif
            </select>
        </div>
        <input type="submit" value="Kateqoriyani elave edin" class="btn btn-success">
    </form>
@endsection
