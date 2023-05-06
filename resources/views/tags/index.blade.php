

@extends('layouts.app')

@section('content')

<div class="container">
  <div class="row">
    <div class="col">
      <div class="jumbotron" style="color: darkmagenta">
    
        <h1 class="display-4" >ALL Tags </h1>
    
        <a class="btn btn-success" href="{{route('tag.create')}}">create tags </a>
      </div>    
    </div>

  </div>
  <div class="row" >

    @if(count($tags)>0)
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

          @foreach ($tags as $item)
          <tr class="table-info" >
            <th scope="row">{{$loop->index +1}}</th>
            <td>{{$item->title}}</td>
            <td>{{$item->user->name}}</td>
            <td>
              {{-- <img src="{{URL::asset($item->photo)}}"  alt="{{$item->photo}}"   class="img-tumbnail" width="100" height="100">OR --}}
              <img src="{{$item->photo}}" alt="{{$item->photo}}"   class="img-tumbnail" width="100" height="100">
            </td>
            <td>
              <a class="text-success" href="{{route('tag.show',['slug' ,$item->slug])}}" ><i class=" fas fa-2x fa-eye"></i></a>&nbsp;&nbsp;
              <a href="{{route('tag.edit',['id' ,$item->id])}}" ><i class="fa-solid fa-2x fa-file-pen"></i></a>&nbsp;&nbsp;
              <a  class="text-danger"  href="{{route('tag.destroy',['id'=>$item->id])}}"><i class="fa-solid  fa-2x  fa-trash"></i></a>

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