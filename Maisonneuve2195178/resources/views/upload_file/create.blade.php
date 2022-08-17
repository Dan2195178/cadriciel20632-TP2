@extends('layouts.app')
@section('content')
<div class="container">
    <div class="row">
        <div class="col-12 pt-2"> <a href="{{ route('upload.index') }}" class="btn btn-outline-primary"><i class="fa-solid fa-arrow-left px-2"></i>@lang('lang.text_return')</a>
            <h1 class="display-4 pt-4">@lang('lang.text_upload_file') </h1>
            <hr>
            <div class="card mt-5">
                <div class="card-header">
                    Information
                </div>
                <div class="card-body">
                    <form action="" method="POST" enctype="multipart/form-data" >
                        @csrf
                        <div class="row">
                            <div class="control-group">
                                <label for="title"> @lang('lang.text_title')</label>
                                <input type="text" id="title" class="form-control" name="title" placeholder="@lang('lang.text_input_title')" required>
                            </div>
                            <div class="control-group mt-2">
                                <label for="date">Date</label>
                                <input type="date" id="date" class="form-control datepicker" name="date"  required></input>
                            </div>
                            <div class="control-group mt-2">
                                <div class="mb-3">
                                    <label for="file_url" class="form-label" >URL</label>
                                    <input class="form-control" name="file_url" type="file" id="file_url">
                                </div>
                            </div>
                            <div class="control-group mt-2">
                                <input type="submit" class="btn btn-success mt-2" value="@lang('lang.text_send')">
                            </div>

                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection