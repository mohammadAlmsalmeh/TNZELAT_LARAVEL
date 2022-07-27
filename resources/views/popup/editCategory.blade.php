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

                <form action="{{route("editCategory")}}" method="post">
                    @csrf
                    @method("PUT")
                    <input style="display: none" id="rowID" name="rowID">
                    <label for="editCategName">Category Name</label>
                    <input class="form-control" id="editCategName" name="editCategName" required>
                    <br><button class="btn btn-primary" type="submit"  name="update">Update</button>
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
    function  submitEdit() {
        alert("test");
        const http = new XMLHttpRequest();
        http.onload =function () {
            var groupsName = JSON.parse(this.response);
            alert(this.response);
            };
        http.open("POST","");
        http.send();
        }

</script>
