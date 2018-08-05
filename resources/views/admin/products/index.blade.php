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
                      <i class="fa fa-gift"></i> Products
                    </div>
                  </div>
                  <div class="widget-body">
                    <div id="dt_example" class="example_alt_pagination">
                      <table class="table table-condensed table-striped table-hover table-bordered pull-left" id="data-table">

                        <a href="" title="add new detailer" class="btn btn-primary" data-toggle="modal" data-target="#myModal">
                          <i class="fa fa-plus-circle"></i> Add New Product 
                        </a>

                        <thead>
                          <tr>
                            <th style="width:17%">
                              Title
                            <th style="width:20%">
                              Edition
                            </th>
                            <th style="width:16%" class="hidden-phone">
                              Features
                            </th>
                            <th style="width:16%" class="hidden-phone">
                              Image
                            </th>
                            <th style="width:16%" class="hidden-phone">
                              Technical Data
                            </th>
                            <th style="width:16%" class="hidden-phone">
                              Information
                            </th>
                            <th style="width:16%" class="hidden-phone">
                              Use
                            </th>
                            <th style="width:16%" class="hidden-phone">
                              Safety
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

                        @foreach($products as $product)

                        <tr>
                          <td>{{ $product->title }}</td>
                          <td>{{ $product->edition }}</td>
                          <td>{{ $product->features }}</td>
                          <td><img src="{{ asset($product->image) }}" width="20%"></td>
                          <td>{{ $product->technical_data }}</td>
                          <td>{{ $product->information }}</td>
                          <td>{{ $product->use }}</td>
                          <td>{{ $product->safety }}</td>
                          <td>
                            <a href="{{ route('products.edit',['id' => $product->id]) }}" class="btn btn-info btn-xs">
                              <i class="fa fa-pencil"></i>
                            </a>
                          </td>
                          <td>
                            <form action="{{ route('products.destroy',['id' => $product->id]) }}" method="post" accept-charset="utf-8">
                            
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
        <h4 class="modal-title" id="myModalLabel">Add New Product</h4>
      </div>
      <div class="modal-body">
        <form method="post" action="{{ route('products.store') }}" enctype="multipart/form-data">

          {{ csrf_field() }}

          <div class="form-group">
            <label for="name">Title</label>
            <input type="text" class="form-control" name="title" placeholder="Name" required>
          </div>
          <div class="form-group">
            <label for="name">Edition</label>
            <input type="text" class="form-control" name="edition" placeholder="Edition" required>
          </div>
          <div class="form-group">
            <label for="name">Features</label>
            <textarea name="feature" class="form-control" rows="2" placeholder="Add Features" required></textarea>
            <p class="help-block">please separate features with comma ","</p>
          </div>
          <div class="form-group">
            <label for="name">Technical Data</label>
            <textarea name="technical_data" class="form-control" rows="2" placeholder="Enter Technical Data" required></textarea>
            <p class="help-block">please separate Techincal Data with comma ","</p>
          </div>
          <div class="form-group">
            <label for="name">Information</label>
            <textarea name="info" class="form-control" rows="2" placeholder="Enter Information" required></textarea>
          </div>
          <div class="form-group">
            <label for="name">Use</label>
            <textarea name="use" class="form-control" rows="2" placeholder="Enter use Information" required></textarea>

          </div>
          <div class="form-group">
            <label for="name">Safety</label>
            <textarea class="form-control" rows="3" name="safety" placeholder="Enter Safety Details" required=""></textarea>
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

