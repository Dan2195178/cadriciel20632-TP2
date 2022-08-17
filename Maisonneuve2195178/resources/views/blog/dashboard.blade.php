@extends('layouts.app')
@section('content')
    @if(session('success'))
        <!-- <div class="container-fluid">
            <div class="row justify-content-end">
                
                <button class="btn btn-primary" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-person-fill" viewBox="0 0 16 16">
                        <path d="M3 14s-1 0-1-1 1-4 6-4 6 3 6 4-1 1-1 1H3zm5-6a3 3 0 1 0 0-6 3 3 0 0 0 0 6z" />
                    </svg>
                    
                    Hello! {{ $name }}
                   
                </button>
              
            </div>
        </div> -->
        
    @endif
@endsection