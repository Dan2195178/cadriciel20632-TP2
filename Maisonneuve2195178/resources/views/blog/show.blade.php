@extends('layouts.app')
<!-- @section('title', 'blog') -->
@section('content')
<div class="container">
    <div class="row">
        <div class="col-12 pt-2">
            <!-- <a href="/blog" class="btn btn-outline-primary btn-sm">Retourner</a> -->
            <div class="btn-toolbar justify-content-between" role="toolbar" aria-label="Toolbar with button groups">
                <div class="btn-group" role="group" aria-label="First group">

                    <a href="{{ route('blog') }}" class="btn btn-outline-primary"><i class="fa-solid fa-arrow-left px-2"></i>@lang('lang.text_return')</a>

                </div>
                <div class="input-group">
                    <a href="{{ route('blog.showPdf',$blogPost->id) }}" class="btn btn-outline-warning">PDF<i class="fa-solid fa-download px-2"></i></i></a>
                </div>
            </div>
            <h1 class="display-one pt-4">{{ ucfirst($blogPost->title) }}</h1>

            <p>{!! $blogPost->body !!}</p>
            <P>Auteur: {{ $blogPost->blogHasUser->name }}</P>
            <hr>
           
            @if($blogPost->user_id == Auth::user()->id)
            
            <!-- <a href="/blog/{{$blogPost->id}}/edit" class="btn btn-outline-primary">Modifier la publication</a> <br><br> -->
            <a href="{{ route('blog.edit',$blogPost->id) }}" class="btn btn-outline-primary">@lang('lang.text_edit_article')</a> <br><br>
            <form id="delete-frm" class="" action="" method="POST">
                @csrf
                @method('DELETE')
                <button class="btn btn-danger">@lang('lang.text_delete_article')</button>
            </form>
            @endif
        </div>
    </div>
</div>
@endsection