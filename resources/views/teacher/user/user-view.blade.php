@extends('layouts.backend.app')

@section('title','Manage Users')

@push('css')

@endpush

@section('content')

<div class="content-wrapper">
  <section class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1>Manage Users</h1>
        </div>
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="{{ route('home') }}">Home</a></li>
            <li class="breadcrumb-item active">Manage Users</li>
          </ol>
        </div>
      </div>
    </div>
  </section>

  <section class="content">
    <div class="row">
      <div class="col-12">          
        <div class="card">
          <div class="card-header">
            <h3 class="card-title">Manage Users</h3>
            <a href="{{ route('users.add') }}" class="btn btn-success float-right btn-sm"><i class="fa fa-plus-circle"> Add User</i></a>
          </div>
          <div class="card-body">
            <table id="example1" class="table table-bordered table-striped">
              <thead>
              <tr>
                <th>SL</th>
                <th>Role</th>
                <th>Name</th>
                <th>Address</th>
                <th>Mobile</th>
                <th>Email</th>
                <th>Code</th>
                <th>Status</th>
                <th>Actions</th>
              </tr>
              </thead>
              <tbody>
              @foreach($users as $key=>$user)
                <tr class="{{$user->id}}">
                  <td>{{ $key + 1 }}</td>
                  <td>{{ $user->role }}</td>
                  <td>{{ $user->name }}</td>
                  <td>{{ $user->address }}</td>
                  <td>{{ $user->mobile }}</td>
                  <td>{{ $user->email }}</td>
                  <td>{{ $user->code }}</td>
                  <td>
                  	@if($user->status == 1)
                        <span class="badge bg-blue">Active</span>
                    @else
                        <span class="badge bg-pink">Deactive</span>
                    @endif
                  </td>
                  <td>
                  	<a href="{{ route('users.edit',$user->id) }}" class="btn btn-info btn-sm" title="Edit"><i class="fa fa-edit"></i></a>
                    <a id="delete" href="{{ route('users.delete') }}" data-token="{{csrf_token()}}" data-id="{{$user->id}}" class="btn btn-danger btn-sm" title="Delete"><i class="fa fa-trash"></i></a>
                  </td>
                </tr> 
              @endforeach               
              </tbody>
            </table>
          </div>
        </div>
      </div>
    </div>
  </section>
</div>  

@endsection

@push('js')

@endpush