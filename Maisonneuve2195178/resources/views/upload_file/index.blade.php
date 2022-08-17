@extends('layouts.app')
@section('content')
<div class="container">
    <div class="row">
        <div class="col-12 pt-2">
            <div class="row">
                <div class="btn-toolbar justify-content-between ">
                    <div class="btn-group mb-4" role="group" aria-label="First group">
                        <button type="button" class="btn ">
                            <h1 class="display-one">@lang('lang.text_download_center')</h1>
                        </button>
                        @if(session()->get('error404'))
                        <button type="button" class="btn btn-outline-secondary"><span><i class="fa-solid fa-circle-exclamation px-2 text-danger"></i>{!! session()->get('error404') !!}</span>
                        </button>
                        @endif
                    </div>
                    <div class="">
                        <div class="input-group-text" id="btnGroupAddon2">
                            <a href="{{route('upload.create')}}" class="btn btn-outline-primary ">Upload<i class="fa-solid fa-upload px-2"></i></a>
                        </div>
                    </div>
                    <table class="table table-hover">
                        <thead>
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">@lang('lang.text_title')</th>
                                <th scope="col">@lang('lang.text_date')</th>
                                <th scope="col">@lang('lang.text_editable')</th>
                                <th scope="col">@lang('lang.text_download')</th>

                            </tr>
                        </thead>
                        <tbody>
                            @forelse($files as $file)

                            <tr class="@if($file->user_id == Auth::user()->id) table-success @endif">
                                <th>{{ $file->id }}</th>
                                <!-- <td><a href="{{ route('blog.show',$file->id) }}">{{ ucfirst($file->title) }}</a></td> -->
                                <td><a href="">{{ ucfirst($file->title) }}</a></td>
                                <td>{{ ucfirst($file->date) }}</td>

                                <td>
                                    @if($file->user_id == Auth::user()->id)
                                    <div class="btn-group">
                                        <a href="{{ route('upload.edit', $file->id) }}" class="btn text-primary"><i class="fa-solid fa-eraser"></i></a>


                                        <form action="{{route('upload.delete', $file)}}" method="POST">
                                            @csrf
                                            @method('DELETE')

                                            <button type="submit" class="btn text-danger">
                                                <i class="fa-solid fa-trash-can"></i>
                                            </button>
                                        </form>
                                    </div>

                                    @else
                                    <div class="btn-group">
                                        <div class="btn text-black"><i class="fa-solid fa-ban"></i></div>
                                    </div>
                                    @endif
                                </td>
                                <td>
                                    <div class="input-group">
                                        <a href="{{ route('download.file', $file->file_url) }}" class="btn btn-warning">PDF<i class="fa-solid fa-download px-2"></i></i></a>
                                    </div>
                                </td>

                            </tr>



                            @empty
                            <tr class="text-warning">Aucun fichier disponible</tr>
                            @endforelse

                        </tbody>

                    </table>






                </div>
            </div>
        </div>
        @endsection