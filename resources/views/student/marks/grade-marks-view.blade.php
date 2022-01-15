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
          <h1>Manage Grade Point</h1>
        </div>
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="{{ route('home') }}">Home</a></li>
            <li class="breadcrumb-item active">Grade Point</li>
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
            <h3 class="card-title">Grade Point List</h3>
            <a href="{{ route('marks.grade.add') }}" class="btn btn-success float-right btn-sm"><i class="fa fa-plus-circle"> Add Grade Point</i></a>
          </div>
          <div class="card-body">
            <table id="example1" class="table table-bordered table-striped">
              <thead>
              <tr>
                <th>SL</th>
                <th>Grade Name</th>
                <th>Grade Point</th>
                <th>Start Marks</th>
                <th>End Marks</th>
                <th>Point Range</th>
                <th>Remarks</th>
                <th>Action</th>
              </tr>
              </thead>
              <tbody>
              @foreach($allData as $key=> $value)
                <tr class="{{$value->id}}">
                  <td>{{ $key + 1 }}</td>
                  <td>{{ $value->grade_name }}</td>
                  <td>{{ number_format((float)$value->grade_point,2) }}</td>
                  <td>{{ $value->start_marks }}</td>
                  <td>{{ $value->end_marks }}</td>
                  <td>
                    {{ number_format((float)$value->grade_point,2) }} - {{ ($value->grade_point == 5)?(number_format((float)$value->grade_point,2)):(number_format((float)$value->grade_point+1,2) - (float)0.01)}}
                  </td>
                  <td>{{ $value->remarks }}</td>
                  <td>
                    <a href="{{ route('marks.grade.edit',$value->id) }}" class="btn btn-info btn-sm" title="Edit"><i class="fa fa-edit"></i></a>
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