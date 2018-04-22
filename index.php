<?php 
// Print a greeting if the form was submitted 
if ( $_POST [ 'user' ]) { 
    print "Hello, " ; 
    // Print what was submitted in the form parameter called 'user' 
    print $_POST [ 'user' ]; 
    print "!" ; 
} else {
    print <<<_HTML
        <form method="post" action="$_SERVER[PHP_SELF]"> 
            Your Name: 
            <input type="text" name="user" /> <br/> 
            <button type="submit">Say Hello</button> 
        </form>
_HTML;
}