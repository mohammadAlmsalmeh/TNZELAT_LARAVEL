@extends("begin")
@section("content")
<div id ="table">
    <br>
    <h1 class="text-center">Category management</h1>
    <hr style="width: 50%;margin: auto">
    <div style="margin-left:80%;margin-bottom: 10px"><button class="btn btn-primary" data-toggle="modal" data-target="#addModal">Add new</button></div>
    <script type="text/javascript" language="javascript" class="init">
        $(document).ready(function() {
            $('#userTable').dataTable( {
                "language": {
                    "oPaginate": {
                        "sFirst": "First",
                        "sLast": "Last",
                        "sNext": "Next",
                        "sPrevious": "Previous",
                        "sShow":"show",
                        "sEntries":"entries"
                    },
                    "sSearch": "Search",
                    "sZeroRecords": "No matching records found",
                    "sInfoEmpty": "no result",
                    "sEmptyTable": "No data available in table",
                    "sLoadingRecords": "Loading...",
                    //START , END , TOTAL SHOUDNOT CHANGE
                    "sInfo": "Showing _START_ to _END_ of _TOTAL_ entries",
                    //MENU HERE SHOUDNOT CHANGE
                    "sLengthMenu": "Show _MENU_ entries"
                }
            } );
        } );
    </script>
    <div class="container">
        <section>
            <table id="userTable" class="display" cellspacing="0" width="100%">
                <thead>
                <tr>
                    <th>ID</th>
                    <th>Name</th>
                    <th>Edit</th>
                    <th>Delete</th>
                </tr>
                </thead>
                <tfoot>
                <tr>
                    <th>ID</th>
                    <th>First Name</th>
                    <th>Edit</th>
                    <th>Delete</th>
                </tr>
                </tfoot>
                <tbody>
                <!--fill table-->
                @foreach($data as $row)
                <tr>
                <td id='id{{$row["id"]}}'>{{$row["id"]}}</td>
                <td id='name{{$row["id"]}}'>{{$row["name"]}}</td>
                <td><button onclick='editRow({{$row["id"]}})' data-toggle='modal' data-target='#editModal' class='btn btn-primary'>EDIT</button></td>
                <td>
                <form method='POST' action="{{route("deleteCategory")}}">
                    @csrf
                    @method("delete")
                <input style='display: none' value='{{$row["id"]}}' id='deleteID' name='deleteID'>
                <button class='btn btn-danger' type='submit' name='delete'>Delete</button>
                </form></td>
                </tr>
                @endforeach
                </tbody>
            </table>
        </section>
    </div>
    <div style="margin-left:80%;margin-top: 10px"><button class="btn btn-primary" data-toggle="modal" data-target="#addModal">Add new</button></div>
</div>
<!-- popup for add new-->
<!-- modal for add new -->
@include("popup.createCategory")
@include("popup.editCategory")
@endsection("content")
