@extends('app')

@section('content')
    <section>
        <div class="area">
            <form action="/api/articles/add/{{$category_id}}" method="post" enctype="multipart/form-data">
                {{csrf_field()}}
                <div class="col-md-4">
                    <div class="form-group">
                        <label for="name">
                            Movzu adi: <input type="text" name="name" id="name" class="form-control">
                        </label>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="form-group">
                        <label for="note">
                            Movzu metni: <textarea name="note" id="note" cols="30" rows="10" class="form-control"></textarea>
                        </label>
                    </div>
                </div>
                <div class="col-md-4">
                    <label for="media">
                        Wekil ve ya Video : <input type="file" name="media" id="media" class="form-control">
                    </label>
                </div>

                <input type="submit" value="Yadda saxlamaq" class="form-control btn btn-primary">
            </form>
        </div>
    </section>
@endsection
