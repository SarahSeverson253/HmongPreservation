

    <?php

    // INCLUDE CONFIG

    require_once 'config.php';

     

    // DEFINE VARIABLES AND INITIALIZE WITH EMPTY VALUES

    $username = $password = "";

    $username_err = $password_err = "";

     

    // PROCESS DATA WHEN SUBMITTED

    if($_SERVER["REQUEST_METHOD"] == "POST"){

     

        // CHECK EMPTY USERNAME

        if(empty(trim($_POST["username"]))){

            $username_err = 'Please enter your username.';

        } else{

            $username = trim($_POST["username"]);

        }

        

        // CHECK PASSWORD EMPTY

        if(empty(trim($_POST['password']))){

            $password_err = 'Please enter your password.';

        } else{

            $password = trim($_POST['password']);

        }

        

        // VALIDATE CREDENTIALS

        if(empty($username_err) && empty($password_err)){

            // PREPARE SELECT STATEMENT

            $sql = "SELECT username, password FROM user WHERE username = ?";

            

            if($stmt = mysqli_prepare($link, $sql)){

                // BIND VARIABLES TO PREP STATEMENT AS PARAMETERS

                mysqli_stmt_bind_param($stmt, "s", $param_username);

                

                // SET PARAMETERS

                $param_username = $username;

                

                // EXECUTE PREP STATEMENT

                if(mysqli_stmt_execute($stmt)){

                    // STORE RESULT

                    mysqli_stmt_store_result($stmt);

                    

                    // CHECK USERNAME EXISTS, THEN PASSWORD

                    if(mysqli_stmt_num_rows($stmt) == 1){                    

                        // BIND RESULT VAR

                        mysqli_stmt_bind_result($stmt, $username, $hashed_password);

                        if(mysqli_stmt_fetch($stmt)){

                            if(password_verify($password, $hashed_password)){

                                /* PASSWORD CORRECT, START NEW SESSION */

                                session_start();

                                $_SESSION['username'] = $username;      

                                header("location: welcome.php");

                            } else{

                                // ERROR FOR INVALID PASSWORD

                                $password_err = 'Invalid password.';

                            }

                        }

                    } else{

                        // ERROR IF USERNAME DOESN'T EXIST

                        $username_err = 'No account exists with that username.';

                    }

                } else{

                    echo "Oops! Something went wrong. Please try again later.";

                }

            }

            

            // CLOSE STATEMENT

            mysqli_stmt_close($stmt);

        }

        

        // CLOSE CONNECTION

        mysqli_close($link);

    }

    ?>

     <!-- DUMMY HTML 
	 
	 (to be changed to Rhodia's HTML/CSS later)

    <!DOCTYPE html>

    <html lang="en">

    <head>

        <meta charset="UTF-8">

        <title>Login</title>

        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.css">

        <style type="text/css">

            body{ font: 14px sans-serif; }

            .wrapper{ width: 350px; padding: 20px; }

        </style>

    </head>

    <body>

        <div class="wrapper">

            <h2>Login</h2>

            <p>Please fill in your credentials to login.</p>

            <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">

                <div class="form-group <?php echo (!empty($username_err)) ? 'has-error' : ''; ?>">

                    <label>Username</label>

                    <input type="text" name="username"class="form-control" value="<?php echo $username; ?>">

                    <span class="help-block"><?php echo $username_err; ?></span>

                </div>    

                <div class="form-group <?php echo (!empty($password_err)) ? 'has-error' : ''; ?>">

                    <label>Password</label>

                    <input type="password" name="password" class="form-control">

                    <span class="help-block"><?php echo $password_err; ?></span>

                </div>

                <div class="form-group">

                    <input type="submit" class="btn btn-primary" value="Login">

                </div>

                <p>Don't have an account? <a href="register.php">Sign up now</a>.</p>

            </form>

        </div>    

    </body>

    </html>
-->

