<?php
/*    ob_start();
    session_start();
    error_reporting(0);
    include("manage/connection/config.php");
    $actual_link = 'http://'.$_SERVER['HTTP_HOST'];
    if($actual_link=='http://localhost')
    {
        $urlset='http://localhost/sumiksha_services/';
    }
    else
    {
        $urlset='http://dexus.in/sumiksha_services/';
    }

    error_reporting(E_ERROR | E_WARNING | E_PARSE);
    $domain_value=explode('http://legaldekho.com/',$actual_link1);
    $actual_link1 = "http://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";

    $menuvalue=$domain_value[1];
    $seo_menu=explode('/',$menuvalue);
    $value=$_REQUEST['title'];
    $sub_value=$_REQUEST['name'];
    $meta_value=$_REQUEST['metatitle'];*/
ob_start();
session_start();
include("connection/config.php");
date_default_timezone_set('Asia/Kolkata');
function base_url(){   

// first get http protocol if http or https

$base_url = (isset($_SERVER['HTTPS']) &&

$_SERVER['HTTPS']!='off') ? 'https://' : 'http://';

// get default website root directory

$tmpURL = dirname(__FILE__);

// when use dirname(__FILE__) will return value like this "C:\xampp\htdocs\my_website",

//convert value to http url use string replace, 

// replace any backslashes to slash in this case use chr value "92"

$tmpURL = str_replace(chr(92),'/',$tmpURL);

// now replace any same string in $tmpURL value to null or ''

// and will return value like /localhost/my_website/ or just /my_website/

$tmpURL = str_replace($_SERVER['DOCUMENT_ROOT'],'',$tmpURL);

// delete any slash character in first and last of value

$tmpURL = ltrim($tmpURL,'/');

$tmpURL = rtrim($tmpURL, '/');


// check again if we find any slash string in value then we can assume its local machine

    if (strpos($tmpURL,'/')){

// explode that value and take only first value

       $tmpURL = explode('/',$tmpURL);

       $tmpURL = $tmpURL[0];

      }

// now last steps

// assign protocol in first value

   if ($tmpURL !== $_SERVER['HTTP_HOST'])

// if protocol its http then like this

      $base_url .= $_SERVER['HTTP_HOST'].'/'.$tmpURL.'/trunk/';

    else

// else if protocol is https

      $base_url .= $tmpURL.'/';

// give return value

return $base_url; 

}
?>