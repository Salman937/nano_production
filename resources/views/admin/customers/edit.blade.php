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
                    
                        <form method="post" action="{{ route('detailer.update' , ['id'=> $edit->detailer_id]) }}" enctype="multipart/form-data">

                            {{ csrf_field() }}

                            <div class="form-group">
                              <label for="name">Name</label>
                              <input type="text" class="form-control" name="name" value="{{ $edit->name }}" placeholder="Detailer Name" required>
                            </div>
                            <div class="form-group">
                              <label for="email">Email</label>
                              <input type="email" class="form-control" name="email" value="{{ $edit->email }}" placeholder="Detailer Email" required>
                            </div>
                            <div class="form-group">
                              <label>Phone Number</label>
                              <input type="text" class="form-control" name="ph_no" value="{{ $edit->phone_number }}" placeholder="Phone Number" required>
                            </div>
                            <div class="form-group">
                              <label>Detailer Subrciption</label>
                              <input type="number" class="form-control" name="subscription" value="{{ $edit->detailer_subscriptions }}" placeholder="Subscription" required>
                            </div>
                            <div class="form-group">
                              <label>Image</label>
                              <input type="file" name="file">
                            </div>

                            <div class="form-group">
                              <label for="">Search</label>
                              <input type="text" class="input form-control" id="address" name="address" />
                            </div>

                            <div id="map-view" class="is-vcentered" style="width: 100%; height:400px;"></div>

                            <input type="hidden" name="lat" id="lat">
                            <input type="hidden" name="log" id="lon">
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

<script>

 $('#map-view').locationpicker({

   location: {latitude: <?php echo $edit->latitude ?> , longitude: <?php echo $edit->longitude ?> },
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

