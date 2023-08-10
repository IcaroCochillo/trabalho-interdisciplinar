<?php
    if(isset($_SESSION['message'])) :
?>

    <h2><?= $_SESSION['message']; ?>  </h2>

<?php 
    unset($_SESSION['message']);
    endif;
?>