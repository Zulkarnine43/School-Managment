@extends('layouts.backend.app')

@section('title','Schools')

@push('css')

@endpush

@section('content')

<div class="content-wrapper">
  <section class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1>Manage Schools</h1>
        </div>
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="{{ route('home') }}">Home</a></li>
            <li class="breadcrumb-item active">Manage Schools</li>
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
            <h3 class="card-title">Manage Schools</h3>
            <a href="{{ route('settings.school.add') }}" class="btn btn-success float-right btn-sm"><i class="fa fa-plus-circle"> Add School</i></a>
          </div>
          <div class="card-body">
            <table id="example1" class="table table-bordered table-striped">
              <thead>
              <tr>
                <th>SL</th>
                <th>Name</th>
                <th>Address</th>
                <th>Mobile</th>
                <th>Email</th>
                <th>Website</th>
                <th>Image</th>
                <th>Status</th>
                <th>Actions</th>
              </tr>
              </thead>
              <tbody>
              @foreach($schools as $key=>$school)
                <tr class="{{$school->id}}">
                  <td>{{ $key + 1 }}</td>
                  <td>{{ $school->name }}</td>
                  <td>{{ $school->address }}</td>
                  <td>{{ $school->mobile }}</td>
                  <td>{{ $school->email }}</td>
                  <td>{{ $school->website }}</td>
                  <td>
                    <img src="{{(!empty($school->image))?url('assets/backend/upload/schools/'.$school->image):url('assets/backend/upload/default.png')}}" style="width: 60px; height: 60px;">
                  </td>
                  <td>
                    @if($school->status == 1)
                        <span class="badge bg-blue">Active</span>
                    @else
                        <span class="badge bg-pink">Deactive</span>
                    @endif
                  </td>
                  <td>
                    <a href="{{ route('settings.school.edit',$school->id) }}" class="btn btn-info btn-sm" title="Edit"><i class="fa fa-edit"></i></a>     
                    <a id="delete" href="{{ route('settings.school.delete') }}" data-token="{{csrf_token()}}" data-id="{{$school->id}}" class="btn btn-danger btn-sm" title="Delete"><i class="fa fa-trash"></i></a>                      
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