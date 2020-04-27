@extends('app')

@section('content')
    <div class="container">
        <div class="row">
            <form class="form-horizontal" method="post" action="{{route('configure')}}" enctype="multipart/form-data">
                <fieldset>
                    <legend>Saytın konfiqurasiyası</legend>
                    <div class="form-group">
                        <label class="col-md-4 control-label" for="app_name">Saytın adı</label>
                        <div class="col-md-4">
                            <input id="app_name" name="app_name" placeholder="{{config('global.app_name')}}"
                                   class="form-control input-md" type="text" value="{{config('global.app_name')}}">
                        </div>
                    </div>
                    <hr>
                    <div class="form-group">
                        <label class="col-md-4 control-label" for="logo">Sayt logosu</label>
                        <div class="col-md-4">
                            <label class="btn btn-default form-control">
                                logo şəkili yüklə<input type="file" name="logo"
                                                           id="logo" class="form-control-file" hidden
                                                           onchange="$('#logo-upload-file-info').html(this.files[0].name)">
                            </label>
                            <span class='label label-info' id="logo-upload-file-info"></span>
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="col-md-4 control-label" for="background">Sayta axra fonu</label>
                        <div class="col-md-4">
                            <label class="btn btn-default form-control">
                                arxa fon şəkili yüklə<input type="file" name="background" id="background"
                                                               class="form-control-file" hidden
                                                               onchange="$('#background-upload-file-info').html(this.files[0].name)">
                            </label>
                            <span class='label label-info' id="background-upload-file-info"></span>
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="bg-color" class="col-md-4 control-label">Rəng seçin</label>
                        <div class="col-md-4 text-right">
                            <input type="color" class="btn btn-primary btn-block" name="bg-color" id="bg-color" value="{{config('global.bg-color')}}">
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="col-md-4 control-label" for="configure"></label>
                        <div class="col-md-4 text-right">
                            <button id="configure" name="configure" class="btn btn-primary btn-block">Yadda saxla</button>
                        </div>
                    </div>
                </fieldset>
            </form>
        </div>
    </div>
@endsection

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>
