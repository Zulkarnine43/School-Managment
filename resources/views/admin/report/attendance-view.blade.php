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
          <h1>Manage Employee Attendance Report</h1>
        </div>
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="{{ route('home') }}">Home</a></li>
            <li class="breadcrumb-item active">Attendance Report</li>
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
            <form method="GET" action="{{route('reports.attendance.get')}}" id="myForm" target="_blank">
              <div class="form-row">                   
                <div class="form-group col-md-3">
                  <label for="employee_id">Employee Name</label>
                  <select name="employee_id" id="employee_id" class="form-control select2bs4">
                    <option value="">Select Employee</option>
                    @foreach($employees as $employee)
                        <option value="{{ $employee->id }}">{{ $employee->name }}</option>
                    @endforeach
                  </select>               
                </div>
                <div class="form-group col-md-3">
                  <label>Date</label>
                  <input type="text" name="date" class="singledatepicker form-control" placeholder="DD-MM-YYYY" readonly>     
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
        employee_id: {
          required: true,
        },
        date: {
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