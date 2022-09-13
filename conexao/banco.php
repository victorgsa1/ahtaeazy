<?php

$con = mysqli_connect("dumont", "200174", "200174", "d200174");

if (mysqli_connect_errno()) {
    echo "Falha ao se conectar ao MySQL: " . mysqli_connect_erro();
} else {
    mysqli_select_db($con, "d200174");
}

?>