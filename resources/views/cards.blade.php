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

                    <th>Name</th>
                    <th>Category</th>
                    <th>Price</th>
                    <th>Image</th>

                    <th>Active</th>
                    <th>User ID</th>
                    <th>Created date</th>
                    <th>Edit</th>
                    <th>Delete</th>
                </tr>
                </thead>
                <tfoot>
                <tr>

                    <th>Name</th>
                    <th>Category</th>
                    <th>Price</th>
                    <th>Image</th>

                    <th>Active</th>
                    <th>User ID</th>
                    <th>Created date</th>
                    <th>Edit</th>
                    <th>Delete</th>
                </tr>
                </tfoot>
                <tbody>
                <!--fill table-->
                @foreach($data as $row)
                <tr>
                        <td id='id{{$row["id"]}}' hidden>{{$row["id"]}}</td>
                        <td id='name{{$row["id"]}}'>{{$row["name"]}}</td>
                        <td>".$row[2]."</td>
                        <td id='category{{$row["id"]}}' hidden>category id</td>
                        <td id='price{{$row["id"]}}'>{{$row["price"]}}</td>
                        <td id='image{{$row["id"]}}'>{{$row["image"]}}</td>
                        <td id='detail{{$row["id"]}}' hidden>{{$row["detail"]}}</td>
                        <td id='address{{$row["id"]}}' hidden>{{$row["address"]}}</td>
                        <td id='rate{{$row["id"]}}' hidden>{{$row["rate"]}}</td>";
                    @if($row["active"]=="yes")
                        <td>it is active</td>

                    @else
                        <td>not active<br>
                            <form method='POST'>
                            <input value='{{$row["id"]}}' name='activeID' hidden>
                            <button type='submit' name='active' class='btn btn-success'>Active it</button>
                            </form>
                            </td>";
                    @endif
                        <td id='userID{{$row["id"]}}'>{{$row["user_id"]}}</td>
                        <td>{{$row["rate"]}}</td>
                        <td>
                        <button onclick='editRow({{$row["id"]}})' data-toggle='modal' data-target='#editModal' class='btn btn-primary'>EDIT</button></td>
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
        <a target="_blank" href="export.php?id=card">
            <button class="btn btn-primary" style="margin-left:5px" >تصدير</button>
        </a>
    </div>

</div>

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
                <form method="POST" enctype="multipart/form-data">
                    <input hidden name="userID" value="userID here">
                    <label for="cardName">Card Name</label>
                    <input class="form-control" id="cardName" name="cardName" required>
                    <label for="category">Category</label>
                    <select class="form-control" id="category" name="category" required>
                        <option value="">Please select</option>
                        @foreach($category as $row)
                            <option value='{{$row["id"]}}'>{{$row["id"]}}</option>
                            @endforeach
                    </select>
                    <label for="price">Price</label>
                    <input class="form-control" id="price" name="price" required>
                    <label for="image">Image</label>
                    <input class="form-control" type="file" id="image" name="image" required>
                    <label for="detail">Detail</label>
                    <input class="form-control"  id="detail" name="detail" required>
                    <label for="address">Address</label>
                    <input class="form-control" id="address" name="address">
                    <label for="rate">rate</label>
                    <input class="form-control" id="rate" name="rate">
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
                            <option value='{{$row["id"]}}'>{{$row["id"]}}</option>
                        @endforeach
                    </select>
                    <label for="editPrice">Price</label>
                    <input class="form-control" id="editPrice" name="editPrice" required>
                    <label for="editImage">Image</label>
                    <input class="form-control" id="editImage" name="editImage" required>
                    <label for="editDetail">Detial</label>
                    <input class="form-control" id="editDetail" name="editDetail">
                    <label for="editAddress">Address</label>
                    <input class="form-control" id="editAddress" name="editAddress" required>
                    <label for="editRate">rate</label>
                    <input class="form-control" id="editRate" name="editRate">
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
        var price = document.getElementById("price"+rowID).innerHTML;
        var image = document.getElementById("image"+rowID).innerHTML;
        var detail = document.getElementById("detail"+rowID).innerHTML;
        var address = document.getElementById("address"+rowID).innerHTML;
        var rate = document.getElementById("rate"+rowID).innerHTML;
        //replace text
        $('#rowID').val(rowID);
        $('#editName').val(name);
        $('#editCategory').val(category);
        $('#editPrice').val(price);
        $('#editImage').val(image);
        $('#editDetail').val(detail);
        $('#editAddress').val(address);
        $('#editRate').val(rate);

    }
</script>
@endsection("content")

