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
