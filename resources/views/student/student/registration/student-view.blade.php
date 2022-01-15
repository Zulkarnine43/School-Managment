@extends('layouts.backend.app')

@section('title','Student Registration')

@push('css')

@endpush

@section('content')

<div class="content-wrapper">
  <section class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1>Manage Student Registration</h1>
        </div>
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="{{ route('home') }}">Home</a></li>
            <li class="breadcrumb-item active">Manage Student Registration</li>
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
            <h3 class="card-title">Search Criteria</h3>
          </div>
          <div class="card-body">
            <form method="GET" action="{{ route('students.year.class.wise') }}" id="MyForm">
              <div class="form-row">                   
                <div class="form-group col-md-3">
                  <label for="year_id">Select Year</label>
                  <select name="year_id" class="form-control select2bs4">
                    <option value="">Select Year</option>
                    @foreach($years as $year)
                        <option value="{{ $year->id }}" {{(@$year_id == $year->id)?"selected":""}}>{{ $year->name }}</option>
                    @endforeach
                  </select>
                  <font style="color: red"> 
                    {{($errors->has('year_id'))?($errors->first('year_id')):''}} 
                  </font>                 
                </div>
                <div class="form-group col-md-3">
                  <label for="class_id">Select Class</label>
                  <select name="class_id" class="form-control select2bs4">
                    <option selected value="">Select Class</option>
                    @foreach($classes as $class)
                        <option value="{{ $class->id }}" {{(@$class_id == $class->id)?"selected":""}}>{{ $class->name }}</option>
                    @endforeach
                  </select>
                  <font style="color: red"> 
                    {{($errors->has('class_id'))?($errors->first('class_id')):''}} 
                  </font>                 
                </div>
                <div class="form-group col-md-3" style="margin-top: 30px;">
                  <button type="submit" class="btn btn-primary">Search</button>                
                </div>
              </div>
            </form>
          </div>
        </div>
        <div class="card">
          <div class="card-header">
            <h3 class="card-title">Manage Student Registration</h3>
            <a href="{{ route('students.registration.add') }}" class="btn btn-success float-right btn-sm"><i class="fa fa-plus-circle"> Add Student Registration</i></a>
          </div>
          <div class="card-body">
          @if(!@$search)
            <table id="example1" class="table table-bordered table-striped">
              <thead>
              <tr>
                <th>SL</th>
                <th>Name</th>
                <th>ID No</th>
                <th>Roll</th>
                <th>Year</th>
                <th>Class</th>
                <th>Image</th>
                <th>Email</th>
                @if(Auth::user()->role == "admin")
                <th>Code</th>
                @endif
                <th>Actions</th>
              </tr>
              </thead>
              <tbody>
              @foreach($allData as $key=>$value)
                <tr class="{{$value->id}}">
                  <td>{{ $key + 1 }}</td>
                  <td>{{ $value->student->name }}</td>
                  <td>{{ $value->student->id_no }}</td>
                  <td>{{ $value->roll }}</td>
                  <td>{{ $value->year->name }}</td>
                  <td>{{ $value->student_class->name }}</td>
                  <td>
                    <img src="{{(!empty(@$value['student'][image]))?url('public/assets/backend/upload/students/'.@$value['student'][image]):url('public/assets/backend/upload/default.png')}}" style="width: 60px; height: 60px;"> 
                  </td>
                  <td>{{ $value->student->email }}</td>
                  @if(Auth::user()->role == "admin")
                    <td>{{ $value->student->code }}</td>
                  @endif
                  <td>
                    <a href="{{ route('students.registration.edit',$value->student_id) }}" class="btn btn-info btn-sm" title="Edit"><i class="fa fa-edit"></i></a>     
                    <a href="{{ route('students.registration.promotion',$value->student_id) }}" class="btn btn-success btn-sm" title="Promotion"><i class="fa fa-check"></i></a>
                    <a href="{{ route('students.registration.details',$value->student_id) }}" class="btn btn-info btn-sm" title="Details" target="_blank"><i class="fa fa-eye"></i></a>                     
                  </td>
                </tr> 
              @endforeach               
              </tbody>
            </table>
          @else
            <table id="example1" class="table table-bordered table-striped">
              <thead>
              <tr>
                <th>SL</th>
                <th>Name</th>
                <th>ID No</th>
                <th>Roll</th>
                <th>Year</th>
                <th>Class</th>
                <th>Image</th>
                <th>Email</th>
                @if(Auth::user()->role == "admin")
                <th>Code</th>
                @endif
                <th>Actions</th>
              </tr>
              </thead>
              <tbody>
              @foreach($allData as $key=>$value)
                <tr class="{{$value->id}}">
                  <td>{{ $key + 1 }}</td>
                  <td>{{ $value->student->name }}</td>
                  <td>{{ $value->student->id_no }}</td>
                  <td>{{ $value->roll }}</td>
                  <td>{{ $value->year->name }}</td>
                  <td>{{ $value->student_class->name }}</td>
                  <td>
                    <img src="{{(!empty(@$value['student'][image]))?url('public/assets/backend/upload/students/'.@$value['student'][image]):url('public/assets/backend/upload/default.png')}}" style="width: 60px; height: 60px;"> 
                  </td>
                  <td>{{ $value->student->email }}</td>
                  @if(Auth::user()->role == "admin")
                    <td>{{ $value->student->code }}</td>
                  @endif
                  <td>
                    <a href="{{ route('students.registration.edit',$value->student_id) }}" class="btn btn-info btn-sm" title="Edit"><i class="fa fa-edit"></i></a>     
                    <a href="{{ route('students.registration.promotion',$value->student_id) }}" class="btn btn-success btn-sm" title="Promotion"><i class="fa fa-check"></i></a>
                    <a href="{{ route('students.registration.details',$value->student_id) }}" class="btn btn-info btn-sm" title="Details" target="_blank"><i class="fa fa-eye"></i></a>                     
                  </td>
                </tr> 
              @endforeach               
              </tbody>
            </table>
          @endif
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
        year_id:{
          required:true
        },
        class_id:{
          required:true
        }
      },
      messages: {          
        year_id: {
          required: "Please select Year Name",
        }, 
        class_id: {
          required: "Please select Class Name",
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