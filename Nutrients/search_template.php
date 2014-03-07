<?php # Script 1.0 - search.php
// This script performs a SELECT query to retrieve matching records from the users table.

$page_title = 'Search';
include ('includes/header.html');
$input_cnt = 0;  // count the number of user inputs
$where_cnd = ' where '; // contain "where condition" for a select query

// Check for form submission:
if ($_SERVER['REQUEST_METHOD'] == 'POST') {

	require ('mysqli_connect.php'); // Connect to the db.
		
	// Check for a first name:
	if (!empty($_POST['first_name'])) {
		$input_cnt += 1;
		$fn = mysqli_real_escape_string($dbc, trim($_POST['first_name']));
		$where_cnd .= "first_name LIKE '%$fn%'";
	}
	
	// Check for a last name:
	......
	
	
	if ($input_cnt > 0) { // If there is at least one input from the user.
	
		// Search users in the database...
		
		// Make the query:
		......
        
		// Run the query.
		......

        // Count the number of returned rows:
        $num = ......

        if ($num > 0) { // If it ran OK, display the records.

	       // Print how many users there are:
	       echo "<p>There are currently $num matched registered users.</p>\n";

	       // Table header.
	       echo '<table align="center" cellspacing="3" cellpadding="3" width="75%">
	        <tr><td align="left"><b>Name</b></td><td align="left"><b>Date Registered</b></td></tr>';
	
	       // Fetch and print all the records:
	       ......

	       echo '</table>'; // Close the table.
	
	       // Free up the resources.
		   ......	

        } else { // If no records were returned.

	      echo '<p class="error">There are currently no matched registered users.</p>';
        }
			
	} else { // Report the errors.
	
		echo '<h1>Error!</h1>
		<p class="error">The following error(s) occurred:<br />';
		echo '</p><p>Please input at least one value in the form. Please try again.</p><p><br /></p>';
		
	} // End of if (empty($errors)) IF.
	
	// Close the database connection.
	......

} // End of the main Submit conditional.
?>
<h1>Search</h1>
<form action="search.php" method="post">
	<p>First Name: <input type="text" name="first_name" size="15" maxlength="20" value="<?php if (isset($_POST['first_name'])) echo $_POST['first_name']; ?>" /></p>
	<p>Last Name: <input type="text" name="last_name" size="15" maxlength="40" value="<?php if (isset($_POST['last_name'])) echo $_POST['last_name']; ?>" /></p>
	
	<p><input type="submit" name="submit" value="Search" /></p>
</form>
<?php include ('includes/footer.html'); ?>