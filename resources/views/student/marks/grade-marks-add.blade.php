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
          <h1>Manage Grade Point</h1>
        </div>
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="{{ route('home') }}">Home</a></li>
            <li class="breadcrumb-item active">Grade Point</li>
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
            <h3 class="card-title">
              @if(isset($editData))
              Edit Grade Point
              @else
              Add Grade Point
              @endif
            </h3>
            <a href="{{ route('marks.grade.view') }}" class="btn btn-success float-right btn-sm"><i class="fa fa-list"> Grade Point List</i></a>
          </div>
          <form method="post" action="{{(@$editData)?route('marks.grade.update',$editData->id):route('marks.grade.store')}}" id="myForm">
            @csrf
            <div class="card-body">
              <div class="form-row">
                <div class="form-group col-md-4">
                  <label>Grade Name</label>
                  <input type="text" name="grade_name" value="{{@$editData->grade_name}}" class="form-control">
                </div>
                <div class="form-group col-md-4">
                  <label>Grade Point</label>
                  <input type="text" name="grade_point" value="{{@$editData->grade_point}}" class="form-control">
                </div>
                <div class="form-group col-md-4">
                  <label>Start Marks</label>
                  <input type="text" name="start_marks" value="{{@$editData->start_marks}}" class="form-control">
                </div>
                <div class="form-group col-md-4">
                  <label>End Marks</label>
                  <input type="text" name="end_marks" value="{{@$editData->end_marks}}" class="form-control">
                </div>
                <div class="form-group col-md-4">
                  <label>Start Point</label>
                  <input type="text" name="start_point" value="{{@$editData->start_point}}" class="form-control">
                </div>
                <div class="form-group col-md-4">
                  <label>End Point</label>
                  <input type="text" name="end_point" value="{{@$editData->end_point}}" class="form-control">
                </div>
                <div class="form-group col-md-4">
                  <label>Remarks</label>
                  <input type="text" name="remarks" value="{{@$editData->remarks}}" class="form-control">
                </div>
                <div class="form-group col-md-4" style="padding-top: 30px;">
                  <button type="submit" class="btn btn-success">{{(@$editData) ? 'Update' : 'Submit'}}</button>
                </div>
              </div>
            </div>
          </form>
        </div>
      </div>
    </div>
  </section>
</div>

<script type="text/javascript">
  $(document).ready(function () {  
    $('#myForm').validate({
      rules: {           
        grade_name: {
          required: true,
        },
        grade_point: {
          required: true,
        },
        start_marks: {
          required: true,
        },
        end_marks: {
          required: true,
        },
        start_point: {
          required: true,
        },
        end_point: {
          required: true,
        },
        remarks: {
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