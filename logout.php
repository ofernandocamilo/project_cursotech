<?php 
if (isset($_GET["acao"]))
{
    if ( $_GET["acao"] == "Logout")
        {
            session_start();
            session_destroy(); 
            header("Location: index.php"); 
            exit; 
            }
            else
            {

            }  
        }
?>