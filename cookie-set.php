<?php 
setcookie('userid', 'ralph'); 

// The cookie expires one hour from now 
setcookie( 'short-userid', 'ralph', time() + 60 * 60); 
// The cookie expires one day from now 
setcookie('longer-userid', 'ralph', time() + 60 * 60 * 24); 
// The cookie expires at noon on October 1, 2019 
$d = new DateTime("2019-10-01 12:00:00" ); 
setcookie ('much-longer-userid', 'ralph', $d->format('U'));
?> 
<html>
<head>
    <title>Page with cookies</title>
</head>
<body> 
    This page sets a cookie properly, because the PHP block with setcookie() 
    in it comes before all of the HTML. 
</body>
</html>