@extends('layouts.backend.app')

@section('title','Salary Increment Details')

@push('css')

@endpush

@section('content')

<div class="content-wrapper">
  <section class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1>Manage Salary Increment Details</h1>
        </div>
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="{{ route('home') }}">Home</a></li>
            <li class="breadcrumb-item active">Salary Increment Details</li>
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
            <h3 class="card-title">Salary Increment Details</h3>
            <a href="{{ route('employees.salary.view') }}" class="btn btn-success float-right btn-sm"><i class="fa fa-list"> View Salary</i></a>
          </div>
          <div class="card-body">
            <strong>Employee Name: </strong> {{ $details->name }}, <strong>Employee ID: </strong> {{ $details->id_no }}
            <table class="table table-bordered table-striped table-hover">
              <thead>
              <tr>
                <th>SL</th>
                <th>Previous Salary</th>
                <th>Increment Salary</th>
                <th>Present Salary</th>
                <th>Effected Date</th>
              </tr>
              </thead>
              <tbody>
              @foreach($salaryLogs as $key=>$value)
                <tr class="{{$value->id}}">
                @if($key == "0")
                  <td class="text-center" colspan="5"><strong>Joining Salary : </strong> {{ $value->previous_salary }} Tk</td>
                @else
                  <td>{{ $key + 1 }}</td>
                  <td>{{ $value->previous_salary }} Tk</td>
                  <td>{{ $value->increment_salary }} Tk</td>
                  <td>{{ $value->present_salary }} Tk</td>
                  <td>{{ date('Y-m-d',strtotime($value->effected_date)) }}</td>
                @endif
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