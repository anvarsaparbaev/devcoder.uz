
<!doctype html>
<html lang="en">
 <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">

    <style>
      .bd-placeholder-img {
        font-size: 1.125rem;
        text-anchor: middle;
        -webkit-user-select: none;
        -moz-user-select: none;
        -ms-user-select: none;
        user-select: none;
      }

      p {
      font-size: 20px;
      font-family: Arial;
      }
      
      .nocopy {
          -webkit-user-select: none;
-khtml-user-select: none;
-moz-user-select: none;
-ms-user-select: none;
-o-user-select: none;
user-select: none;
      }

      h1{
        text-align: center;
      }

      @media (min-width: 768px) {
        .bd-placeholder-img-lg {
          font-size: 3.5rem;
        }
      }
    </style>
    <!-- Custom styles for this template -->
    <link href="starter-template.css" rel="stylesheet">
  </head>
  <body>
    <nav class="navbar navbar-expand-md navbar-dark bg-dark fixed-top">
  <a class="navbar-brand" href="http://devcoder.uz/">DevCoder.uz</a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarsExampleDefault" aria-controls="navbarsExampleDefault" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>

 <a class="navbar-brand" href="logout.php">Shıǵıw</a>
</nav>
</nav>

<main role="main" class="container">

<br>
<br>
<br>
<br>

<?php
error_reporting(0);
ini_set('display_errors', 0);
session_start();

$emailgo=$_SESSION['email'];

if(!isset($_SESSION['email'])) {
    header("location:index.php");
}

    $conn = mysqli_connect("localhost", "shariyar_tatunf","1T7i6U7w","shariyar_tatunf");
    $a=0;
    $sql="SELECT email_org FROM coderusers ";
            $result=mysqli_query($conn,$sql);

            while ($row=$result->fetch_assoc()){
                if($_SESSION['email']==$row['email_org']){
                    $a=1;
                }
            }
            
            if($a==1){
                echo "
    
    <form method='post' action='view.php' >
  <div class='form-group'>
    <label for='exampleFormControlSelect1'> <b> Esap temasin saylań </b></label>
    <select name='esaptema' class='form-control' id='exampleFormControlSelect1'>
      <option value='begin'>begin</option>
      <option value='int'>integer</option>
      <option value='bool'>boolean</option>
      <option value='if'>ifElse</option>
      <option value='case' >case</option>
      <option value='for' >for</option>
      <option value='while' >while</option>
      <option value='minmax' >minmax</option>
      <option value='array' >array</option>
      <option value='matrix' >matrix</option>
      <option value='string' >string</option>
    </select>
  </div>
  <div class='form-group'>
    <label for='exampleFormControlInput1'> <b> Esap nomerin kiritiń </b> </label>
    <input type='number' name='esapnomer' class='form-control' id='exampleFormControlInput1' placeholder=''>
  </div>
  
  <button type='submit' class='btn btn-lg btn-primary'>Kodların shıǵarıw</button>
 
</form>


    
                ";
            }
            
            else {
               echo "
               
               <div class='alert alert-success' role='alert'>
  <h4 class='alert-heading'>Húrmetli $emailgo </h4>
  <p>DevCoder.uz sheshimler bóliminen paydalanıw ushın, saytımızǵa jazılıwıńız kerek </p>
  <hr>
  <p class='mb-0'>Tómende tolıq maǵlıwmat keltirilgen <br> <br>
  
            <h3>- 1 ay ushın jazılıw 15'000 sum</h3> <br>
            
            <h3>- Bunda siz 1 ay dawamında barlıq  esaplardıń sheshiliw kodlarin kóre alasız </h3> <br>
            <h3>- 400 ge jaqın esaplar sheshiliw kodları </h3> <br>
            <h3>- 100 ge jaqın C++ / Java boyınsha video sabaqlar (Ózbek hám Rus tillerinde) </h3> <br>
            <h3>- Bul sizge dásturlewdi elede zor úyreniwge jardem beredi </h3> <br>
            
            
            <br>
            <br>
            <h3> Saytqa jazılıw ushın  Telegramdaǵı <a href='https://www.t.me/shariyarj'> +99899-956-04-27 </a> yamasa   <br>
            <a href='https://www.t.me/shariyardev'> @shariyardev </a> mánziline xabarlasıń</h3> <br>
            <h4> <i> * Jazılǵanıńızdan soń sizge  'dostup' beriledi </i> </h4> <br>
           
  
  </p>
</div>              ";
            }
            
          
            
        
            	
?>

<br>
<br>

<div class="nocopy">

<?php 
  
  $esaptema=$_POST['esaptema'];
  $esapnomer=$_POST['esapnomer'];
  
$conn = mysqli_connect("localhost", "shariyar_tatunf","1T7i6U7w","shariyar_tatunf");
  
  $sql="SELECT * FROM `answer` Where tema ='$esaptema$esapnomer' ";
$result=mysqli_query($conn,$sql);

echo "<table class='table table-bordered'>
  <thead>
    <tr class='table-primary'>
      <th scope='col'>Temasi</th>
      <th scope='col'>C++ sheshimi kodi</th>
      <th scope='col'>Java sheshimi kodi</th>
    </tr>
  </thead>
";

 while ($row=$result->fetch_assoc()){
  echo"<tbody>
    <tr>
      <td>".$row['tema']."</td>
      <td><pre>".$row['ctext']."</pre></td>
      <td><pre>".$row['javatext']."</pre></td>
     
    
     </table>
     </tbody>
      ";
      
      if($esapnomer>0){
        echo "  <div class='alert alert-warning' role='alert'>
  Kodlar kopiyalanbaydı ! Óziniz túsinip terip kóriń sonda zor nátiyjege erisesiz GARANT 200%
</div> ";
      }
     
 }
 
  if($esapnomer>0){
       echo "
 <table class='table table-bordered'>
  <thead>
    <tr>
      <td colspan='4'><p align='center'> <b> C++ hám Java videosabaqlar / Видеоуроки Java , C++ </b></p> </td>
    </tr>
  </thead>
  <tbody>
    <tr>
      
    </tr>
    <tr>
      <th scope='row'>1</th>
      <td> <a href='https://www.youtube.com/watch?v=2BlETkdYFJk&list=PLY4N-4FJdZQCzjRxjFfHQ57xAYvKmk2Yo' target='_blank'> C++ darslari 0 dan. O'zbek tilida </td>
      <td> <a href='https://www.youtube.com/watch?v=zAg_Jgs-mvk&list=PL4WZfj6hmmuDXdKrsPtQCs7V-YJB40cm1' target='_blank'>C++ darslari. O'zbek tilida</td>
      <td> <a href='https://www.youtube.com/watch?v=qSHP98i9mDU&list=PL0lO_mIqDDFXNfqIL9PHQM7Wg_kOtDZsW' target='_blank'> C++ для начинающих. На русском языке</td>
    </tr>
    <tr>
      <th scope='row'>2</th>
      <td><a href='https://www.youtube.com/watch?v=6rZXNf7WB98&list=PLGWzrBMoogxDR8s2J3TRyM8B-VZs6nUyc' target='_blank'> Java video darslar. O'zbek tilida</td>
      <td><a href='https://www.youtube.com/watch?v=TM8Cgik_qVo&list=PLYElaqNvwMAw_7dehYFcjE4b4hiYfCKSt' target='_blank'> Java 0 dan organish. O'zbek tilida</td>
      <td><a href='https://www.youtube.com/watch?v=Zxpz5tRrUvU&list=PL0lO_mIqDDFW2xXiWSfjT7hEdOUZHVNbK' target='_blank'> Java c нуля для начинающих. На русском языке</td>
    </tr>
  </tbody>
</table>
 ";
  }
     

      
?>

</div>



</main><!-- /.container -->



</body>
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
      <script>window.jQuery || document.write('<script src="../assets/js/vendor/jquery.slim.min.js"><\/script>')</script><script src="../assets/dist/js/bootstrap.bundle.min.js"></script>
</html>
