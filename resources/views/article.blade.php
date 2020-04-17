@extends('app')

@section('content')
    <section class="row articles">
        <div class="col-md-4"></div>
        <div class="col-md-5">
            <div>
                <p>{{$article->name}}</p>
            </div>
        </div>

    </section>
@endsection
