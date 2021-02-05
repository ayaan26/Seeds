<?php
require 'config.php';

if (isset($_POST['action'])){
  $sql="SELECT * FROM data WHERE name !=''";
  if (isset($_POST['price'])){
        $price=implode("','", $_POST['price']);
        $sql .="AND price IN('".$price."')";
   }
  if (isset($_POST['rating'])){
        $rating=implode("','", $_POST['rating']);
        $sql .="AND rating IN('".$rating."')";
   }

    $result=$mysqli->query($sql);
    $output='';
    if (!$result) {
    trigger_error('Invalid query: ' . $mysqli->error);
}
    //$num_rows= mysqli_num_rows($result);

    if($result->num_rows>0){
        while($row=$result->fetch_assoc()){
        $output .='<div class="column-md-3 mb-2 justify-content-center">
             <div class="column">
             <div class="card-deck ex1">
               <div class="card border-secondary">

                <br>
                 <div class="card-body" style="width: 18rem">
                  <a href="'.$row['name'].'".html">
                  <img src="'.$row['url'].'" alt="images" class="square">
                  </a>
                  <br>
                   <h6 style="margin-top:175px;" class="text-light bg-secondary text-center rounded p-1">'.$row['name'].'</h6>

                 </div>
                 <div class="card-body">
                  <p>
                    Price: '.$row['price'].'<br>
                    Rating: '.$row['rating'].'<br>
                  </p>
                 </div>

               </div>

             </div>
           </div>
           </div>';
  }
    }
    else{
    $output="<h3>No Brands Found</h3>";
    }
echo $output;


}

 ?>
