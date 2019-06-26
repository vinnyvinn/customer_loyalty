@extends('layouts.app')

@section('content')
  <div class="container">
    <div class="panel panel-default">
      <div class="panel-heading">
        Accumulated points
        <a href="/reports/print-accumulated" class="btn btn-success btn-sm pull-right spaced"> <i class="fa fa-print"></i> Print</a>
        <a href="/home" class="btn btn-danger btn-sm pull-right spaced"> <i class="fa fa-arrow-circle-left"></i> Back</a>
      </div>
      <div class="panel-body">
        <table class='table table-striped table-hover table-condensed datatable'>
          <thead>
            <tr>
              <th>No.</th>
              <th>Name</th>
              <th>Address</th>
              <th class="text-center">Customer points</th>
              <th class="text-center">Points added</th>
              <th class="text-center">Date added</th>
            </tr>
          </thead>
          <tbody>
            @foreach ($accumulated as $index => $accumulate)
              <tr>
                <td>{{$index+1}}</td>
                <td class="capitalize">{{$accumulate->customer->firstname}} {{$accumulate->customer->lastname}}</td>
                <td class="capitalize">{{$accumulate->customer->address}}</td>
                <td class="text-center">{{$accumulate->customer->loyalty_points ? $accumulate->customer->loyalty_points->points : 'Not Enrolled'}}</td>
                <td class="text-center">{{$accumulate->points}}</td>
                <td class="text-center">{{\Carbon\Carbon::parse($accumulate->created_at)->toDayDateTimeString()}}</td>

              </tr>
            @endforeach
          </tbody>
          <tfoot>
            <tr>
              <th>No.</th>
              <th>Name</th>
              <th>Address</th>
              <th class="text-center">Customer points</th>
              <th class="text-center">Points added</th>
              <th class="text-center">Date added</th>
            </tr>
          </tfoot>
        </table>
      </div>
    </div>
  </div>
@endsection
