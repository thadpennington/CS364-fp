<html>

<!-- Demo.php - 3/21/2011 - Steve Hadfield (edited by Joel Coffman) -->
<!-- Shows how to access POST and SYSTEM parameters in PHP -->

 <head>
   <title>CS 364 PEX2 Demo.php</title>
   <style>
     body {font-family: Arial; color: black; }
     h1 {background-color: blue; color: white; }
   </style>
 </head>

 <body>
   <center>
     <h1>CS364 PEX2 Demo.php Results</h1>
     <br />
     <br />

<!-- Note the use of <?php ?> to embed PHP commands
     and $_POST['<parameter_name>'] to get POST parameters -->

     <table border="1" cellpadding="3">
       <tr><th>Parameter</th><th>Value</th></tr>
       <tr><td>username</td><td><?php echo $_POST['username']; ?></td></tr>
       <tr><td>email</td><td><?php echo $_POST['emailAddress']; ?></td></tr>
       <tr><td>password hash</td><td><?php echo $_POST['password']; ?></td></tr>
       <tr><td>sex</td><td>
           <?php
                 if (isset($_POST['sex']))
                 { echo $_POST['sex']; }
                 else { echo 'undefined'; }
                                           ?></td></tr>
     </table>
     <br />

<!-- Below demonstrates how to get system information from PHP -->

     Web page <b><?php echo $_SERVER['DOCUMENT_ROOT'].$_SERVER['REQUEST_URI'] ?></b><br />
     accessed on <b><?php echo date("Y-m-d H:i") ?></b>
        from IP address <b><?php echo $_SERVER['REMOTE_ADDR'] ?></b> via
        <b><?php echo $_SERVER['REQUEST_METHOD'] ?></b><br/>
     <br />

<!-- Give a link back to the main page -->

     <a href="<?php echo $_SERVER["HTTP_REFERER"]; ?>">Click Here</a> to return to the CSL web site.

   </center>
 </body>
</html>