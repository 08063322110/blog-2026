@extends('layouts.app')

@section('content')


       <div class="container">
         <div class="comment-form-wrap pt-5">
       

                    <h3 class="mb-5">Create a New Post</h3>
                    <form  action="{{route('posts.update', $single->id)}}" method="POST" class="p-5 bg-light" enctype="multipart/form-data">
                        @csrf                  
                        <div class="form-group">
                            <label for="text">Title</label>
                            <input type="text" placeholder="Title" value="{{$single->title}}" name="title"  class="form-control" id="website">
                        </div>

                    <div class="form-group">
                        <select name="category" class="form-select" aria-label="Default select example">
                        <option selected>Categories</option>

                        @foreach ($categories as $category )
                          <option value="{{$category->name}}">{{$category->name}}</option>
                        @endforeach
                        </select>
                    </div> 

                        <div class="form-group">
                            <label for="message">Description</label>
                            <textarea  placeholder="Description" name="description"  cols="30" rows="10" class="form-control">{{$single->description}}</textarea>
                            </div>
                        <div class="form-group">
                        <input type="submit" name="submit" value="Update Post" class="btn btn-primary">
                        </div>

                    </form>
                </div>
        </div>
   @endsection