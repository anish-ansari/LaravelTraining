@extends('layouts.master')
@section('content')
  <div class="container">
  <h1 class="py-2">Edit Student</h1>
  <form action="{{url('students',$page->id)}}" method="POST">
    @method('PUT')
    @csrf
      <label for="roll_no">Roll Number</label>
      <div class="py-2">
      <input type="text" id="roll_no" name="roll_no"
      value="{{ old('roll_no')?old('roll_no'):$page->roll_no}}">    
      </div>
      @if($errors->has('roll_no'))
        <span class="help-block" style="color: red">
            <strong>
                {{$errors->first('roll_no')}}
            </strong>

        </span>
      @endif
      <br>
      <label for="name">Name</label>
      <div class="py-2">
        <input type="text" id="name" name="name"
        value="{{ old('name')?old('name'):$page->name}}">   
      </div>
      @if($errors->has('name'))
        <span class="help-block" style="color: red">
            <strong>
                {{$errors->first('name')}}
            </strong>

        </span>
      @endif
      <br>
      <label for="phone">Phone</label>
      <div class="py-2">
        <input type="text" id="phone" name="phone"
        value="{{ old('phone')?old('phone'):$page->phone}}">   
      </div>
      @if($errors->has('phone'))
        <span class="help-block" style="color: red">
            <strong>
                {{$errors->first('phone')}}
            </strong>

        </span>
      @endif
      <div class="py-2"></div>
      <input class="btn btn-success" type="submit" value="Update Student">
  </form>
</div>
 
@endsection