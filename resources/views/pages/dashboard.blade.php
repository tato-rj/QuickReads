@extends('app')

@section('content')

  <div class="content-wrapper">
    <div class="container-fluid">
      @component('components/breadcrumb')
        Dashboard
        @slot('description')QuickReads Admin page 
        @endslot
      @endcomponent
      <!-- Icon Cards-->
      <div class="row">
        <div class="col-xl-3 col-sm-6 mb-3">
          <div class="card text-white bg-primary o-hidden h-100">
            <div class="card-body">
              <div class="card-body-icon">
                <i class="fa fa-fw fa-book"></i>
              </div>
              <div class="mr-5">{{$stories_count}} Stories</div>
            </div>
            <a class="card-footer text-white clearfix small z-1" target="_blank" href="/app/stories">
              <span class="float-left">View Details</span>
              <span class="float-right">
                <i class="fa fa-angle-right"></i>
              </span>
            </a>
          </div>
        </div>
        <div class="col-xl-3 col-sm-6 mb-3">
          <div class="card text-white bg-primary o-hidden h-100">
            <div class="card-body">
              <div class="card-body-icon">
                <i class="fa fa-fw fa-vcard"></i>
              </div>
              <div class="mr-5">{{$authors_count}} Authors</div>
            </div>
            <a class="card-footer text-white clearfix small z-1" target="_blank" href="/app/authors">
              <span class="float-left">View Details</span>
              <span class="float-right">
                <i class="fa fa-angle-right"></i>
              </span>
            </a>
          </div>
        </div>
        <div class="col-xl-3 col-sm-6 mb-3">
          <div class="card text-white bg-primary o-hidden h-100">
            <div class="card-body">
              <div class="card-body-icon">
                <i class="fa fa-fw fa-list"></i>
              </div>
              <div class="mr-5">{{$categories_count}} Categories</div>
            </div>
            <a class="card-footer text-white clearfix small z-1" target="_blank" href="/app/categories">
              <span class="float-left">View Details</span>
              <span class="float-right">
                <i class="fa fa-angle-right"></i>
              </span>
            </a>
          </div>
        </div>
        <div class="col-xl-3 col-sm-6 mb-3">
          <div class="card text-white bg-primary o-hidden h-100">
            <div class="card-body">
              <div class="card-body-icon">
                <i class="fa fa-fw fa-users"></i>
              </div>
              <div class="mr-5">78 Users</div>
            </div>
            <a class="card-footer text-white clearfix small z-1" target="_blank" href="#">
              <span class="float-left">View Details</span>
              <span class="float-right">
                <i class="fa fa-angle-right"></i>
              </span>
            </a>
          </div>
        </div>
      </div>

    </div>
@endsection