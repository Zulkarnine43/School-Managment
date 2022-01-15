@extends('layouts.backend.app')

@section('title','Employee Registration')

@push('css')

@endpush

@section('content')

<div class="content-wrapper">
  <section class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1>Manage Teacher Registration</h1>
        </div>
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="{{ route('home') }}">Home</a></li>
            <li class="breadcrumb-item active">Manage Teacher Registration</li>
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
            <h3 class="card-title">Manage Employee Registration</h3>
            <a href="{{ route('employees.registration.add') }}" class="btn btn-success float-right btn-sm"><i class="fa fa-plus-circle"> Add Employee Registration</i></a>
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
                <th>Status</th>
                <th>Email</th>
                @if(Auth::user()->role == "admin")
                  <th>Code</th>
                @endif
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
                    @if($value->status == 1)
                        <span class="badge bg-blue">Active</span>
                    @else
                        <span class="badge bg-pink">Deactive</span>
                    @endif
                  </td>
                  <td>{{ $value->email }}</td>
                  @if(Auth::user()->role == "admin")
                    <td>{{ $value->code }}</td>
                  @endif
                  <td>
                    <a href="{{ route('employees.registration.edit',$value->id) }}" class="btn btn-info btn-sm" title="Edit"><i class="fa fa-edit"></i></a>     
                    <a href="{{ route('employees.registration.details',$value->id) }}" class="btn btn-success btn-sm" title="Details" target="_blank"><i class="fa fa-eye"></i></a>                      
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