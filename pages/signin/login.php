<?php

if(session_unset()){
    header("Location: index.php");
}else{
    header("../order/order.php");
}

?>