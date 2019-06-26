<!DOCTYPE html>
<html lang='en'>
  <head>
    <meta charset='utf-8'>
    <meta http-equiv='X-UA-Compatible' content='IE=edge'>
    <meta name='viewport' content='width=device-width, initial-scale=1'>
    <title>Redeemed points</title>

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
        text-align: justify;
      }
    </style>

  </head>
  <body>
    <h2>Redeemed points</h2>
    <table>
      <thead>
        <tr>
          <th>No.</th>
          <th>Name</th>
          <th class="text-center">Points</th>
          <th class="text-center">Redeemed</th>
          <th>Dates</th>
        </tr>
      </thead>
      <tbody>
        @foreach ($redeemed as $index => $redeem)
          <tr>
            <td>{{$index+1}}</td>
            <td class="capitalize">{{$redeem->customer->firstname}} {{$redeem->customer->lastname}}</td>
            <td class="text-center">{{$redeem->customer->loyalty_points ? $redeem->customer->loyalty_points->points : "Not enrolled"}}</td>
            <td class="text-center">{{$redeem->points}}</td>
            <td>{{\Carbon\Carbon::parse($redeem->created_at)->format('M jS Y, g:ia')}}</td>
          </tr>
        @endforeach
      </tbody>
      <tfoot>
        <tr>
          <th>No.</th>
          <th>Name</th>
          <th class="text-center">Points</th>
          <th class="text-center">Redeemed</th>
          <th>Dates</th>
        </tr>
      </tfoot>
    </table>

  </body>
</html>
