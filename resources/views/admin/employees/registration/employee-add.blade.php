@extends('layouts.backend.app')

@section('title','Manage Employee')

@push('css')

@endpush

@section('content')

<div class="content-wrapper">
  <section class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1>
            @if(isset($editData))
              Update Teacher
            @else
              Add Teacher
            @endif
          </h1>
        </div>
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="{{ route('home') }}">Home</a></li>
            <li class="breadcrumb-item active">
              @if(isset($editData))
                Update Employee
              @else
                Add Employee
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
                @if(isset($editData))
                  Update Employee
                @else
                  Add Employee
                @endif
              </h3>
              <a href="{{ route('employees.registration.view') }}" class="btn btn-success float-right btn-sm"><i class="fa fa-list"> View Employee</i></a>
            </div>
            <form role="form" action="{{(@$editData)?route('employees.registration.update',$editData->id):route('employees.registration.store')}}" method="POST" enctype="multipart/form-data" id="MyForm">
            @csrf
              <div class="card-body">
                <div class="form-row">                   
                  <div class="form-group col-md-4">
                    <label for="name">Employee Name</label>
                    <input type="text" name="name" class="form-control" placeholder="Enter Student Name" value="{{ @$editData->name }}"> 
                    <font style="color: red"> 
                      {{($errors->has('name'))?($errors->first('name')):''}} 
                    </font>                 
                  </div>
                  <div class="form-group col-md-4">
                    <label for="fname">Father's Name</label>
                    <input type="text" name="fname" class="form-control" placeholder="Enter Father's Name" value="{{ @$editData->fname }}"> 
                    <font style="color: red"> 
                      {{($errors->has('fname'))?($errors->first('fname')):''}} 
                    </font>                 
                  </div>
                  <div class="form-group col-md-4">
                    <label for="mname">Mother's Name</label>
                    <input type="text" name="mname" class="form-control" placeholder="Enter Mother's Name" value="{{ @$editData->mname }}"> 
                    <font style="color: red"> 
                      {{($errors->has('mname'))?($errors->first('mname')):''}} 
                    </font>                 
                  </div>
                  <div class="form-group col-md-4">
                    <label for="mobile">Mobile Number</label>
                    <input type="text" name="mobile" class="form-control" placeholder="Enter Mobile Number" value="{{ @$editData->mobile }}"> 
                    <font style="color: red"> 
                      {{($errors->has('mobile'))?($errors->first('mobile')):''}} 
                    </font>                 
                  </div>
                  <div class="form-group col-md-4">
                    <label for="email">Email Address</label>
                    <input type="email" name="email" class="form-control" placeholder="Enter Email Address" value="{{ @$editData->email }}"> 
                    <font style="color: red"> 
                      {{($errors->has('email'))?($errors->first('email')):''}} 
                    </font>                 
                  </div>
                  <div class="form-group col-md-4">
                    <label for="address">Address</label>
                    <input type="text" name="address" class="form-control" placeholder="Enter Address" value="{{ @$editData->address }}"> 
                    <font style="color: red"> 
                      {{($errors->has('address'))?($errors->first('address')):''}} 
                    </font>                 
                  </div>
                  <div class="form-group col-md-4">
                    <label for="gender">Gender</label>
                    <select name="gender" class="form-control select2bs4">
                      <option value="">Select Gender</option>
                      <option value="male" @if(@$editData->gender=="male") selected @endif>Male</option>
                      <option value="female" @if(@$editData->gender=="female") selected @endif>Female</option>
                    </select> 
                    <font style="color: red"> 
                      {{($errors->has('gender'))?($errors->first('gender')):''}} 
                    </font>                 
                  </div>
                  <div class="form-group col-md-4">
                    <label for="religion">Religion</label>
                    <select name="religion" class="form-control select2bs4">
                      <option value="">Select Religion</option>
                      <option value="atheist" @if(@$editData->religion=="atheist") selected @endif>Atheist</option>
                      <option value="buddhist" @if(@$editData->religion=="buddhist") selected @endif>Buddhist</option>
                      <option value="christian" @if(@$editData->religion=="christian") selected @endif>Christian</option>
                      <option value="hindu" @if(@$editData->religion=="hindu") selected @endif>Hindu</option>
                      <option value="islam" @if(@$editData->religion=="islam") selected @endif>Islam</option>
                    </select> 
                    <font style="color: red"> 
                      {{($errors->has('religion'))?($errors->first('religion')):''}} 
                    </font>                 
                  </div>
                  <div class="form-group col-md-4">
                    <label for="dob">Date of Birth</label>
                    <input type="date" name="dob" class="form-control" placeholder="Enter Date of Birth" value="{{ @$editData->dob }}"> 
                    <font style="color: red"> 
                      {{($errors->has('dob'))?($errors->first('dob')):''}} 
                    </font>                 
                  </div>
                  @if(!@$editData)
                  <div class="form-group col-md-4">
                    <label for="join_date">Join Date</label>
                    <input type="date" name="join_date" class="form-control" placeholder="Enter Join Date" value="{{ @$editData->join_date }}"> 
                    <font style="color: red"> 
                      {{($errors->has('join_date'))?($errors->first('join_date')):''}} 
                    </font>                 
                  </div>
                  <div class="form-group col-md-4">
                    <label for="salary">Salary</label>
                    <input type="number" name="salary" class="form-control" placeholder="Enter Salary" value="{{ @$editData->salary }}"> 
                    <font style="color: red"> 
                      {{($errors->has('salary'))?($errors->first('salary')):''}} 
                    </font>                 
                  </div>
                  @endif
                  <div class="form-group col-md-4">
                    <label for="designation_id">Designation</label>
                    <select name="designation_id" class="form-control select2bs4">
                      @foreach($designations as $designation)
                        <option value="{{ $designation->id }}" {{(@$editData->designation_id == $designation->id)?"selected":""}}>{{ $designation->name }}</option>
                      @endforeach
                    </select> 
                    <font style="color: red"> 
                      {{($errors->has('designation_id'))?($errors->first('designation_id')):''}} 
                    </font>                 
                  </div>                  
                  <div class="form-group col-md-3">
                    <label for="image">Image</label>
                    <input type="file" name="image" class="form-control" id="image">              
                  </div>
                  <div class="form-group col-md-12">
                    <img id="showImage" src="{{(!empty(@$editData->image))?url('public/assets/backend/upload/employees/'.@$editData->image):url('public/assets/backend/upload/default.png')}}" style="width: 80px; height: 80px; border: 1px solid #000;">            
                  </div>
                  <br>
                  <div class="form-group mb-0 col-md-12">
                    <div class="custom-control custom-checkbox">
                      <input type="checkbox" name="status" class="custom-control-input" id="status" value="1" {{ @$editData->status == 1 ? 'checked' : '' }}>
                      <label class="custom-control-label" for="status">Status</label>
                    </div>
                  </div>
                </div>
              </div>
              <div class="card-footer">
                <button type="submit" class="btn btn-primary">@if(isset($editData)) Update Employee @else Add Employee @endif</button>
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
      rules:{
        name:{
          required:true
        },
        fname:{
          required:true
        },
        mname:{
          required:true
        },
        mobile:{
          required:true
        },
        address:{
          required:true
        },
        gender:{
          required:true
        },
        religion:{
          required:true
        },
        dob:{
          required:true
        },
        join_date:{
          required:true
        },
        designation_id:{
          required:true
        },
        salary:{
          required:true
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