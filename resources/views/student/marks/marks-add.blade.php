@extends('layouts.backend.app')
@section('title','Roll Generate')
@push('css')
@endpush
@section('content')

<div class="content-wrapper">
  <section class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1>Manage Marks Entry</h1>
        </div>
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="{{ route('home') }}">Home</a></li>
            <li class="breadcrumb-item active">Marks Entry</li>
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
            <h3 class="card-title">Search Criteria</h3>
          </div>
          <form method="POST" action="{{ route('marks.store') }}" id="MyForm">
          @csrf
            <div class="card-body">            
              <div class="form-row">                   
                <div class="form-group col-md-3">
                  <label for="year_id">Select Year</label>
                  <select name="year_id" id="year_id" class="form-control select2bs4">
                    <option value="">Select Year</option>
                    @foreach($years as $year)
                        <option value="{{ $year->id }}" {{(@$year_id == $year->id)?"selected":""}}>{{ $year->name }}</option>
                    @endforeach
                  </select>
                  <font style="color: red"> 
                    {{($errors->has('year_id'))?($errors->first('year_id')):''}} 
                  </font>                 
                </div>
                <div class="form-group col-md-3">
                  <label for="class_id">Select Class</label>
                  <select name="class_id" id="class_id" class="form-control select2bs4">
                    <option selected value="">Select Class</option>
                    @foreach($classes as $class)
                        <option value="{{ $class->id }}" {{(@$class_id == $class->id)?"selected":""}}>{{ $class->name }}</option>
                    @endforeach
                  </select>
                  <font style="color: red"> 
                    {{($errors->has('class_id'))?($errors->first('class_id')):''}} 
                  </font>                 
                </div>
                <div class="form-group col-md-3">
                  <label>Subject</label>
                  <select name="assign_subject_id" id="assign_subject_id" class="form-control select2bs4">
                    <option value="">Select Subject</option>
                  </select>            
                </div>
                <div class="form-group col-md-3">
                  <label>Exam Type</label>
                  <select name="exam_type_id" id="exam_type_id" class="form-control select2bs4">
                    <option value="">Select Exam Type</option>
                    @foreach($exam_types as $type)
                      <option value="{{ $type->id }}">{{ $type->name }}</option>
                    @endforeach
                  </select>           
                </div>
                <div class="form-group col-md-3">
                  <a id="search" class="btn btn-primary" name="search">Search</a>            
                </div>
              </div>            
            </div>
            <div class="card-body">
              <div class="d-none" id="marks-entry">
                <table class="table table-bordered table-striped">
                  <thead>
                    <tr>
                      <th>ID No</th>
                      <th>Student Name</th>
                      <th>Father's Name</th>
                      <th>Gender</th>
                      <th>Marks</th>
                    </tr>
                  </thead>
                  <tbody id="marks-entry-tr">
                            
                  </tbody>
                </table>
                <div class="form-group col-md-3" style="margin-top: 30px;">
                  <button type="submit" class="btn btn-success">Submit</button>         
                </div>
              </div>
            </div>
          </form>
        </div>
      </div>
    </div>
  </section>
</div>  

<script type="text/javascript">
  //Roll Generate
  $(document).on('click','#search',function(){
    var year_id = $('#year_id').val();
    var class_id = $('#class_id').val();
    var assign_subject_id = $('#assign_subject_id').val();
    var exam_type_id = $('#exam_type_id').val();
    $('.notifyjs-corner').html('');
    if(year_id == ''){
      $.notify("Year is required!", {globalPosition: 'top right',className: 'error'});
      return false;
    }
    if(class_id == ''){
      $.notify("Class is required!", {globalPosition: 'top right',className: 'error'});
      return false;
    }
    if(assign_subject_id == ''){
      $.notify("Subject is required!", {globalPosition: 'top right',className: 'error'});
      return false;
    }
    if(exam_type_id == ''){
      $.notify("Exam Type required!", {globalPosition: 'top right',className: 'error'});
      return false;
    }
    $.ajax({
      url: "{{route('get-student')}}",
      type: "GET",
      data: {'year_id': year_id,'class_id':class_id},
      success: function(data){
        $('#marks-entry').removeClass('d-none');
        var html = '';
        $.each(data, function(key, v){
          html +=
          '<tr>'+
          '<td>'+v.student.id_no+'<input type="hidden" name="student_id[]" value="'+v.student_id+'"><input type="hidden" name="id_no[]" value="'+v.student.id_no+'"></td>'+
          '<td>'+v.student.name+'</td>'+
          '<td>'+v.student.fname+'</td>'+
          '<td>'+v.student.gender+'</td>'+
          '<td><input type="text" class="form-control" name="marks[]"></td>'+
          '</tr>';
        });
        html = $('#marks-entry-tr').html(html);
      }
    });
  });
</script>

<script type="text/javascript">
    $(function(){
        $(document).on('change','#class_id',function(){
            var class_id =$('#class_id').val();
            $.ajax({
                url:"{{route('get-subject')}}",
                type:"GET",
                data:{class_id:class_id},
                success:function(data){
                    var html = '<option value="">Select Subject</option>';
                    $.each( data, function( key, v ) {
                        html +='<option value="'+v.id+'">'+v.subject.name+'</option>';
                    });
                    $('#assign_subject_id').html(html);
                }
            });
        });
    });
</script>

<script type="text/javascript">
  $(document).ready(function () {  
    $('#MyForm').validate({
      rules:{
        "marks[]":{
          required:true
        }
      },
      messages: {      
      },
      errorElement: 'span',
      errorPlacement: function (error, element) {
        error.addClass('invalid-feedback');
        element.closest('.form-group').append(error);
      },
      highlight: function (element, errorClass, validClass) {
        $(element).addClass('is-invalid');
      },
      unhighlight: function (element, errorClass, validClass) {
        $(element).removeClass('is-invalid');
      }
    });
  });
</script>
@endsection
@push('js')
@endpush