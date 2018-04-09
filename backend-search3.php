

    <?php

    /* Conn */

    $link = mysqli_connect("sql206.byethost9.com", "b9_21611491", "sh33ph3ad", "b9_21611491_hmongPres");

     

    // Check connection

    if($link === false){

        die("ERROR: Could not connect. " . mysqli_connect_error());

    }

     

    if(isset($_REQUEST['term'])){

        // Prepare a select statement

        $sql = "SELECT * FROM photos WHERE description LIKE ?";

        

        if($stmt = mysqli_prepare($link, $sql)){

            // Bind variables to the prepared statement as parameters

            mysqli_stmt_bind_param($stmt, "s", $param_term);

            

            // Set parameters

            $param_term = $_REQUEST['term'] . '%';

            

            // Attempt to execute the prepared statement

            if(mysqli_stmt_execute($stmt)){

                $result = mysqli_stmt_get_result($stmt);

                

                // Check number of rows in the result set

                if(mysqli_num_rows($result) > 0){

                    // Fetch result rows as an associative array

                    while($row = mysqli_fetch_array($result, MYSQLI_ASSOC)){

						echo '<p><img src="'.$row['location'].'"></p>';
                        echo "<p>Title: " . $row["caption"] . "</p>";
						echo "<p>Contributor Name: " . $row["contributor"] . "</p>";
						echo "<p>Description: " . $row["description"] . "</p>";

                    }

                } else{

                    echo "<p>No matches found</p>";

                }

            } else{

                echo "ERROR: Could not able to execute $sql. " . mysqli_error($link);

            }

        }

         

        // Close statement

        mysqli_stmt_close($stmt);

    }

     

    // close connection

    mysqli_close($link);

    ?>

