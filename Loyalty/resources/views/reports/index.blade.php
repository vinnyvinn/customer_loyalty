@extends('layouts.app')

@section('content')
  <div class="container">
    <div class="panel panel-default">
      <div class="panel-heading">
        Loyalty points holders
        <a href="{{route('print-highest')}}" class="btn btn-success btn-sm pull-right spaced"><i class="fa fa-print"></i> Print</a>
        <a href="{{route('home')}}" class="btn btn-danger btn-sm pull-right spaced"><i class="fa fa-arrow-circle-left"></i> Back</a>
      </div>
      <div class="panel-body">
        <table class='table table-hover table-condensed datatable'>
          <thead>
            <tr>
              <th>No.</th>
              <th>Name</th>
              <th>Address</th>
              <th class="text-center">Loyalty points</th>
              <th class="text-center">Date registered</th>
            </tr>
          </thead>
          <tbody>
            @foreach ($loyaltypoints as $index => $loyaltypoint)
              <tr>
                <td>{{$index+1}}.</td>
                <td class="capitalize">{{$loyaltypoint->customers->firstname}} {{$loyaltypoint->customers->lastname}}</td>
                <td class="capitalize">{{$loyaltypoint->customers->address}}</td>
                <td class="text-center">{{$loyaltypoint->points}}</td>
                <td class="text-center">{{\Carbon\Carbon::parse($loyaltypoint->created_at)->toDayDateTimeString()}}</td>
              </tr>
            @endforeach
          </tbody>
          <tfoot>
            <tr>
              <th>No.</th>
              <th>Name</th>
              <th>Address</th>
              <th class="text-center">Loyalty points</th>
              <th class="text-center">Date registered</th>
            </tr>
          </tfoot>
        </table>
      </div>
    </div>
  </div>
@endsection
