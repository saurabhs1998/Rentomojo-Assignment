<?php
    $pdo = new PDO("mysql:host=localhost;dbname=demo;charset=utf8","root","");

    if(isset($_POST['submit']) ){
        $name = $_POST['first_name'];
        $sth = $pdo->prepare("INSERT INTO persons (first_name) VALUES (:first_name)");
        $sth->bindValue(':first_name', $first_name, PDO::PARAM_STR);
        $sth->execute();
    }elseif(isset($_POST['delete'])){
        $id = $_POST['id'];
        $sth = $pdo->prepare("delete from persons where id = :id");
        $sth->bindValue(':id', $id, PDO::PARAM_INT);
        $sth->execute();
    }
?>
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

<script src="https://code.jquery.com/jquery-1.12.4.min.js"></script>


<link rel="stylesheet" href="style.css">

<link href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet" integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous">


<script type="text/javascript">
$(document).ready(function(){
    $('.search-box input[type="text"]').on("keyup input", function(){
        /* Get input value on change */
        var inputVal = $(this).val();
        var resultDropdown = $(this).siblings(".result");
        if(inputVal.length){
            $.get("backend-search.php", {term: inputVal}).done(function(data){
                // Display the returned data in browser
                resultDropdown.html(data);
            });
        } else{
            resultDropdown.empty();
        }
    });
    
    // Set search input value on click of result item
    $(document).on("click", ".result p", function(){
        $(this).parents(".search-box").find('input[type="text"]').val($(this).text());
        $(this).parent(".result").empty();
    });
});
</script>


</head>
<body>
<div class="borderbox1">
	    <div class="borderbox">
 		    <h3>RM-PHONEBOOK</h3>
 	    </div>
 	    <div class="container">

  <!--     <div class="search-box">
        <input type="text" autocomplete="off" placeholder="Search country..." /> <i class="fa fa-search" aria-hidden="true"></i>
        <div class="result" ></div>
      </div> -->



<div>
    <form method="post" action="">
        <input type="text" class="far-search" name="first_name" value=""> <i class="fa fa-search" aria-hidden="true"></i>
        <!-- <input type="submit" name="submit" value="Add"> -->
    </form>
    <table class="table table-striped">
        <therad><th></th><th></th></therad>
        <tbody>
<?php
    $sth = $pdo->prepare("SELECT * FROM persons ORDER BY first_name ASC");
    $sth->execute();
    
    foreach($sth as $row) {
?>
            <tr>
                <td>
                  <div id="flip" ><?= htmlspecialchars($row['first_name']) ?></div>
                  <div id="panel">
                    <div>
                     <h5>13/02/1998</h5>

               <!-- <button type="submit" style="margin-left: 54%;" class="btn btn-info mt-2">Edit</button>
                <button type="submit" class="btn btn-danger mt-2">Remove</button> -->

                <div style="border: 1px solid black; margin-top: 5px;">
                  <div><i class="fa fa-phone-square" aria-hidden="true"></i> +918224804316 &nbsp <i class="fa fa-envelope" aria-hidden="true"></i> saurabhsingh101101@gmail.com</div>
                  <div><i class="fa fa-phone-square" aria-hidden="true"></i> +918619549916 &nbsp <i class="fa fa-envelope" aria-hidden="true"></i> zchanchal1998@gmail.com</div>
                </div>
            </div>
                    
                  </div>
                </td>
                  <td style="">
                    <form method="POST" action="edit.php">
                        <button type="submit" class="btn btn-info" name="edit">Edit</button>
                        <input type="hidden" name="id" value="<?= $row['id'] ?>">
                        <input type="hidden" name="edit" value="true">
                    </form>
                </td>
                <td>
                    <form method="POST">
                        <button type="submit" class="btn btn-danger" name="delete">Remove</button>
                        <input type="hidden" name="id" value="<?= $row['id'] ?>">
                        <input type="hidden" name="delete" value="true">
                    </form>
                </td>
               
            </tr>
<?php
    }
?>
        </tbody>
    </table>
</div>


<!-- <div class="newborder">
      </div> -->
<ul class="pagination justify-content-center mt-3">
          <li class="page-item"><a class="page-link" href="javascript:void(0);">Previous</a></li>
          <li class="page-item"><a class="page-link" href="javascript:void(0);">1</a></li>
          <li class="page-item"><a class="page-link" href="javascript:void(0);">2</a></li>
          <li class="page-item"><a class="page-link" href="javascript:void(0);">Next</a></li>
</ul>
<div>
      <a style="margin-left: 90%; font-size: 30px;" href="newindex.php"><i class="fa fa-plus-circle" aria-hidden="true"></i></a>
</div>
</div>
<script> 
         $(document).ready(function(){
         $("#flip").click(function(){
         $("#panel").slideToggle("slow");
        });
});

        // $(document).ready(function(){
        //  $("#flip1").click(function(){
        //  $("#panel1").slideToggle("slow");
        // });
        // });
</script>
</body>
</html>


