@extends('layouts.backend.app')

@section('title','Update Users')

@push('css')

@endpush

@section('content')

<div class="content-wrapper">
  <section class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1>Update User</h1>
        </div>
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="{{ route('home') }}">Home</a></li>
            <li class="breadcrumb-item active">Update User</li>
          </ol>
        </div>
      </div>
    </div>
  </section>

  <section class="content">
    <div class="container-fluid">
      <div class="row">
        <div class="col-md-12">
          <div class="card">
            <div class="card-header">
              <h3 class="card-title">Update User</h3>
              <a href="{{ route('users.view') }}" class="btn btn-success float-right btn-sm"><i class="fa fa-list"> View User</i></a>
            </div>
            <form role="form" action="{{ route('users.update',$users->id) }}" method="POST" id="MyForm">
            @csrf
              <div class="card-body">
                <div class="form-group">
                  <label for="role">User Role</label>
                  <select class="form-control select2bs4" name="role">
                    <option value="">Select Role</option>
                    <option value="admin" @if($users->role=="admin") selected @endif>Admin</option>
                    <option value="operator" @if($users->role=="operator") selected @endif>Operator</option>
                  </select>                    
                </div>
                <div class="form-group">
                  <label for="name">Name</label>
                  <input type="text" name="name" class="form-control" placeholder="Enter name" value="{{ $users->name }}"> 
                  <font style="color: red"> 
                    {{($errors->has('name'))?($errors->first('name')):''}} 
                  </font>                 
                </div>
                <div class="form-group">
                  <label for="email">Email address</label>
                  <input type="email" name="email" class="form-control" placeholder="Enter email" value="{{ $users->email }}"> 
                  <font style="color: red"> 
                    {{($errors->has('email'))?($errors->first('email')):''}}
                  </font>                     
                </div>                  
                <div class="form-group mb-0">
                  <div class="custom-control custom-checkbox">
                    <input type="checkbox" name="status" class="custom-control-input" id="exampleCheck1" value="1" {{ $users->status == 1 ? 'checked' : '' }}>
                    <label class="custom-control-label" for="exampleCheck1">Status</label>
                  </div>
                </div>
              </div>
              <div class="card-footer">
                <button type="submit" class="btn btn-primary">Update User</button>
              </div>
            </form>            
          </div>
          </div>        
      </div>
    </div>
  </section>
</div>

<script type="text/javascript">
  $(document).ready(function () {  
    $('#MyForm').validate({
      rules: {  
        usertype: {
          required: true,
        },  
        name: {
          required: true,
        },   
        email: {
          required: true,
          email: true,
        },      
      },
      messages: { 
        usertype: {
          required: "Please Select User Type",
        }, 
        name: {
          required: "Please enter User Name",
        },     
        email: {
          required: "Please enter a email address",
          email: "Please enter a <em>vaild</em> email address",
        },      
      },
      errorElement: 'span',
      errorPlacement: function (error, element) {
        error.addClass('invalid-feedback');
        element.closest('.form-group').append(error);
      },
      highlight: function (element, errorClass, validClass) {
        $(element).addClass('is-invalid');
      },
      unhighlight: function (element, errorClass, validClass) {
        $(element).removeClass('is-invalid');
      }
    });
  });
</script>

@endsection

@push('js')

@endpush