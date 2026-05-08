@extends('layouts.app')

@section('content')
    

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">


             <div class="comment-form-wrap pt-5">
            <h3 class="mb-5">Login</h3>
            <form action="{{ route('login') }}" method="POST" class="p-5 bg-light">
                @csrf
            <div class="form-group">
                <label for="email">Email *</label>
                <input type="email" class="form-control @error('email') is-invalid @enderror" id="email" name="email" value="{{ old('email') }}" required>
            
                @error('email')
                <span class="invalid-feedback" role="alert">
                    <strong>{{$message}}</strong>
                </span>
                @enderror
            </div>
            <div class="form-group">
                <label for="password">Password</label>
                <input type="password" class="form-control @error('password') is-invalid @enderror" id="password" name="password">
                @error('password')
                <span class="invalid-feedback" role="alert">
                    <strong>{{$message}}</strong>
                </span>
                    
                @enderror
            </div>

            <div class="form-group">
                <button type="submit"  class="btn btn-primary">Login</button>
            </div>

            </form>
        </div>


        </div>
    </div>
       
    </div>    

    @endsection
