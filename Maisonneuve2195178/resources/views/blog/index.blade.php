@extends('layouts.app')
<!-- appeller  le view général 'app' -->
@section('content')
<div class="container">
    <div class="row">
        <div class="col-12 pt-2">
            <div class="row">
                <div class="col-8">
                    <h1 class="display-one">@lang('lang.text_our_blog')</h1>
                    <p>@lang('lang.text_good_reading')</p>
                </div>
                <div class="col-4">
                    <p>@lang('lang.text_create_message')</p>
                    <a href="{{ route('blog.create') }}" class="btn btn-primary btn-sm">@lang('lang.text_add_an_article')</a>
                </div>
            </div>
            <table class="table table-hover">
                <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">@lang('lang.text_title')</th>
                        <th scope="col">@lang('lang.text_date')</th>
                        <th scope="col">@lang('lang.text_editable')</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($posts as $post)

                    <tr class="@if($post->user_id == Auth::user()->id) table-success @endif">
                        <th>{{ $post->id }}</th>
                        <td><a href="{{ route('blog.show',$post->id) }}">{{ ucfirst($post->title) }}</a></td>
                        <td>{{ ucfirst($post->created_at) }}</td>

                        <td> @if($post->user_id == Auth::user()->id)
                        <i class="fa-solid fa-check text-bg-primary"></i>
                            @else
                            <i class="fa-solid fa-ban"></i>
                            @endif
                        </td>
                    </tr>

                    @empty
                    <tr class="text-warning">Aucun article disponible</tr>
                    @endforelse

                </tbody>

            </table>
            <!-- <ul>
                @forelse($posts as $post)
                <li><a href="blog/{{$post->id}}">{{ ucfirst($post->title) }}</a></li> 
                <li><a href="{{ route('blog.show',$post->id) }}">{{ ucfirst($post->title) }}</a></li>

                @empty
                <li class="text-warning">Aucun article disponible</li>
                @endforelse
            </ul> -->
        </div>
    </div>
</div>
@endsection