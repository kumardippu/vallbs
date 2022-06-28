@extends('common.header')

@section('header-section')


<div class="container">
  <h2>Employee List</h2>
  <p>Employee List <a class="btn btn-sm btn-info" href="/create-emp">New Employee</a></p>            
  
  <form method="post"  action="/emp-edit/{{ $emp->id }}">
    @csrf
    @method('put')
    <div class="form-group">
      <label for="name">Name</label>
      <input type="text" class="form-control" name="name" placeholder="Enter Name" value="{{ $emp->name }}">
      @if($errors->has('name'))
        <p class="text-danger">{{$errors->first('name')}}</p>
      @endif
    </div>

    <div class="form-group">
      <label for="email">Employee ID</label>
      <input type="text" class="form-control" name="emp_id"  value="{{ $emp->emp_id }}" placeholder="Enter Employee ID">
      <small  class="form-text text-muted">This is just for example</small>
      @if($errors->has('emp_id'))
        <p class="text-danger">{{$errors->first('emp_id')}}</p>
      @endif
    </div>

    <div class="form-group">
      <label for="email">Email address</label>
      <input type="email" class="form-control" name="email" value="{{ $emp->email }}"  placeholder="Enter Email">
      <small  class="form-text text-muted">This is just for example</small>
      @if($errors->has('email'))
        <p class="text-danger">{{$errors->first('email')}}</p>
      @endif
    </div>
    <button type="submit" class="btn btn-primary">Submit</button>
</form>

</div>
@endsection
@extends('common.footer')
@section('footer-sections')

@endsection


