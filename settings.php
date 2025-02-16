<?php
session_start();  
include('config.php');
$conn = new mysqli($servername, $username, $password, $dbname);
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}
$query = mysqli_query($conn, "SELECT * FROM login WHERE username = '".$_SESSION['logged_in_user']."'");
$numrows = mysqli_num_rows($query);
while ($row = mysqli_fetch_assoc($query))
{   
    $pwrow = $row['password'];
}
if ($_SESSION['hashed_pass'] == $pwrow) {
    } else {
        session_destroy();
    }

$nothing = ""
?>
<title>Liberatube · Settings</title>
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<link rel="stylesheet" href="/styles/-w3.css">
<link rel="stylesheet" href="/styles/-bootstrap.min.css">
<link rel="stylesheet" href="/styles/-googlesymbols.css">

<?php
$dbsenduser = $_SESSION['logged_in_user'];
$conn = new mysqli($servername, $username, $password, $dbname);
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}
if (isset($_SESSION['logged_in_user']))
{
$conn = new mysqli($servername, $username, $password, $dbname);
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}
$query = mysqli_query($conn, "SELECT * FROM login WHERE username = '".$_SESSION['logged_in_user']."'");
$numrows = mysqli_num_rows($query);
while ($row = mysqli_fetch_assoc($query))
{
    $themerow = $row['theme'];
    $langrow = $row['lang'];
    $vidshadowrow = $row['videoshadow'];
    $proxyrow = $row['proxy'];
    $playertyperow = $row['player'];
    $regionrow = $row['region'];
    $loadcommentsrow = $row['loadcomments'];
}
$row = mysqli_fetch_assoc($query);
$numrows = mysqli_num_rows($query);
}
?>

<div class="w3-sidebar w3-bar-block w3-collapse w3-card sidebar" style="width:55px;" id="mySidebar">
  <button class="w3-bar-item w3-button w3-large w3-hide-large" onclick="w3_close()">&times;</button>
  <a href="/" class="w3-bar-item sidebarbtn awhitesidebar"><span class="material-symbols-outlined">home</span></a>
  <a href="/history.php" class="w3-bar-item sidebarbtn awhitesidebar"><span class="material-symbols-outlined">history</span></a>
  <a href="/playlists.php" class="w3-bar-item sidebarbtn awhitesidebar"><span class="material-symbols-outlined">list_alt</span></a>
  <a href="/subscriptions.php" class="w3-bar-item sidebarbtn awhitesidebar"><span class="material-symbols-outlined">subscriptions</span></a>
  <a href="/settings.php" class="w3-bar-item sidebarbtn awhitesidebar sidebarbtn-selected"><span class="material-symbols-outlined">settings</span></a>
</div>

<div class="w3-main" style="margin-left:55px">
<div class="w3-tssseal">
  <button class="w3-button w3-darkgrey w3-xlarge w3-hide-large" onclick="w3_open()">&#9776;</button>
  <div class="w3-container">
  <div class="topbar">
    <div class="topbarelements topbarelements-center">
    <h1>Settings</h1>
    </div>
    <div class="topbarelements topbarelements-right">
    <h4> <?php echo $_SESSION['logged_in_user']; ?>
    <?php if(isset($_SESSION['logged_in_user']))
    {
        echo '<a class="button awhite login-item" href="logout.php"><span class="material-symbols-outlined login-item-icon">logout</span><h5 class="login-item-text">Logout</h5></a>';
    }
    else
    {
        echo '<a class="button awhite login-item" href="login.html"><span class="material-symbols-outlined login-item-icon">login</span><h5 class="login-item-text">Login/Signup</h5></a>';
    }
    ?>
    </div>
    </div>
  </div>
<script src="/scripts/sidebar.js"></script>

<?php
if(isset($_SESSION['logged_in_user'])) {
  if($vidshadowrow == "on") {
    $checked1 = "checked";
  } else {
    $checked1 = "";
  }

  if($proxyrow == "on") {
    $checked2 = "checked";
  } else {
    $checked2 = "";
  }
  
  if($playertyperow == "html") {
    $checked3a = "";
    $checked3b = "checked";
  } elseif($playertyperow == "vjs") {
    $checked3a = "checked";
    $checked3b = "";
  }

  if ($loadcommentsrow == "showall") {
    $checked4a = "checked";
    $checked4b = "";
    $checked4c = "";
  } elseif ($loadcommentsrow == "noreplies") {
    $checked4a = "";
    $checked4b = "checked";
    $checked4c = "";
  } elseif ($loadcommentsrow == "nothing") {
    $checked4a = "";
    $checked4b = "";
    $checked4c = "checked";
  }

  if ($allowProxy == "true") {

  } elseif ($allowProxy == "false" or $allowProxy == "downloads"){
    $instanceProxyText = ' <label style="color: red;">Disabled by instance</label>';
    if ($allowProxy == "downloads") {
      $instanceProxyText .= ' <label style="color: orange;">Downloads allowed</label>';
    }
  }
echo '<h4 style="text-align: center;">This is still in development.<br></h4>';
echo '<div class="tenborder">
<form action="" method="post" id="form" formtarget="_blank">
  <div class="settingsdiv"><h4>Visual Preferences</h4>
  <label for="theme">Theme:</label>
  <select class="formsel" style="border-radius: 6px;" id="theme" name="theme" value="--Please Select--">
  <option class="formsel" value="'.$themerow.'">Selected: '.$themerow.'</option>
  <option class="formsel" disabled value="">----------</option>
    <option class="formsel" value="dark">Dark</option>
    <option class="formsel" value="blue">Blue</option>
    <option class="formsel" value="ultra-dark">Ultra-Dark</option>
    <option class="formsel" value="light">Light</option>
  </select><a class="label" href="/liberatube-pluginstore/" for="theme">Custom</a><br>
  <label for="vidshadow">Video Shadow: <i>(Soon)</i></label>
  <input type="checkbox" id="vidshadow" name="vidshadow" '.$checked1.'>
  </div>
  <br>
  <div class="settingsdiv"><h4>Regional Preferences</h4>
  <label for="lang">Language: <i>(soon)</i></label>
  <select class="formsel" style="border-radius: 6px;" id="lang" name="lang" value="--Please Select--">
  <option class="formsel" value="'.$langrow.'">Selected: '.$langrow.'</option>
  <option class="formsel" disabled value="">----------</option>
    <option class="formsel" value="en">English</option>
    <option class="formsel" value="fr">Français</option>
    <option class="formsel" value="es">Español</option>
    <option class="formsel" value="pl">Polski</option>
  </select>

  <br>
  <label for="region">Region:</label>
  <select class="formsel" style="border-radius: 6px;" id="region" name="region" value="--Please Select--">
  <option class="formsel" value="'.$regionrow.'">Selected: '.$regionrow.'</option>
  <option class="formsel" disabled value="">----------</option>
                        <option value="AE">AE</option>
                        <option value="AR">AR</option>                    
                        <option value="AT">AT</option>                    
                        <option value="AU">AU</option>                   
                        <option value="AZ">AZ</option>                   
                        <option value="BA">BA</option>                   
                        <option value="BD">BD</option>
                        <option value="BE">BE</option>                  
                        <option value="BG">BG</option>               
                        <option value="BH">BH</option>         
                        <option value="BO">BO</option>                  
                        <option value="BR">BR</option>                   
                        <option value="BY">BY</option>                   
                        <option value="CA">CA</option>                   
                        <option value="CH">CH</option>                   
                        <option value="CL">CL</option>                   
                        <option value="CO">CO</option>                    
                        <option value="CR">CR</option>                 
                        <option value="CY">CY</option>                
                        <option value="CZ">CZ</option>                
                        <option value="DE">DE</option>                 
                        <option value="DK">DK</option>                 
                        <option value="DO">DO</option>                
                        <option value="DZ">DZ</option>                
                        <option value="EC">EC</option>                
                        <option value="EE">EE</option>                 
                        <option value="EG">EG</option>                 
                        <option value="ES">ES</option>                 
                        <option value="FI">FI</option>                
                        <option value="FR">FR</option>           
                        <option value="GB">GB</option>           
                        <option value="GE">GE</option>     
                        <option value="GH">GH</option>           
                        <option value="GR">GR</option>             
                        <option value="GT">GT</option>             
                        <option value="HK">HK</option>              
                        <option value="HN">HN</option>              
                        <option value="HR">HR</option>              
                        <option value="HU">HU</option>               
                        <option value="ID">ID</option>                
                        <option value="IE">IE</option>               
                        <option value="IL">IL</option>              
                        <option value="IN">IN</option>           
                        <option value="IQ">IQ</option>      
                        <option value="IS">IS</option>       
                        <option value="IT">IT</option>              
                        <option value="JM">JM</option>                   
                        <option value="JO">JO</option>                   
                        <option value="JP">JP</option>                   
                        <option value="KE">KE</option>                   
                        <option value="KR">KR</option>                    
                        <option value="KW">KW</option>                   
                        <option value="KZ">KZ</option>                  
                        <option value="LB">LB</option>                  
                        <option value="LI">LI</option>                  
                        <option value="LK">LK</option>                  
                        <option value="LT">LT</option>                 
                        <option value="LU">LU</option>                  
                        <option value="LV">LV</option>                   
                        <option value="LY">LY</option>                   
                        <option value="MA">MA</option>                   
                        <option value="ME">ME</option>                  
                        <option value="MK">MK</option>                    
                        <option value="MT">MT</option>             
                        <option value="MX">MX</option>
                        <option value="MY">MY</option>
                        <option value="NG">NG</option>
                        <option value="NI">NI</option>
                        <option value="NL">NL</option>
                        <option value="NO">NO</option>
                        <option value="NP">NP</option>
                        <option value="NZ">NZ</option>
                        <option value="OM">OM</option>
                        <option value="PA">PA</option>
                        <option value="PE">PE</option>                  
                        <option value="PG">PG</option>
                        <option value="PH">PH</option>
                        <option value="PK">PK</option>
                        <option value="PL">PL</option>
                        <option value="PR">PR</option>
                        <option value="PT">PT</option>
                        <option value="PY">PY</option>
                        <option value="QA">QA</option>
                        <option value="RO">RO</option>
                        <option value="RS">RS</option>
                        <option value="RU">RU</option>
                        <option value="SA">SA</option>
                        <option value="SE">SE</option>
                        <option value="SG">SG</option>
                        <option value="SI">SI</option>
                        <option value="SK">SK</option>
                        <option value="SN">SN</option>
                        <option value="SV">SV</option>
                        <option value="TH">TH</option>
                        <option value="TN">TN</option>
                        <option value="TR">TR</option>
                        <option value="TW">TW</option>
                        <option value="TZ">TZ</option>
                        <option value="UA">UA</option>
                        <option value="UG">UG</option>
                        <option value="US">US</option>
                        <option value="UY">UY</option>
                        <option value="VE">VE</option>
                        <option value="VN">VN</option>
                        <option value="YE">YE</option>
                        <option value="ZA">ZA</option>
                        <option value="ZW">ZW</option>
                </select>
  </div>
  <br>
  <div class="settingsdiv"><h4>Player Preferences</h4>
<label for="player">Player Type:</label>

      <input type="radio" id="vjs" name="player" value="vjs" '.$checked3a.'></input><label class="label" for="vjs">VideoJS</label>
      <input type="radio" id="html" name="player" value="html" '.$checked3b.'></input><label class="label" for="html">HTML</label><br>

    <label for="proxy">Proxy Video:</label>
    <input name="proxy" type="checkbox" id="proxy"'.$checked2.'>'.$instanceProxyText.'</input><br>


    <label for="loadcomments">Comments:</label><br>
    <input type="radio" id="showall" name="loadcomments" value="showall" '.$checked4a.'></input><label class="label" for="showall">Load comments and replies (Slowest)</label><br>
    <input type="radio" id="noreplies" name="loadcomments" value="noreplies" '.$checked4b.'></input><label class="label" for="noreplies">Do not load replies (Fast)</label><br>
    <input type="radio" id="nothing" name="loadcomments" value="nothing" '.$checked4c.'></input><label class="label" for="nothing">Do not load anything (Fastest)</label>

  </div>
  <br>
  <div class="settingsdiv"><h4>Account Preferences</h4>
  <a type="button" class="btn btn-warning" style="margin-bottom: 5px; color: black;">Clear Watch History</a><br>
  <a type="button" href="/account.php/?r=password" class="btn btn-primary">Change Your Password</a>
  <a type="button" href="/account.php/?r=delete" class="btn btn-danger">Delete Your Account</a>
  </div>
  <br>
  <div class="settingsdiv" style="background-color: transparent; text-align: right; padding-top: 0px; padding-right: 0px;">
  <button type="" class="btn btn-success" id="submitButton">Save</button>
  </div>
</form>
<script src="/scripts/formxhr.js"></script>
</div>';
} else {
echo '<h4 style="text-align: center;">You are not logged in.</h4>';
}
$theme = $_POST['theme'] ?? "";
$lang = $_POST['lang'] ?? "";
$uregion = $_POST['region'] ?? "";
$torfproxy = $_POST['proxy'] ?? "";
$uplayertype = $_POST['player'] ?? "";
$uvideoshadow = $_POST['vidshadow'] ?? "";
$uloadcomments = $_POST['loadcomments'];

$dbsenduser = $_SESSION['logged_in_user'];
if($theme != "")
{
$conn = new mysqli($servername, $username, $password, $dbname);
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}
$select = mysqli_query($conn, "SELECT * FROM login WHERE username = '".$_POST['name']."'");
if(mysqli_num_rows($select)) {
}
$sql = "UPDATE login
SET theme = '$theme', lang = '$lang', region = '$uregion', proxy = '$torfproxy', player = '$uplayertype', videoshadow = '$uvideoshadow', loadcomments = '$uloadcomments'
WHERE username = '$dbsenduser';";
if ($conn->query($sql) === TRUE) {   
} else {
  echo "Error: <br>" . $conn->error;
}
$conn->close();
}
include('../config.php');
$dbsenduser = $_SESSION['logged_in_user'];
$conn = new mysqli($servername, $username, $password, $dbname);
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}
if (isset($_SESSION['logged_in_user']))
{
$conn = new mysqli($servername, $username, $password, $dbname);
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}
$query = mysqli_query($conn, "SELECT * FROM login WHERE username = '".$_SESSION['logged_in_user']."'");
$numrows = mysqli_num_rows($query);
while ($row = mysqli_fetch_assoc($query))
{
    $themerow = $row['theme'];
}
$row = mysqli_fetch_assoc($query);
$numrows = mysqli_num_rows($query);
}
                if(strcmp($themerow, 'dark') == 0)
            {
                echo '<link rel="stylesheet" href="../styles/playerdark.css">';
            } elseif(strcmp($themerow, 'blue') == 0)
            {
                echo '<link rel="stylesheet" href="../styles/playerblue.css">';
            } elseif(strcmp($themerow, 'ultra-dark') == 0)
            {
                echo '<link rel="stylesheet" href="../styles/playerultra-dark.css">';
            } elseif(strcmp($themerow, 'light') == 0)
            {
                echo '<link rel="stylesheet" href="../styles/playerlight.css">';
            } else 
            {
                echo '<link rel="stylesheet" href="../styles/player'.$defaultTheme.'.css">';
            } 
                ?>