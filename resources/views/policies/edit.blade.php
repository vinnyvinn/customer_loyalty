@extends('layouts.app')

@section('content')

<div class="container">


<div class="panel panel-default">
  <div class="panel-heading">
    <h4 class="panel-title">Edit policy</h4>
  </div>
  <div class="panel-body">
    <div class="row">
      <div class="col-md-12">
        <form action="{{route('policies.update', $policy->id)}}" method="post">
          <div class="col-md-6">

          <div class="form-group">
            <label for="title">Policy title:</label>
              <input type="text" name="title" value="{{$policy->title}}" placeholder="Enter title of policy" class="form-control" required readonly>
          </div>
          {{ csrf_field() }}
          {{ method_field('patch') }}
          <div class="form-group">
            <label for="description">Description:</label>
            <textarea name="description" placeholder="Description of policy" class="form-control" required readonly>{{$policy->description}}</textarea>
          </div>
        </div>

        <div class="col-md-6">

          <div class="form-group">
            <label for="amount">Amount:</label>
              <input type="number" min="0" name="amount" value="{{$policy->amount}}" placeholder="Enter amount" class="form-control" required>
          </div>

          <div class="form-group">
            <label for="points">Points:</label>
              <input type="number" min="0" name="points" value="{{$policy->points}}" placeholder="Enter the points" class="form-control" required>
          </div>

        </div>

          <div class="col-md-12">
              <button type="submit" class="btn btn-success pull-right spaced">Update</button>
              <a href="{{route('policies.index')}}" class="btn btn-danger pull-right spaced">Back</a>
          </div>

        </form>
      </div>
    </div>
  </div>

</div>


@endsection
