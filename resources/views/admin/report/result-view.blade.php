@extends('layouts.backend.app')
@section('title','Employee Leave')
@push('css')
@endpush
@section('content')

<div class="content-wrapper">
  <section class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1>Manage Students Result</h1>
        </div>
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="{{ route('home') }}">Home</a></li>
            <li class="breadcrumb-item active">Result</li>
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
            <h3 class="card-title">Select Criteria</h3>
          </div>

          <div class="card-body">
            <form method="GET" action="{{route('reports.result.get')}}" id="myForm" target="_blank">
              <div class="form-row">                   
                <div class="form-group col-md-3">
                  <label for="year_id">Year</label>
                  <select name="year_id" id="year_id" class="form-control select2bs4">
                    <option value="">Select Year</option>
                    @foreach($years as $year)
                        <option value="{{ $year->id }}">{{ $year->name }}</option>
                    @endforeach
                  </select>               
                </div>
                <div class="form-group col-md-3">
                  <label for="class_id">Class</label>
                  <select name="class_id" id="class_id" class="form-control select2bs4">
                    <option selected value="">Select Class</option>
                    @foreach($classes as $class)
                        <option value="{{ $class->id }}">{{ $class->name }}</option>
                    @endforeach
                  </select>             
                </div>
                <div class="form-group col-md-3">
                  <label>Exam Type</label>
                  <select name="exam_type_id" id="exam_type_id" class="form-control select2bs4">
                    <option value="">Select Exam Type</option>
                    @foreach($exam_types as $type)
                      <option value="{{ $type->id }}">{{ $type->name }}</option>
                    @endforeach
                  </select>           
                </div>
                <div class="form-group col-md-3" style="padding-top: 30px;">
                  <button type="submit" class="btn btn-primary" name="search">Search</button>          
                </div>
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
    $('#myForm').validate({
      rules: {           
        year_id: {
          required: true,
        },
        class_id: {
          required: true,
        },
        exam_type_id: {
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