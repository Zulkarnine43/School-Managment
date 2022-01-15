@extends('layouts.backend.app')

@section('title','Employee Salary')

@push('css')

@endpush

@section('content')

<div class="content-wrapper">
  <section class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1>Manage Teacher Salary</h1>
        </div>
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="{{ route('home') }}">Home</a></li>
            <li class="breadcrumb-item active">Manage Teacher Salary</li>
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
            <h3 class="card-title">Manage Teacher Salary</h3>
          </div>
          <div class="card-body">
            <table id="example1" class="table table-bordered table-striped">
              <thead>
              <tr>
                <th>SL</th>
                <th>ID No</th>
                <th>Name</th>
                <th>Mobile No</th>                
                <th>Gender</th>
                <th>Join Date</th>
                <th>Salary</th>
                <th>Action</th>
              </tr>
              </thead>
              <tbody>
              @foreach($allData as $key=>$value)
                <tr class="{{$value->id}}">
                  <td>{{ $key + 1 }}</td>
                  <td>{{ $value->id_no }}</td>
                  <td>{{ $value->name }}</td>
                  <td>{{ $value->mobile }}</td>                  
                  <td>{{ $value->gender }}</td>
                  <td>{{ date('d-m-Y',strtotime($value->join_date)) }}</td>
                  <td>{{ $value->salary }}</td>
                  <td>
                    <a href="{{ route('employees.salary.increment',$value->id) }}" class="btn btn-info btn-sm" title="Edit"><i class="fa fa-plus-circle"></i></a>     
                    <a href="{{ route('employees.salary.details',$value->id) }}" class="btn btn-success btn-sm" title="Salary View"><i class="fa fa-eye"></i></a>                      
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