@extends('layouts.backend.app')

@section('title','Manage Employee Leave')

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
              Update Employee Leave
            @else
              Add Employee Leave
            @endif
          </h1>
        </div>
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="{{ route('home') }}">Home</a></li>
            <li class="breadcrumb-item active">
              @if(isset($editData))
                Update Employee Leave
              @else
                Add Employee Leave
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
                  Update Employee Leave
                @else
                  Add Employee Leave
                @endif
              </h3>
              <a href="{{ route('employees.leave.view') }}" class="btn btn-success float-right btn-sm"><i class="fa fa-list"> View Employee Leave</i></a>
            </div>
            <form role="form" action="{{(@$editData)?route('employees.leave.update',$editData->id):route('employees.leave.store')}}" method="POST" id="MyForm">
            @csrf
              <div class="card-body">
                <div class="form-row">                   
                  <div class="form-group col-md-6">
                    <label for="employee_id">Employee Name</label>
                    <select name="employee_id" class="form-control select2bs4">
                      <option value="">Select Employee</option>
                      @foreach($employees as $employee)
                        <option value="{{ $employee->id }}" {{(@$editData->employee_id == $employee->id)?"selected":""}}>{{ $employee->name }} - {{ $employee->id_no }}</option>
                      @endforeach
                    </select>
                    <font style="color: red"> 
                      {{($errors->has('employee_id'))?($errors->first('employee_id')):''}} 
                    </font>                 
                  </div>                  
                </div>
                <div class="form-row">
                  <div class="form-group col-md-3">
                    <label for="start_date">Start Date</label>
                    <input type="date" name="start_date" class="form-control" placeholder="Enter Start Date" value="{{ @$editData->start_date }}"> 
                    <font style="color: red"> 
                      {{($errors->has('start_date'))?($errors->first('start_date')):''}} 
                    </font>                 
                  </div>
                  <div class="form-group col-md-3">
                    <label for="end_date">End Date</label>
                    <input type="date" name="end_date" class="form-control" placeholder="Enter End Date" value="{{ @$editData->end_date }}"> 
                    <font style="color: red"> 
                      {{($errors->has('end_date'))?($errors->first('end_date')):''}} 
                    </font>                 
                  </div>
                  <div class="form-group col-md-6">
                    <label for="leave_purpose_id">Leave Purpose</label>
                    <select name="leave_purpose_id" id="leave_purpose_id" class="form-control select2bs4">
                      <option value="">Select Leave Purpose</option>
                      @foreach($leavePurposes as $leavePurpose)
                        <option value="{{ $leavePurpose->id }}" {{(@$editData->leave_purpose_id == $leavePurpose->id)?"selected":""}}>{{ $leavePurpose->name }}</option>
                      @endforeach
                      <option value="0">New Purpose</option>
                    </select>
                    <font style="color: red"> 
                      {{($errors->has('leave_purpose_id'))?($errors->first('leave_purpose_id')):''}} 
                    </font>                 
                  </div> 
                </div>
                <div class="form-row" id="add_others" style="display: none;">                  
                  <div class="form-group col-md-12">
                    <label for="name">Enter Leave Purpose</label>
                    <input type="text" name="name" class="form-control" placeholder="Enter Leave Purpose"> 
                    <font style="color: red"> 
                      {{($errors->has('name'))?($errors->first('name')):''}} 
                    </font>                 
                  </div>                 
                </div>
              </div>
              <div class="card-footer">
                <button type="submit" class="btn btn-primary">@if(isset($editData)) Update Employee Leave @else Add Employee Leave @endif</button>
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
        employee_id: {
          required: true,
        },
        start_date: {
          required: true,
        },
        end_date: {
          required: true,
        },
        leave_purpose_id: {
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

<script type="text/javascript">
  $(document).ready(function(){
    $(document).on('change','#leave_purpose_id',function(){
      var leave_purpose_id = $(this).val();
      if(leave_purpose_id == '0'){
        $('#add_others').show();
      }else{
        $('#add_others').hide();
      }
    });
  });
</script>

@endsection

@push('js')

@endpush