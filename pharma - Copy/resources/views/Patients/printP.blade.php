@extends('layouts.app')
@section('content')
<div class="row">
<img src="img/logo.jpg" alt="..." class="ml-5" width="100">
<center><h3  class="ml-5 mt-4">Ferga Laboratory Management System</h3></center>

</div>
<table class="table">
    <thead class="">
        <tr class="bg-info">
            <th>id</th>
                  <th>Name</th>
                  <th> Age</th>
                   <th>Gender </th>
                    <th>Blood Group </th>
                  <th>Addres</th>
                  <th>Phone</th>
                <th> action </th>
        </tr>
    </thead>
    <tbody>
        @foreach($pten as $key)
      <tr>
        
        <td>{{$key->id}}</td>
        <td>{{$key->name}}</td>
        <td>{{$key->Age}}</td>
        <td>{{$key->Gender}}</td>
        <td>{{$key->Blood}}</td>
        <td>{{$key->Address}}</td>
        <td>{{$key->Phone}}</td>
        <td></td>

<td></td>
      
      </tr>
     @endforeach
    </tbody>
 
  </table>
@endsection