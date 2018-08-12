@extends('layouts.template')

@section('content')

<style type="text/css" media="screen">
  .pac-container { z-index: 100000 !important; }
</style>

    <!-- Main Container start -->
    <div class="dashboard-container">

      <div class="container">

        @include('includes.header')

        <!-- Sub Nav End -->
        <div class="sub-nav hidden-sm hidden-xs">
          <ul>
            <li><a href="#" class="heading">Home</a></li>
            <li class="hidden-sm hidden-xs">
              <a href="#" class="">Customers</a>
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
                      <i class="fa fa-users"> </i> Customers
                    </div>
                  </div>
                  <div class="widget-body">
                    <div id="dt_example" class="example_alt_pagination">
                      <table class="table table-condensed table-striped table-hover table-bordered pull-left" id="data-table">
                        <br>
                        <thead>
                          <tr>
                            <th style="width:17%">
                              Customer Name
                            <th style="width:20%">
                              Detailer Name
                            </th>
                            <th style="width:20%">
                              Detailer Phone Number
                            </th>
                            <th style="width:16%">
                              Warranty Code
                            </th>
                            <th style="width:16%">
                              Appication Done date
                            </th>
                            <th style="width:16%">
                              License Plate No
                            </th>
                            <th style="width:16%">
                              Model
                            </th>
                            <th style="width:16%" class="hidden-phone">
                              Color
                            </th>
                            <th style="width:16%">
                              Actions
                            </th>
                          </tr>
                        </thead>
                        <tbody>

                        @foreach($customers as $customer)  

                          @foreach($detailers as $detailer)

                          <tr class="gradeX warning">
                            <td>
                              {{ $customer->name }}
                            </td>
                            <td>
                              {{ $detailer->name }}
                            </td>
                            <td>
                              {{ $detailer->phone_number }}
                            </td>
                            <td>
                              {{ $customer->warranty_code }}
                            </td>
                            <td>
                              {{ $customer->done_date }}
                            </td>
                            <td>
                              {{ $customer->license_plate_no }}
                            </td>
                            <td>
                              {{ $customer->model }}
                            </td>
                            <td>
                              {{ $customer->color }}
                            </td>
                            <td>
                              <!-- <a href="" class="btn btn-info btn-xs update">
                                <i class="fa fa-pencil"></i>
                              </a> -->

                               <form action="{{ route('customers.destroy',['id' => $customer->customer_id]) }}"" method="post" accept-charset="utf-8">
                                
                                  {{ csrf_field() }}
                                  {{ method_field('DELETE') }}

                                    <button type="submit" class="btn btn-danger btn-xs">
                                      <i class="fa fa-minus-circle"></i>
                                    </button>

                                </form>
                            </td>
                          </tr>

                        @endforeach  

                        @endforeach  

                        </tbody>
                      </table>
                      <div class="clearfix">
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

<!-- Modal -->
<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="myModalLabel">Add New Detailer</h4>
      </div>
      <div class="modal-body">
        <form method="post" action="{{ route('create') }}" enctype="multipart/form-data">

          {{ csrf_field() }}

          <div class="form-group">
            <label for="name">Name</label>
            <input type="text" class="form-control" name="name" placeholder="Detailer Name" required>
          </div>
          <div class="form-group">
            <label for="email">Email</label>
            <input type="email" class="form-control" name="email" placeholder="Detailer Email" required>
          </div>
          <div class="form-group">
            <label>Phone Number</label>
            <input type="text" class="form-control" name="ph_no" placeholder="Phone Number" required>
          </div>
          <div class="form-group">
            <label>Detailer Subrciption</label>
            <input type="number" class="form-control" name="subscription" placeholder="Subscription" required>
          </div>
          <div class="form-group">
            <label>Password</label>
            <input type="password" class="form-control" name="pass" placeholder="Password" required>
          </div>
          <div class="form-group">
            <label>Image</label>
            <input type="file" name="file" required>
          </div>

          <div class="form-group">
            <label for="">Search</label>
            <input type="text" class="input form-control" id="address" name="address" />
          </div>

          <div id="map-view" class="is-vcentered" style="width: 100%; height:400px;"></div>

          <input type="hidden" name="lat" id="lat">
          <input type="hidden" name="log" id="lon">
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-primary">Save changes</button>
      </div>
      </form>
    </div>
  </div>
</div>

<script>

 $('#map-view').locationpicker({

   location: {latitude: 25.7276167, longitude: -80.24209209999998},
   enableAutocomplete: true,
   radius:0,
   onchanged: function (currentLocation, radius, isMarkerDropped) {
       var addressComponents = $(this).locationpicker('map').location.addressComponents;
       // updateControls(addressComponents);
   },
   oninitialized: function(component) {
       var addressComponents = $(component).locationpicker('map').location.addressComponents;
       // updateControls(addressComponents);
   },
   inputBinding: {
       latitudeInput: $('#lat'),
       longitudeInput: $('#lon'),
       locationNameInput: $('#address')
   },

 });

</script>

@stop    

