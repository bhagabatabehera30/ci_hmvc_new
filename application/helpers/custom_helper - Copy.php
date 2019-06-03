<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');
/* 
Private common functions
Author: Bhagabat Behera
*/

function get_session_details() 
{
    $CI =& get_instance();
    $data = (object)$CI->session->all_userdata();
    return $data;
}


function is_adminlogged_in()
{
  $CI =& get_instance();
  $is_logged_in = $CI->session->userdata('admindetails');
  if(!isset($is_logged_in) || $is_logged_in != true)
  {
    redirect (base_url().'administrator');
}       
}
function is_userlogged_in()
{
   $CI =& get_instance();
   $is_logged_in = $CI->session->userdata('userdetails');
   if(!isset($is_logged_in) || $is_logged_in != true)
   {
    redirect (base_url().'login');   
}       
}
function timeDiff($starttime, $endtime)
{
    $timespent = strtotime( $endtime)-strtotime($starttime);
    $days = floor($timespent / (60 * 60 * 24)); 
    $remainder = $timespent % (60 * 60 * 24);
    $hours = floor($remainder / (60 * 60));
    $remainder = $remainder % (60 * 60);
    $minutes = floor($remainder / 60);
    $seconds = $remainder % 60;
    $TimeInterval = '';
    if($hours < 0) $hours=0;
    if($hours != 0)
    {
        $TimeInterval = ($hours == 1) ? $hours.' hour' : $hours.' hours';
    }
    if($minutes < 0) $minutes=0;
    if($seconds < 0) $seconds=0;
    $TimeInterval = $minutes.' minutes '. $seconds.' seconds ';


    return $TimeInterval;
}
// --check post array------------

function is_post_back(){
	if(count($_POST)>0) {
		return true;
	} else {
		return false;
	}
}


function unlink_file( $file_name , $folder_name )
{
	$file_path = $folder_name."/".$file_name;
	@chmod ($foleder_name , 0777);
	@unlink($file_path);
	return true;	
}

//---------function to remove bad cars-----------------------------
 function removeBadChars($strWords){
        $bad_string = array("select", "drop", ";", "--", "insert","delete", "xp_", "%20union%20", "/*", "*/union/*", "+union+", "load_file", "outfile", "document.cookie", "onmouse", "<script", "<iframe", "<applet", "<meta", "<style", "<form", "<img", "<body", "<link", "_GLOBALS", "_REQUEST", "_GET", "_POST", "include_path", "prefix", "http://", "https://", "ftp://", "smb://" );
        for ($i = 0; $i < count($bad_string); $i++){
            $strWords = str_replace ($bad_string[$i], "", $strWords);
        }
        return $strWords;
    }
    
    function stripQuotes($strWords){
        return str_replace("'", "''", $strWords);
    }

//-------------------------------------------------------------------------

//-------------------------------------------------------------------------

//----read more--descriptions----

function contents_readmore($string, $nb_caracs, $separator){
    $string = strip_tags(html_entity_decode($string));
    if( strlen($string) <= $nb_caracs ){
        $final_string = $string;
    } else {
        $final_string = "";
        $words = explode(" ", $string);
        foreach( $words as $value ){
            if( strlen($final_string . " " . $value) < $nb_caracs ){
                if( !empty($final_string) ) $final_string .= " ";
                $final_string .= $value;
            } else {
                break;
            }
        }
        $final_string .= $separator;
    }
    return $final_string;
}

function contents_readmore2($string,$no_caracters){

 $string = strip_tags(html_entity_decode($string));
if (strlen($string) > $no_caracters) {

    // truncate string
    $stringCut = substr($string, 0, $no_caracters);

    // make sure it ends in a word so assassinate doesn't become ass...
    $string = substr($stringCut, 0, strrpos($stringCut, ' ')); 
}
else{
	$string=$string;
	}
return $string;


}
//   only ---contents------------------
function contents($string){
	 $string = strip_tags(html_entity_decode($string));
	 return $string;
	
	}
	
	
	// read more without decode--------
	
	
	
	
	
function Readmore($string, $nb_caracs, $separator){
    
    if( strlen($string) <= $nb_caracs ){
        $final_string = $string;
    } else {
        $final_string = "";
        $words = explode(" ", $string);
        foreach( $words as $value ){
            if( strlen($final_string . " " . $value) < $nb_caracs ){
                if( !empty($final_string) ) $final_string .= " ";
                $final_string .= $value;
            } else {
                break;
            }
        }
        $final_string .= $separator;
    }
    return $final_string;
}

	
	
	
	
	
	
//----------------get ip address----------	
	 function get_client_ip()
 {
      $ip= '';
      if (getenv('HTTP_CLIENT_IP'))
          $ip = getenv('HTTP_CLIENT_IP');
      else if(getenv('HTTP_X_FORWARDED_FOR'))
          $ip = getenv('HTTP_X_FORWARDED_FOR');
      else if(getenv('HTTP_X_FORWARDED'))
          $ip = getenv('HTTP_X_FORWARDED');
      else if(getenv('HTTP_FORWARDED_FOR'))
          $ip = getenv('HTTP_FORWARDED_FOR');
      else if(getenv('HTTP_FORWARDED'))
          $ip = getenv('HTTP_FORWARDED');
      else if(getenv('REMOTE_ADDR'))
          $ip = getenv('REMOTE_ADDR');
      else
          $ip = 'UNKNOWN';

      return $ip;
 }
//--------remove characters---------	 
   function RemoveCharacters($string)
{
    # Prep string with some basic normalization
    $string = strip_tags($string);
    $string = stripslashes($string);
    $string = html_entity_decode($string);

    # Remove quotes (can't, etc.)
    $string = str_replace('\'', '', $string);

    # Replace non-alpha numeric with hyphens
    $match = '/[^A-Za-z0-9]+/';
    $replace = ' ';
    $string = preg_replace($match, $replace, $string);

    $string = trim($string);

    return $string;
}
	
   function ConvertTitleToUrl($url)
{
    # Prep string with some basic normalization
    $url = strtolower($url);
    $url = strip_tags($url);
    $url = stripslashes($url);
    $url = html_entity_decode($url);

    # Remove quotes (can't, etc.)
    $url = str_replace('\'', '', $url);

    # Replace non-alpha numeric with hyphens
    $match = '/[^a-z0-9]+/';
    $replace = '-';
    $url = preg_replace($match, $replace, $url);

    $url = trim($url, '-');

    return $url;
}

	function get_domain_or_subdomain($url)
{
 //$website_url=$_GET['website_url']; 
  // $website_url="https://blog.asset-books.com.uk/test-chat.html";
  if($url!=""){
 $pieces = parse_url($url);
 $domain =$pieces['host'];
 return $domain;
  }
  return false;
}
 
 //---get only domain---like--asset-books.com 
 function get_domain_only($url)
{
  $pieces = parse_url($url);
  $domain = isset($pieces['host']) ? $pieces['host'] : $pieces['path'];
  if (preg_match('/(?P<domain>[a-z0-9][a-z0-9\-]{1,63}\.[a-z\.]{2,6})$/i', $domain, $regs)) {
    return $regs['domain'];
  }
  return false;
}

// print get_domain_only("$website_url"); // outputs 'somedomain.co.uk' it is a array();

// get user operating System-----------------

function getOS($user_agent) { 

    // global $user_agent;

    $os_platform    =   "Unknown OS Platform";

    $os_array       =   array(
                            '/windows nt 10/i'     =>  'Windows 10',
                            '/windows nt 6.3/i'     =>  'Windows 8.1',
                            '/windows nt 6.2/i'     =>  'Windows 8',
                            '/windows nt 6.1/i'     =>  'Windows 7',
                            '/windows nt 6.0/i'     =>  'Windows Vista',
                            '/windows nt 5.2/i'     =>  'Windows Server 2003/XP x64',
                            '/windows nt 5.1/i'     =>  'Windows XP',
                            '/windows xp/i'         =>  'Windows XP',
                            '/windows nt 5.0/i'     =>  'Windows 2000',
                            '/windows me/i'         =>  'Windows ME',
                            '/win98/i'              =>  'Windows 98',
                            '/win95/i'              =>  'Windows 95',
                            '/win16/i'              =>  'Windows 3.11',
                            '/macintosh|mac os x/i' =>  'Mac OS X',
                            '/mac_powerpc/i'        =>  'Mac OS 9',
                            '/linux/i'              =>  'Linux',
                            '/ubuntu/i'             =>  'Ubuntu',
                            '/iphone/i'             =>  'iPhone',
                            '/ipod/i'               =>  'iPod',
                            '/ipad/i'               =>  'iPad',
                            '/android/i'            =>  'Android',
                            '/blackberry/i'         =>  'BlackBerry',
                            '/webos/i'              =>  'Mobile'
                        );

    foreach ($os_array as $regex => $value) { 

        if (preg_match($regex, $user_agent)) {
            $os_platform    =   $value;
        }

    }   

    return $os_platform;

}

//-------- get user browser----------------

function getBrowser($user_agent) {

   //  global $user_agent;

    $browser        =   "Unknown Browser";

    $browser_array  =   array(
                            '/msie/i'       =>  'Internet Explorer',
                            '/firefox/i'    =>  'Firefox',
                            '/safari/i'     =>  'Safari',
                            '/chrome/i'     =>  'Chrome',
                            '/edge/i'       =>  'Edge',
                            '/opera/i'      =>  'Opera',
                            '/netscape/i'   =>  'Netscape',
                            '/maxthon/i'    =>  'Maxthon',
                            '/konqueror/i'  =>  'Konqueror',
                            '/mobile/i'     =>  'Handheld Browser'
                        );

    foreach ($browser_array as $regex => $value) { 

        if (preg_match($regex, $user_agent)) {
            $browser    =   $value;
        }

    }

    return $browser; 

}

// get user location---------------------  


/*function UserLocationDetails($ip){
 $json  = file_get_contents("https://freegeoip.net/json/$ip");
 $jsonUserLocation  =  json_decode($json ,true);
 return $jsonUserLocation;
 
}*/ 

/*================================Site Messages============================================*/
$sitemsgs = array();
$mainMsg = array();

$sitemsgs[1] = "Sorry No Records found in database";
$sitemsgs[2] = "Records have updated successfully";
$sitemsgs[3] = "Records added successfully";
$sitemsgs[4] = "User Id/LoginId  already exists.Please choose another User Id/LoginId";
$sitemsgs[5] = "Records have Activated Successfully";
$sitemsgs[6] = "Records have Inactivated Successfully";
$sitemsgs[7] = "Records Deleted Successfully";
$sitemsgs[8] = "Please selected any checkbox";
$sitemsgs[9] = "your UserId/LoginId  or password is wrong";
$sitemsgs[10] = "Static page content updated successfully";
$sitemsgs[11] = "Category name is already exist . Please choose another name.";
$sitemsgs[12] = "This login/email id already exists please choose amother login id ";
$sitemsgs[13] = "This email/login already exists please choose amother email ";
$sitemsgs[14] = " Resume is not uploaded";
$sitemsgs[15] = "Please Uploade Only doc or docx ";
$sitemsgs[16] = "Name/Title/ Heading already exists . Please choose another Name/Title/ Heading.";

$sitemsgs[27] = "You have  already sent  This notification  To the doctors.";
$sitemsgs[28] = "The notification is sent successfully";
$sitemsgs[29] = "Email Id  already exists.Please choose another Email Id.";
$sitemsgs[30] = "";
$sitemsgs[31] = "City description already exits for this city and categories.";
$sitemsgs[32] = "EmailID or Password Is Incorrect.";

$sitemsgs[33] = "You have already add this lab test price.";

$sitemsgs[34] = "Country/State/City already exists . Please choose another Name";


////Site Message Department   36 
$mainMsg[1] = "This userid already exists please choose amother user id";
$mainMsg[2] = "username or password is wrong";
$mainMsg[3] = "Sorry there is no active item in your account";
$mainMsg[4] = "Sorry there is no item ";
$mainMsg[5] = "Your Password Changed Successfully";
$mainMsg[6] = "Old Password is wrong";
$mainMsg[7] = "Username dose not exists. Please enter valid username";
$mainMsg[8] = "Your Password send your email address.";

/*=============================================================================*/

function display_session_msg()
{
	//echo "<p class=msg>". $_SESSION['sessionMsg'] . "</p>";
	
	echo "<p style='text-align:center;'>". $_SESSION['sessionMsg'] . "</p>";
	
	unset($_SESSION['sessionMsg']);
}

function rand_string( $length ) {
	$chars = "abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789";
	$size = strlen( $chars );
	$str = '';
	for( $i = 0; $i < $length; $i++ ) {
		$str .= $chars[ rand( 0, $size - 1 ) ];
	}
	return $str;
}  

 function rand_str_digits( $length ) {
	$chars = "0123456789";
	$size = strlen( $chars );
	$str = '';
	for( $i = 0; $i < $length; $i++ ) {
		$str .= $chars[ rand( 0, $size - 1 ) ];
	}
	return $str;
} 
function get_rand_lowercasechar_digits( $length ) {
	$chars = "abcdefghijklmnopqrstuvwxyz0123456789";
	$size = strlen( $chars );
	$str = '';
	for( $i = 0; $i < $length; $i++ ) {
		$str .= $chars[ rand( 0, $size - 1 ) ];
	}
	return $str;
}  
function get_rand_uppsercasechar_digits( $length ) {
	$chars = "ABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789";
	$size = strlen( $chars );
	$str = '';
	for( $i = 0; $i < $length; $i++ ) {
		$str .= $chars[ rand( 0, $size - 1 ) ];
	}
	return $str;
}   
	 
	
/**============================================ define constants ===================================== */
		define('ASSETS', base_url().'assets/');
		define('ASSETS2', base_url().'assets/admin/');
		define('ASSETS2_ADMIN', base_url().'assets/admin/');
		define('CDN_PATH', base_url().'cdn/');
		define('administrator', base_url().'administrator/');
		define('Adminpath', base_url().'admin/');   
		define('PATH', base_url()); 
		define('LOCAL_FOLDER','ci_hmvc_new/'); // for live it shlould be blank ---------   
/**============================================ define constants ===================================== */