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
              <a href="index2.html" class="">Products</a>
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
                      <i class="fa fa-users"> </i> Products
                    </div>
                  </div>
                  <div class="widget-body">
                    <div class="row">
                      <div class="col-sm-6 col-sm-offset-1">
                        <form method="post" action="{{ route('products.update',['id' => $product->id]) }}" enctype="multipart/form-data">

          {{ csrf_field() }}
          {{ method_field('PUT') }}

          <div class="form-group">
            <label for="name">Title</label>
            <input type="text" class="form-control" name="title" placeholder="Name" value="{{ $product->title }}" required>
          </div>
          <div class="form-group">
            <label for="name">Edition</label>
            <input type="text" class="form-control" name="edition" placeholder="Edition" value="{{ $product->edition }}" required>
          </div>
          <div class="form-group">
            <label for="name">Features</label>
            <textarea name="feature" class="form-control" rows="2" placeholder="Add Features" required>{{ $product->features }}</textarea>
            <p class="help-block">please separate features with comma ","</p>
          </div>
          <div class="form-group">
            <label for="name">Technical Data</label>
            <textarea name="technical_data" class="form-control" rows="2" placeholder="Enter Technical Data" required>{{ $product->technical_data }}</textarea>
            <p class="help-block">please separate Techincal Data with comma ","</p>
          </div>
          <div class="form-group">
            <label for="name">Information</label>
            <textarea name="info" class="form-control" rows="2" placeholder="Enter Information" required>{{ $product->information }}</textarea>
          </div>
          <div class="form-group">
            <label for="name">Use</label>
            <textarea name="use" class="form-control" rows="2" placeholder="Enter use Information" required>{{ $product->use }}</textarea>

          </div>
          <div class="form-group">
            <label for="name">Safety</label>
            <textarea class="form-control" rows="3" name="safety" placeholder="Enter Safety Details" required="">{{ $product->safety }}</textarea>
          </div>
          <input type="hidden" name="hidden_file" value="{{ $product->image }}">
          <div class="form-group">
            <label>Image</label>
            <input type="file" name="file">
          </div>
      
          <button type="submit" class="btn btn-primary pull-right">Save changes</button>
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

