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
              <a href="#" class="">Images Gallery</a>
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
                      <i class="fa fa-picture-o"></i> Images Gallery
                    </div>
                  </div>
                  <div class="widget-body">
                    <div id="dt_example" class="example_alt_pagination">
                      <table class="table table-condensed table-striped table-hover table-bordered pull-left" id="data-table">

                        <a href="" title="add new detailer" class="btn btn-primary" data-toggle="modal" data-target="#myModal">
                          <i class="fa fa-plus-circle"></i> Add Images 
                        </a>

                        <thead>
                          <tr>
                            <th style="width:17%">
                              title
                            <th style="width:20%">
                              image
                            </th>
                            <th style="width:16%" class="hidden-phone">
                              created_at
                            </th>
                            <th style="width:16%">
                              edit
                            </th>
                            <th style="width:16%">
                              Delete
                            </th>
                          </tr>
                        </thead>
                        <tbody>

                        @foreach($gallaries as $gallery)

                        <tr>
                          <td>{{ $gallery->title }}</td>
                          <td>
                            <?php 

                              $img = explode('|', $gallery->image);

                             ?>
                            <img src="{{ asset($img[0]) }}" width="20%">
                          </td>
                          <td>{{ $gallery->created_at }}</td>
                          <td>
                            <a href="{{ route('gallery.edit',['id' => $gallery->id]) }}" class="btn btn-info btn-xs">
                              <i class="fa fa-pencil"></i>
                            </a>
                          </td>
                          <td>
                            <form action="{{ route('gallery.destroy',['id' => $gallery->id]) }}" method="post" accept-charset="utf-8">
                            
                            {{ csrf_field() }}
                            {{ method_field('DELETE') }}

                              <button type="submit" class="btn btn-danger btn-xs">
                                <i class="fa fa-minus-circle"></i>
                              </button>

                            </form>
                          </td>
                        </tr>

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
        <h4 class="modal-title" id="myModalLabel">Add New Image to Gallery</h4>
      </div>
      <div class="modal-body">
        <form method="post" action="{{ route('gallery.store') }}" enctype="multipart/form-data">

          {{ csrf_field() }}

          <div class="form-group">
            <label for="name">Title</label>
            <input type="text" class="form-control" name="title" placeholder="Title" required>
          </div>

          <div class="form-group">
            <label for="userfile">Upload images </label>

            <div class="col-md-12" style="">

              <div class="col-md-2 col-sm-6 col-xs-6">
                <label for="1st_img" class="">
                  <img src="{{ asset('img/add.png') }}" id="first_img" width="100" height="100">
                </label>
                <input id="1st_img" name="file[]" type="file" class="1st_img visible" style="display: none;">
              </div>
              <div class="col-md-2 col-sm-6 col-xs-6" style="margin-left: 10px">
                <label for="2nd_img" class="">
                <img src="{{ asset('img/add.png') }}" id="sec_img" width="100" height="100">
                </label>
                <input id="2nd_img" name="file[]" type="file" class="2nd_img visible" style="display: none;">

              </div>
              <div class="col-md-2 col-sm-6 col-xs-6" style="margin-left: 10px">
                <label for="3rd_img" class="">
                <img src="{{ asset('img/add.png') }}" id="thr_img" width="100" height="100">
                </label>
                <input id="3rd_img" name="file[]" type="file" class="3rd_img visible" style="display: none;">

              </div>
              <div class="col-md-2 col-sm-6 col-xs-6" style="margin-left: 10px">
                <label for="4th_img" class="">
                  <img src="{{ asset('img/add.png') }}" id="fourth_img" width="100" height="100">
                </label>
                <input id="4th_img" name="file[]" type="file" class="4th_img visible" style="display: none;">
              </div>

              <div class="col-md-2 col-sm-6 col-xs-6" style="margin-left: 10px">
                <label for="5th_img" class="">
                  <img src="{{ asset('img/add.png') }}" id="five_img" width="100" height="100">
                </label>
                <input id="5th_img" name="file[]" type="file" class="5th_img visible" style="display: none;">
              </div>
            </div>
          </div>
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

function readURL(input) 
{

  if (input.files && input.files[0]) {
    var reader = new FileReader();

    reader.onload = function(e) {
      $('#five_img').attr('src', e.target.result);
    }

    reader.readAsDataURL(input.files[0]);
  }
}

$(".5th_img").change(function() 
{
  readURL(this);
});

function first_img(input) 
{

  if (input.files && input.files[0]) {
    var reader = new FileReader();

    reader.onload = function(e) {
      $('#first_img').attr('src', e.target.result);
    }

    reader.readAsDataURL(input.files[0]);
  }
}

$(".1st_img").change(function() 
{
  first_img(this);
});


function second_img(input) 
{

  if (input.files && input.files[0]) {
    var reader = new FileReader();

    reader.onload = function(e) {
      $('#sec_img').attr('src', e.target.result);
    }

    reader.readAsDataURL(input.files[0]);
  }
}

$(".2nd_img").change(function() 
{
  second_img(this);
});

function thr_img(input) 
{

  if (input.files && input.files[0]) {
    var reader = new FileReader();

    reader.onload = function(e) {
      $('#thr_img').attr('src', e.target.result);
    }

    reader.readAsDataURL(input.files[0]);
  }
}

$(".3rd_img").change(function() 
{
  thr_img(this);
});

function fourth_img(input) 
{

  if (input.files && input.files[0]) {
    var reader = new FileReader();

    reader.onload = function(e) {
      $('#fourth_img').attr('src', e.target.result);
    }

    reader.readAsDataURL(input.files[0]);
  }
}

$(".4th_img").change(function() 
{
  fourth_img(this);
});

</script>

@stop    

