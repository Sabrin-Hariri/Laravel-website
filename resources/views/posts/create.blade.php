

@extends('layouts.app')

@section('content')
<div class="container">
  <div class="row">
@if (count($errors)>0)
    <ul>
      @foreach ($errors->all() as $item)
          <li> {{$item}}</li>
      @endforeach

    </ul>
@endif

    <div class="col" style="color: rgb(221, 111, 74)">
        <div class="jumbotron">
            <h1 class="display-4" >Create Post </h1>
            <a class="btn btn-info" href="{{route('posts')}}"> ALL POSTS </a>

        </div>
    </div>
  </div>
  <div class="row">
    <div class="col">
        <form action="{{route('posts.store')}}" , method="POST" enctype="multipart/form-data" >
          @method("PUT")
          @csrf
  
            <div class="form-group">
              <label for="exampleFormControlInput1">Title:</label>
              <input type="text" class="form-control" name="title" >
            </div>
            <div class="form-group">
             
              @foreach ($tags as $item)
              <input type="checkbox" class="form-control" name="tags[]" value="{{$item->id}}}">
              <label for="exampleFormControlInput1">{{item->tag}}</label><br>      
              @endforeach
               </div>
            <div class="form-group">
              <label for="exampleFormControlTextarea1" >Content:</label>
              <textarea class="form-control" name="contnet" rows="3"></textarea>
            </div>
            <div class="form-group">
              <label for="exampleFormControlInput1" >Image:</label>
              <input  accept="image/x-png,image/gif,image/jpeg" type="file" class="form-control" name="photo" >
            </div>
            <div class="form-group">
             <div> <label for="exampleFormControlTextarea1" style="background-color: rgb(166, 247, 237)"> "are you shore??"</label></div>
             <button class="btn btn-danger " type="submit" >save</button>   
            </div>
          </form>
    </div>
</div>
</div>



@endsection