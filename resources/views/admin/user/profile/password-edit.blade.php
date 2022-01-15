@extends('layouts.backend.app')

@section('title','Manage Password')

@push('css')

@endpush

@section('content')

<div class="content-wrapper">
  <section class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1>Manage Password</h1>
        </div>
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="{{ route('home') }}">Home</a></li>
            <li class="breadcrumb-item active">Manage Password</li>
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
              <h3 class="card-title">Manage Password</h3>                
            </div>
            <form role="form" action="{{ route('profiles.password.update') }}" method="POST" id="MyForm">
            @csrf
              <div class="card-body"> 
                <div class="form-group">
                  <label for="current_password">Current Password</label>
                  <input type="password" name="current_password" id="current_password" class="form-control" placeholder="Current Password">                    
                </div>                 
                <div class="form-group">
                  <label for="new_password">New Password</label>
                  <input type="password" name="new_password" id="new_password" class="form-control" placeholder="New Password">                    
                </div>
                <div class="form-group">
                  <label for="again_new_password">Again New Password</label>
                  <input type="password" name="again_new_password" class="form-control" placeholder="Again New Password">                    
                </div>                  
              </div>
              <div class="card-footer">
                <button type="submit" class="btn btn-primary">Change Password</button>
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
        current_password: {
          required: true,
        },
        new_password: {
          required: true,
          minlength: 5
        },
        again_new_password: {
          required: true,
          equalTo: '#new_password'
        },      
      },
      messages: {          
        current_password: {
          required: "Please enter Current Password",
        },
        new_password: {
          required: "Please enter New Password",
          minlength: "Your password must be at least 5 characters or numbers",
        },
        again_new_password: {
          required: "Please enter Again New Password",
          equalTo: "Again New Password does not match",
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