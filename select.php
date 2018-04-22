<?php
$sweets = array(
    'puff' => 'Sesame Seed Puff', 
    'square' => 'Coconut Milk Gelatin Square',
    'cake' => 'Brown Sugar Cake',
    'ricemeat' => 'Sweet Rice and Meat'
);

// Logic to do the right thing based on 
// the request method 
if ( 'POST' == $_SERVER ['REQUEST_METHOD']) {
    list($form_errors, $input) = validate_form();
    if ($form_errors) { 
        show_form($form_errors); 
    } else {
        process_form($input);
    }
} else { 
    show_form(); 
} 

function process_form($input) { 
    print "Your order is " . $GLOBALS['sweets'][$input['order']];
}

function generate_options($options) { 
    $html = ''; 
    foreach ( $options as $value => $option ) { 
        $html .= "<option value=\"$value\">$option</option>\n"; 
    } 
    return $html; 
} 

// Display the form 
function show_form($errors = FALSE) { 
    // If some errors were passed in, print them out
    if ($errors) {
        $style = 'style="color:red"';
        print "Please correct these errors: <ul><li $style>"; 
        print implode ( "</li><li $style>" , $errors ); 
        print '</li></ul>'; 
    }
    $sweets = generate_options($GLOBALS['sweets']);
    print <<<_HTML_
<form method="post" action="$_SERVER[PHP_SELF]"> 
Your Order: 
<select name="order">
$sweets 
</select>
<br/> 
<input type="submit" value="Order"> 
</form>
_HTML_;
}

// Check the form data 
function validate_form () { 
    // Start with an empty array of error messages 
    $errors = array();
    $input = array();
    
    $input['order'] = $_POST['order']; 
    if (!array_key_exists($input['order'], $GLOBALS['sweets'])) { 
        $errors [] = 'Please choose a valid order.'; 
    }    
    // Return the (possibly empty) array of error messages 
    return array($errors, $input);
}
