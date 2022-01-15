@extends('layouts.backend.app')

@section('title','Add Users')

@push('css')

@endpush

@section('content')

<div class="content-wrapper">
  <section class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1>Add User</h1>
        </div>
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="{{ route('home') }}">Home</a></li>
            <li class="breadcrumb-item active">Add User</li>
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
              <h3 class="card-title">Add User</h3>
              <a href="{{ route('users.view') }}" class="btn btn-success float-right btn-sm"><i class="fa fa-list"> View User</i></a>
            </div>
            <form role="form" action="{{ route('users.store') }}" method="POST" id="MyForm">
            @csrf
              <div class="card-body">
                <div class="form-row"> 
                  <div class="form-group col-md-4">
                    <label for="role">User Role</label>
                    <select class="form-control select2bs4" name="role">
                      <option value="">Select Role</option>
                      <option value="admin">Admin</option>
                      <option value="operator">Operator</option>
                    </select>                    
                  </div>
                  <div class="form-group col-md-4">
                    <label for="name">Name</label>
                    <input type="text" name="name" class="form-control" placeholder="Enter name" value="{{ old('name') }}"> 
                    <font style="color: red"> 
                      {{($errors->has('name'))?($errors->first('name')):''}} 
                    </font>                 
                  </div>
                  <div class="form-group col-md-4">
                    <label for="email">Email address</label>
                    <input type="email" name="email" class="form-control" placeholder="Enter email" value="{{ old('email') }}"> 
                    <font style="color: red"> 
                      {{($errors->has('email'))?($errors->first('email')):''}}
                    </font>                     
                  </div>
                  <br>
                  <div class="form-group mb-0 col-md-12">
                    <div class="custom-control custom-checkbox">
                      <input type="checkbox" name="status" class="custom-control-input" id="exampleCheck1" value="1">
                      <label class="custom-control-label" for="exampleCheck1">Status</label>
                    </div>
                  </div>
                </div>
              </div>
              <div class="card-footer">
                <button type="submit" class="btn btn-primary">Add User</button>
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
        role: {
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
        role: {
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