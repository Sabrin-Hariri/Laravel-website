@extends('layouts.app')

@section('content')

<div class='container'  style="background-color: rgb(186, 224, 186)" >
  <form method="POST" action="{{route('profile.update')}}" class="">
    @method("PUT")    
    @csrf 

 <div class="form-row">
  <div class="form-group col-md-6">
    <label for="inputEmail4">name</label><br>
    <input type="text" lass="form-control" name="name" >
  </div>
</div>  
 
 <div class="form-row">
      <div class="form-group col-md-6">
        <label for="inputEmail4">facebook</label>
        <input type="text" class="form-control" name="facebook" >
      </div>
    </div>
    <div class="form-group">
      <label for="inputAddress">Address</label>
      <input type="text" class="form-control" name="address">
    </div>
    <div class="form-row">
      <div class="form-group col-md-4">
        <label for="inputState">gender</label>
        <select id="inputState" class="form-control" name="gender">
          <option value="male">male</option>
          <option value="female">female</option>
        </select>
      </div>
      
      <div class="form-group col-md-2">
        <label for="inputZip">bio</label>
        <textarea type="text" class="form-control" name="bio">
          

        </textarea>

      </div>
    </div>
    
    <div class="form-row">
      <div class="form-group col-md-6">
        <label for="inputEmail4">password</label>
        <input type="password " lass="form-control" name="password">
      </div>
    </div> 
    <div class="form-row">
      <div class="form-group col-md-6">
        <label for="inputEmail4">confirm password</label>
        <input type="password" lass="form-control" name="c_password" >
      </div>
    </div> 
    <div class="form-group">
      <button type="submit" class="btn btn-primary">update</button>
    </div>


  </form>    

</div>

@endsection
