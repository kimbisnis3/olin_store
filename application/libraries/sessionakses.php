<?php
    // $session = sess_data('in_cl');
    $session = $this->session->userdata('in_cl');
    if ($session != TRUE) { redirect('auth'); }
?>