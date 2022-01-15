@extends('layouts.backend.app')

@section('title','Monthly Fee')

@push('css')

@endpush

@section('content')

<div class="content-wrapper">
  <section class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1>Manage Monthly Fee</h1>
        </div>
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="{{ route('home') }}">Home</a></li>
            <li class="breadcrumb-item active">Manage Monthly Fee</li>
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
          <div class="card-body">            
            <div class="form-row">                   
              <div class="form-group col-md-3">
                <label for="year_id">Select Year</label>
                <select name="year_id" id="year_id" class="form-control select2bs4">
                  <option value="">Select Year</option>
                  @foreach($years as $year)
                      <option value="{{ $year->id }}">{{ $year->name }}</option>
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
                      <option value="{{ $class->id }}">{{ $class->name }}</option>
                  @endforeach
                </select>
                <font style="color: red"> 
                  {{($errors->has('class_id'))?($errors->first('class_id')):''}} 
                </font>                 
              </div>
              <div class="form-group col-md-3">
                <label for="month">Select Month</label>
                <select name="month" id="month" class="form-control select2bs4">
                  <option selected value="">Select Month</option>
                      <option value="January">January</option>
                      <option value="February">February</option>
                      <option value="March">March</option>
                      <option value="April">April</option>
                      <option value="May">May</option>
                      <option value="June">June</option>
                      <option value="July">July</option>
                      <option value="August">August</option>
                      <option value="September">September</option>
                      <option value="October">October</option>
                      <option value="November">November</option>
                      <option value="December">December</option>
                </select>
                <font style="color: red"> 
                  {{($errors->has('month'))?($errors->first('month')):''}} 
                </font>                 
              </div>
              <div class="form-group col-md-3" style="margin-top: 30px;">
                <a id="search" class="btn btn-primary" name="search">Search</a>            
              </div>
            </div>            
          </div>
          <div class="card-body">
            <div id="DocumentResults"></div> 
              <script id="document-template" type="text/x-handlebars-template">
                <table class="table table-bordered table-striped">
                  <thead>
                    <tr>
                      @{{{thsource}}}
                    </tr>
                  </thead>
                  <tbody>
                    @{{#each this}}
                    <tr>
                      @{{{tdsource}}}
                    </tr>
                    @{{/each}}
                  </tbody>
                </table>
              </script>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>
</div>  

<script type="text/javascript">
  //Registration Fee
  $(document).on('click','#search',function(){
    var year_id = $('#year_id').val();
    var class_id = $('#class_id').val();
    var month = $('#month').val();
    $('.notifyjs-corner').html('');
    if(year_id == ''){
      $.notify("Year is required!", {globalPosition: 'top right',className: 'error'});
      return false;
    }
    if(class_id == ''){
      $.notify("Class is required!", {globalPosition: 'top right',className: 'error'});
      return false;
    }
    if(month == ''){
      $.notify("Month is required!", {globalPosition: 'top right',className: 'error'});
      return false;
    }
    $.ajax({
      url: "{{route('students.monthly.get.student')}}",
      type: "GET",
      data: {'year_id': year_id,'class_id':class_id,'month':month},
      beforeSend: function(){

      },
      success: function(data){
        var source = $("#document-template").html();
        var template = Handlebars.compile(source);
        var html = template(data);
        $('#DocumentResults').html(html);
        $('[data-toggle="tooltip"]').tooltip();
      }
    });
  });
</script>

@endsection

@push('js')

@endpush