

    <!DOCTYPE html>
    <html lang="en">
    <head>
      <meta charset="UTF-8">
      <title>Registration</title>
	  

    <script type="text/javascript">
      function validateForm()
      {
        var a=document.forms["reg"]["fname"].value;
        var b=document.forms["reg"]["lname"].value;
        var c=document.forms["reg"]["gender"].value;
		var d=document.forms["reg"]["email"].value;
        var e=document.forms["reg"]["username"].value;
        var f=document.forms["reg"]["password"].value;
        if ((a==null || a=="") && (b==null || b=="") && (c==null || c=="") && (d==null || d=="") && (e==null || e=="")&& (f==null || f==""))
        {
          alert("All fields must be filled out.");
          return false;
        }
        if (a==null || a=="")
        {
          alert("First name must be filled out.");
          return false;
        }
        if (b==null || b=="")
        {
          alert("Last name must be filled out.");
          return false;
        }
        if (c==null || c=="")
        {
          alert("Gender must be filled out.");
          return false;
        }
        if (d==null || d=="")
        {
          alert("Email must be filled out.");
          return false;
        }
        if (e==null || e=="")
        {
          alert("Username must be filled out.");
          return false;
        }
		if (f==null || f=="")
        {
          alert("Password must be filled out.");
          return false;
        }
      }
    </script>
    </head>
    <body>
     
    <form name="reg" action="code_exec.php" onsubmit="return validateForm()" method="post">
      <table width="274" border="0" align="center" cellpadding="2" cellspacing="0">
        <tr>
          <td colspan="2">
            <div align="center">
              <?php 
              // $remarks=$_GET['remarks'];
              if (!isset($_GET['remarks']))
              {
                echo 'Register Here';
              }
              if (isset($_GET['remarks']) && $_GET['remarks']=='success')
              {
                echo 'You have successfully registered!';
              }
              ?>  
            </div></td>
          </tr>
          <tr> 
            <td width="95"><div align="right">First Name:</div></td>
            <td width="171"><input type="text" name="fname" /></td>
          </tr>
          <tr>
            <td><div align="right">Last Name:</div></td>
            <td><input type="text" name="lname" /></td>
          </tr>
          <tr>
            <td><div align="right">Gender:</div></td>
            <td><input type="text" name="gender" /></td>
          </tr>
          <tr>
            <td><div align="right">Email:</div></td>
            <td><input type="text" name="email" /></td>
          </tr>
          <tr>
            <td><div align="right">Username:</div></td>
            <td><input type="text" name="username" /></td>
          </tr>
          <tr>
            <td><div align="right">Password:</div></td>
            <td><input type="text" name="password" /></td>
          </tr>
          <tr>
            <td><div align="right"></div></td>
            <td><input name="submit" type="submit" value="Submit" /></td>
          </tr>
        </table>
      </form>
    </body>
    </html>