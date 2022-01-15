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
          <h1>Manage Others Cost</h1>
        </div>
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="{{ route('home') }}">Home</a></li>
            <li class="breadcrumb-item active">Others Cost</li>
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
              Edit Cost
              @else
              Add Cost
              @endif
            </h3>
            <a href="{{ route('accounts.cost.view') }}" class="btn btn-success float-right btn-sm"><i class="fa fa-list"> Others Cost List</i></a>
          </div>

          <div class="card-body">
            <form method="post" action="{{(@$editData)?route('accounts.cost.update',$editData->id):route('accounts.cost.store')}}" id="myForm" enctype="multipart/form-data">
              @csrf
              <div class="form-row">
                  <div class="form-group col-md-3">
                    <label>Date</label>
                    <input type="text" name="date" value="{{@$editData->date}}" class="form-control singledatepicker" placeholder="Date" autocomplete="off">
                  </div>
                  <div class="form-group col-md-3">
                    <label>Amount</label>
                    <input type="text" name="amount" value="{{@$editData->amount}}" class="form-control">
                  </div>
                  <div class="form-group col-md-2">
                    <label>Image</label>
                    <input type="file" name="image" class="form-control" id="image">
                  </div>
                  <div class="form-group col-md-4">
                    <img id="showImage" src="{{(!empty(@$editData->image))?url('public/upload/cost_images/'.@$editData->image):url('public/assets/backend/upload/default.png')}}" style="width: 300px;height: 100px;border:1px solid #000;">
                  </div>
                  <div class="form-group col-md-12">
                    <label>Description</label>
                    <textarea name="description" class="form-control" rows="4">{{@$editData->description}}</textarea>
                  </div>
                  <div class="form-group col-md-3">
                    <button type="submit" class="btn btn-primary">{{(@$editData)?"Update":"Submit"}}</button>
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
          date: {
            required: true,
          },
          amount: {
            required: true,
          },
          description: {
            required: true,
          },
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