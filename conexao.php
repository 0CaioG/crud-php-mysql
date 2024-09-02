<?php
//Defina de acordo com o seu ambiente
define('HOST','localhost');
define('USER','root');
define('PASS','password');
define('NAME','crud');


$connect = new mysqli(HOST,USER,PASS,NAME) or die("Não foi possivel conectar ao banco de dados");