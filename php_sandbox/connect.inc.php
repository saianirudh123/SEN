<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
    </head>
    <body>
        <?php
        // put your code here
        $connection = mysqli_connect('localhost','root','anigoel','sen') or die('connection error');
echo 'successfully connected!!';
        $mysql_host = 'localhost';
        $mysql_user = 'root';
        $mysql_password = 'anigoel';
        $mysql_conn_error = 'Could Not Connect!';
        $mysql_database='sen';
        
        if(@mysql_connect($mysql_host,$mysql_user,$mysql_password)){
            if(@mysql_select_db($mysql_database)){
                //echo 'Connected.';
            }else{
                echo 'Connected! But Database Not Found.';
            }
        }else{
            die($mysql_conn_error);
        }
       
        ?>
    </body>
</html>
