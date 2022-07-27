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
                <form method="POST" action="{{route("createCategory")}}">
                    @csrf
                    <label for="categName">Category Name</label>
                    <input class="form-control" id="categName" name="categName" required>
                    <br><button  class="btn btn-primary" type="submit" name="add">Add</button>
                </form>
            </div>
        </div>
    </div>
</div>

