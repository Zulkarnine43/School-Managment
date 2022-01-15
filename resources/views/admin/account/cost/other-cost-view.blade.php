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
          <h1>Manage Others Cost</h1>
        </div>
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="{{ route('home') }}">Home</a></li>
            <li class="breadcrumb-item active">Others Cost</li>
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
            <h3 class="card-title">Others Cost List</h3>
            <a href="{{ route('accounts.cost.add') }}" class="btn btn-success float-right btn-sm"><i class="fa fa-plus-circle"> Add Others Cost</i></a>
          </div>
          <div class="card-body">
            <table id="example1" class="table table-bordered table-striped">
              <thead>
                <tr>
                  <th>SL </th>
                  <th>Date</th>
                  <th>Amount</th>
                  <th>Description</th>
                  <th>Image</th>
                  <th>Action</th>
                </tr>
              </thead>
              <tbody>
                @foreach ($allData as $key => $data)
                <tr class="{{$data->id}}">
                  <td>{{$key+1}}</td>
                  <td>{{date('d-m-Y',strtotime($data->date))}}</td>
                  <td>{{$data->amount}}</td>
                  <td>{{$data->description}}</td>
                  <td>
                    <img src="{{(!empty($data->image))?url('public/upload/cost_images/'.$data->image):url('public/assets/backend/upload/default.png')}}" width="90px" height="60px">
                  </td>
                  <td>
                    <a href="{{ route('accounts.cost.edit',$data->id) }}" class="btn btn-info btn-sm" title="Edit"><i class="fa fa-edit"></i></a>
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