@extends('layouts.template')

@section('content')


    <!-- Main Container start -->
    <div class="dashboard-container">

      <div class="container">

        @include('includes.header')

        <!-- Sub Nav End -->
        <div class="sub-nav hidden-sm hidden-xs">
          <ul>
            <li><a href="#" class="heading">Home</a></li>
            <li class="hidden-sm hidden-xs">
              <a href="#" class="">Detailers</a>
            </li>
            <li class="hidden-sm hidden-xs">
              <a href="#" class="">Change Password</a>
            </li>
          </ul>
        </div>
        <!-- Sub Nav End -->

        <!-- Dashboard Wrapper Start -->
        <div class="dashboard-wrapper-lg">
          
          <!-- Row Start -->

            <div class="row">
              <div class="col-lg-12 col-md-12">

                @if(Session::has('success'))

                <div class="alert alert-block alert-success fade in">
                  <button data-dismiss="alert" class="close" type="button">
                    ×
                  </button>
                  <p>
                    <i class="fa fa-check-circle fa-lg"></i> {{ Session::get('success') }}
                  </p>
                </div>

                @endif

                @if(count($errors) > 0)

                  <ul class="list-group">

                    @foreach($errors->all() as $errors)

                      <li class="list-group-item-danger">{{ $errors }}</li>

                    @endforeach
                  </ul>

                @endif  

                <div class="widget">
                  <div class="widget-header">
                    <div class="title">
                      <i class="fa fa-pencil"> </i> Change Password
                    </div>
                  </div>
                  <div class="widget-body">
                    <div class="row">
                      <div class="col-sm-6 col-sm-offset-1">
                    
                        <form method="post" action="{{ route('detailer.update-password' , ['id'=> $password->id]) }}">

                            {{ csrf_field() }}

                            <div class="form-group">
                              <label for="name">Change Password</label>
                              <input type="text" class="form-control" name="change_pass" placeholder="Detailer Change Password" required>
                            </div>
                            
                            <br>

                          <button type="submit" class="btn btn-primary">Save changes</button>
                        </form>
                      </div>  
                    </div>  
                  </div>
                </div>
              </div>
            </div>

          <!-- Row Ends -->
        </div>
        <!-- Dashboard Wrapper End -->

       @include('includes.footer')

      </div>
    </div>
    <!-- Main Container end -->

@stop    

