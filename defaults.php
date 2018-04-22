<?php
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $defaults = $_POST; 
} else { 
    $defaults = array( 
        'delivery'  => 'yes',
        'size'      => 'medium',
        'main_dish' => array('taro', 'tripe'),
        'sweet'     => 'cake',
        'my_name' => ''
    ); 
}

print "<form method='POST' action='$_SERVER[PHP_SELF]'>";

print '<input type="text" name="my_name" value="' . htmlentities($defaults['my_name'] ?? '') . '">';
print '</br>';

print '<textarea name="comments">';
print htmlentities($defaults['comments'] ?? ''); 
print '</textarea>';
print '</br>';

$sweets = array(
    'puff'   => 'Sesame Seed Puff',
    'square' => 'Coconut Milk Gelatin Square',
    'cake'   => 'Brown Sugar Cake',
    'ricemeat' => 'Sweet Rice and Meat'
); 
print '<select name="sweet">'; 
// > is the option value, $label is what's displayed 
foreach ($sweets as $option => $label) { 
    print '<option value="' . $option . '"'; 
    if ($option == $defaults['sweet']) { 
        print ' selected'; 
    } 
    print ">$label</option>\n";
} 
print '</select>';
print '</br>';

$main_dishes = array ( 
    'cuke' => 'Braised Sea Cucumber', 
    'stomach' => "Sauteed Pig's Stomach", 
    'tripe' => 'Sauteed Tripe with Wine Sauce', 
    'taro' => 'Stewed Pork with Taro',
    'giblets' => 'Baked Giblets with Salt', 
    'abalone' => 'Abalone with Marrow and Duck Feet' 
); 
print '<select name="main_dish[]" multiple>'; 
$selected_options = array(); 
foreach ($defaults['main_dish'] as $option) {
    $selected_options[$option] = true; 
} 

// print out the <option> tags
foreach($main_dishes as $option => $label) { 
    print '<option value="' . htmlentities ( $option ) . '"'; 
    if (array_key_exists($option , $selected_options)) {
        print ' selected' ; 
    } 
    print '>' . htmlentities($label) . '</option>'; 
    print " \n "; 
} 
print '</select>';
print '</br>';

print '<input type="checkbox" name="delivery" value="yes"';
if ($defaults['delivery'] == 'yes') { 
    print 'checked';
} 
print '> Delivery?'; 
$checkbox_options = array(
    'small' => 'Small', 
    'medium' => 'Medium', 
    'large' => 'Large' 
); 
foreach ($checkbox_options as $value => $label) { 
    print '<input type="radio" name="size" value="' . $value . '"'; 
    if ($defaults['size'] == $value) { 
        print ' checked'; 
    } 
    print "> $label "; 
}

print "</FORM>";