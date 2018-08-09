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
              <a href="#" class="">News Feed</a>
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
                      <i class="fa fa-users"> </i> News Feed
                    </div>
                  </div>
                  <div class="widget-body">
                    <div class="row">
                      <div class="col-sm-6 col-sm-offset-1">
                        <form method="post" action="{{ route('newsfeed.update',['id' => $newsfeeds->id]) }}" enctype="multipart/form-data">

                            {{ csrf_field() }}
                            {{ method_field('PUT') }}

                            <div class="form-group">
                              <label for="name">Name</label>
                              <input type="text" class="form-control" name="name" value="{{ $newsfeeds->name }}" placeholder="Name" required>
                            </div>
                            <div class="form-group">
                              <label for="name">Content</label>
                              <textarea class="form-control" rows="3" name="content" placeholder="Content" required="">{{ $newsfeeds->content }}</textarea>
                            </div>
                            <input type="hidden" name="hidden_file" value="{{ $newsfeeds->image }}">
                            <div class="form-group">
                              <label>Image</label>
                              <input type="file" name="file">
                            </div>
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

