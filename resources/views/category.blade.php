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
                <form method='POST'>
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
    <div style="margin-left:80%;margin-top: 10px"><button class="btn btn-primary" data-toggle="modal" data-target="#showJsonModal">show_json</button></div>
    <div class="modal fade" id="showJsonModal">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <!-- Modal Header -->
                <div class="modal-header">
                    <h4 class="modal-title">json</h4>
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                </div>
                <!-- Modal body -->
                <div class="modal-body">
                    <p id="jsonBody">{%CATEGORY%}{%CATEGORYEND%}</p>
                    <button onclick="copyJson();" class="btn btn-primary">copy</button>
                    <script>
                        function copyJson(){
                            var copyText = document.getElementById("jsonBody");
                            navigator.clipboard.writeText(copyText.innerHTML);
                            /* Alert the copied text */
                            alert("Copied the text: " + copyText.innerHTML);
                        }
                    </script>
                </div>

            </div>
        </div>
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
                    <label for="categName">Category Name</label>
                    <input class="form-control" id="categName" name="categName" required>
                    <br><button class="btn btn-primary" type="submit" name="add">Add</button>
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
                    <label for="editCategName">Category Name</label>
                    <input class="form-control" id="editCategName" name="editCategName" required>
                    <br><button class="btn btn-primary" type="submit" name="update">Update</button>
                </form>
            </div>
        </div>
    </div>
</div>
<script>
    function editRow(rowID){
        var categ = document.getElementById("name"+rowID).innerHTML;
        //replace text
        $('#rowID').val(rowID);
        $('#editCategName').val(categ);
    }
</script>
@endsection("content")
