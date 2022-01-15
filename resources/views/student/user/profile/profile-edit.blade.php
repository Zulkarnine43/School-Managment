@extends('layouts.backend.app')

@section('title','Update Profile')

@push('css')

@endpush

@section('content')

<div class="content-wrapper">
  <section class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1>Update Profile</h1>
        </div>
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="{{ route('home') }}">Home</a></li>
            <li class="breadcrumb-item active">Update Profile</li>
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
              <h3 class="card-title">Update Profile</h3>
              <a href="{{ route('profiles.view') }}" class="btn btn-success float-right btn-sm"><i class="fa fa-list"> Your Profile</i></a>
            </div>
            <form role="form" action="{{ route('profiles.update') }}" method="POST" id="MyForm" enctype="multipart/form-data">
            @csrf
              <div class="card-body"> 
                <div class="form-row">                 
                  <div class="form-group col-md-6">
                    <label for="name">Name</label>
                    <input type="text" name="name" class="form-control" placeholder="Enter name" value="{{ $users->name }}"> 
                    <font style="color: red"> 
                      {{($errors->has('name'))?($errors->first('name')):''}} 
                    </font>                 
                  </div>
                  <div class="form-group col-md-6">
                    <label for="email">Email address</label>
                    <input type="email" name="email" class="form-control" placeholder="Enter email" value="{{ $users->email }}"> 
                    <font style="color: red"> 
                      {{($errors->has('email'))?($errors->first('email')):''}}
                    </font>                     
                  </div>
                  <div class="form-group col-md-6">
                    <label for="gender">Gender</label>
                    <select class="form-control select2bs4" name="gender">
                      <option value="">Select Gender</option>
                      <option @if($users->gender=="Male") selected @endif value="Male">Male</option>
                      <option @if($users->gender=="Female") selected @endif value="Female">Female</option>
                    </select>                    
                  </div>
                  <div class="form-group col-md-6">
                    <label for="mobile">Mobile No</label>
                    <input type="text" name="mobile" class="form-control" placeholder="Enter Mobile" value="{{ $users->mobile }}"> 
                    <font style="color: red"> 
                      {{($errors->has('mobile'))?($errors->first('mobile')):''}} 
                    </font>                 
                  </div>
                  <div class="form-group col-md-6">
                    <label for="address">Address</label>
                    <input type="text" name="address" class="form-control" placeholder="Enter Address" value="{{ $users->address }}"> 
                    <font style="color: red"> 
                      {{($errors->has('address'))?($errors->first('address')):''}} 
                    </font>                 
                  </div>
                  <div class="form-group col-md-6">
                    <label for="address">Image</label>
                    <input type="file" name="image" class="form-control" id="image">              
                  </div>
                  <div class="form-group col-md-12">
                    <img id="showImage" src="{{(!empty($users->image))?url('public/assets/backend/upload/users/'.$users->image):url('public/assets/backend/upload/default.png')}}" style="width: 100px; height: 100px; border: 1px solid #000;">            
                  </div>
                </div>             
              </div>
              <div class="card-footer">
                <button type="submit" class="btn btn-primary">Update Profile</button>
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
        name: {
          required: true,
        },   
        email: {
          required: true,
          email: true,
        },      
      },
      messages: {          
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