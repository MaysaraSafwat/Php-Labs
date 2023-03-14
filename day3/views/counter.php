<?php

$counter = new Counter();
$counter->increment_and_update();
$count = $counter->get_count();
echo "<center> <h1 style='color: #1c9288; margin: 10px auto;'> Count : ".$count."</h1> </center>";