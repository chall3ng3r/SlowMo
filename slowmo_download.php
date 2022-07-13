<?php
/**
 * @author: Faisal Iqbal
 * @company: Orison Technologies <orison.biz>
 * @script: slowmo_download.php
 * @description: Throttle download speed of *.bin file types
 * @parameters: file = name of the file in same folder as script
 * @parameters: bw = throttle bandwith in bytes, default is 4096/sec
 */
$filename = isset($_GET['file']) ? $_GET['file'] : "";
$bandwith = isset($_GET['bw']) ? $_GET['bw'] : "4096";

if(empty($filename) || empty($bandwith))
{
	print('Error: parameters provided.');
}
else if(endsWith($filename, '.bin') && file_exists($filename))
{
    header('Content-type: application/octet-stream');
	header('Content-Disposition: attachment; filename="'.$filename.'"');
	header('Content-length: ' . filesize($filename));
	$fp = fopen( $filename, 'rb');
	while(!feof($fp)) {
		print(fread($fp, ($bandwith / 10)));
		flush();
		m_sleep(100);
     }
	fclose($fp);
}
else
{
	print('Error: File does not exist or invalid file type.');
}

function endsWith( $str, $sub )
{
    return ( substr( $str, strlen( $str ) - strlen( $sub ) ) == $sub );
}

function m_sleep($milliseconds) {
  return usleep($milliseconds * 1000); // Microseconds->milliseconds
}
?>