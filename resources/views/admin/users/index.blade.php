@extends('admin.layouts.master')
@section('title','users')
@section('page')
   All users
@stop
@section('content')
<table class="table">
  <thead>
    <tr>
      <th scope="col">#</th>
      <th scope="col">Name</th>
      <th scope="col">email</th>
      <th scope="col">Registerd at</th>
      <th scope="col">Action</th>
    </tr>
  </thead>
  @if(count($users) > 0)
  @foreach($users as $user)
  <tbody>
    <tr>
      <th scope="row"><a href="{{ url('admin/users/'.$user->id) }}">{{ $user->id }}</a></th>

      <td><a href="{{ url('admin/users/'.$user->id.'/edit') }}">{{ $user->name }}</a></td>
      <td>{{ $user->email }}</td>
      <td>{{ $user->created_at->diffForHumans() }}</td>
      <td>
        {!!Form::open(['method'=>'DELETE','action'=>['UserController@destroy',$user->id]])!!}
           {{ Form::submit('delete',['class'=>'btn btn-danger']) }}
        {!!Form::close()!!}
      </td>
    </tr>
  </tbody>
 @endforeach
 @endif

</table>
@stop
