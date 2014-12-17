<!DOCTYPE html>


<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
    </head>
    <body>
        
        <h1> My Form </h1>
        <form action ="#" method="get">
            Name: <input type="text" name="fname" />
            <input type="submit" />
        <form/>
        
        <?php
            var_dump($_GET); // $GET Gets values that come from the URL
            echo $_GET['fname']; // Not secure
            echo filter_input(INPUT_GET, 'fname');// Does same thing but 
                               // allows you to access the variable more safely
           
           /*You can access the values to check if they equal something.
             * Depending on the value you might get a different echo output
             * or none at all.*/
           
           if ($_GET['fname']=== "one") {
               echo '<p> this is one </p>';
           } else if($_GET['fname']=== "two"){
               echo '<p> this is two </p>';} ?>
    </body>
</html>
