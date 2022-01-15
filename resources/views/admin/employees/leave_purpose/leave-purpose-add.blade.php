@extends('layouts.backend.app')

@section('title','Manage Leave Purpose')

@push('css')

@endpush

@section('content')

<div class="content-wrapper">
  <section class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1>
            @if(isset($leavePurposes))
              Update Leave Purpose
            @else
              Add Leave Purpose
            @endif
          </h1>
        </div>
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="{{ route('home') }}">Home</a></li>
            <li class="breadcrumb-item active">
              @if(isset($leavePurposes))
                Update Leave Purpose
              @else
                Add Leave Purpose
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
                @if(isset($leavePurposes))
                  Update Leave Purpose
                @else
                  Add Leave Purpose
                @endif
              </h3>
              <a href="{{ route('employees.purpose.view') }}" class="btn btn-success float-right btn-sm"><i class="fa fa-list"> View Leave Purpose</i></a>
            </div>
            <form role="form" action="{{(@$leavePurposes)?route('employees.purpose.update',$leavePurposes->id):route('employees.purpose.store')}}" method="POST" id="MyForm">
            @csrf
              <div class="card-body">
                <div class="form-row">                   
                  <div class="form-group col-md-6">
                    <label for="name">Leave Purpose</label>
                    <input type="text" name="name" class="form-control" placeholder="Enter Leave Purpose" value="{{ @$leavePurposes->name }}"> 
                    <font style="color: red"> 
                      {{($errors->has('name'))?($errors->first('name')):''}} 
                    </font>                 
                  </div>
                </div>
              </div>
              <div class="card-footer">
                <button type="submit" class="btn btn-primary">@if(isset($leavePurposes)) Update Leave Purpose @else Add Leave Purpose @endif</button>
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
        }      
      },
      messages: { 
        name: {
          required: "Please enter Leave Purpose",
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