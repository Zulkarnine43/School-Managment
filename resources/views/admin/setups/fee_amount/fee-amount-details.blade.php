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
          <h1>Fee Amount Details</h1>
        </div>
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="{{ route('home') }}">Home</a></li>
            <li class="breadcrumb-item active">Fee Amount Details</li>
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
            <h3 class="card-title">Fee Amount Details</h3>
            <a href="{{ route('setups.fee.amount.view') }}" class="btn btn-success float-right btn-sm"><i class="fa fa-list"> View Fee Amount</i></a>
          </div>
          <div class="card-body">
            <h4><strong>Fee Category :</strong>{{ $feeAmounts[0]->fee_category->name }}</h4>
            <table class="table table-bordered table-striped">
              <thead>
              <tr>
                <th>SL</th>
                <th>Class</th>
                <th>Amount</th>
              </tr>
              </thead>
              <tbody>
              @foreach($feeAmounts as $key=>$feeAmount)
                <tr>
                  <td>{{ $key + 1 }}</td>
                  <td>{{ $feeAmount->student_class->name }}</td>
                  <td>{{ $feeAmount->amount }}</td>
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