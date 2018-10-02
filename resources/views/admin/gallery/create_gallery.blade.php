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
              <a href="#" class="">Create Gallery</a>
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
                      <i class="fa fa-picture-o"></i> Create Image Gallery
                    </div>
                  </div>
                    <form method="post" action="{{ route('images.upload') }}" enctype="multipart/form-data">

                        {{ csrf_field() }}
                        <br><br>
                        <div class="form-group col-sm-offset-5">
                          <label for="userfile">Browse Images</label>
                          <input type="file" name="file[]" multiple>
                          <input type="hidden" name="hidden_file" value="{{ $id }}">
                        </div>

                        <br>
                      <button type="submit" class="btn btn-primary col-sm-offset-5">Save changes</button>
                      <br><br>
                    </form>

                     <?php 

                        $arr = explode("|", $images->gallery_images);
                     ?>


              <div class="row">
                @if(count($arr) > 0)

                 <?php foreach ($arr as $value): ?>
                   
                    <div class="col-sm-3" style="margin-left: 3em;height: 250px">
                      <a href="#" class="thumbnail">
                        <img src="{{ $value }}">
                      </a>
                    </div>

                 <?php endforeach ?>

                @endif 
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

