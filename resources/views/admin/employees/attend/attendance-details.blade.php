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
          <h1>Manage Employee Attendance</h1>
        </div>
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="{{ route('home') }}">Home</a></li>
            <li class="breadcrumb-item active">Attendance</li>
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
            <h3 class="card-title">Employee Attendance Details</h3>
            <a href="{{ route('employees.attendance.view') }}" class="btn btn-success float-right btn-sm"><i class="fa fa-list"> Employee Attendance List</i></a>
          </div>
          <div class="card-body">
            <table id="example1" class="table table-bordered table-striped">
              <thead>
              <tr>
                <th>SL</th>
                <th>ID No</th>
                <th>Name</th>
                <th>Date</th>
                <th>Attend Status</th>
              </tr>
              </thead>
              <tbody>
              @foreach($details as $key=> $value)
                <tr class="{{$value->id}}">
                  <td>{{ $key + 1 }}</td>
                  <td>{{ $value['user']['id_no'] }}</td>
                  <td>{{ $value['user']['name'] }}</td>
                  <td>{{ date('d-m-Y',strtotime($value->date)) }}</td>
                  <td>{{ $value->attend_status }}</td>
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