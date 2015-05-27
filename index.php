<?php
#time zone
$chk=date_default_timezone_get();
#mac地址
$mac=`ifconfig -a`;
$mac.=`ipconfig /all`;
preg_match ( "/[0-9a-f][0-9a-f][:-]" . "[0-9a-f][0-9a-f][:-]" . "[0-9a-f][0-9a-f][:-]" . "[0-9a-f][0-9a-f][:-]" . "[0-9a-f][0-9a-f][:-]" . "[0-9a-f][0-9a-f]/i", $mac, $tmp);
$mac=$tmp[0];
#cpu
if(isset($_SERVER['PROCESSOR_IDENTIFIER']))$chk.=$_SERVER['PROCESSOR_IDENTIFIER'];
#php\os environment
$chk.=php_uname();
$chk.=$mac;

#img check
$stamp = imagecreatetruecolor(100, 70);
imagefilledrectangle($stamp, 0, 0, 99, 69, 0x0000FF);
imagefilledrectangle($stamp, 9, 9, 90, 60, 0xFFFFFF);
imagestring($stamp, 5, 20, 20, '啊啊啊哈哈啊哈', 0x0000FF);
$marge_right = 10;
$marge_bottom = 10;
$sx = imagesx($stamp);
$sy = imagesy($stamp);
imagepng($stamp, 'photo_stamp.png');
imagedestroy($stamp);
$chk.=md5_file('photo_stamp.png');
unlink('photo_stamp.png');
echo md5($chk); 
?>