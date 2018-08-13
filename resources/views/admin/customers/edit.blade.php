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
              <a href="#" class="">Edit</a>
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
                      <i class="fa fa-pencil"> </i> Edit
                    </div>
                  </div>
                  <div class="widget-body">
                    <div class="row">
                      <div class="col-sm-6 col-sm-offset-1">
                    
                        <form method="post" action="{{ route('customers.update' , ['id'=> $customer->customer_id]) }}" enctype="multipart/form-data">

                            {{ csrf_field() }}
                            {{ method_field('PUT') }}

                            <div class="form-group">
                              <label for="name">Name</label>
                              <input type="text" class="form-control" name="name" value="{{ $customer->name }}" placeholder="Detailer Name" required>
                            </div>
                            <div class="form-group">
                              <label for="email">Email</label>
                              <input type="email" class="form-control" name="email" value="{{ $customer->email }}" placeholder="Detailer Email" required>
                            </div>
                            <div class="form-group">
                              <label>Phone Number</label>
                              <input type="text" class="form-control" name="ph_no" value="{{ $customer->phone_number }}" placeholder="Phone Number" required>
                            </div>
<!--                             <div class="form-group">
                              <label>Done Date</label>
                              <input type="date" class="form-control" name="done_date" value="{{ $customer->done_date }}" placeholder="Subscription" required>
                            </div> -->
                            <div class="form-group">
                              <label>License Plate No</label>
                              <input type="text" class="form-control" name="license_no" value="{{ $customer->license_plate_no }}" placeholder="Subscription" required>
                            </div>
                            <div class="form-group">
                              <label>Model</label>
                              <input type="text" class="form-control" name="model" value="{{ $customer->model }}" placeholder="Subscription" required>
                            </div>
                            <div class="form-group">
                              <label>Year</label>
                              <input type="text" class="form-control" name="year" value="{{ $customer->year}}" placeholder="Subscription" required>
                            </div>
                            <div class="form-group">
                              <label>Color</label>
                              <input type="text" class="form-control" name="color" value="{{ $customer->color }}" placeholder="Subscription" required>
                            </div>
                            <div class="form-group">
                              <label>Title</label>
                              <input type="text" class="form-control" name="title" value="{{ $customer->title }}" placeholder="Subscription" required>
                            </div>
                            <div class="form-group">
                              <label>Eidition</label>
                              <input type="text" class="form-control" name="edition" value="{{ $customer->edition }}" placeholder="Subscription" required>
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

