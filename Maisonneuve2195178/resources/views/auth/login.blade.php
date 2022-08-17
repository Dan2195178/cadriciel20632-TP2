@extends('layouts.app')
@section('content')
<main class="login-form">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-4 pt-4">
                <div class="card">
                    <h3 class="card-header text-center">@lang('lang.text_login')</h3>
                    <div class="card-body">
                        <!-- @if($errors)
                            @foreach($errors->all() as $error)
                                <div class="alert alert-warning alert-dismissible fade show" role="alert">
                                    <strong>{{ $error }}</strong><br>
                                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                                </div>
                            @endforeach
                        @endif -->
                        <form action="{{ route('custom.login')}}" method="POST">
                            @csrf
                            <div class="form-group mb-3">
                                <input type="email" placeholder="@lang('lang.text_email')" name="email" value="{{old('email')}}" class="form-control">
                                @if($errors->has('email'))
                                   <span class="text-danger">{{ $errors->first('email') }}</span>
                                @endif
                            </div>
                            <div class="form-group mb-3">
                                <input type="password" placeholder="@lang('lang.text_password')" name="password" class="form-control">
                                @if($errors->has('password'))
                                   <span class="text-danger">{{ $errors->first('password') }}</span>
                                @endif
                            </div>
                            <div class="d-grid mx-auto">
                                <button type="submit" class="btn btn-primary">@lang('lang.text_to_login')</button>
                            </div>

                        </form>

                    </div>
                </div>
            </div>
        </div>
    </div>
</main>
@endsection