@extends('layouts.backend.app')

@section('title','Manage Fee Category')

@push('css')

@endpush

@section('content')

<div class="content-wrapper">
  <section class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1>
            @if(isset($feeCategories))
              Update Fee Category
            @else
              Add Fee Category
            @endif
          </h1>
        </div>
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="{{ route('home') }}">Home</a></li>
            <li class="breadcrumb-item active">
              @if(isset($feeCategories))
                Update Fee Category
              @else
                Add Fee Category
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
                @if(isset($feeCategories))
                  Update Fee Category
                @else
                  Add Fee Category
                @endif
              </h3>
              <a href="{{ route('setups.fee.category.view') }}" class="btn btn-success float-right btn-sm"><i class="fa fa-list"> View Fee Category</i></a>
            </div>
            <form role="form" action="{{(@$feeCategories)?route('setups.fee.category.update',$feeCategories->id):route('setups.fee.category.store')}}" method="POST" id="MyForm">
            @csrf
              <div class="card-body">
                <div class="form-row">                   
                  <div class="form-group col-md-6">
                    <label for="name">Fee Category</label>
                    <input type="text" name="name" class="form-control" placeholder="Enter Fee Category" value="{{ @$feeCategories->name }}"> 
                    <font style="color: red"> 
                      {{($errors->has('name'))?($errors->first('name')):''}} 
                    </font>                 
                  </div>
                  <br>
                  <div class="form-group mb-0 col-md-12">
                    <div class="custom-control custom-checkbox">
                      <input type="checkbox" name="status" class="custom-control-input" id="status" value="1" {{ @$feeCategories->status == 1 ? 'checked' : '' }}>
                      <label class="custom-control-label" for="status">Status</label>
                    </div>
                  </div>
                </div>
              </div>
              <div class="card-footer">
                <button type="submit" class="btn btn-primary">@if(isset($feeCategories)) Update Fee Category @else Add Fee Category @endif</button>
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
          required: "Please enter User Name",
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