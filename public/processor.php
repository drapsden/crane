<?php
use Illuminate\Http\Request;

if(isset($_POST["id"])){
$id = $_POST["id"];
echo "Processing... ".$id;
}else{
echo "Nothing to process";}
