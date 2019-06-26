@extends('layouts.app')

@section('content')

  <div class="container">
    <div class="panel panel-default">
      {{-- <policy></policy> --}}
      <div class="panel-heading">
        Policies
        {{-- <a href="{{route('policies.create')}}" class="btn btn-success btn-sm pull-right"><i class="fa fa-plus"></i> Add Policy</a> --}}
      </div>
      <div class="panel-body">
        <table class='table table-striped table-hover table-condensed'>
          <thead>
            <tr>
              <th>No.</th>
              <th>Title</th>
              <th>Amount</th>
              <th>Points</th>
              <th>Description</th>
              <th>Action</th>
            </tr>
          </thead>
          <tbody>
            @foreach ($policies as $index => $policy)
              <tr>
                <td>{{$index+1}}</td>
                <td>{{strtoupper($policy->title)}}</td>
                <td class="text-center">{{number_format($policy->amount, 2)}}</td>
                <td class="text-center">{{number_format($policy->points)}}</td>
                <td>{{$policy->description}}</td>
                <td>
                  <a href="{{route('policies.edit', $policy->id)}}" class="btn btn-success btn-xs"><i class="fa fa-pencil"></i> Change</a>
                </td>
              </tr>
            @endforeach
          </tbody>
        </table>
      </div>
    </div>
  </div>

@endsection
