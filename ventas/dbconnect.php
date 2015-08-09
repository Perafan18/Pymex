<?php
error_reporting(E_ALL ^ E_DEPRECATED);
if(!mysql_connect("mysql.nixiweb.com","u159367300_pimex","tujefaentanga123#"))
{
     die('oops connection problem ! --> '.mysql_error());
}
if(!mysql_select_db("u159367300_pimex"))
{
     die('oops database selection problem ! --> '.mysql_error());
}
?>