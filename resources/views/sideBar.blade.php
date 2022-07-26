<div class="w3-sidebar w3-bar-block w3-collapse w3-card w3-animate-left bg-primary text-light" style="width:200px;" id="mySidebar">
    <button class="w3-bar-item w3-button w3-large w3-hide-large" onclick="w3_close()">Close &times;</button>
    <br>
    <h3 class="text-center">Management</h3>
    <hr style="width:80%;margin: auto">
    <br>
    <a href="category" class="w3-bar-item w3-button">Category management</a>
    <a href="cards" class="w3-bar-item w3-button">Cards management</a>
    <a href="phoneCategory" class="w3-bar-item w3-button">Phone Category management</a>
    <a href="phone" class="w3-bar-item w3-button">Phone Card management</a>
    <a href="users" class="w3-bar-item w3-button">Users management</a>
</div>
<button class="w3-button w3-xlarge w3-hide-large" onclick="w3_open()">&#9776;</button>
<script>
    function w3_open() {
        document.getElementById("mySidebar").style.display = "block";
    }

    function w3_close() {
        document.getElementById("mySidebar").style.display = "none";
    }
</script>
