<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">

    <title>Hello, world!</title>
  </head>
  <body>
      
      <div class="container">
  <!-- Content here -->

 <form method="POST" action="insert.php">
  <div class="form-group">
    <label for="exampleFormControlInput1"><h1> Esap temasi nomeri Misali: begin1</h1> </label>
    <input type="text" class="form-control" id="exampleFormControlInput1" name="tema" required placeholder="">
  </div>
  <div class="form-group">
    <label for="exampleFormControlTextarea1"><h1> C++ tekst</h1></label>
    <textarea class="form-control" id="exampleFormControlTextarea1" rows="5" name="ctext" required placeholder=""></textarea>
  </div>

  <div class="form-group">
    <label for="exampleFormControlTextarea1"> <h1> JAVA tekst</h1></label>
    <textarea  required placeholder="" class="form-control" id="exampleFormControlTextarea1" rows="5" name="javatext"></textarea>
  </div>

<button type="submit" class="btn btn-primary btn-lg">Kiritiw</button>

</form>
</div>

    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js" integrity="sha384-B4gt1jrGC7Jh4AgTPSdUtOBvfO8shuf57BaghqFfPlYxofvL8/KUEfYiJOMMV+rV" crossorigin="anonymous"></script>
  </body>
</html>

<?php
    

$conn = mysqli_connect("localhost", "shariyar_tatunf","12345","shariyar_tatunf");

    $tema=$_POST['tema'];
    $ctext=$_POST['ctext'];
    $javatext=$_POST['javatext'];


  

$sql="INSERT INTO `shariyar_tatunf`.`answer` ( `tema`, `ctext`, `javatext`) VALUES ('$tema', '$ctext', '$javatext');";
$result=mysqli_query($conn,$sql);


  ?>