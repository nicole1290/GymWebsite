<?php

//include ('./assets/HTML/membership.html');

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Membership Dummy Test</title>
</head>

<body>

    <form action="registrationMembership" method="POST">
        
        <label for="Membership">Membership:</label>

        <select name="Membership">
            <option value="Membership 1">Membership 1</option>
            <option value="Membership 2">Membership 2</option>
            <option value="Membership 3">Membership 3</option>
        </select>
        <br>

        <label for="StartDate">Start Date</label>
        <input type="date" name="StartDate" id="start_date">
        <br>
        <label for="EndDate">Start Date</label>
        <input type="date" name="EndDate" id="start_date">
        <br>

        <button type="submit" name="membership">Submit</button>

    </form>

</body>

</html>