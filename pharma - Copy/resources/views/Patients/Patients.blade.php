@extends('layouts.my')

@section('content')



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

<body>

    <div class="">
        <h1 align="center">Patients</h1>
        <br />
        <div class="row">
            <div class="col-lg-12 margin-tb">
                <div class="pull-right">
                    <a class="mb-2 text-white btn btn-info" id="new-user"data-target=".bd-example-modal-xl" >New Patients</a>
                </div>
            </div>
        </div>
  
       
        {{-- <script type="text/javascript" src="http://www.position-absolute.com/creation/print/jquery.printPage.js"></script>
        <center> <a href="{{ url('/printP') }}" class="btnprn btn btn-outline-warning">Print </a></center>
        <script type="text/javascript">
        $(document).ready(function(){
        $('.btnprn').printPage();
        });
        </script>
        
        </center> --}}

        <table class="table table-bordered data-table">
            <thead>
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
         
        </table>
    </div >


 
    <!-- Add and Edit customer modal -->
    <div class="modal fade" id="crud-modal" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
               
                <div class="modal-header">
                    <h4 class="modal-title" id="userCrudModal"></h4>
                </div>
                <div class="modal-body">
                    <form name="userForm" action="{{ route('Patients.store') }}" method="POST">
                        <input type="hidden" name="user_id" id="user_id">
                        @csrf
                        <div class="row">
                            <div class="col-xs-12 col-sm-12 col-md-12">
                                <div class="form-group">
                                    <strong>Name:</strong>
                                    <input type="text" name="name" id="name" class="form-control" placeholder="Name"
                                        onchange="validate()">
                                </div>
                            </div>
                            <div class="m-2 form-group">
                              <label for="exampleInputEmail1">Age</label>
                              <input type="text"  name="Age" class="form-control " id="Age" aria-describedby="emailHelp">
                            </div>
                            <div class="m-2 form-group">
                              <label for="exampleFormControlSelect1">Gender</label>
                              <select name="Gender" class="form-control " id="Gender">
                                <option>...</option>
                                <option value="male">male</option>
                                <option value="female">female</option>
                              </select>
                            </div>
                            <div class="m-2 form-group">
                              <label for="exampleFormControlSelect1">Blood Group</label>
                              <select name="Blood_Group" class="form-control " id="Blood_Group">
                                  <option>...</option>
                                <option  value="A+">A+</option>
                                <option value="A-">A-</option>
                                <option value="B-">B-</option>
                                 <option value="B+">B+</option>
                                <option value="AB-">AB-</option>
                                <option value="AB-">AB-</option>
                                <option value="O+">O+</option>
                                <option value="O-">O-</option>
                                
                              </select>
                            </div>
                            <div class="col-xs-12 col-sm-12 col-md-12">
                              <div class="form-group">
                                  <strong>Phone</strong>
                                  <input type="text" name="Phone" id="Phone" class="form-control" placeholder="Phone"
                                      onchange="validate()">
                              </div>
                          </div>
                            <div class="col-xs-12 col-sm-12 col-md-12">
                              <div class="form-group">
                                  <strong>Address:</strong>
                                  <input type="text" name="Address" id="Address" class="form-control" placeholder="Address"
                                      onchange="validate()">
                              </div>
                          </div>


                            <div class="text-center col-xs-12 col-sm-12 col-md-12">
                                <button type="submit" id="btn-save" name="btnsave" class="btn btn-primary"
                                  >Save</button>
                                <a href="{{ route('Patients.index') }}" class="btn btn-danger">Cancel</a>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <!-- Show user modal -->
    <div class="modal fade" id="crud-modal-show" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title" id="userCrudModal-show"></h4>
                </div>
                <div class="modal-body">
                    <div class="row">
                        <div class="col-xs-2 col-sm-2 col-md-2"></div>
                        <div class="col-xs-10 col-sm-10 col-md-10 ">

                            <table class="table-responsive ">
                                <tr height="50px">
                                    <td><strong>Name:</strong></td>
                                    <td id="sname"></td>
                                </tr>
                                <tr height="50px">
                                    <td><strong>Email:</strong></td>
                                    <td id="semail"></td>
                                </tr>

                                <tr>
                                    <td></td>
                                    <td style="text-align: right "><a href="{{ route('Patients.index') }}"
                                            class="btn btn-danger">OK</a> </td>
                                </tr>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

</body>
{{-- <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<script src="http://cdn.datatables.net/1.10.18/js/jquery.dataTables.min.js" defer></script> --}}


<script type="text/javascript" src=" https://cdn.datatables.net/buttons/1.2.4/js/dataTables.buttons.min.js"></script>



<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jszip/2.5.0/jszip.min.js"></script>
<script type="text/javascript" src="https://cdn.datatables.net/buttons/1.2.4/js/buttons.html5.min.js"></script>
<script type="text/javascript" src="https://cdn.datatables.net/buttons/1.2.1/js/buttons.print.min.js"></script>


<script type="text/javascript">
    $(document).ready(function () {

        var table = $('.data-table').DataTable({
            processing: true,
            serverSide: true,
            ajax: "{{ route('Patients.index') }}",
            columns: [{
                    data: 'DT_RowIndex',
                    name: 'DT_RowIndex'
                },
                {
                    data: 'name',
                    name: 'name'
                },
                {
                    data: 'Age',
                    name: 'Age'
                }, {
                    data: 'Gender',
                    name: 'Gender'
                }, {
                    data: 'Blood',
                    name: 'Blood'
                },
                {
                    data: 'Address',
                    name: 'Address'
                }, {
                    data: 'Phone',
                    name: 'Phone'
                },
               
                {
                    data: 'action',
                    name: 'action',
                    orderable: false,
                    searchable: false
                },
            ],

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

        /* When click New customer button */
        $('#new-user').click(function () {
            $('#btn-save').val("create-user");
            $('#user').trigger("reset");
            $('#userCrudModal').html("Add New patients");
            $('#crud-modal').modal('show');
        });

        /* Edit customer */
        $('body').on('click', '#edit-user', function () {
            var user_id = $(this).data('id');
            $.get('Patients/' + user_id + '/edit', function (data) {
                $('#userCrudModal').html("Edit patients");
                $('#btn-update').val("Update");
                $('#btn-save').prop('disabled', false);
                $('#crud-modal').modal('show');
                $('#user_id').val(data.id);
                $('#name').val(data.name);
                $('#Age').val(data.Age);
                $('#Gender').val(data.Gender);
                $('#Blood_Group').val(data.Blood_Group);
                $('#Address').val(data.Address);
                $('#Phone').val(data.Phone);
               

            })
        });
        /* Show customer */
        $('body').on('click', '#show-user', function () {
            var user_id = $(this).data('id');
            $.get('Patients/' + user_id, function (data) {

                $('#sname').html(data.name);
                $('#semail').html(data.email);

            })
            $('#userCrudModal-show').html("User Details");
            $('#crud-modal-show').modal('show');
        });

        /* Delete customer */
        $('body').on('click', '#delete-user', function () {
            var user_id = $(this).data("id");
            var token = $("meta[name='csrf-token']").attr("content");
            confirm("Are You sure want to delete !");

            $.ajax({
                type: "DELETE",
                url: "http://localhost/laravelpro/public/Patients/" + user_id,
                data: {
                    "id": user_id,
                    "_token": token,
                },
                success: function (data) {

                    //$('#msg').html('Customer entry deleted successfully');
                    //$("#customer_id_" + user_id).remove();
                    table.ajax.reload();
                },
                error: function (data) {
                    console.log('Error:', data);
                }
            });
        });

    });

</script>


@endsection