<?php
/* The MIT License (MIT)

Copyright (c) 2014 Alexander Link

Permission is hereby granted, free of charge, to any person obtaining a copy
of this software and associated documentation files (the "Software"), to deal
in the Software without restriction, including without limitation the rights
to use, copy, modify, merge, publish, distribute, sublicense, and/or sell
copies of the Software, and to permit persons to whom the Software is
furnished to do so, subject to the following conditions:

The above copyright notice and this permission notice shall be included in
all copies or substantial portions of the Software.

THE SOFTWARE IS PROVIDED "AS IS", WITHOUT WARRANTY OF ANY KIND, EXPRESS OR
IMPLIED, INCLUDING BUT NOT LIMITED TO THE WARRANTIES OF MERCHANTABILITY,
FITNESS FOR A PARTICULAR PURPOSE AND NONINFRINGEMENT. IN NO EVENT SHALL THE
AUTHORS OR COPYRIGHT HOLDERS BE LIABLE FOR ANY CLAIM, DAMAGES OR OTHER
LIABILITY, WHETHER IN AN ACTION OF CONTRACT, TORT OR OTHERWISE, ARISING FROM,
OUT OF OR IN CONNECTION WITH THE SOFTWARE OR THE USE OR OTHER DEALINGS IN
THE SOFTWARE. */


include '../classes.php.inc';
include '../config.php.inc';

$switches =array();
foreach ($switchList as $i => $powerSwitch) {
	$switches[$powerSwitch->shortId] = $powerSwitch;
}

//$method =  $_SERVER['REQUEST_METHOD'];
$method = "";
if(isset($_GET["method"])) $method = $_GET["method"];

$json = "";
if(isset($_GET["json"])) $json = $_GET["json"];

$content = file_get_contents('php://input');

//echo "Method:".$method."<br>";
//echo "Content:".$content."<br>";
//echo "JSON:".$json."<br>";

if($content == "") $content = $json;

if($method == "GET") {
	echo json_encode($switches);
	
} else if($method == "PUT") {
	$obj = json_decode($content);
	echo "Switching shortId=".$obj->shortId." to ".$obj->state;

} else if($method == "POST") {
	$obj = json_decode($content);
	echo "Creating shortId=".$obj->shortId;
	
}

?>