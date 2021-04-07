@extends('admin::layouts.master')

@section('main')
  <main class="main">
    <!-- Breadcrumb-->
    <ol class="breadcrumb">
      <li class="breadcrumb-item">  <a href="{{ route('admin.dashboard.home') }}">{{ __('admin::lang.home') }} </a></li>
      <li class="breadcrumb-item"> <a href="{{ route('admin.doctors.index') }}">{{ __('admin::lang.doctors') }}</a></li>
      <li class="breadcrumb-item  active">{{ __('admin::lang.show') }}</li>
    </ol>
    <div class="container-fluid">
      <div class="animated fadeIn">
        <div class="card">
          <div class="card-header">
            <i class="fa fa-align-justify"></i> {{ __('admin::lang.show') }}
          </div>
          <div class="card-body">
            <ul class="list-group">
              <li class="list-group-item">
                <div class="row">
                  <div class="col-12 col-md-2"><strong>{{ __('admin::lang.id') }}</strong></div>
                  <div class="col-12 col-md-10">{{ $doctor->doctors_id }}</div>
                </div>
              </li>
              <li class="list-group-item">
                <div class="row">
                  <div class="col-12 col-md-2"><strong>{{ __('admin::lang.name') }}</strong></div>
                  <div class="col-12 col-md-10">{{ $doctor->doctors_name }}</div>
                </div>
              </li>
              <li class="list-group-item">
                <div class="row">
                  <div class="col-12 col-md-2"><strong>{{ __('admin::lang.phone') }}</strong></div>
                  <div class="col-12 col-md-10">{{ $doctor->doctors_phone }}</div>
                </div>
              </li>
              <li class="list-group-item">
                <div class="row">
                  <div class="col-12 col-md-2"><strong>{{ __('admin::lang.email') }}</strong></div>
                  <div class="col-12 col-md-10">{{ $doctor->doctors_email }}</div>
                </div>
              </li>
              <li class="list-group-item">
                <div class="row">
                  <div class="col-12 col-md-2"><strong>{{ __('admin::lang.civil_no') }}</strong></div>
                  <div class="col-12 col-md-10">{{ $doctor->doctors_civil_no }}</div>
                </div>
              </li>
              <li class="list-group-item">
                <div class="row">
                  <div class="col-12 col-md-2"><strong>{{ __('admin::lang.country') }}</strong></div>
                  <div class="col-12 col-md-10">
                    {{ $doctor->country ? $doctor->country->countries_title : '' }} 
                  </div>
                </div>
              </li>
              <li class="list-group-item">
                <div class="row">
                  <div class="col-12 col-md-2"><strong>{{ __('admin::lang.hospital') }}</strong></div>
                  <div class="col-12 col-md-10">
                    {{ $doctor->hospital ? $doctor->hospital->hospitals_title : '' }} 
                  </div>
                </div>
              </li>
              <li class="list-group-item">
                <div class="row">
                  <div class="col-12 col-md-2"><strong>{{ __('admin::lang.department') }}</strong></div>
                  <div class="col-12 col-md-10">
                    {{ $doctor->department ? $doctor->department->departments_title : '' }} 
                  </div>
                </div>
              </li>
              <li class="list-group-item">
                <div class="row">
                  <div class="col-12 col-md-2"><strong>{{ __('admin::lang.specialty') }}</strong></div>
                  <div class="col-12 col-md-10">
                    {{ $doctor->specialty ? $doctor->specialty->specialties_title : '' }} 
                  </div>
                </div>
              </li>
              <li class="list-group-item">
                <div class="row">
                  <div class="col-12 col-md-2"><strong>{{ __('admin::lang.status') }}</strong></div>
                  <div class="col-12 col-md-10">{{ __('admin::lang.'. $doctor->doctors_status) }}</div>
                </div>
              </li>
            </ul>
          </div>
          <div class="card-footer">
            @can('view doctors')
              <a href="{{ route('admin.doctors.index') }}" class="btn btn-sm btn-secondary">
                <i class="fa fa-arrow-left"></i>
              </a>
            @endcan
            @can('update doctors')
              <a href="{{ route('admin.doctors.edit', $doctor->doctors_id) }}" class="btn btn-sm btn-warning">
                <i class="fa fa-edit"></i>
              </a>
            @endcan
          </div>
        </div>
      </div>
    </div>
  </main>
@endsection
