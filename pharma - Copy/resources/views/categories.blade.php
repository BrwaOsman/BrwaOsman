@extends('layouts.my')

@section('content')


<link href="{{ asset('assets/dataTable/dataTables.bootstrap4.min.css') }}" rel="stylesheet">
<script type="text/javascript" src="{{asset('assets/dataTable/jquery.dataTables.min.js')}}"></script>
<script type="text/javascript" src="{{asset('assets/dataTable/dataTables.bootstrap4.min.js')}}"></script>
{{-- <script type="text/javascript" src="{{asset('assets/dataTable/buttons.print.min.js')}}"></script>
<script type="text/javascript" src="{{asset('assets/dataTable/dataTables.buttons.min.js')}}"></script> --}}

<script>
error = false
function validate() {
    if (document.userForm.name.value != '' && document.userForm.email.value != '')
        document.userForm.btnsave.disabled = false
    else
        document.userForm.btnsave.disabled = true
}

</script>


<h3 class=""> Categoris </h3>
<div class="border">

   <!-- Button trigger modal -->
<button type="button" class="m-3 btn btn-info" data-toggle="modal" data-target="#exampleModal">
Add Category
  </button>

    {{-- <script type="text/javascript" src="http://www.position-absolute.com/creation/print/jquery.printPage.js"></script>
<center> <a href="{{ url('/prnpriview') }}" class="btnprn btn">Print Preview</a></center>
<script type="text/javascript">
$(document).ready(function(){
$('.btnprn').printPage();
});
</script>

</center> --}}
  
  <!-- Modal -->
  <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h3 class="modal-title" id="exampleModalLabel">New category</h3>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
          <form action="{{route('AddCategory')}}"id="formG"   method="POST" enctype="multipart/form-data">
                  @csrf

          {{csrf_field()}}
        <div class="modal-body">
          <span id="form_output"></span>
            <div class="form-group">
                <label for="exampleInputEmail1">Name</label>
                <input type="text" class="form-control"name="name" >
              </div>
            
         <button class="btn btn-info">Add</button>
        </div>
        </form>
        <div class="modal-footer">
          <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
         
        </div>
      </div>
    </div>
  </div>

<table class="table m-1 table-hover" id="example">
    <thead class="bg-info">
      <tr>
        <th scope="col">#</th>
        <th scope="col">name</th>
        <th scope="col">edit</th>
        <th scope="col">delet</th>
      </tr>
    </thead>
     <tbody>
    @foreach($ctge as $key)
      

   
      <tr>

        <th scope="row">{{$key->id}} </th>
        <td>{{$key->name}} </td>
        <td><a href="" class="btn btn-success edit" data-toggle="modal" data-target="#eidt{{$key->id}}" >Eidt </a></td>

        
        <td><a href="categories/{{$key->id}}" class="btn btn-danger">Delete </a> </td>


<!-- Modal Eidt -->
<div class="modal fade" id="eidt{{$key->id}}" data-backdrop="static" tabindex="-1" role="dialog" aria-labelledby="staticBackdropLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="staticBackdropLabel">Modal title</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      
        <form action="categories/{{$key->id}} "id="formG"   method="POST" enctype="multipart/form-data">
          @csrf

        {{csrf_field()}}
      <div class="modal-body">
        <span id="form_output"></span>
          <div class="form-group">
          
              <label for="exampleInputEmail1"></label>
              <input type="text" class="form-control" id="name" value="{{$key->name}} " name="name" >
            </div>
          
            <input type="submit" name="submit" id="action" value="Add" class="btn btn-info" />  
              </div>
      </form>
      
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>
</tr>
 @endforeach
</tbody>

</table>




</div>



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
  });

  });
</script>
{{-- 
<script type="text/javascript">
  $(document).ready(function() { 
    
    $(document).on('click', '.edit', function(){
        var id = $(this).attr("id");
        $('#form_output').html('');
        $.ajax({
            url:"{{route('EidtC')}}",
            method:'get',
            data:{id:id},
            dataType:'json',
            success:function(data)
            {
                $('#name').val(data.first_name);
                $('#student_id').val(id);
                $('#studentModal').modal('show');
                $('#action').val('Edit');
                $('.modal-title').text('Edit Data');
                $('#button_action').val('update');
            }
        })
    });

});
  </script> --}}
@endsection