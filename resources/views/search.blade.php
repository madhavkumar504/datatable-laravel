@extends('master')
@section('content')
<!-- =================== -->
<div class="container">
  <h4>States</h4>
<table id="table_id" class="table table-striped table-bordered" >
    <thead>
        <tr>
            <th>ID</th>
            <th>States</th>
        </tr>
    </thead>
    <tbody>
        @foreach($states as $state)
      <tr>
        <td>{{$state->id}}</td>
        <td>{{$state->name}}</td>
      </tr>
        @endforeach
    </tbody>
</table>
</div>


<div class="container my-5">

<h4> Cities </h4>
<table id="citiesTable" class="table table-striped table-bordered" >
    <thead>
        <tr>
            <th>ID</th>
            <th>Cities</th>
        </tr>
    </thead>
    <tbody>
        @foreach($cities as $city)
      <tr>
        <td>{{$city->id}}</td>
        <td>{{$city->name}}</td>
      </tr>
        @endforeach
    </tbody>
</table>
</div>
@endsection
