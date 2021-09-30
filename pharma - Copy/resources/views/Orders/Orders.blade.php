@extends('layouts.app')
 @section('content')
  <div class="bg-light">
      <a href="http://localhost/pharma/public/create"><button type="button" class="btn btn-info">
        Create New Order
      </button></a>
    <div class="row" style="width:100%;">
        <form class="form-inline justify-content-center " style="padding: 15px;width:100%;" action="" method="POST">
            <div class="col-md-3"><label>From Date</label><input type="date" class="form-control" style="width:100%;"
                    name="from_date" value="2021-01-18"></div>
            <div class="col-md-3"><label>To Date</label><input type="date" class="form-control" style="width:100%;"
                    name="to_date" value="2021-01-18"></div>
            <div class="col-md-3"><label>Status</label><select name="status" class="form-control" style="width:100%;">
                    <option value="">All</option>
                    <option value="completed">Completed</option>
                    <option value="inprogress">In Progress</option>
                    <option value="pending">Pending</option>
                </select></div>
            <div class="col-md-3"><label class="text-light">.</label><button type="submit" class="btn btn-info"
                    name="button">Filter</button></div>
        </form>
    </div>
         <div class="row">
                    <div class="col-sm-12">
                        <table id="example" class="table table-hover text-center nowrap dataTable no-footer" role="grid"
                            aria-describedby="example_info">
                            <thead class="bg-info">
                                <tr role="row">
                                    <th class="sorting_asc" tabindex="0" aria-controls="example" rowspan="1" colspan="1"
                                        aria-sort="ascending" aria-label="#: activate to sort column descending"
                                        style="width: 9px;">#</th>
                                    <th class="sorting" tabindex="0" aria-controls="example" rowspan="1" colspan="1"
                                        aria-label="Patient: activate to sort column ascending" style="width: 52px;">
                                        Patient</th>
                                    <th class="sorting" tabindex="0" aria-controls="example" rowspan="1" colspan="1"
                                        aria-label="Doctor: activate to sort column ascending" style="width: 48px;">
                                        Doctor</th>
                                    <th class="sorting" tabindex="0" aria-controls="example" rowspan="1" colspan="1"
                                        aria-label="Date: activate to sort column ascending" style="width: 33px;">Date
                                    </th>
                                    <th class="sorting" tabindex="0" aria-controls="example" rowspan="1" colspan="1"
                                        aria-label="Total: activate to sort column ascending" style="width: 36px;">Price
                                    </th>
                                    <th class="sorting" tabindex="0" aria-controls="example" rowspan="1" colspan="1"
                                        aria-label="Discount: activate to sort column ascending" style="width: 62px;">
                                        Discount</th>
                                    <th class="sorting" tabindex="0" aria-controls="example" rowspan="1" colspan="1"
                                        aria-label="Paid: activate to sort column ascending" style="width: 32px;">Paid
                                    </th>
                                    {{-- <th class="sorting" tabindex="0" aria-controls="example" rowspan="1" colspan="1"
                                        aria-label="Total: activate to sort column ascending" style="width: 36px;">Total
                                    </th> --}}
                                    <th class="sorting" tabindex="0" aria-controls="example" rowspan="1" colspan="1"
                                        aria-label="Status: activate to sort column ascending" style="width: 45px;">
                                        Status</th>
                                    {{-- <th class="sorting" tabindex="0" aria-controls="example" rowspan="1" colspan="1"
                                        aria-label="Paid: activate to sort column ascending" style="width: 32px;">Paid
                                    </th> --}}
                                    <th class="sorting" tabindex="0" aria-controls="example" rowspan="1" colspan="1"
                                        aria-label="Show: activate to sort column ascending" style="width: 40px;">Show
                                    </th>
                                    <th class="sorting" tabindex="0" aria-controls="example" rowspan="1" colspan="1"
                                        aria-label="Edit: activate to sort column ascending" style="width: 28px;">Edit
                                    </th>
                                    <th class="sorting" tabindex="0" aria-controls="example" rowspan="1" colspan="1"
                                        aria-label="Delete: activate to sort column ascending" style="width: 46px;">
                                        Delete</th>
                                </tr>
                            </thead>
                            <tbody>
                                {{-- <tr class="odd">
                                    <td valign="top" colspan="13" class="dataTables_empty">No data available in table
                                    </td>
                                </tr> --}}

@foreach ($order as $or)
<tr>
<td>{{$or->id}}</td>
<td>{{$or->joynP->name}} </td>
<td>{{$or->doctor}}</td>
<td>{{$or->created_at}}</td>
<td>{{$or->price}}</td>
<td>
    <button type="button" class="btn btn-block btn-warning btn-sm" data-toggle="modal" data-target="#discount-modal">0</button>
  </td>
  <td>00</td>

  <td>
@if ($or->status == 'Completed')
     <button type="button" class="btn btn-block btn-success btn-sm" data-toggle="modal" data-target="#exampleModal{{$or->id}}"
      >{{$or->status}}</button>

@elseif($or->status == 'Pending')
<button type="button" class="btn btn-block btn-danger btn-sm" data-toggle="modal" data-target="#exampleModal{{$or->id}}"
>{{$or->status}}</button>

@else

<button type="button" class="btn btn-block btn-warning btn-sm" data-toggle="modal" data-target="#exampleModal{{$or->id}}"
>{{$or->status}}</button>

@endif
     

      
  </td>
 

  <td> <a href="http://localhost/pharma/public/show" class="btn btn-sm btn-success">Show</a> </td>

  <td>
    <form method="GET" action="http://lab.ku-host.com/orders/36/edit">
<div class="form-group">
<input type="submit" class="btn btn-info btn-sm " value="Edit">

</div>
</form>
              </td>

              <td>
                <button class="btn btn-sm btn-danger" type="button" name="button">Delete</button>
            </td>

</tr>




  
  <!-- Modal  status-->
  <div class="modal fade" id="exampleModal{{$or->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
           
            <form action="{{route('update')}}" method="POST">
             
                @csrf
          <div class="form-group">
            <label class="ml-2 mr-2">Change Status</label>
          <select name="status" id="status" class="form-control">
            <option value="Completed"> Completed</option>
            <option value="inprogress"> In Progress</option>
            <option value="Pending"> Pending</option>
          </select>
          </div>
          <button type="submit" class="btn btn-primary"> Save</button>

        </form>

        </div>
      
      </div>
    </div>
  </div>


@endforeach

                            </tbody>
                        </table>
                    </div>
                </div>
              
            </div>
        </div>
    </div>
</div>



@endsection
