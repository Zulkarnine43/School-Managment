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
          <h1>Manage Teacher Monthly Salary</h1>
        </div>
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="{{ route('home') }}">Home</a></li>
            <li class="breadcrumb-item active">Monthly Salary</li>
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
            <h3 class="card-title">Select Date</h3>
          </div>
          <div class="card-body">
            <div class="form-row">
              <div class="form-group col-md-4">
                <label class="control-label">Date</label>
                <input type="text" name="date" id="date" class="form-control form-control-sm singledatepicker" autocomplete="off" placeholder="Date" readonly>
              </div>
              <div class="form-group col-md-2">
                <a  class="btn btn-sm btn-success" id="search" style="margin-top: 29px; color: white">Search</a>
              </div>
            </div>
          </div>
          <div class="card-body">
            <div id="DocumentResults"></div>
              <script id="document-template" type="text/x-handlebars-template">
                <table class="table-sm table-bordered table-striped " style="width: 100%" >
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
  </section>
</div> 

<script type="text/javascript">
  $(document).on('click','#search',function(){
    var date = $('#date').val();
    $('.notifyjs-corner').html('');

    if(date ==''){
      $.notify("Date required", {globalPosition: 'top right',className: 'error'});
      return false;
    }
    $.ajax({
      url: "{{route('employees.monthly.salary.get')}}",
      type: "get",
      data: {'date': date},
      beforeSend: function() {
      },
      success: function (data) {
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