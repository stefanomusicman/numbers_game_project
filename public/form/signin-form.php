<?php
/**
 *Carolina: I added this form only to test the sing in and database  
 *@Stefano, you can replace all of this with your code, and redirect to src/features/signin.php
 *use this variables: 
 *$user= $_POST['user'];  
 *$password= $_POST['password'];
 *
 */
?>
<!DOCTYPE html>
<html>

<head>
  <title>Question</title>
  <link rel="stylesheet" href="style.css">
</head>

<body>
  <div class="container">
    <h1 class="blueText">Sing in Form</h1>
    <hr>
    <!--Form--> 
    <form id="form1" method="post" action="../../src/features/signin.php">
      <table>
        <tr>
          <th><label for=input1>User: </label></th>
          <td><input id=input1 type="text" name="user" required="required"></td>
        </tr>
        <tr>
          <th><label for=input2>Password: </label></th>
          <td><input id=input2 type="text" name="password" required="required"></td>
        </tr>
        
        <tr class="submit">
          <td></td>
          <td><input id="submit1" type="submit" name="send" value="SEND" /></td>
        </tr>
      </table>
    </form>
  </div>
</body>

</html>