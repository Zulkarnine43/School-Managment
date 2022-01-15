@extends('layouts.backend.app')

@section('title','Assign Subject')

@push('css')

@endpush

@section('content')

<div class="content-wrapper">
  <section class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1>Assign Subject Details</h1>
        </div>
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="{{ route('home') }}">Home</a></li>
            <li class="breadcrumb-item active">Assign Subject Details</li>
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
            <h3 class="card-title">Assign Subject Details</h3>
            <a href="{{ route('setups.assign.subject.view') }}" class="btn btn-success float-right btn-sm"><i class="fa fa-list"> View Assign Subject</i></a>
          </div>
          <div class="card-body">
            <h4><strong>Class :</strong>{{ $assignSubjects[0]->student_class->name }}</h4>
            <table class="table table-bordered table-striped">
              <thead>
              <tr>
                <th>SL</th>
                <th>Subject</th>
                <th>Full Mark</th>
                <th>Pass Mark</th>
                <th>Subjective Mark</th>
              </tr>
              </thead>
              <tbody>
              @foreach($assignSubjects as $key=>$assignSubject)
                <tr>
                  <td>{{ $key + 1 }}</td>
                  <td>{{ $assignSubject->subject->name }}</td>
                  <td>{{ $assignSubject->full_mark }}</td>
                  <td>{{ $assignSubject->pass_mark }}</td>
                  <td>{{ $assignSubject->subjective_mark }}</td>
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