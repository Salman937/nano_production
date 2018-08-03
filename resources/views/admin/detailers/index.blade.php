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
              <a href="index2.html" class="">Detailers</a>
            </li>
          </ul>
        </div>
        <!-- Sub Nav End -->

        <!-- Dashboard Wrapper Start -->
        <div class="dashboard-wrapper-lg">
          
          <!-- Row Start -->

            <div class="row">
              <div class="col-lg-12 col-md-12">
                <div class="widget">
                  <div class="widget-header">
                    <div class="title">
                      <i class="fa fa-users"> </i> Detailers
                    </div>
                  </div>
                  <div class="widget-body">
                    <div id="dt_example" class="example_alt_pagination">
                      <table class="table table-condensed table-striped table-hover table-bordered pull-left" id="data-table">

                        <a href="" title="add new detailer" class="btn btn-primary">
                          <i class="fa fa-plus-circle"></i> Add New Detailer
                        </a>

                        <thead>
                          <tr>
                            <th style="width:17%">
                              Name
                            <th style="width:20%">
                              Email
                            </th>
                            <th style="width:16%">
                              Phone Number
                            </th>
                            <th style="width:16%" class="hidden-phone">
                              created_at
                            </th>
                            <th style="width:16%">
                              Actions
                            </th>
                          </tr>
                        </thead>
                        <tbody>

                        @foreach($detailers as $detailer)  

                          <tr class="gradeX warning">
                            <td>
                              {{ $detailer->name }}
                            </td>
                            <td>
                              {{ $detailer->email }}
                            </td>
                            <td>
                              {{ $detailer->phone_number }}
                            </td>
                            <td class="hidden-phone">
                              {{ $detailer->updated_at }}
                            </td>
                            <td>
                              <a href="" class="btn btn-info btn-xs">
                                <i class="fa fa-pencil"></i> Edit
                              </a>
                              <a href="" class="btn btn-danger btn-xs">
                                <i class="fa fa-delete"></i> Delete
                              </a>
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

@stop    