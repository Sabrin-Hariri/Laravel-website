

@extends('layouts.app')

@section('content')

<div class="container">
  <div class="row">
    <div class="col">
      <div class="jumbotron" style="color: darkmagenta">
    
        <h1 class="display-4" >Trashed Posts </h1>
    
        <a class="btn btn-success" href="{{route('posts.create')}}">create post </a>
        <a class="btn btn-info  " href="{{route('posts')}}"></i>ALL posts </a>
      </div>    
    </div>

  </div>
  <div class="row" >

    @if(count($posts)>0)
    <div class="col" >
      <table class="table" >
        <thead>
          <tr class="table-danger">
            <th scope="col" >#</th>
            <th scope="col">title</th>
            <th scope="col">user</th>
            <th scope="col">image</th>
            <th scope="col">action</th>

          </tr>
        </thead>
        <tbody>

            @php
              $i = 1; 
            @endphp
          @foreach ($posts as $item)
          <tr class="table-info" >
            <th scope="row">{{$i++}}</th>
            <td>{{$item->title}}</td>
            <td>{{$item->user->name}}</td>
            <td>
              <img src="{{URL::asset($item->photo)}}"  alt="{{$item->photo}}"   class="img-tumbnail" width="100" height="100">
              {{-- <img src="{{$item->photo}}" alt="{{$item->photo}}"   class="img-tumbnail" width="100" height="100"> --}}
            </td>
            <td>
              <a class="text-success" href="{{route('posts.restore',['id' ,$item->id])}}" ><i class=" fas fa-2x fa-undo"></i></a>&nbsp;&nbsp;
              <a  class="text-danger"  href="{{route('posts.hdelete',['id'=>$item->id])}}"><i class="fa-solid  fa-2x  fa-trash"></i></a>

            </td>
          </tr>
        @endforeach  
        </tbody>
      </table>
    </div>
    @else 
        <div class="col">

    <div class="alert alert-danger" role="alert"> NO posts</div>
        </div>

    @endif



  
   
  </div>
</div>
@endsection