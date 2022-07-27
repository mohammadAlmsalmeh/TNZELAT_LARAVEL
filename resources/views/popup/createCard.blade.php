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
                    @csrf
                    <input hidden name="userID" value="userID here">
                    <label for="cardName">Card Name</label>
                    <input class="form-control" id="cardName" name="cardName" required>
                    <label for="category">Category</label>
                    <select class="form-control" id="category" name="category" required>
                        <option value="">Please select</option>
                        @foreach($category as $row)
                            <option value='{{$row["id"]}}'>{{$row["name"]}}</option>
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
                    <input class="form-control" id="rate" name="rate" type="number">
                    <br><button class="btn btn-primary" type="submit" name="addNewCard">Add</button>
                </form>
            </div>

        </div>
    </div>
</div>
