<?php
    $session = sess_data('in_cl');
    if ($session != TRUE) { redirect('auth'); }
?>