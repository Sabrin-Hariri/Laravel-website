

@extends('layouts.app')

@section('content')
<div class="container">
  <div class="row">
    <div class="col" style="color: rgb(221, 111, 74)">
        <div class="jumbotron">
            <h1 class="display-4" >Show Post </h1>
            <a class="btn btn-info" href="{{route('posts')}}"> ALL POSTS </a>
            <div><p>GO TO  HOME    </p></div>

              @isset($post)
              <div class="card" style="width :18rem;">
              <img src="{{URL::asset($post->photo)}}"  class="card-img-top" alt="{{$post->photo}}">
              <div><p>GO TO  HOME    </p></div>

              <div class="card-img-overlay">
                      <h5 class="card-title">{{$post->title}}</h5>
                  <p class="card-text">{{$post->contnet}}</p>
                  <p> created_at: {{$post->created_at->diffForhumans() }}</p>
                  <p>updated_at :  {{$post->updated_at->diffForhumans() }}</p>
              @endisset
            </div>
          </div>

           

        </div>
    </div>
  </div> 
  
    <div class="row">
     
         
  
      </div>
  </div>
  </div>

</div>

@endsection