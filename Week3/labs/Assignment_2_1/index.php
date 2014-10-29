<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN"
    "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <title>User Data</title>
    <link rel="stylesheet" type="text/css" href="main.css"/>
</head>

<body>
    <div id="content">
    <h1>User Data</h1>

    <form action="display_results.php" method="post">

        <div id="data">
            <label>Name:</label>
            <input type="text" name="name"
                   value="<?php echo $name; ?>"/><br />

            <label>Phone Number:</label>
            <input type="text" name="phone"
                   value="<?php echo $phone; ?>"/><br />

            <label>E-Mail:</label>
            <input type="text" name="email"
                   value="<?php echo $email; ?>"/><br />
            
            <label>ZIP Code:</label>
            <input type="text" name="zipcode"
                   value="<?php echo $zipcode; ?>"/><br />
        </div>

        <div id="buttons">
            <label>&nbsp;</label>
            <input type="submit" value="submit"/><br />
        </div>

    </form>
    </div>
</body>
</html>