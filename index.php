<?php

session_start();

//Used to include all the needed Classes controller and views that have to be invoked for the good working 
//of the page that the user is trying to open
include 'includes/autoloader.inc.php';

//Used to read all the possible routes that can be invoked by the client side and that can opened from the user
require_once('includes/Routes.inc.php');

