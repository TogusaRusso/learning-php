<?php
$count = ($_COOKIE['count'] ?? 0) + 1;
setcookie('count', $count);
print "You've looked at this page " . $count . ' times.';