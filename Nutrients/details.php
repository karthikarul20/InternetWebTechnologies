<?php
$popular_food_name = "34534545 Tuna";
$popular_food_description = "A double layer of sear-sizzled 100% pure beef mingled with special sauce on a sesame seed bun and topped with melty American cheese, crisp lettuce, minced onions and tangy pickles.";

function debug_to_console ($data)
{
    if (is_array($data))
        $output = "<script>console.log( 'Debug Objects: " . implode(',', $data) .
                 "' );</script>";
    else
        $output = "<script>console.log( 'Debug Objects: " . $data .
                 "' );</script>";
    
    echo $output;
}

// for adding the Categories
function list_categories ()
{
    $con = mysqli_connect("localhost:3306", "root", "9944200629.a", 
            "nutrients_php");
    // Check connection
    if (mysqli_connect_errno()) {
        echo "Failed to connect to MySQL: " . mysqli_connect_error();
    }
    
    $result = mysqli_query($con, 
            "select distinct(category) from nutrition_details");
    
    while ($row = mysqli_fetch_array($result)) {
        $category_name = $row['category'];
        debug_to_console("$category_name");
        echo '<li class="odd"><a href="services.html">';
        echo $category_name;
        echo '</a></li>';
    }
    
    mysqli_close($con);
} // End of the function list_categories.
  
// for adding the Brand Names
function list_brands ()
{
    $con = mysqli_connect("localhost:3306", "root", "9944200629.a", 
            "nutrients_php");
    // Check connection
    if (mysqli_connect_errno()) {
        echo "Failed to connect to MySQL: " . mysqli_connect_error();
    }
    
    $result = mysqli_query($con, 
            "select distinct(brandname) from nutrition_details");
    
    while ($row = mysqli_fetch_array($result)) {
        $category_name = $row['brandname'];
        debug_to_console("$category_name");
        echo '<li class="odd"><a href="services.html">';
        echo $category_name;
        echo '</a></li>';
    }
    
    mysqli_close($con);
} // End of the function list_categories.
  
// for adding the Brand Names
function list_popular_foods ()
{
    for ($x = 0; $x <= 5; $x ++) {
        echo '<div class="prod_box">
        	<div class="top_prod_box"></div>
            <div class="center_prod_box">            
                 <div class="product_title"><a href="details.html">McSpicy</a></div>
                 <div class="product_img"><a href="details.html"><img src="images/mcchicken.png"  width="94" height="92" alt="" title="" border="0" /></a></div>
                 <div class="prod_price"><span class="reduce">350$</span> <span class="price">270$</span></div>                        
            </div>
            <div class="bottom_prod_box"></div>             
            <div class="prod_details_tab">
            <a href="#" title="header=[Add to cart] body=[&nbsp;] fade=[on]"><img src="images/cart.gif" alt="" title="" border="0" class="left_bt" /></a>
            <a href="#" title="header=[Specials] body=[&nbsp;] fade=[on]"><img src="images/favs.gif" alt="" title="" border="0" class="left_bt" /></a>
            <a href="#" title="header=[Gifts] body=[&nbsp;] fade=[on]"><img src="images/favorites.gif" alt="" title="" border="0" class="left_bt" /></a>           
            <a href="details.html" class="prod_details">details</a>            
            </div>                     
        </div>';
    }
} // End of the function list_categories.
function list_top_food_items ($number)
{
    if ($number = 1) {} else 
        if ($number = 2) {
            
            $popular_food_name = "Spicy Tuna";
            $popular_food_description = "You'll love this tasty new sub! Try it our way with our delicious tuna, creamy Sriracha sauce, tomatoes, green peppers, and jalapenos, or add your favorite veggies to make it yours!";
        }
}


function redirect($url, $statusCode = 303)
{
    header('Location: ' . $url, true, $statusCode);
    die();
}

?>


<html>
<head>
<meta http-equiv="Content-Type"
	content="text/html; charset=windows-1252" />
<title>Details Page</title>
<link rel="stylesheet" type="text/css" href="style.css" />
<!--[if IE 6]>
<link rel="stylesheet" type="text/css" href="iecss.css" />
<![endif]-->
<script type="text/javascript" src="js/boxOver.js"></script>
</head>
<body>

<?php

if (isset($_GET['list_top_food_items'])) {
    $linkchoice = $_GET['list_top_food_items'];
} else {
    $linkchoice = '';
}

list_top_food_items($linkchoice);

?> 

<div id="main_container">
		<div class="top_bar">
			<div class="top_search">
				<div class="search_text">
					<a href="#">Advanced Search</a>
				</div>
				<input type="text" class="search_input" name="search" /> <input
					type="image" src="images/search.gif" class="search_bt" />
			</div>



		</div>
		<div id="header">

			<div id="logo">
				<a href="index.html"><img src="images/logo.gif" alt="" title=""
					border="0" width="237" height="140" /></a>
			</div>

			<div class="oferte_content">
				<div class="top_divider">
					<img src="images/header_divider.png" alt="" title="" width="1"
						height="164" />
				</div>
				<div class="oferta">

					<div class="oferta_content">
						<img src="images/spicy_tuna.png" width="94" height="92" border="0"
							class="oferta_img" />

						<div class="oferta_details">
							<div class="oferta_title"><?php echo $popular_food_name; ?></div>
							<div class="oferta_text"><?php echo $popular_food_description; ?></div>
							<a href="test.php?id=1234" class="details">details</a>
						</div>
					</div>
					<div class="oferta_pagination">


						<a href="?run=1">1</a> 
						<a href="?run=2">2</a> 
						<a href="?run=3">3</a>
						<a href="?run=4">4</a> 
						<a href="?run=5">5</a>

					</div>

				</div>
				<div class="top_divider">
					<img src="images/header_divider.png" alt="" title="" width="1"
						height="164" />
				</div>

			</div>
			<!-- end of oferte_content-->


		</div>

		<div id="main_content">

			<div id="menu_tab">
				<div class="left_menu_corner"></div>
				<ul class="menu">
					<li><a href="index.html" class="nav1"> Home </a></li>
					<li class="divider"></li>
					<li><a href="#" class="nav2">Browse by brands</a></li>
					<li class="divider"></li>
					<li><a href="#" class="nav3">Browse by Categories</a></li>
					<li class="divider"></li>
					<li><a href="#" class="nav4">BMI Calculator</a></li>
					<li class="divider"></li>
					<li><a href="#" class="nav4">Nutritional Facts</a></li>
					<li class="divider"></li>
					<li><a href="contact.html" class="nav6">Contact Us</a></li>

				</ul>

				<div class="right_menu_corner"></div>
			</div>
			<!-- end of menu tab -->

			<div class="crumb_navigation">
				Navigation: <span class="current">Home</span>

			</div>


			<div class="left_content">
				<div class="title_box">Categories</div>

				<ul class="left_menu">
        <?php list_categories();?>
        </ul>

			</div>


		</div>
		<!-- end of left content -->


		<div class="center_content">
			<div class="center_title_bar">Popular Food Items</div>
    
            <?php list_popular_foods();?>
	
    
       
   </div>
		<!-- end of center content -->

		<div class="right_content">

			<div class="title_box">Brand Name</div>

			<ul class="left_menu">
        <?php list_brands();?>

        </ul>


		</div>

	</div>
	<!-- end of right content -->


	<!-- end of main content -->

	<div class="footer">


		<div class="left_footer">
			<img src="images/logo.gif" alt="" title="" width="170" height="49" />
		</div>

		<div class="center_footer">
			Template name. All Rights Reserved 2008<br /> <a
				href="http://csscreme.com/freecsstemplates/" title="free templates"><img
				src="images/csscreme.jpg" alt="free templates"
				title="free templates" border="0" /></a><br /> <img
				src="images/payment.gif" alt="" title="" />
		</div>

		<div class="right_footer">
			<a href="index.html">home</a> <a href="details.html">about</a> <a
				href="details.html">sitemap</a> <a href="details.html">rss</a> <a
				href="contact.html">contact us</a>
		</div>

	</div>

	<!-- end of main_container -->
</body>
</html>