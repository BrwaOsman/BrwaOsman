@extends('layouts.app')

@section('content')

<style>
      td {
                    text-align: center;
                }

                th {
                    text-align: center !important;
                    font-size:20px;
                }
                h1{
                   
                    font-family: initial;

                }
</style>

<h1 >Add and Show Users</h1>

<!-- Button trigger modal -->
<button type="button" class="btn btn-info m-3" data-toggle="modal" data-target="#exampleModal">
    Add new User
  </button>
  
  <!-- Modal -->
  <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Add New User</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div> 
        <form action="{{route('adduser')}}" method="post" enctype="multipart/form-data">
            @csrf

            {{csrf_field()}}
        <div class="modal-body">
           
      <div class="form-group"> 
          <label for="">Email</label>
        <input type="email"class="form-control" name="email" id="" aria-describedby="helpId" placeholder="Email">
        <label for="">User Name</label>
        <input type="text"class="form-control" name="user_name" id="" aria-describedby="helpId" placeholder="User Name">
        <label for="">Password</label>
        <input type="Password"class="form-control" name="password" id="" aria-describedby="helpId" placeholder="Password">
      </div>
        </div>
        <div class=" text-center mb-1"> 
            <input type="submit" class="btn btn-success" value="Save">
          <button type="button" class="btn btn-danger ml-5" data-dismiss="modal">Close</button>
         
        </div>
     </form>
      </div>
    </div>
  </div>

<table class="table  table-striped border m-2">
    <thead>
        <tr>
            <th>User Name</th>
            <th>Email</th>
            <th>Password</th>
            <th>Edit</th>
            <th>Delete</th>

            
        </tr>
    </thead>
    <tbody>
        @foreach ($user as $item)
            <tr>
            <td scope="row">{{$item->name}}</td>
            <td scope="row">{{$item->email}}</td>
            <td scope="row">{{$item->password}}</td>
            <td scope="row"> <a class="btn btn-success" id="edit-user" data-toggle="modal" data-target=".fade{{$item->id}}">Edit </a>
            
                <div class="modal fade{{$item->id}}" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog" role="document">
                      <div class="modal-content">
                        <div class="modal-header">
                          <h5 class="modal-title" id="exampleModalLabel">Add New User</h5>
                          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                          </button>
                        </div> 
                        <form action="Users/{{$item->id}}"  method="post" enctype="multipart/form-data">
                            @csrf
                            {{csrf_field()}}
                        <div class="modal-body">
                      <div class="form-group text-left"> 
                          <label for="">Email</label>
                        <input type="email"class="form-control" name="email" id="" value="{{$item->email}}"  placeholder="Email">
                        <label for="">User Name</label>
                        <input type="text"class="form-control" name="user_name" id="" value="{{$item->name}}"  placeholder="User Name">
                        <label for="">Password</label>
                        <input type="Password"class="form-control" name="password" id="" value="{{$item->password}}" placeholder="Password">
                      </div>
                        </div>
                        <div class=" text-center mb-3"> 
                            <input type="submit" class="btn btn-success" value="Save">
                          <button type="button" class="btn btn-danger ml-5" data-dismiss="modal">Close</button>
                        </div>
                     </form>
                      </div>
                    </div>
                  </div>
            
            </td>
            <td scope="row">  <a href="Users/{{$item->id}}" class="btn btn-danger delete-user">Delete</a></td>
        </tr>
      
        @endforeach
        
    </tbody>
</table>


@endsection