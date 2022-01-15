@extends('layouts.backend.app')

@section('title','Manage Profile')

@push('css')

@endpush

@section('content')

<div class="content-wrapper">
  <section class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1>Manage Profile</h1>
        </div>
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="{{ route('home') }}">Home</a></li>
            <li class="breadcrumb-item active">Manage Profile</li>
          </ol>
        </div>
      </div>
    </div>
  </section>

  <section class="content">
    <div class="row">
      <div class="col-4 offset-md-4">
          <div class="card card-primary card-outline">
            <div class="card-body box-profile">
              <div class="text-center">
                <img class="profile-user-img img-fluid img-circle"
                    src="{{(!empty($user->image))?url('public/assets/backend/upload/users/'.$user->image):url('public/assets/backend/upload/default.png')}}"
                    alt="User profile picture">
              </div>
              <h3 class="profile-username text-center">{{ $user->name }}</h3>
              <p class="text-muted text-center">{{ $user->address }}</p>
              <table width="100%" class="table table-bordered">
                <tbody>
                  <tr>
                    <td>Mobile No:</td>
                    <td>{{ $user->mobile }}</td>
                  </tr>
                  <tr>
                    <td>Email Address:</td>
                    <td>{{ $user->email }}</td>
                  </tr>
                  <tr>
                    <td>Gender:</td>
                    <td>{{ $user->gender }}</td>
                  </tr>
                </tbody>
              </table>
              <a href="{{ route('profiles.edit') }}" class="btn btn-primary btn-block"><b>Update Profile</b></a>
            </div>
          </div>
      </div>
    </div>
  </section>
</div>  

@endsection

@push('js')

@endpush