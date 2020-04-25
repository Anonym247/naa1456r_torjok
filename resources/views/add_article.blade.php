@extends('app')

@section('content')
    <section>
        <div class="container">
            <div class="col-md-2"></div>
            <form action="/api/articles/add/{{$category_id}}" method="post" enctype="multipart/form-data" class="form col-md-8">
                @csrf
                    <div class="form-group">
                        <label for="article_name">Movzu adi</label>
                        <input type="text" name="article_name" id="article_name" class="form-control">
                    </div>
                    <div class="form-group">
                        <label for="note">
                            Mövzu mətni: <textarea name="note" id="note" cols="76" rows="15" class="form-control"></textarea>
                        </label>
                    </div>
                <div class="form-group">
                    <label for="media">
                        Media: <input type="file" name="media" id="media" class="form-control btn btn-default btn-block">
                    </label>
                </div>

                <input type="submit" value="Yadda saxla" class="form-control btn btn-primary">

                <br><br><br>
            </form>
            <div class="col-md-2"></div>
        </div>
    </section>
@endsection
