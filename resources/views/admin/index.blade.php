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
            <!-- <li class="hidden-sm hidden-xs">
              <a href="index2.html" class="">Dashboard V1</a>
            </li>
            <li class="hidden-sm hidden-xs">
              <a href="index-2.html" class="selected">Dashboard V2</a>
            </li> -->
          </ul>
        </div>
        <!-- Sub Nav End -->

        <!-- Dashboard Wrapper Start -->
        <div class="dashboard-wrapper-lg">
          
          <!-- Row starts -->
          <div class="row">
            <div class="col-lg-3 col-md-3 col-sm-6">
              <div class="mini-widget">
                <div class="mini-widget-heading clearfix">
                  <div class="pull-left">Total Users</div>
                </div>
                <div class="mini-widget-body clearfix">
                  <div class="pull-left">
                    <i class="fa fa-users"></i>
                  </div>
                  <div class="pull-right number">{{ $users }}</div>
                </div>
                <div class="mini-widget-footer center-align-text">
                  <!-- <span>Better than last week</span> -->
                </div>
              </div>
            </div>
            <div class="col-lg-3 col-md-3 col-sm-6">
              <div class="mini-widget">
                <div class="mini-widget-heading clearfix">
                  <div class="pull-left">Detailers</div>
                </div>
                <div class="mini-widget-body clearfix">
                  <div class="pull-left">
                    <i class="fa fa-user"></i>
                  </div>
                  <div class="pull-right number">{{ $detailers }}</div>
                </div>
                <div class="mini-widget-footer center-align-text">
                  <!-- <span>Better than last week</span> -->
                </div>
              </div>
            </div>
            <div class="col-lg-3 col-md-3 col-sm-6">
              <div class="mini-widget">
                <div class="mini-widget-heading clearfix">
                  <div class="pull-left">Customers</div>
                </div>
                <div class="mini-widget-body clearfix">
                  <div class="pull-left">
                    <i class="fa fa-male"></i>
                  </div>
                  <div class="pull-right number">{{ $customers }}</div>
                </div>
                <div class="mini-widget-footer center-align-text">
                  <!-- <span>Better than last week</span> -->
                </div>
              </div>
            </div>
            <div class="col-lg-3 col-md-3 col-sm-6">
              <div class="mini-widget mini-widget-grey">
                <div class="mini-widget-heading clearfix">
                  <div class="pull-left">Subscriptions</div>
                </div>
                <div class="mini-widget-body clearfix">
                  <div class="pull-left">
                    <i class="fa fa-bookmark"></i>
                  </div>
                  <div class="pull-right number">{{ $subscription }}</div>
                </div>
                <div class="mini-widget-footer center-align-text">
                  <!-- <span>Better than last week</span> -->
                </div>
              </div>
            </div>
          </div>
          <!-- Row ends -->


          <!-- Row starts -->
          <div class="row">
            <div class="col-lg-3 col-md-3 col-sm-6">
              <div class="mini-widget mini-widget-grey">
                <div class="mini-widget-heading clearfix">
                  <div class="pull-left">Products</div>
                </div>
                <div class="mini-widget-body clearfix">
                  <div class="pull-left">
                    <i class="fa fa-gift"></i>
                  </div>
                  <div class="pull-right number">{{ $products }}</div>
                </div>
                <div class="mini-widget-footer center-align-text">
                  <!-- <span>Better than last week</span> -->
                </div>
              </div>
            </div>
            <div class="col-lg-3 col-md-3 col-sm-6">
              <div class="mini-widget">
                <div class="mini-widget-heading clearfix">
                  <div class="pull-left">News Feed</div>
                </div>
                <div class="mini-widget-body clearfix">
                  <div class="pull-left">
                    <i class="fa fa-user"></i>
                  </div>
                  <div class="pull-right number">{{ $news_feed }}</div>
                </div>
                <div class="mini-widget-footer center-align-text">
                  <!-- <span>Better than last week</span> -->
                </div>
              </div>
            </div>
          </div>
          <!-- Row ends -->

        </div>
        <!-- Dashboard Wrapper End -->

       @include('includes.footer')

      </div>
    </div>
    <!-- Main Container end -->

@stop    