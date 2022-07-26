@extends("begin")
@section("content")
<div id ="table">
    <br>
    <h1 class="text-center">Cards management</h1>
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
                    <th>Category</th>
                    <th> Phone</th>
                    <th>Edit</th>
                    <th>Delete</th>
                </tr>
                </thead>
                <tfoot>
                <tr>
                    <th>ID</th>
                    <th>Name</th>
                    <th>Category</th>
                    <th> Phone</th>
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
                        <td id='category{{$row["id"]}}'>{{$row["category"]}}</td>
                        <td id='phone{{$row["id"]}}'>{{$row["phone"]}}</td>
                        <td><button onclick='editRow({{$row["id"]}})' data-toggle='modal' data-target='#editModal' class='btn btn-primary'>EDIT</button></td>
                        <td>
                        <form method='POST'>
                        <input value='{{$row["id"]}}' style='display: none' id='deleteID' name='deleteID'>
                        <button class='btn btn-danger' type='submit' name='deleteBtn'>Delete</button>
                        </form>
                        </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </section>
    </div>
    <div style="margin-left:80%;margin-top: 10px"><button class="btn btn-primary" data-toggle="modal" data-target="#addModal">Add new</button></div>
    <div style="margin-left:10%;margin-top: 10px">

        <a target="_blank" href="export.php?id=num">
            <button class="btn btn-primary"  style="margin-left:8px">تصدير</button>
        </a>

    </div>
</div>
<!-- popup for add new-->
<!-- modal for add new -->
<div class="modal fade" id="addModal">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <!-- Modal Header -->
            <div class="modal-header">
                <h4 class="modal-title">Add new user</h4>
                <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>
            <!-- Modal body -->
            <div class="modal-body">
                <form method="POST">
                    <label for="cardName">Card Name</label>
                    <input class="form-control" id="cardName" name="cardName" required>
                    <label for="category">Category</label>
                    <select class="form-control" id="category" name="category" required>
                        <option value="">Please select</option>
                        @foreach($category as $row)
                            <option value='{{$row["id"]}}'>{{$row["name"]}}</option>
                            @endforeach
                    </select>
                    <label for="price">Phone</label>
                    <input class="form-control" id="phone" name="phone" required>
                    <br><button class="btn btn-primary" type="submit" name="addNewCard">Add</button>
                </form>
            </div>

        </div>
    </div>
</div>

<div class="modal fade" id="editModal">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">

            <!-- Modal Header -->
            <div class="modal-header">
                <h4 class="modal-title" >Edit Row</h4>

                <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>

            <!-- Modal body -->
            <div class="modal-body">
                <form method="POST">
                    <input style="display: none" id="rowID" name="rowID">
                    <label for="editName">Card Name</label>
                    <input class="form-control" id="editName" name="editName" required>
                    <label for="editCategory">Category</label>
                    <select class="form-control" id="editCategory" name="editCategory" required>
                        @foreach($category as $row)
                            <option value='{{$row["id"]}}'>{{$row["name"]}}</option>
                        @endforeach
                    </select>
                    <label for="editPhone">Price</label>
                    <input class="form-control" id="editPhone" name="editPhone" required>
                    <br><button class="btn btn-primary" type="submit" name="updateCard">Update</button>
                </form>
            </div>
        </div>
    </div>
</div>
<script>
    function editRow(rowID){
        var name = document.getElementById("name"+rowID).innerHTML;
        var category = document.getElementById("category"+rowID).innerHTML;
        var phone = document.getElementById("phone"+rowID).innerHTML;
        //replace text
        $('#rowID').val(rowID);
        $('#editName').val(name);
        $('#editCategory').val(category);
        $('#editPhone').val(phone);
    }
</script>
@endsection("content")
