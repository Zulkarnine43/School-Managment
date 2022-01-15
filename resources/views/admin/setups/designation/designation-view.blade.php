@extends('layouts.backend.app')

@section('title','Designation')

@push('css')

@endpush

@section('content')

<div class="content-wrapper">
  <section class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1>Manage Designation</h1>
        </div>
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="{{ route('home') }}">Home</a></li>
            <li class="breadcrumb-item active">Manage Designation</li>
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
            <h3 class="card-title">Manage Designation</h3>
            <a href="{{ route('setups.employee.designation.add') }}" class="btn btn-success float-right btn-sm"><i class="fa fa-plus-circle"> Add Designation</i></a>
          </div>
          <div class="card-body">
            <table id="example1" class="table table-bordered table-striped">
              <thead>
              <tr>
                <th>SL</th>
                <th>Name</th>
                <th>Status</th>
                <th>Action</th>
              </tr>
              </thead>
              <tbody>
              @foreach($designations as $key=>$designation)
                <tr class="{{$designation->id}}">
                  <td>{{ $key + 1 }}</td>
                  <td>{{ $designation->name }}</td>
                  <td>
                  	@if($designation->status == 1)
                        <span class="badge bg-blue">Active</span>
                    @else
                        <span class="badge bg-pink">Deactive</span>
                    @endif
                  </td>
                  <td>
                  	<a href="{{ route('setups.employee.designation.edit',$designation->id) }}" class="btn btn-info btn-sm" title="Edit"><i class="fa fa-edit"></i></a>     
                  	<a id="delete" href="{{ route('setups.employee.designation.delete') }}" data-token="{{csrf_token()}}" data-id="{{$designation->id}}" class="btn btn-danger btn-sm" title="Delete"><i class="fa fa-trash"></i></a>                      
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