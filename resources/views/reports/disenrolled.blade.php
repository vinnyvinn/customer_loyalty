@extends('layouts.app')

@section('content')
  <div class="container">
    <div class="panel panel-default">
      <div class="panel-heading">
        Disenrolled users
        <a href="{{route('home')}}" class="btn btn-danger btn-sm pull-right spaced"><i class="fa fa-arrow-circle-left"></i> Back</a>
      </div>
      <div class="panel-body">
        <table class='table table-striped table-hover table-condensed datatable'>
          <thead>
            <tr>
              <th>No.</th>
              <th>Name</th>
              <th>Email address</th>
              <th>Points lost</th>
              <th>Date disenrolled</th>
            </tr>
          </thead>
          <tbody>
            @foreach ($disenrolled as $key => $disenroll)
              <tr>
                <td>{{$key+1}}</td>
                <td>{{$disenroll->customer->firstname}} {{$disenroll->customer->lastname}}</td>
                <td>{{$disenroll->customer->email}}</td>
                <td>{{$disenroll->points}}</td>
                <td>{{\Carbon\Carbon::parse($disenroll->created_at)->format('M jS Y, g:ia')}}</td>
              </tr>
            @endforeach
          </tbody>
          <tfoot>
            <tr>
              <th>No.</th>
              <th>Name</th>
              <th>Email address</th>
              <th>Points lost</th>
              <th>Date disenrolled</th>
            </tr>
          </tfoot>
        </table>
      </div>
    </div>
  </div>
@endsection
