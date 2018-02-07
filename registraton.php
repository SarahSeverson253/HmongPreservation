<?php

    // CONFIG REQUIREMENT

    require_once 'config.php';

     

    // VARIABLE DEFINITION AND INIT

    $username = $password = $confirm_password = "";

    $username_err = $password_err = $confirm_password_err = "";

     

    // PROCESS FORM DATA UPON SUBMIT

    if($_SERVER["REQUEST_METHOD"] == "POST"){

     

        // USERNAME VALIDATION

        if(empty(trim($_POST["username"]))){

            $username_err = "Please enter a username.";

        } else{

            // SELECT STATEMENT PREP

            $sql = "SELECT userID FROM user WHERE username = ?";

            

            if($stmt = mysqli_prepare($link, $sql)){

                // BIND VARIABLES

                mysqli_stmt_bind_param($stmt, "s", $param_username);

                

                // SET PARAMETERS

                $param_username = trim($_POST["username"]);

                

                // EXECUTE PREP STATEMENT

                if(mysqli_stmt_execute($stmt)){

                    /* STORE */

                    mysqli_stmt_store_result($stmt);

                    

                    if(mysqli_stmt_num_rows($stmt) == 1){

                        $username_err = "This username is already taken.";

                    } else{

                        $username = trim($_POST["username"]);

                    }

                } else{

                    echo "Oops! Something went wrong. Please try again later.";

                }

            }

             

            // CLOSE

            mysqli_stmt_close($stmt);

        }

        

        // PASSWORD VALIDATION

        if(empty(trim($_POST['password']))){

            $password_err = "Please enter a password.";     

        } elseif(strlen(trim($_POST['password'])) < 6){
			
			//Password requirements can be set later - just 6 characters min for now!

            $password_err = "Password must have at least 6 characters.";

        } else{

            $password = trim($_POST['password']);

        }

        

        // VALIDATE PASSWORD CONFIRMATION

        if(empty(trim($_POST["confirm_password"]))){

            $confirm_password_err = 'Please confirm password.';     

        } else{

            $confirm_password = trim($_POST['confirm_password']);

            if($password != $confirm_password){

                $confirm_password_err = 'Password did not match.';

            }

        }

        

        // CHECK INPUT ERRORS

        if(empty($username_err) && empty($password_err) && empty($confirm_password_err)){

            

            // INSERT STATEMENT

            $sql = "INSERT INTO user (username, password) VALUES (?, ?)";

             

            if($stmt = mysqli_prepare($link, $sql)){

                // BIND VAR TO STATEMENT W/PARAMETERS

                mysqli_stmt_bind_param($stmt, "ss", $param_username, $param_password);

                

                // SET PARAMETERS

                $param_username = $username;

                $param_password = password_hash($password, PASSWORD_DEFAULT); // PASSWORD HASH

                

                // EXECUTE PREP STATEMENT

                if(mysqli_stmt_execute($stmt)){

                    // REDIRECT TO LOGIN

                    header("location: login.php");

                } else{

                    echo "Something went wrong. Please try again later.";

                }

            }

             

            // CLOSE

            mysqli_stmt_close($stmt);

        }

        

        // CLOSE CONNECTION

        mysqli_close($link);

    }

    ?>

    <!DOCTYPE html>
	
	<!--
	
	NOTE: This will be changed later with Rhodia's code! I just input dummy HTML here
	for now in order to keep track of the PHP statements for each field.

    <html lang="en">

    <head>

        <meta charset="UTF-8">

        <title>Sign Up</title>

        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.css">

        <style type="text/css">

            body{ font: 14px sans-serif; }

            .wrapper{ width: 350px; padding: 20px; }

        </style>

    </head>

    <body>

        <div class="wrapper">

            <h2>Sign Up</h2>

            <p>Please fill this form to create an account.</p>

            <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">

                <div class="form-group <?php echo (!empty($username_err)) ? 'has-error' : ''; ?>">

                    <label>Username</label>

                    <input type="text" name="username"class="form-control" value="<?php echo $username; ?>">

                    <span class="help-block"><?php echo $username_err; ?></span>

                </div>    

                <div class="form-group <?php echo (!empty($password_err)) ? 'has-error' : ''; ?>">

                    <label>Password</label>

                    <input type="password" name="password" class="form-control" value="<?php echo $password; ?>">

                    <span class="help-block"><?php echo $password_err; ?></span>

                </div>

                <div class="form-group <?php echo (!empty($confirm_password_err)) ? 'has-error' : ''; ?>">

                    <label>Confirm Password</label>

                    <input type="password" name="confirm_password" class="form-control" value="<?php echo $confirm_password; ?>">

                    <span class="help-block"><?php echo $confirm_password_err; ?></span>

                </div>

                <div class="form-group">

                    <input type="submit" class="btn btn-primary" value="Submit">

                    <input type="reset" class="btn btn-default" value="Reset">

                </div>

                <p>Already have an account? <a href="login.php">Login here</a>.</p>

            </form>

        </div>    

    </body>
	
	-->

    </html>

