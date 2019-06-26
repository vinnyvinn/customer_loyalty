@extends('layouts.app')

@section('content')
<div class="container">
  <div class="panel panel-default">
    <div class="panel-heading">
      <i class="fa fa-dashboard"></i> Dashboard
    </div>
    <div class="panel-body">

      <div class="col-md-3 col-xs-6">
        <div class="panel panel-primary">
          <div class="panel-heading">
            <div class="row">
              <div class="col-xs-3">
                <i class="fa fa-users fa-5x"></i>
              </div>
              <div class="col-xs-9 text-right">
                <div class="huge">
                  {{$loyaltypoints->count()}}
                </div>
                <div>
                  Loyalty Customers
                </div>
              </div>
            </div>
          </div>
            <a href="{{route('highest-point-holders')}}">
              <div class="panel-footer">
                <div class="pull-left">
                  <strong>View details</strong>
                </div>
                <div class="pull-right">
                  <i class="fa fa-arrow-circle-right"></i>
                </div>
              </div>
            </a>
            <div class="clearfix">
            </div>
        </div>
      </div>

      <div class="col-md-3 col-xs-6">
        <div class="panel panel-green">
          <div class="panel-heading">
            <div class="row">
              <div class="col-xs-3">
                <i class="fa fa-sign-in fa-5x"></i>
              </div>
              <div class="col-xs-9 text-right">
                <div class="huge">
                  {{$accumulation->count()}}
                </div>
                <div>
                  Points accumulation
                </div>
              </div>
            </div>
          </div>
            <a href="{{route('accumulated-points')}}">
              <div class="panel-footer">
                <div class="pull-left">
                  <strong>View details</strong>
                </div>
                <div class="pull-right">
                  <i class="fa fa-arrow-circle-right"></i>
                </div>
              </div>
            </a>
            <div class="clearfix">
            </div>
        </div>
      </div>

      <div class="col-md-3 col-xs-6">
        <div class="panel panel-yellow">
          <div class="panel-heading">
            <div class="row">
              <div class="col-xs-3">
                <i class="fa fa-sign-out fa-5x"></i>
              </div>
              <div class="col-xs-9 text-right">
                <div class="huge">
                  {{$redeem->count()}}
                </div>
                <div>
                  Points redeemed
                </div>
              </div>
            </div>
          </div>
            <a href="{{route('points-redeemed')}}">
              <div class="panel-footer">
                <div class="pull-left">
                  <strong>View details</strong>
                </div>
                <div class="pull-right">
                  <i class="fa fa-arrow-circle-right"></i>
                </div>
              </div>
            </a>
            <div class="clearfix">
            </div>
        </div>
      </div>

      <div class="col-md-3 col-xs-6">
        <div class="panel panel-red">
          <div class="panel-heading">
            <div class="row">
              <div class="col-xs-3">
                <i class="fa fa-user-times fa-5x"></i>
              </div>
              <div class="col-xs-9 text-right">
                <div class="huge">
                  {{$disenroll->count()}}
                </div>
                <div>
                  Users disenrolling
                </div>
              </div>
            </div>
          </div>
            <a href="{{route('disenrolled')}}">
              <div class="panel-footer">
                <div class="pull-left">
                  <strong>View details</strong>
                </div>
                <div class="pull-right">
                  <i class="fa fa-arrow-circle-right"></i>
                </div>
              </div>
            </a>
            <div class="clearfix">
            </div>
        </div>
      </div>



    </div>
  </div>
</div>
@endsection
