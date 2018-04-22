<?php
print <<<_HTML_
<form method="POST" action="$_SERVER[PHP_SELF]"> 
Your comment: <input type="text" name="comments"> <br/> 
<input type="submit" value="POST"> </form>
_HTML_;

if (array_key_exists('comments', $_POST) && $comments = $_POST['comments']) {
    print $comments;
    //Remove HTML from comments 
    $comment = strip_tags($comments);
    print '</br>';
    // Now it's OK to print $comments 
    print $comment;
    $comment = htmlentities($comments);
    print '</br>';
    // Now it's OK to print $comments 
    print $comment;
}
