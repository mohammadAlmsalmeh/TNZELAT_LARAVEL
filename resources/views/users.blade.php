@extends("begin")
@section("content")
<div id ="table">
    <br>
    <h1 class="text-center">Users management</h1>
    <h5 class="text-center">number of normal users : number here</h5>
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
                    <th>Username</th>
                    <th>Type</th>
                    <th>Phone</th>
                    <th>Store</th>
                    <th>Address</th>
                    <th>Active</th>
                    <th>Edit</th>
                    <th>Delete</th>
                </tr>
                </thead>
                <tfoot>
                <tr>
                    <th>ID</th>
                    <th>Username</th>
                    <th>Type</th>
                    <th>Phone</th>
                    <th>Store</th>
                    <th>Address</th>
                    <th>Active</th>
                    <th>Edit</th>
                    <th>Delete</th>
                </tr>
                </tfoot>
                <tbody>
                <!--fill table-->
                @foreach($data as $row)
                <tr>
                        <td id='id{{$row["id"]}}'>{{$row["id"]}}</td>
                        <td id='username{{$row["id"]}}'>{{$row["name"]}}</td>
                        <td id='type{{$row["id"]}}'>{{$row["role"]}}</td>
                        <td id='phone{{$row["id"]}}'>{{$row["phone"]}}</td>
                        <td id='store{{$row["id"]}}'>{{$row["store"]}}</td>
                        <td id='address{{$row["id"]}}'>{{$row["address"]}}</td>
                        <td hidden id='active{{$row["id"]}}'>{{$row["active"]}}</td>
                        @if($row["active"] == "yes")
                        <td>it is active</td>
                        @else
                        <td>not active<br>
                            <form method='POST'>
                            <input value='{{$row["id"]}}' name='activeID' hidden>
                            <button type='submit' name='active' class='btn btn-success'>Active it</button>
                            </form>
                            </td>
                    @endif
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
                    <label for="cardName">username</label>
                    <input class="form-control" id="cardName" name="cardName" required>
                    <label for="password">password</label>
                    <input class="form-control"  id="password" name="password" required>
                    <label for="type">Type</label>
                    <select class="form-control" id="type" name="type" required>
                        <option value="user">user</option>
                        <option value="admin">admin</option>
                    </select>
                    <label for="phone">Phone</label>
                    <input class="form-control" id="phone" name="phone" required>
                    <label for="store">Store</label>
                    <input class="form-control" id="store" name="store" required>
                    <label for="address">Address</label>
                    <input class="form-control" id="address" name="address">
                    <label for="active">Active</label>
                    <select class="form-control" id="active" name="active" required>
                        <option value="yes">active</option>
                        <option value="no">not active</option>
                    </select>
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
                <h4 class="modal-title" >Edit User</h4>

                <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>

            <!-- Modal body -->
            <div class="modal-body">
                <form method="POST">
                    <input style="display: none" id="rowID" name="rowID">
                    <label for="editName">username</label>
                    <input class="form-control" id="editName" name="editName" required>
                    <label for="editType">type</label>
                    <select class="form-control" id="editType" name="editType" required>
                        <option value="user" >user</option>
                        <option value="admin">admin</option>
                    </select>
                    <label for="editPhone">Phone</label>
                    <input class="form-control" id="editPhone" name="editPhone" required>
                    <label for="editStore">Store</label>
                    <input class="form-control" id="editStore" name="editStore" required>
                    <label for="editAddress">Address</label>
                    <input class="form-control" id="editAddress" name="editAddress" required>
                    <label for="editActive">Active</label>
                    <select class="form-control" id="editActive" name="editActive">
                        <option value="yes">active</option>
                        <option value="no">not active</option>
                    </select>
                    <br><button class="btn btn-primary" type="submit" name="updateCard">Update</button>
                </form>
            </div>
        </div>
    </div>
</div>
<script>
    function editRow(rowID){
        var username = document.getElementById("username"+rowID).innerHTML;
        var type = document.getElementById("type"+rowID).innerHTML;
        var phone = document.getElementById("phone"+rowID).innerHTML;
        var store = document.getElementById("store"+rowID).innerHTML;
        var active = document.getElementById("active"+rowID).innerHTML;
        var address = document.getElementById("address"+rowID).innerHTML;

        //replace text
        $('#rowID').val(rowID);
        $('#editName').val(username);
        $('#editType').val(type);
        $('#editPhone').val(phone);
        $('#editStore').val(store);
        $('#editActive').val(active);
        $('#editAddress').val(address);

    }
</script>
@endsection

