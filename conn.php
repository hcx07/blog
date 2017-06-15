<?php
$conn=@mysqli_connect('127.0.0.1','root','root','blog') or die('Error');
mysqli_query($conn,'set names utf8');
date_default_timezone_set('PRC');
function alert($str,$url){
    echo '<script>alert("'.$str.'");location.href="'.$url.'";</script>';
}
function cn_substr_utf8($str,$length,$append='...',$start=0){ 
  if(strlen($str)<$start+1){ 
    return ''; 
  } 
  preg_match_all("/./su",$str,$ar); 
  $str2=''; 
  $tstr=''; 
  //www.phpernote.com 
  for($i=0;isset($ar[0][$i]);$i++){ 
    if(strlen($tstr)<$start){ 
      $tstr.=$ar[0][$i]; 
    }else{ 
      if(strlen($str2)<$length + strlen($ar[0][$i])){ 
        $str2.=$ar[0][$i]; 
      }else{ 
        break; 
      } 
    } 
  } 
  return $str==$str2?$str2:$str2.$append; 
}
?>