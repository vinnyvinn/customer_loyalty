@extends('layouts.app')

@section('content')
  <div class="container">
    <div class="panel panel-default">
      <div class="panel-heading">
        Redeemed points
        <a href="{{route('redeem')}}" class="btn btn-success btn-sm pull-right spaced"><i class="fa fa-print"></i> Print</a>
        <a href="{{route('home')}}" class="btn btn-danger btn-sm pull-right spaced"><i class="fa fa-arrow-circle-left"></i> Back</a>
      </div>
      <div class="panel-body">
        <table class='table table-hover table-striped datatable'>
          <thead>
            <tr>
              <th>No.</th>
              <th>Name</th>
              <th>Address</th>
              <th class="text-center">User points</th>
              <th class="text-center">Points redeemed</th>
              <th>Dates</th>
            </tr>
          </thead>
          <tbody>
            @foreach ($redeemed as $index => $redeem)
              <tr>
                <td>{{$index+1}}</td>
                <td class="capitalize">{{$redeem->customer->firstname}} {{$redeem->customer->lastname}}</td>
                <td class="capitalize">{{$redeem->customer->address}}</td>
                <td class="text-center">{{$redeem->customer->loyalty_points ? $redeem->customer->loyalty_points->points : "Not enrolled"}}</td>
                <td class="text-center">{{$redeem->points}}</td>
                <td>{{\Carbon\Carbon::parse($redeem->created_at)->toDayDateTimeString()}}</td>
              </tr>
            @endforeach
          </tbody>
          <tfoot>
            <tr>
              <th>No.</th>
              <th>Name</th>
              <th>Address</th>
              <th class="text-center">User points</th>
              <th class="text-center">Points redeemed</th>
              <th>Dates</th>
            </tr>
          </tfoot>
        </table>
      </div>
    </div>
  </div>
@endsection
