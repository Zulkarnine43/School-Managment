@extends('layouts.backend.app')

@section('title','Manage Users')

@push('css')

@endpush

@section('content')

<div class="content-wrapper">
  <section class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1>Manage Users</h1>
        </div>
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="{{ route('home') }}">Home</a></li>
            <li class="breadcrumb-item active">Manage Users</li>
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
            <h3 class="card-title">Student Mark</h3>
           
          </div>
          <div class="card-body">
            <table id="example1" class="table table-bordered table-striped">
              <thead>
              <tr>
                <th>SL</th>
                <th>Subject Name</th>
                <th>Mark</th>
                <th>Grate Latter</th>
                <th>Point</th>
              
               
               
              </tr>
              </thead>
              @php
                   $allMarks = App\Model\StudentMarks::where('student_id', Auth::id())->get();
              @endphp
              <tbody>
                @php
                  $total_marks = 0;
                  $total_point = 0;
                @endphp
                @foreach($allMarks as $key => $mark )
                @php
                  $get_mark = $mark->marks;
                  $total_marks = (float)$total_marks+(float)$get_mark;
                  $total_subject = App\Model\StudentMarks::where('year_id',$mark->year_id)->where('class_id',$mark->class_id)->where('exam_type_id',$mark->exam_type_id)->where('student_id',$mark->student_id)->get()->count();
                @endphp
                <tr>
                  <td class="text-center">{{$key+1}}</td>
                  <td class="text-center">{{$mark['assign_subject']['subject']['name']}}</td>
                
                  <td class="text-center">{{$get_mark}}</td>
                  @php
                    $grade_marks = App\Model\MarksGrade::where([['start_marks','<=',(int)$get_mark],['end_marks','>=',(int)$get_mark]])->first();
                    $grade_name = $grade_marks->grade_name;
                    $grade_point = number_format((float)$grade_marks->grade_point,2);
                    $total_point = (float)$total_point+(float)$grade_point;
                  @endphp
                  <td class="text-center">{{$grade_name}}</td>
                  <td class="text-center">{{$grade_point}}</td>
                </tr>
                
                @endforeach
                @php
                $total_grade = 0;
                $point_for_letter_grade = (float)$total_point/(float)$total_subject;
                $total_grade = App\Model\MarksGrade::where([['start_point','<=',$point_for_letter_grade],['end_point','>=',$point_for_letter_grade]])->first();
                
                $grade_point_avg = (float)$total_point/(float)$total_subject;
                @endphp
                <tr>
                  <td colspan="3"><strong style="padding-left: 30px;">Total Marks</strong></td>
                  <td colspan="3" style="padding-left: 37px;"><strong>{{$total_marks}}</strong></td>
                </tr>
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