@extends('layouts.app')
@section('content')
<main class="signup-form">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-4 pt-4">
                <div class="card">
                    <h3 class="card-header text-center">@lang('lang.text_registration')</h3>
                    <div class="card-body">
                        <form action="{{ route('custom.registration')}}" method="POST">
                            @csrf
                            <div class="form-group mb-3">
                                <input type="text" placeholder="@lang('lang.text_name')" name="name" value="{{old('name')}}" class="form-control">
                                @if($errors->has('name'))
                                <span class="text-danger">{{ $errors->first('name') }}</span>
                                @endif
                            </div>
                            <div class="form-group mb-3">
                                <input type="email" placeholder="@lang('lang.text_email')" name="email" value="{{old('email')}}" class="form-control">
                                @if($errors->has('email'))
                                <span class="text-danger">{{ $errors->first('email') }}</span>
                                @endif
                            </div>
                            <div class="form-group mb-3">
                                <input type="password" placeholder="@lang('lang.text_password')" name="password" value="{{old('password')}}" class="form-control">
                                @if($errors->has('password'))
                                <span class="text-danger">{{ $errors->first('password') }}</span>
                                @endif
                            </div>
                            <div class="form-group mb-3">
                                <input type="password" placeholder="@lang('lang.text_password_confirmation')" name="password_confirmation" value="{{old('password_confirmation')}}" class="form-control">
                                @if($errors->has('password_confirmation'))
                                <span class="text-danger">{{ $errors->first('password_confirmation') }}</span>
                                @endif
                            </div>
                            <div class="d-grid mx-auto">
                                <button type="submit" class="btn btn-primary">@lang('lang.text_sign_up')</button>
                            </div>

                        </form>

                    </div>
                </div>
            </div>
        </div>
    </div>
</main>
@endsection