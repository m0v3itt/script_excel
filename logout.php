<<<<<<< HEAD
<?php

    session_start();
    if(session_destroy()){
        header("location: login.php");
    }


=======
<?php

    session_start();
    if(session_destroy()){
        header("location: index.php");
    }


>>>>>>> f3b9eac9e21985634a094c040ac0264dd6d9c2df
?>