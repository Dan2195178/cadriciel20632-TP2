@extends('layouts.app')
@section('content')
<div class="container">
    <div class="row">
        <div class="col-12 pt-2"> <a href="{{ route('blog') }}" class="btn btn-outline-primary"><i class="fa-solid fa-arrow-left px-2"></i>@lang('lang.text_return')</a>
            <div class="">
                <h1 class="display-4 pt-4">@lang('lang.text_edit_message')</h1>
                <p>
                    @lang('lang.text_edit_article_description')
                </p>
                <hr>
                <div class="card mt-5">
                    <div class="card-header">
                        Article
                    </div>
                    <div class="card-body">
                        <form action="" method="POST">
                            @csrf
                            @method('PUT')
                            <div class="row">
                                <div class="control-group">
                                    <label for="title">@lang('lang.text_title')</label>
                                    <input type="text" id="title" class="form-control" name="title" value="{{ $blogPost->title }}" placeholder="Entrer le titre du message" required>
                                </div>
                                <div class="control-group mt-2">
                                    <label for="body">@lang('lang.text_body')</label>
                                    <textarea id="body" class="form-control" name="body" placeholder="Entrer le corps du message" rows="" required>{{ $blogPost->body }}</textarea>
                                </div>
                                <div class="control-group mt-2">
                                    <label for="categorie_id">@lang('lang.text_category')</label>
                                    <select class="form-select" name="categorie_id" id="categorie_id">
                                        @foreach($categories as $categorie)
                                        <option value="{{ $categorie->id }}"> {{ $categorie->categorie}} </option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="control-group">
                                    <input type="submit" class="btn btn-success mt-2" value="@lang('lang.text_send')">
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection