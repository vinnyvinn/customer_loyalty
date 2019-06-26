<!DOCTYPE html>
<html lang='en'>
  <head>
    <meta charset='utf-8'>
    <meta http-equiv='X-UA-Compatible' content='IE=edge'>
    <meta name='viewport' content='width=device-width, initial-scale=1'>
    <title>Loyalty points report</title>

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
      th{
        padding: 5px;
      }
      td {
        padding: 2px;
      }
      td.name {
        text-transform: capitalize;
      }
      td.points {
        text-align: justify;
      }
    </style>

  </head>
  <body>
    <h2>Loyalty points holders</h2>
    <table>
      <thead>
        <tr>
          <th>No.</th>
          <th>Name</th>
          <th>Address</th>
          <th>Loyalty points</th>
          <th>Date registered</th>
        </tr>
      </thead>
      <tbody>
        @foreach ($loyaltypoints as $index => $loyaltypoint)
          <tr>
            <td>{{$index+1}}.</td>
            <td class="name">{{$loyaltypoint->customers->firstname}} {{$loyaltypoint->customers->lastname}}</td>
            <td class="name">{{$loyaltypoint->customers->address}}</td>
            <td class="points">{{$loyaltypoint->points}}</td>
            <td class="points">{{\Carbon\Carbon::parse($loyaltypoint->created_at)->format('M jS Y, g:ia')}}</td>
          </tr>

        @endforeach
      </tbody>
      <tfoot>
        <tr>
          <th>No.</th>
          <th>Name</th>
          <th>Address</th>
          <th>Loyalty points</th>
          <th>Date registered</th>
        </tr>
      </tfoot>
    </table>


  </body>
</html>
