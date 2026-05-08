@extends('layouts.app')

@section('content')


       <div class="container">
         <div class="comment-form-wrap pt-5">
       

                    <h3 class="mb-5">Update Profile Info</h3>
                    <form  action="" method="POST" class="p-5 bg-light" enctype="multipart/form-data">
                        @csrf                  
                        <div class="form-group">
                            <label for="text">Email</label>
                            <input type="text" placeholder="Title" value="{{$user->email}}" name="email"  class="form-control" id="website">
                        </div>

                 
                        <div class="form-group">
                            <label for="message">Bio</label>
                            <textarea  placeholder="Bio" name="bio"  cols="30" rows="10" class="form-control">{{$user->bio}}</textarea>
                            </div>

                               <div class="form-group">
                            <label for="text">Name</label>
                            <input type="text" placeholder="Name" value="{{$user->name}}" name="name"  class="form-control" id="website">
                        </div>
                            
                        <div class="form-group">
                        <input type="submit" name="submit" value="Update Profilr" class="btn btn-primary">
                        </div>

                    </form>
                </div>
        </div>
   @endsection