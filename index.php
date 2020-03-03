<?php
set_time_limit(0);
ini_set('memory_limit','2048M'); 
?>
<style>
*.html{ padding:0px; margin:0px;}
body{ margin:15px auto; width:90%; font-family:tahoma; font-size:12px; line-height:199%;}
input{ width:100%; margin:15px; padding:15px; border:1px solid #ccc; cursor:pointer}
table td{ text-align:center}
a, a:link, a:visited{ color:#009; text-decoration:underline}
</style>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>  PHP Files Transfer  </title>
</head>

<body>

<form method="post" action="" enctype="multipart/form-data">

<input type="text" dir="ltr" placeholder="file url : http://www.ako.ir/mrm.zip" required="required" autofocus="autofocus" name="fileurl" size="150" /><br/>
<input type="text" dir="ltr" placeholder="file name : new_name_mrm.zip" required="required" autofocus="autofocus" name="filename" size="150" /><br/>
<input type="submit" value="submit" />
</form>




<?php


echo 'لینک مبدا : '.urldecode($_POST['fileurl']).'<br/>';
echo 'فایل مقصد : '.urldecode($_POST['filename']).'<br/><br/>';

if( !empty( $_POST['fileurl'] )){
	
	echo  'strat date : '. date('Y-m-d H:i:sa').'<br/>';
	
	$file = urldecode(trim($_POST['fileurl']));
	
	$file_name =  urldecode(trim($_POST['filename']));
	
	if( file_put_contents( $file_name, file_get_contents( $file ) ) ){
		
		echo '<b>file moved!</b><br/>';
		
		}
	 
	
	echo  ' end date : '.date('Y-m-d H:i:sa').'<br/>';

}



?>
<hr/>
File's List

<table cellpadding="5" cellspacing="5" border="2" width="100%">
<tr><th>#</th><th>name/download</th><th>Size</th></tr>

<?php

 $dir = opendir("./");
 $i = 1;
 
 while($myfile = readdir($dir)){
	 
	 
	 if($myfile != "index.php" and $myfile != "." and $myfile != ".."){
	 echo '
	 <tr> <td>'.$i.' </td>
	 <td><a target="_blank" href="./'. $myfile .'">'.$myfile.'</a></td>
	 <td>'. round(  (filesize($myfile)/1024)/1024 ).' MB </td></tr>';
	 
	 $i++;
	 
	 }
	 
	 
	 
	 }




?>

</table>

</body>
</html>
