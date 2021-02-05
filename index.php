<!-- The code for this page has been  inspired by a YouTube video by DCodeMania which demonstrated how to create a product filter using PHP, MYSQLI and Ajax
The actual link for the video can be found in the documentation report-->

<!-- note: action.php and config.php work in conjunction with this page, and vise versa-->
<?php
require 'config.php';
?>

<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <!-- Latest compiled and minified CSS -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">

<!-- jQuery library -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

<!-- Popper JS -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>

<!-- Latest compiled JavaScript -->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

<title>Directory</title>

<style>
body{background-color: #F7EEE5 !important;}

.title h2{
	padding-top: 3%;
	font:Helvetica Bold;
	font-size: 3.2rem;
	color: #E68359;
	text-align: center;
	text-decoration: none;
}


.title h2:hover{
	color: #8D9B6A;

}
.nav-link p {
	font-size: 16px;
	color: #8D9B6A;
	font-family:Georgia; 
	margin-right: 10px;
	margin-left: 10px;
}
.navbar ul{
	margin-left: auto;

    margin-right: auto;
}
.navbar li a {
    display: block;
    text-decoration: none;
    margin-right:;   
    margin-left: ;
    width: auto;   
    padding: 10px;
    font-weight: italic;
    line-height: 0.15em;
    color:#1e5799;
    border-right: 1px solid white;
}


nav li:last-child a {
    border:none;
}

.navbar li a p:hover {
 	color: #EDB286;
}

.custom-toggler.navbar-toggler { 
  border-color:#E68359; 
} 

.custom-toggler .navbar-toggler-icon { 
  background-image: url( 
"data:image/svg+xml;charset=utf8,%3Csvg viewBox='0 0 32 32' xmlns='http://www.w3.org/2000/svg'%3E%3Cpath stroke='rgb(230, 131, 89)' stroke-width='2' stroke-linecap='round' stroke-miterlimit='10' d='M4 8h24M4 16h24M4 24h24'/%3E%3C/svg%3E"); 
} 


.heading {
  text-align: center;
	color: #636261;
	font-size: 2.5rem;
	font-family: 'Athelas';
	text-shadow: -2px 1px #F7EEE4;
}

.subheading{
color: black;
font-family: 'Athelas';
}


.ex1 {
  margin-right: 1.25rem;
  text-align:center;
}

.square {
    float:left;
    position: relative;
    background-repeat:no-repeat;
    width:15.625rem;
    height: 15.625rem;
    object-fit:cover;
}


.column {
  float: left;
  padding: 0.625rem;
	text-align: center;
}


/* stack on top of each other */
@media screen and (max-width: 31.25rem) {
  .column {
	text-align: center;
    width: 100%;
  }
  .card-deck{
	text-align: center;
    width: 100%;
  }

}


</style>
  </head>

  <body>
    
<div class="main">
 		<div class = "header">
			<a class ="title" style="text-decoration : none" href="home.html"><h2>seeds.</h2></a>
	</div>

<nav class="navbar navbar-expand-lg">
  <button class="navbar-toggler custom-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>
  <div class="collapse navbar-collapse" id="navbarNav">
    <ul class="navbar-nav">

      <li class="nav-item">
        <a class="nav-link" href="index.php"><p><i>Brands</i></p></a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="blog.html"><p><i>Blog</i></p></a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="practices.html"><p><i>Ethical Practices</i></p></a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="about.html"><p><i>About</i></p></a>
      </li>
        <li class="nav-item">
        <a class="nav-link" href="FAQ.html"><p><i>FAQ</i></p></a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="newsletter.php"><p><i>Newsletter</i></p><span class="sr-only">(current)</span></a>
      </li>
          </ul>
  </div>
</nav>


<br>
  <h3 class="heading">Directory</h3>
  <br>
  <div class="container-fluid">
    <div class="row">
      <div class="col-lg-3">
        <h4 class="subheading">Filters</h4>
        <hr>
        <h5 class="subheading">Price</h5>
        <ul class="list-group">
          <?php
          $sql= "SELECT DISTINCT price FROM data ORDER BY price ASC";
          $result=$mysqli->query($sql);
          while ($row=$result->fetch_assoc()) {
           ?>
           <li class="list-group-item">
             <div class="form-check">
               <label class="form-check-label">
               <input type="checkbox" class="form-check-input product_check"
               value="<?= $row['price']; ?>" id="price"><?= $row['price']; ?>
               </label>
             </div>
           </li>
         <?php } ?>

        </ul>
        <br>
        <h5 class="subheading">Rating</h5>
        <ul class="list-group">
          <?php
          $sql= "SELECT DISTINCT rating FROM data ORDER BY rating ASC";
          $result=$mysqli->query($sql);
          while ($row=$result->fetch_assoc()) {
           ?>
           <li class="list-group-item">
             <div class="form-check">
               <label class="form-check-label">
               <input type="checkbox" class="form-check-input product_check"
               value="<?= $row['rating']; ?>" id="rating"><?= $row['rating']; ?>
               </label>
             </div>
           </li>
         <?php } ?>

        </ul>


      </div>
      <div class="col-lg-9">
        <div class="row" id="result">
          <?php
          $sql="SELECT * FROM data";
          $result=$mysqli->query($sql);
          while ($row=$result->fetch_assoc()) {
           ?>
           <div class="column-md-3 mb-2 justify-content-center">
             <div class="column">
             <div class="card-deck ex1">
               <div class="card border-secondary">

                <br>
                 <div class="card-body" style="width: 18rem">
                  <a href="<?= $row['name']; ?>.html">
                  <img src="<?= $row['url']; ?>" alt="images" class="square">
                  </a>
                  <br>
                   <h6 style="margin-top:175px;" class="text-light bg-secondary text-center rounded p-1"><?=$row['name']; ?></h6>

                 </div>
                 <div class="card-body">
                  <p>
                    Price: <?= $row['price']; ?><br>
                    Rating: <?= $row['rating']; ?><br>
                  </p>
                 </div>
               
               </div>
               
             </div>
           </div>
           </div>
         <?php } ?>
        </div>
      </div>
    </div>
  </div>

<!-- following is for the filters to workkkk -->
<script type="text/javascript">
  $(document).ready(function(){
    
    $(".product_check").click(function(){
        var action='data';
        var price = get_filter_text('price');
        var rating = get_filter_text('rating');
        
        $.ajax({
        url:'action.php',
        method:'POST',
        data:{action:action,price:price,rating:rating},
        success:function(response){
            $("#result").html(response);
        }
        });
    });
    
    function get_filter_text(text_id){
        var filterData =[];
        $('#' +text_id + ':checked').each(function(){
            filterData.push($(this).val());
            
        });
        return filterData;
    }
  });
</script>
</div>

  </body>
  

</html>
