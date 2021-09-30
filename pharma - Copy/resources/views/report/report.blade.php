@extends('layouts.my')

@section('content')
<div class="">



    <link rel="stylesheet"
    href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.1.3/css/bootstrap.min.css" />
    <link href="https://cdn.datatables.net/1.10.16/css/jquery.dataTables.min.css" rel="stylesheet">
    <link href="https://cdn.datatables.net/1.10.19/css/dataTables.bootstrap4.min.css" rel="stylesheet">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.0/jquery.validate.js"></script>
    <script src="https://cdn.datatables.net/1.10.16/js/jquery.dataTables.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js"></script>
    <script src="https://cdn.datatables.net/1.10.19/js/dataTables.bootstrap4.min.js"></script>
    <script>
    error = false
    function validate() {
        if (document.userForm.name.value != '' && document.userForm.email.value != '')
            document.userForm.btnsave.disabled = false
        else
            document.userForm.btnsave.disabled = true
    }
    
    </script>

<style>
            td {
                    text-align: center;
                    padding: 15px !important;
                }

                th {
                    text-align: center !important;
                }
                b{
                    font-size: 20px;
                }
               
</style>
<h2>Report</h2>

<table class="table table-bordered data-table w-100" id="example">
    <thead class="bg-info">
        <tr> 
            <th>id</th>
            <th>patient</th>
            {{-- <th>Doctor</th> --}}
            <th>Name test</th>
            <th>Result</th>
            <th>Phone</th>
            {{-- <th>Total_price</th> --}}
            <th>Data</th>
            <th>Print Test</th>
        </tr>
        </thead>
        <tbody>
            @foreach ($order as $item)
                
            <tr>
                <td>{{$item->id}}</td>
                <td>{{$item->patient}}</td>
                {{-- <td>{{$item->doctor}}</td> --}}
                <td  style=" width: 400px ">
                    @php
                    $tests = json_decode($item->test,true);
                     @endphp
             
                     @foreach ($tests as $value)

                     {{$value['name']}} ||
                @endforeach
                </td>
                <td>
                    @php
                    $tests = json_decode($item->test,true);
                     @endphp
             
                     @foreach ($tests as $value)
                    @if ($value['result'] == null)
                        @else
                          {{$value['result']}} ||
                    @endif
                   
                @endforeach
                </td>
                
                <td>{{$item->Phone}}</td>
                {{-- <td>{{$item->totao_price}}</td> --}}
                <td>{{$item->created_at}}</td>
                <td>
                    <a href="http://localhost/pharma/public/Old{{$item->id}}"><button class=" btn btn-success">Print </button> </a>
                </td>

            </tr>
             @endforeach
             {{-- <td colspan="4" class='border'>
                <b> Total Price </b>
               
                </td>
                
                <td  class='border'> {{$price}}</td>
                <td  class='border'> {{$dus}}</td>
                <td  class='border'> {{$total}}</td> --}}
        </tbody>
</table>
{{-- <center>
<span>
    <b> lock Price in my table </b> <br> <br> <br>
    <label for="" class="ml-3"> Price</label>
<input type="text" disabled class="border-0" value="{{$price}}">
<label for="" class="ml-3"> discount</label>
<input type="text" disabled  class="border-0" value="{{$dus}}">
<label for="" class="ml-3"> Total _price</label>
<input type="text"disabled  class="border-0" value="{{$total}}">

</span>
</center> --}}
</div>
<script type="text/javascript" src=" https://cdn.datatables.net/buttons/1.2.4/js/dataTables.buttons.min.js"></script>

<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jszip/2.5.0/jszip.min.js"></script>
<script type="text/javascript" src="https://cdn.datatables.net/buttons/1.2.4/js/buttons.html5.min.js"></script>
<script type="text/javascript" src="https://cdn.datatables.net/buttons/1.2.1/js/buttons.print.min.js"></script>


<script type="text/javascript">
    $(document).ready(function () {
    $('#example').DataTable({
        scrollCollapse: true,
            paging: true,
            fixedColumns: true,
            "lengthMenu": [
                [10, 100, 200, -1],
                [10, 100, 200, "All"]
            ],
            footer: true,
            dom: "<'row'<'col-sm-12 col-md-4' l><'col-sm-12 col-md-4 'f><'col-sm-12 col-md-4 text-right'B>>" +
                "<'row'<'col-sm-12'tr>>" +
                "<'row'<'col-sm-12 col-md-6' i><'col-sm-12 col-md-6'p>>",
                buttons: [{
                    extend: 'excel',
                    className: 'btn btn-outline-info btn-flat',
                    footer: true,
                },
                {
                    extend: 'print',
                    className: 'btn btn-outline-info btn-flat',
                    footer: true,
                    customize: function (win) {
                        $(win.document.body)
                            .css('font-size', '10pt')
                            .prepend();

                        $(win.document.body).find('table')
                            .addClass('compact')
                            .css('font-size', 'inherit');

                    }
                },

            ],
    });
  
    });
  </script>


@endsection