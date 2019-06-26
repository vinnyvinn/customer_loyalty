<!DOCTYPE html>
<html lang='en'>
  <head>
    <meta charset='utf-8'>
    <meta http-equiv='X-UA-Compatible' content='IE=edge'>
    <meta name='viewport' content='width=device-width, initial-scale=1'>
    <title>Accumulated points</title>

    <style media="screen">
      body {
        margin: 0;
        padding: 0;
        font-family: sans-serif;
      }
      h2 {
        text-align: center;
      }
      table {
        width: 100%;
        border: 2px solid black;
        border-collapse: collapse;
      }
      thead {
        border-bottom: 2px solid black;
      }
      tr, th, td {
        border-bottom: 1px solid gray;
      }
      td.capitalize {
        text-transform: capitalize;
      }
      td.text-center {
        text-align: center;
      }
    </style>

  </head>
  <body>
    <h2>Accumulated points stats</h2>
    <table>
      <thead>
        <tr>
          <th>No.</th>
          <th>Name</th>
          <th>Points</th>
          <th>Points added</th>
          <th>Date added</th>
        </tr>
      </thead>
      <tbody>
        @foreach ($accumulated as $index => $accumulate)
          <tr>
            <td>{{$index+1}}</td>
            <td class="capitalize">{{$accumulate->customer->firstname}} {{$accumulate->customer->lastname}}</td>
            <td>{{$accumulate->customer->loyalty_points ? $accumulate->customer->loyalty_points->points : 'Not Enrolled'}}</td>
            <td>{{$accumulate->points}}</td>
            <td>{{\Carbon\Carbon::parse($accumulate->created_at)->format('M jS Y, g:ia')}}</td>

          </tr>
        @endforeach
      </tbody>
      <tfoot>
        <tr>
          <th>No.</th>
          <th>Name</th>
          <th>Points</th>
          <th>Points added</th>
          <th>Date added</th>
        </tr>
      </tfoot>
    </table>
  </body>
</html>
