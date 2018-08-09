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
                        <form method="post" action="{{ route('gallery.update',['id' => $gallary->id]) }}" enctype="multipart/form-data">

          {{ csrf_field() }}
          {{ method_field('PUT') }}
          <div class="form-group">
            <label for="name">Title</label>
            <input type="text" class="form-control" name="title" value="{{ $gallary->title }}" placeholder="Title" required>
          </div>

          <?php $update_img = explode("|",$gallary->image) ?>

          <div class="form-group">
            <label for="userfile">Upload images </label>
            <div class="col-md-12" style="">

            <?php if (empty($update_img[0])): ?>

            <div class="col-md-2 col-sm-6 col-xs-6">
                <label for="1st_img" class="">
                    <img src="{{ asset('img/add.png') }}" id="first_img" width="100" height="100">
                </label>
                <input id="1st_img" name="newfile[]" type="file" class="1st_img hidden">
            </div>

        <?php else: ?>  

            <div class="col-md-2 col-sm-6 col-xs-6">
                <label for="1st_img" class="">
                    <img src="{{ asset($update_img[0]) }}" id="first_img" width="100" height="100">
                </label>
                <input id="1st_img" name="img[]" type="file" class="1st_img hidden">

                <input type="hidden" value="{{ $update_img[0] }}" name="hidden_img[]">
            </div>

        <?php endif ?>

        <?php if (empty($update_img[1])): ?>
            
            <div class="col-md-2 col-sm-6 col-xs-6">
                <label for="2nd_img" class="">
                    <img src="{{ asset('img/add.png') }}" id="sec_img" width="100" height="100">
                </label>
                <input id="2nd_img" name="newfile[]" type="file" class="2nd_img hidden">
            </div>

        <?php else: ?>          

            <div class="col-md-2 col-sm-6 col-xs-6">
                <label for="2nd_img" class="">
                <img src="{{ asset($update_img[1]) }}" id="sec_img" width="100" height="100">
                </label>
                <input id="2nd_img" name="img[]" type="file" class="2nd_img hidden">

                <input type="hidden" name="hidden_img[]" value="{{ $update_img[1] }}">
            </div>

        <?php endif ?>

        <?php if (empty($update_img[2])): ?>
            
            <div class="col-md-2 col-sm-6 col-xs-6">
                <label for="3rd_img" class="">
                    <img src="{{ asset('img/add.png') }}" id="thr_img" width="100" height="100">
                </label>
                <input id="3rd_img" name="newfile[]" type="file" class="3rd_img hidden">

            </div>

        <?php else: ?>
        
            <div class="col-md-2 col-sm-6 col-xs-6">
                <label for="3rd_img" class="">
                    <img src="{{ asset($update_img[2]) }}" id="thr_img" width="100" height="100">
                </label>
                <input id="3rd_img" name="img[]" type="file" class="3rd_img hidden">
                <input type="hidden" name="hidden_img[]" value="{{ $update_img[2] }}">
            </div>      

        <?php endif ?>

        <?php if (empty($update_img[3])): ?>
            
            <div class="col-md-2 col-sm-6 col-xs-6">
                <label for="4th_img" class="">
                    <img src="{{ asset('img/add.png') }}" id="fourth_img" width="100" height="100">
                </label>
                <input id="4th_img" name="newfile[]" type="file" class="4th_img hidden">
            </div>

        <?php else: ?>  

            <div class="col-md-2 col-sm-6 col-xs-6">
                <label for="4th_img" class="">
                    <img src="{{ asset($update_img[3]) }}" id="fourth_img" width="100" height="100">
                </label>
                <input id="4th_img" name="img[]" type="file" class="4th_img hidden">
                <input type="hidden" name="hidden_img[]" value="{{ $update_img[3] }}">
            </div>

        <?php endif ?>

        <?php if (empty($update_img[4])): ?>
            
            <div class="col-md-2 col-sm-6 col-xs-6">
                  <label for="5th_img" class="">
                    <img src="{{ asset('img/add.png') }}" id="five_img" width="100" height="100">
                  </label>
                  <input id="5th_img" name="newfile[]" type="file" class="5th_img visible" style="display: none;">
                </div>

        <?php else: ?>  

            <div class="col-md-2 col-sm-6 col-xs-6">
                <label for="5th_img" class="">
                    <img src="{{ asset($update_img[4]) }}" id="five_img" width="100" height="100">
                </label>
                <input id="5th_img" name="img[]" type="file" class="5th_img hidden">
                <input type="hidden" name="hidden_img[]" value="{{ $update_img[4] }}">
            </div>

        <?php endif ?>

       

            </div>
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

