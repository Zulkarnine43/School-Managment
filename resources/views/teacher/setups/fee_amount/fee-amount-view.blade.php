@extends('layouts.backend.app')

@section('title','Fee Amount')

@push('css')

@endpush

@section('content')

<div class="content-wrapper">
  <section class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1>Fee Amount</h1>
        </div>
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="{{ route('home') }}">Home</a></li>
            <li class="breadcrumb-item active">Fee Amount</li>
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
            <h3 class="card-title">Fee Amount</h3>
            <a href="{{ route('setups.fee.amount.add') }}" class="btn btn-success float-right btn-sm"><i class="fa fa-plus-circle"> Add Fee Amount</i></a>
          </div>
          <div class="card-body">
            <table id="example1" class="table table-bordered table-striped">
              <thead>
              <tr>
                <th>SL</th>
                <th>Fee Category</th>
                <th>Action</th>
              </tr>
              </thead>
              <tbody>
              @foreach($feeAmounts as $key=>$feeAmount)
                <tr class="{{$feeAmount->id}}">
                  <td>{{ $key + 1 }}</td>
                  <td>{{ $feeAmount->fee_category->name }}</td>
                  <td>
                  	<a href="{{ route('setups.fee.amount.edit',$feeAmount->fee_category_id) }}" class="btn btn-info btn-sm" title="Edit"><i class="fa fa-edit"></i></a>     
                  	<a href="{{ route('setups.fee.amount.details',$feeAmount->fee_category_id) }}" class="btn btn-primary btn-sm" title="Details"><i class="fa fa-eye"></i></a>                
                  </td>
                </tr> 
              @endforeach               
              </tbody>
            </table>
          </div>
        </div>
      </div>
    </div>
  </section>
</div>  

@endsection

@push('js')

@endpush