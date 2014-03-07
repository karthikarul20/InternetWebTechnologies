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

  

// for adding the Brand Names
function list_results ()
{
    require ('mysqli_connect.php'); // Connect to the db.
    
    // Make the query:
    $searchQuery=$_REQUEST['query'];
    debug_to_console("Search Query-->". $searchQuery);
    
    $q = "select foodName from nutrition_details where category like '%" . $searchQuery . "%'";
    $r = @mysqli_query ($dbc, $q); // Run the query.
    
    if ($r) { // If it ran OK, display the records.
    
        // Fetch and print all the records:
        while ($row = mysqli_fetch_array($r, MYSQLI_ASSOC)) {
            
            $foodName = $row['foodName'];
            
            echo '<div class="prod_box">
                	<div class="top_prod_box"></div>
                    <div class="center_prod_box">
                         <div class="product_title"><a href="details.html">';
            echo $foodName;
            echo '</a></div>
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
    
    
        mysqli_free_result ($r); // Free up the resources.
    
    } else { // If it did not run OK.
    
        // Debugging message:
        echo '<p>' . mysqli_error($dbc) . '<br /><br />Query: ' . $q . '</p>';
    
    } // End of if ($r) IF.
    
    mysqli_close($dbc); // Close the database connection.

} // End of the function list_categories.



// for adding the Brand Names
function list_popular_foods ()
{
    try {
        //select * from employee limit 2,4

        $con = mysqli_connect("localhost:3306", "root", "9944200629.a","nutrients_php");
        // Check connection
        if (mysqli_connect_errno()) {
            echo "Failed to connect to MySQL: " . mysqli_connect_error();
        }
        $searchQuery=$_REQUEST['query'];
        debug_to_console("Search Query-->". $searchQuery);
        //             $sqlqr = "INSERT INTO `ncool`.`coolbits_table` (`name`, `text`, `date`) VALUES ('" . $name . "', '" . $text . "', CURRENT_TIMESTAMP);";

        //             $sqlqr ="select foodName from nutrition_details where id =" . $searchQuery . "";
        $sqlqr=str_replace("'","\'","select foodName from nutrition_details where foodName like '%" . $searchQuery . "%'");

        debug_to_console("Query-->" . $sqlqr);

        $result = mysqli_query($con, $sqlqr);

        if ($result != false) {
            debug_to_console("Inside if");

            $foundnum = mysqli_num_rows($result);
            if ($foundnum == 0) {
                debug_to_console("No results found.");

                echo 'No results found.';
            }
        }
        else
        {
            debug_to_console("Inside else");
            //                                 debug_to_console(mysqli_error($con));
            //                                 printf("error: %s\n");


        }

        while ($row = mysqli_fetch_array($result)) {
            $foodName = $row['foodName'];

            echo '<div class="prod_box">
                	<div class="top_prod_box"></div>
                    <div class="center_prod_box">
                         <div class="product_title"><a href="details.html">';
            echo $foodName;
            echo '</a></div>
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
    }
    catch (Exception $e) {
        echo 'Caught exception: ',  $e->getMessage(), "\n";
    }


} // End of the function list_categories.


?>


<html>
<head>
<meta http-equiv="Content-Type"
	content="text/html; charset=windows-1252" />
<title>Search Page</title>
<link rel="stylesheet" type="text/css" href="style.css" />
<!--[if IE 6]>
<link rel="stylesheet" type="text/css" href="iecss.css" />
<![endif]-->
<script type="text/javascript" src="js/boxOver.js"></script>
</head>
<body>


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




		<div class="center_content">
			<div class="center_title_bar">Popular Food Items</div>
    
            <?php list_results(); ?>
	
    
       
   </div>
		<!-- end of center content -->


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

	<
	<!-- end of main_container -->
</body>
</html>