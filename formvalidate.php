<?php
// Logic to do the right thing based on 
// the request method 
if ( 'POST' == $_SERVER [ 'REQUEST_METHOD' ]) {
    if ($form_errors = validate_form()) { 
        show_form($form_errors); 
    } else {
        process_form();
    }
} else { 
    show_form(); 
} 

// Do something when the form is submitted 
function process_form () { 
    print "Hello, " . $_POST [ 'my_name' ];
} 

// Display the form 
function show_form($errors = FALSE) {
    // If some errors were passed in, print them out
    if ( $errors ) {
        $style = 'style="color:red"';
        print "Please correct these errors: <ul><li $style>"; 
        print implode ( "</li><li $style>" , $errors ); 
        print '</li></ul>'; 
    }
    print <<<_HTML_
    <form method="POST" action="$_SERVER[PHP_SELF]"> 
    Your name: <input type="text" name="my_name"> <br/> 
    <input type="submit" value="Say Hello"> </form> 
_HTML_;
}

// Check the form data 
function validate_form () { 
    // Start with an empty array of error messages 
    $errors = array(); 
    
    // Add an error message if the name is too short 
    if (strlen($_POST[ 'my_name' ]) < 3) { 
        $errors [ ] = 'Your name must be at least 3 letters long.'; 
    } 
    
    // Return the (possibly empty) array of error messages 
    return $errors; 
}
