<form method = "POST" action = "<?=$_SERVER['PHP_SELF'] ?>"> 
<select name = "lunch[]" multiple> 
    <option value = "pork"> BBQ Pork Bun </option> 
    <option value = "chicken"> Chicken Bun </option> 
    <option value = "lotus"> Lotus Seed Bun </option>
    <option value = "bean"> Bean Paste Bun </option>
    <option value = "nest">Bird - Nest Bun </option>
</select> 
<input type = "submit" name = "submit"> 
</for > 
Selected buns : <br/> 
<?php 
if ( isset ( $_POST [ 'lunch' ])) {
    foreach ( $_POST [ 'lunch' ] as $choice ) { 
        print "You want a $choice bun. <br/>" ; 
    } 
}