@extends('layouts.backend.app')

@section('title','Manage Student Promotion')

@push('css')

@endpush

@section('content')

<div class="content-wrapper">
  <section class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1>
            Student Promotion
          </h1>
        </div>
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="{{ route('home') }}">Home</a></li>
            <li class="breadcrumb-item active">
              Student Promotion
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
                Student Promotion
              </h3>
            </div>
            <form role="form" action="{{ route('students.promotion.store',$editData->student_id) }}" method="POST" enctype="multipart/form-data" id="MyForm">
            @csrf
              <input type="hidden" name="id" value="{{ @$editData->id }}">
              <div class="card-body">
                <div class="form-row">                   
                  <div class="form-group col-md-4">
                    <label for="name">Student Name</label>
                    <input type="text" name="name" class="form-control" placeholder="Enter Student Name" value="{{ @$editData->student->name }}" readonly=""> 
                    <font style="color: red"> 
                      {{($errors->has('name'))?($errors->first('name')):''}} 
                    </font>                 
                  </div>
                  <div class="form-group col-md-4">
                    <label for="fname">Father's Name</label>
                    <input type="text" name="fname" class="form-control" placeholder="Enter Father's Name" value="{{ @$editData->student->fname }}" readonly=""> 
                    <font style="color: red"> 
                      {{($errors->has('fname'))?($errors->first('fname')):''}} 
                    </font>                 
                  </div>
                  <div class="form-group col-md-4">
                    <label for="mname">Mother's Name</label>
                    <input type="text" name="mname" class="form-control" placeholder="Enter Mother's Name" value="{{ @$editData->student->mname }}" readonly=""> 
                    <font style="color: red"> 
                      {{($errors->has('mname'))?($errors->first('mname')):''}} 
                    </font>                 
                  </div>
                  <div class="form-group col-md-4">
                    <label for="mobile">Mobile Number</label>
                    <input type="text" name="mobile" class="form-control" placeholder="Enter Mobile Number" value="{{ @$editData->student->mobile }}" readonly=""> 
                    <font style="color: red"> 
                      {{($errors->has('mobile'))?($errors->first('mobile')):''}} 
                    </font>                 
                  </div>
                  <div class="form-group col-md-4">
                    <label for="email">Email Address</label>
                    <input type="email" name="email" class="form-control" placeholder="Enter Email Address" value="{{ @$editData->student->email }}" readonly=""> 
                    <font style="color: red"> 
                      {{($errors->has('email'))?($errors->first('email')):''}} 
                    </font>                 
                  </div>
                  <div class="form-group col-md-4">
                    <label for="address">Address</label>
                    <input type="text" name="address" class="form-control" placeholder="Enter Address" value="{{ @$editData->student->address }}" readonly=""> 
                    <font style="color: red"> 
                      {{($errors->has('address'))?($errors->first('address')):''}} 
                    </font>                 
                  </div>
                  <div class="form-group col-md-4">
                    <label for="gender">Gender</label>
                    <select name="gender" class="form-control select2bs4" readonly="">
                      <option value="">Select Gender</option>
                      <option value="male" @if(@$editData->student->gender=="male") selected @endif>Male</option>
                      <option value="female" @if(@$editData->student->gender=="female") selected @endif>Female</option>
                    </select> 
                    <font style="color: red"> 
                      {{($errors->has('gender'))?($errors->first('gender')):''}} 
                    </font>                 
                  </div>
                  <div class="form-group col-md-4">
                    <label for="religion">Religion</label>
                    <select name="religion" class="form-control select2bs4" readonly="">
                      <option value="">Select Religion</option>
                      <option value="atheist" @if(@$editData->student->religion=="atheist") selected @endif>Atheist</option>
                      <option value="buddhist" @if(@$editData->student->religion=="buddhist") selected @endif>Buddhist</option>
                      <option value="christian" @if(@$editData->student->religion=="christian") selected @endif>Christian</option>
                      <option value="hindu" @if(@$editData->student->religion=="hindu") selected @endif>Hindu</option>
                      <option value="islam" @if(@$editData->student->religion=="islam") selected @endif>Islam</option>
                    </select> 
                    <font style="color: red"> 
                      {{($errors->has('religion'))?($errors->first('religion')):''}} 
                    </font>                 
                  </div>
                  <div class="form-group col-md-4">
                    <label for="dob">Date of Birth</label>
                    <input type="date" name="dob" class="form-control" placeholder="Enter Date of Birth" value="{{ @$editData->student->dob }}" readonly=""> 
                    <font style="color: red"> 
                      {{($errors->has('dob'))?($errors->first('dob')):''}} 
                    </font>                 
                  </div>
                  <div class="form-group col-md-4">
                    <label for="discount">Discount</label>
                    <input type="number" name="discount" class="form-control" placeholder="Enter Discount" value="{{ @$editData->discount->discount }}"> 
                    <font style="color: red"> 
                      {{($errors->has('discount'))?($errors->first('discount')):''}} 
                    </font>                 
                  </div>
                  <div class="form-group col-md-4">
                    <label for="year_id">Year</label>
                    <select name="year_id" class="form-control select2bs4">
                      @foreach($years as $year)
                        <option value="{{ $year->id }}" {{(@$editData->year_id == $year->id)?"selected":""}}>{{ $year->name }}</option>
                      @endforeach
                    </select> 
                    <font style="color: red"> 
                      {{($errors->has('year_id'))?($errors->first('year_id')):''}} 
                    </font>                 
                  </div>
                  <div class="form-group col-md-4">
                    <label for="class_id">Class</label>
                    <select name="class_id" class="form-control select2bs4">
                      <option value="">Select Class</option>
                      @foreach($classes as $class)
                        <option value="{{ $class->id }}" {{(@$editData->class_id == $class->id)?"selected":""}}>{{ $class->name }}</option>
                      @endforeach
                    </select> 
                    <font style="color: red"> 
                      {{($errors->has('class_id'))?($errors->first('class_id')):''}} 
                    </font>                 
                  </div>
                  <div class="form-group col-md-4">
                    <label for="group_id">Group</label>
                    <select name="group_id" class="form-control select2bs4">
                      <option value="">Select Group</option>
                      @foreach($groups as $group)
                        <option value="{{ $group->id }}" {{(@$editData->group_id == $group->id)?"selected":""}}>{{ $group->name }}</option>
                      @endforeach
                    </select> 
                    <font style="color: red"> 
                      {{($errors->has('group_id'))?($errors->first('group_id')):''}} 
                    </font>                 
                  </div>
                  <div class="form-group col-md-4">
                    <label for="shift_id">Shift</label>
                    <select name="shift_id" class="form-control select2bs4">
                      <option value="">Select Shift</option>
                      @foreach($shifts as $shift)
                        <option value="{{ $shift->id }}" {{(@$editData->shift_id == $shift->id)?"selected":""}}>{{ $shift->name }}</option>
                      @endforeach
                    </select> 
                    <font style="color: red"> 
                      {{($errors->has('shift_id'))?($errors->first('shift_id')):''}} 
                    </font>                 
                  </div>
                  <div class="form-group col-md-3">
                    <label for="image">Image</label>
                    <input type="file" name="image" class="form-control" id="image">              
                  </div>
                  <div class="form-group col-md-12">
                    <img id="showImage" src="{{(!empty(@$editData->student->image))?url('public/assets/backend/upload/students/'.@$editData->student->image):url('public/assets/backend/upload/default.png')}}" style="width: 80px; height: 80px; border: 1px solid #000;">            
                  </div>
                  <br>
                  <div class="form-group mb-0 col-md-12">
                    <div class="custom-control custom-checkbox">
                      <input type="checkbox" name="status" class="custom-control-input" id="status" value="1" {{ @$editData->student->status == 1 ? 'checked' : '' }}>
                      <label class="custom-control-label" for="status">Status</label>
                    </div>
                  </div>
                </div>
              </div>
              <div class="card-footer">
                <button type="submit" class="btn btn-primary">Student Promotion</button>
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
        year_id:{
          required:true
        },
        class_id:{
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