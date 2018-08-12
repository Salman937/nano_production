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
                      <i class="fa fa-picture-o"></i> Create Gallery
                    </div>
                  </div>
                  <div class="widget-body">
                    <div id="dt_example" class="example_alt_pagination">
                      <table class="table table-condensed table-striped table-hover table-bordered pull-left" id="data-table">

                        <a href="" title="add new detailer" class="btn btn-primary" data-toggle="modal" data-target="#myModal">
                          <i class="fa fa-plus-circle"></i> Create New Gallery 
                        </a>

                        <thead>
                          <tr>
                            <th style="width:17%">
                              Title
                            <th style="width:20%">
                              Image
                            </th>
                            <th style="width:16%" class="hidden-phone">
                              created_at
                            </th>
                            <th>
                              Add Images to Gallery
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
                            <a href="{{ route('gallery.show',['id' => $gallery->id]) }}" class="btn-link">
                              <i class="fa fa-picture-o" aria-hidden="true"></i>
                            </a>  
                          </td>
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
        <h4 class="modal-title" id="myModalLabel">Create New Gallery</h4>
      </div>
      <div class="modal-body">
        <form method="post" action="{{ route('gallery.store') }}" enctype="multipart/form-data">

          {{ csrf_field() }}

          <div class="form-group">
            <input type="text" class="form-control" name="title" placeholder="Title" required>
          </div>

          <div class="form-group">
            <label for="userfile">Featured Image</label>
            <input type="file" name="file" required>
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


@stop    

