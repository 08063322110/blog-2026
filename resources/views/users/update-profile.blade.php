@extends('layouts.app')

@section('content')


       <div class="container">
         <div class="comment-form-wrap pt-5">

                    <h3 class="mb-5">Update Profile Info</h3>
                    <form  action="{{route('users.update', $user->id)}}" method="POST" class="p-5 bg-light" enctype="multipart/form-data">
                        @csrf                  
                        <div class="form-group">
                            <label for="email">Email</label>
                            <input type="text" placeholder="Title" value="{{$user->email}}" name="email"  class="form-control" id="website">
                        </div>
                         @error('email')
                            <span class="text-danger" role="alert">
                                <strong>{{$message}}</strong>
                            </span>  
                         @enderror

                           <div class="form-group">
                            <label for="text">Name</label>
                            <input type="text" placeholder="Name" value="{{$user->name}}" name="name"  class="form-control" id="website">
                        </div>
                         @error('name')
                            <span class="text-danger" role="alert">
                                <strong>{{$message}}</strong>
                            </span>  
                         @enderror
                 
                        <div class="form-group">
                            <label for="message">Bio</label>
                            <textarea  placeholder="Bio" name="bio"  cols="30" rows="10" class="form-control">{{$user->bio}}</textarea>
                        </div>

                         @error('bio')
                            <span class="text-danger" role="alert">
                                <strong>{{$message}}</strong>
                            </span>  
                         @enderror

                      
                        <div class="form-group">
                             <input type="submit" name="submit" value="Update Profile" class="btn btn-primary">
                        </div>

                    </form>
                </div>
        </div>
   @endsection