@extends('layouts.backend.app')

@section('title','Manage Salary Increment')

@push('css')

@endpush

@section('content')

<div class="content-wrapper">
  <section class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1>
            Salary Increment
          </h1>
        </div>
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="{{ route('home') }}">Home</a></li>
            <li class="breadcrumb-item active">
              Salary Increment
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
                Salary Increment
              </h3>
              <a href="{{ route('employees.salary.view') }}" class="btn btn-success float-right btn-sm"><i class="fa fa-list"> View Salary</i></a>
            </div>
            <form role="form" action="{{ route('employees.salary.store',$editData->id) }}" method="POST" id="MyForm">
            @csrf
              <div class="card-body">
                <div class="form-row">                   
                  <div class="form-group col-md-4">
                    <label for="increment_salary">Increment Salary</label>
                    <input type="number" name="increment_salary" class="form-control" placeholder="Enter Increment Salary"> 
                    <font style="color: red"> 
                      {{($errors->has('increment_salary'))?($errors->first('increment_salary')):''}} 
                    </font>                 
                  </div>
                  <div class="form-group col-md-4">
                    <label for="effected_date">Effected Date</label>
                    <input type="date" name="effected_date" class="form-control" placeholder="Enter Effected Date"> 
                    <font style="color: red"> 
                      {{($errors->has('effected_date'))?($errors->first('effected_date')):''}} 
                    </font>                 
                  </div>
                </div>
              </div>
              <div class="card-footer">
                <button type="submit" class="btn btn-primary">Salary Increment</button>
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
        increment_salary: {
          required: true,
        },
        effected_date: {
          required: true,
        }     
      },
      messages: { 
        increment_salary: {
          required: "Please enter Increment Salary",
        },
        effected_date: {
          required: "Please select effected date",
        }      
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