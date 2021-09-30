@extends('layouts.app')

@section('content')
<div class="row">
<img src="img/pharmacy.svg" alt="..." class="ml-5" width="100">
<center><h3  class="ml-5 mt-4">Ferga Laboratory Management System</h3></center>

</div>
<table class="table">
    <thead class="">
        <tr class="bg-info">
            <th>id</th>
            <th>Name</th>
            <th>Addres</th>
            <th>Phone</th>
            <th>Percentage</th> 
            <th>Action</th>
        </tr>
    </thead>
    <tbody>
        @foreach($doctor as $key)
      <tr>
        
        <td>{{$key->id}}</td>
        <td>{{$key->name}}</td>
        <td>{{$key->Address}}</td>
        <td>{{$key->Phone}}</td>
        <td>{{$key->percentage}}</td>
<td></td>
      
      </tr>
     @endforeach
    </tbody>
 
  </table>
@endsection