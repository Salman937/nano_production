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
                      <i class="fa fa-file-text-o"></i> News Feed
                    </div>
                  </div>
                  <div class="widget-body">
                    <div id="dt_example" class="example_alt_pagination">
                      <table class="table table-condensed table-striped table-hover table-bordered pull-left" id="myTable">

                        <a href="" title="add new detailer" class="btn btn-primary" data-toggle="modal" data-target="#myModal">
                          <i class="fa fa-plus-circle"></i> Add News Feed 
                        </a>

                        <thead>
                          <tr>
                            <th style="width:17%">
                              Name
                            <th style="width:20%">
                              Content
                            </th>
                            <th style="width:16%" class="hidden-phone">
                              Image
                            </th>
                            <th style="width:16%" class="hidden-phone">
                              Created at
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

                        @foreach($newsfeeds as $newsfeed)

                        <tr>
                          <td>{{ $newsfeed->name }}</td>
                          <td>{{ $newsfeed->content }}</td>
                          <td><img src="{{ asset($newsfeed->image) }}" width="20%"></td>
                          <td>{{ $newsfeed->created_at }}</td>
                          <td>
                            <a href="{{ route('newsfeed.edit',['id' => $newsfeed->id]) }}" class="btn btn-info btn-xs">
                              <i class="fa fa-pencil"></i>
                            </a>
                          </td>
                          <td>
                            <form action="{{ route('newsfeed.destroy',['id' => $newsfeed->id]) }}" method="post" accept-charset="utf-8">
                            
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
        <h4 class="modal-title" id="myModalLabel">Add News Feed</h4>
      </div>
      <div class="modal-body">
        <form method="post" action="{{ route('newsfeed.store') }}" enctype="multipart/form-data">

          {{ csrf_field() }}

          <div class="form-group">
            <label for="name">Name</label>
            <input type="text" class="form-control" name="name" placeholder="Name" required>
          </div>
          <div class="form-group">
            <label for="name">Content</label>
            <textarea class="form-control" rows="3" name="content" placeholder="Content" required=""></textarea>
          </div>
          <div class="form-group">
            <label>Image</label>
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

