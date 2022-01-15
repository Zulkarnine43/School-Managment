@extends('layouts.backend.app')

@section('title','Manage Users')

@push('css')

@endpush

@section('content')

<div class="content-wrapper">
  <section class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1>Manage Users</h1>
        </div>
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="{{ route('home') }}">Home</a></li>
            <li class="breadcrumb-item active">Manage Users</li>
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
            <h3 class="card-title">Student Mark</h3>
           
          </div>
          <div class="card-body">
            <table id="example1" class="table table-bordered table-striped">
              <thead>
              <tr>
                <th>SL</th>
                <th>Fee Category</th>
                <th>Date</th>
                <th>Amount</th>
               
              
               
               
              </tr>
              </thead>
              @php
                   $payment = App\Model\AccountStudentFee::where('student_id', Auth::id())->get();
              @endphp
              <tbody>
              @foreach ($payment as $key => $data)
                  
              
               
                <tr>
                  <td class="text-center">{{$key+1}}</td> 
                  <td class="text-center">{{$data->fee_category->name}}</td>
                  <td class="text-center">{{$data->date}}</td>
                  <td class="text-center">{{$data->amount}}</td>
                  
                  
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