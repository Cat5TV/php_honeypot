<?php
  $LOGFOLDER = '/tmp/'; // Set to a folder located somewhere your web server user can write to

  /***********************************************************************/
  /* THE MAGIC HAPPENS HERE                                              */
  /***********************************************************************/
  /**/ $url = htmlspecialchars($_SERVER['REQUEST_URI']);
  /**/ if (getenv('HTTP_CLIENT_IP')) $ipaddress = getenv('HTTP_CLIENT_IP'); else if(getenv('HTTP_X_FORWARDED_FOR')) $ipaddress = getenv('HTTP_X_FORWARDED_FOR'); else if(getenv('HTTP_X_FORWARDED')) $ipaddress = getenv('HTTP_X_FORWARDED'); else if(getenv('HTTP_FORWARDED_FOR')) $ipaddress = getenv('HTTP_FORWARDED_FOR'); else if(getenv('HTTP_FORWARDED')) $ipaddress = getenv('HTTP_FORWARDED'); else if(getenv('REMOTE_ADDR')) $ipaddress = getenv('REMOTE_ADDR');
  /**/ if (isset($ipaddress)) file_put_contents(preg_replace('{/$}', '', $LOGFOLDER) . '/php_honeypot.log',$ipaddress . ' Hit ' . $url . ' ' . date('r') . PHP_EOL, FILE_APPEND);
  /**/ $sapi_type = php_sapi_name(); if (substr($sapi_type, 0, 3) == 'cgi') header("Status: 404 Not Found"); else header("HTTP/1.1 404 Not Found");
  /**/ echo '<!DOCTYPE HTML PUBLIC "-//IETF//DTD HTML 2.0//EN"><html><head><title>404 Not Found</title></head><body><h1>Not Found</h1><p>The requested URL ' . $url . ' was not found on this server.</p></body></html>';
  /***********************************************************************/

?>
