@extends('common.header')
@section('header-section')
<div class="container">
  <h2>Employee List</h2>
  <p>Employee List <a class="btn btn-sm btn-info" href="/create-emp">New Employee</a></p>  
  @if(Session::has('success'))
    <div class="alert alert-success">
        {{Session::get('success')}}
    </div>
 @endif       
 @if(Session::has('fail'))
    <div class="alert alert-danger">
        {{Session::get('fail')}}
    </div>
@endif
  <table class="table table-striped">
    <thead>
      <tr>
        <th>#</th>
        <th>Name</th>
        <th>Employee ID</th>
        <th>Email</th>
        <th>Action</th>
      </tr>
    </thead>
    <tbody>
        @foreach($emps as $emp)
      <tr>
        <td>{{ $loop->index+1 }}</td>
        <td>{{$emp->name}}</td>
        <td>{{$emp->emp_id}}</td>
        <td>{{$emp->email}}</td>
        <td>
            <a class="btn btn-info" href="/emp-edit/{{ $emp->id }}">Edit</a>
            <a class="btn btn-danger" href="/emp-delete/{{ $emp->id }}">Delete</a>
        </td>
      </tr>
      @endforeach

      
     
    </tbody>
  </table>
</div>
 @endsection

 @extends('common.footer')
@section('footer-sections')

@endsection
 
