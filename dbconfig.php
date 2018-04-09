<?php

 $DB_HOST = 'sql206.byethost9.com';
 $DB_USER = 'b9_21611491';
 $DB_PASS = 'sh33ph3ad';
 $DB_NAME = 'b9_21611491_hmongPres';
 
 try{
  $DB_con = new PDO("mysql:host={$DB_HOST};dbname={$DB_NAME}",$DB_USER,$DB_PASS);
  $DB_con->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
 }
 catch(PDOException $e){
  echo $e->getMessage();
 }