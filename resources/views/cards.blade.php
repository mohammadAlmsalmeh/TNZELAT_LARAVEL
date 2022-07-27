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
                        <td>{{$row["category"]}}</td>
                        <td id='category{{$row["id"]}}' hidden>{{$row["category"]}}</td>
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
                        <form method='POST' action="{{route("deleteCard")}}">
                            @csrf
                            @method("delete")
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
@include("popup.createCard")
@include("popup.editCard")
@endsection

