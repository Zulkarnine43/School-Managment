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
          <h1>Manage Employee Salary</h1>
        </div>
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="{{ route('home') }}">Home</a></li>
            <li class="breadcrumb-item active">Employee Salary</li>
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
            <h3 class="card-title">Employee Salary List</h3>
            <a href="{{ route('accounts.salary.add') }}" class="btn btn-success float-right btn-sm"><i class="fa fa-plus-circle"> Add/Edit Employee Salary</i></a>
          </div>
          <div class="card-body">
            <table id="example1" class="table table-bordered table-striped">
              <thead>
                <tr>
                  <th>SL </th>
                  <th>ID No</th>
                  <th>Name</th>
                  <th>Amount</th>
                  <th>Date</th>
                </tr>
              </thead>
              <tbody>
                @foreach ($allData as $key => $data)
                <tr class="{{$data->id}}">
                  <td>{{$key+1}}</td>
                  <td>{{$data['user']['id_no']}}</td>
                  <td>{{$data['user']['name']}}</td>
                  <td>{{$data->amount}} TK</td>
                  <td>{{date('M Y',strtotime($data->date))}}</td>
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