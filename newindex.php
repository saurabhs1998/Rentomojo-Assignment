<!DOCTYPE html>
<html>
<head>
	<title></title>
	<!-- Latest compiled and minified CSS -->

	<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">

<!-- jQuery library -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

<!-- Popper JS -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>

<!-- Latest compiled JavaScript -->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"></script>


<link rel="stylesheet" href="style.css">

<link href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet" integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous">

</head>
<body>
	<div class="borderbox1">
	    <div class="borderbox">
 		    <h3>RM-PHONEBOOK</h3>
 	    </div>

 	    <div class="container">
 	    	 <a style="font-size: 20px; text-decoration: none;color: black;" href="add contact.php"><i class="fa fa-arrow-left" aria-hidden="true"></i> Add New Contact </a>

 	    <form method="post" action="insert.php">
 	    <div>
 	    	<label for="firstName">First Name:</label>
        <input type="text" name="first_name" id="firstName">
 	    </div>

 	    <div>
 	    	<label>DOB</label><br>
 	    	<input type="Date" name="last_name" placeholder="" required>
 	    </div>

 	    <div id="myDIV">
            <label>Mobile Number</label><br>
            <input type="number" id="myInput" name="mobile" placeholder="Number">
            <span onclick="newElement()" class="addBtn">Add</span>
        </div>

        <ul id="myUL">
        </ul>

         <div id="myDIV">
            <label>Email</label><br>
            <input type="Email" name="email" placeholder="look@gmail.com" required>
        </div>

       <button type="submit" value="Submit" class="btn btn-primary mt-2">Submit</button>
 	    </div>
 	  </form>
 	</div>
<script>
// Create a "close" button and append it to each list item
var myNodelist = document.getElementsByTagName("LI");
var i;
for (i = 0; i < myNodelist.length; i++) {
  var span = document.createElement("SPAN");
  var txt = document.createTextNode("\u00D7");
  span.className = "close";
  span.appendChild(txt);
  myNodelist[i].appendChild(span);
}

// Click on a close button to hide the current list item
var close = document.getElementsByClassName("close");
var i;
for (i = 0; i < close.length; i++) {
  close[i].onclick = function() {
    var div = this.parentElement;
    div.style.display = "none";
  }
}
// Create a new list item when clicking on the "Add" button
function newElement() {
  var li = document.createElement("li");
  var inputValue = document.getElementById("myInput").value;
  var t = document.createTextNode(inputValue);
  li.appendChild(t);
  if (inputValue === '') {
    alert("You must write something!");
  } else {
    document.getElementById("myUL").appendChild(li);
  }
  document.getElementById("myInput").value = "";

  var span = document.createElement("SPAN");
  var txt = document.createTextNode("\u00D7");
  span.className = "close";
  span.appendChild(txt);
  li.appendChild(span);

  for (i = 0; i < close.length; i++) {
    close[i].onclick = function() {
      var div = this.parentElement;
      div.style.display = "none";
    }
  }
}
</script>   	
</body>
</html>