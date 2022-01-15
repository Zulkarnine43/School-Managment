@extends('layouts.backend.app')

@section('title','Manage School')

@push('css')

@endpush

@section('content')

<div class="content-wrapper">
  <section class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1>
            @if(isset($schools))
              Update School
            @else
              Add School
            @endif
          </h1>
        </div>
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="{{ route('home') }}">Home</a></li>
            <li class="breadcrumb-item active">
              @if(isset($schools))
                Update School
              @else
                Add School
              @endif
            </li>
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
              <h3 class="card-title">
                @if(isset($schools))
                  Update School
                @else
                  Add School
                @endif
              </h3>
              <a href="{{ route('settings.school.view') }}" class="btn btn-success float-right btn-sm"><i class="fa fa-list"> View School</i></a>
            </div>
            <form role="form" action="{{(@$schools)?route('settings.school.update',$schools->id):route('settings.school.store')}}" method="POST" enctype="multipart/form-data" id="MyForm">
            @csrf
              <div class="card-body">
                <div class="form-row">                   
                  <div class="form-group col-md-6">
                    <label for="name">School Name</label>
                    <input type="text" name="name" class="form-control" placeholder="Enter School Name" value="{{ @$schools->name }}"> 
                    <font style="color: red"> 
                      {{($errors->has('name'))?($errors->first('name')):''}} 
                    </font>                 
                  </div>                
                  <div class="form-group col-md-6">
                    <label for="name">Address</label>
                    <input type="text" name="address" class="form-control" placeholder="Enter Address" value="{{ @$schools->address }}"> 
                    <font style="color: red"> 
                      {{($errors->has('address'))?($errors->first('address')):''}} 
                    </font>                 
                  </div>
                  <div class="form-group col-md-6">
                    <label for="name">Phone</label>
                    <input type="text" name="phone" class="form-control" placeholder="Enter Phone" value="{{ @$schools->phone }}"> 
                    <font style="color: red"> 
                      {{($errors->has('phone'))?($errors->first('phone')):''}} 
                    </font>                 
                  </div>
                  <div class="form-group col-md-6">
                    <label for="name">Mobile</label>
                    <input type="text" name="mobile" class="form-control" placeholder="Enter Mobile" value="{{ @$schools->mobile }}"> 
                    <font style="color: red"> 
                      {{($errors->has('mobile'))?($errors->first('mobile')):''}} 
                    </font>                 
                  </div>
                  <div class="form-group col-md-6">
                    <label for="name">Email Address</label>
                    <input type="text" name="email" class="form-control" placeholder="Enter Email Address" value="{{ @$schools->email }}"> 
                    <font style="color: red"> 
                      {{($errors->has('email'))?($errors->first('email')):''}} 
                    </font>                 
                  </div>
                  <div class="form-group col-md-6">
                    <label for="name">Website</label>
                    <input type="text" name="website" class="form-control" placeholder="Enter Website" value="{{ @$schools->website }}"> 
                    <font style="color: red"> 
                      {{($errors->has('website'))?($errors->first('website')):''}} 
                    </font>                 
                  </div>
                  <div class="form-group col-md-6">
                    <label for="address">Image</label>
                    <input type="file" name="image" class="form-control" id="image">              
                  </div>
                  <div class="form-group col-md-12">
                    <img id="showImage" src="{{(!empty($schools->image))?url('assets/backend/upload/schools/'.$schools->image):url('assets/backend/upload/default.png')}}" style="width: 80px; height: 80px; border: 1px solid #000;">            
                  </div>
                  <br>
                  <div class="form-group mb-0 col-md-12">
                    <div class="custom-control custom-checkbox">
                      <input type="checkbox" name="status" class="custom-control-input" id="status" value="1" {{ @$schools->status == 1 ? 'checked' : '' }}>
                      <label class="custom-control-label" for="status">Status</label>
                    </div>
                  </div>
                </div>
              </div>
              <div class="card-footer">
                <button type="submit" class="btn btn-primary">@if(isset($schools)) Update School @else Add School @endif</button>
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
        address: {
          required: true,
        },
        website: {
          required: true,
        }     
      },
      messages: {      
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