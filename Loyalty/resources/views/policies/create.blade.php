@extends('layouts.app')

@section('content')

<div class="container">


<div class="panel panel-default">
  <div class="panel-heading">
    <h4 class="panel-title">Add policy</h4>
  </div>
  <div class="panel-body">
    <div class="row">
      <div class="col-md-12">
        <form action="{{route('policies.store')}}" method="post">

          <div class="form-group col-md-6">
            <label for="title">Policy title:</label>
              <input type="text" name="title" value="{{old('title')}}" placeholder="Enter title of policy" class="form-control" required>
          </div>
          {{ csrf_field() }}
          <div class="form-group col-md-6">
            <label for="amount">Amount:</label>
              <input type="number" min="0" name="amount" value="{{old('amount')}}" placeholder="Enter amount" class="form-control" required>
          </div>

          <div class="form-group col-md-6">
            <label for="points">Points:</label>
              <input type="number" min="0" name="points" value="{{old('points')}}" placeholder="Enter the points" class="form-control" required>
          </div>

          <div class="form-group col-md-6">
            <label for="description">Description:</label>
            <textarea name="description" placeholder="Description of policy" class="form-control" required>
              {{old('description')}}
            </textarea>
          </div>

          <div class="col-md-12">
              <button type="submit" class="btn btn-success pull-right spaced">Save</button>
              <a href="{{route('policies.index')}}" class="btn btn-danger pull-right spaced">Back</a>
          </div>

        </form>
      </div>
    </div>
  </div>

</div>


@endsection
