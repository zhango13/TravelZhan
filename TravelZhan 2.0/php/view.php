<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
	<title>News Portal</title>
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
<link rel="icon" href="https://upload.wikimedia.org/wikipedia/commons/thumb/8/8a/PICOL_icon_News.svg/1200px-PICOL_icon_News.svg.png">
   	<style>
    .newsDiv
    {
    	border: 1px dashed #5620E6;
    	background: #95DEE3;
    	width: 300px;
    	margin-left: auto;
    	margin-right: auto;
    	overflow: auto;
    	padding: 10px;
			margin-top: 2em;
    }

    .newsHeader
    {
    	float: left;
    	width: 99%;
    }
    .content
    {
    	float: left;
    	clear: left;
    	margin-top: 5px;
    	width: 99%;
    }

    .newsDate
    {
    	font-size:13px;
    	font-weight: lighter;
    }

    .cent
    {
    	text-align: center;
    }
		form{
			margin-left: 46.5ex;
		}
    </style>
</head>

<body>
<?php
include ('class.php');

$news = new nScript();

$news->displayAll();
?>
<form  method="post" action="view2.php">

<input type="text" name="id" placeholder="#id of article" />
<input type="submit" name="submit"  value="Read more"/>
</form>
</body>
</html>
