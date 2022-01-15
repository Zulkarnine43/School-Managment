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
            <h3 class="card-title">Employee Attendance List</h3>
            <a href="{{ route('employees.attendance.add') }}" class="btn btn-success float-right btn-sm"><i class="fa fa-plus-circle"> Add Employee Attendance</i></a>
          </div>
          <div class="card-body">
            <table id="example1" class="table table-bordered table-striped">
              <thead>
              <tr>
                <th>SL</th>
                <th>Date</th>
                <th>Action</th>
              </tr>
              </thead>
              <tbody>
              @foreach($allData as $key=> $value)
                <tr class="{{$value->id}}">
                  <td>{{ $key + 1 }}</td>
                  <td>{{ date('d-m-Y',strtotime($value->date)) }}</td>
                  <td>
                    <a href="{{ route('employees.attendance.edit',$value->date) }}" class="btn btn-info btn-sm" title="Edit"><i class="fa fa-edit"></i></a>
                    <a href="{{ route('employees.attendance.details',$value->date) }}" class="btn btn-success btn-sm" title="Details"><i class="fa fa-eye"></i></a>
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