<?
	error_reporting(E_ALL);
	ini_set("display_errors", 1);
	include 'includes/db.php';
	include 'phpGoodies/Mobile_Detect.php';// Download Moble_Detect.php here: https://github.com/serbanghita/Mobile-Detect
	
?>
<!DOCTYPE html>	
<html>

    <head>
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Map List</title>
		<link rel="stylesheet" href="themes/hot.min.css" />
		
		  <link rel="stylesheet" href="http://code.jquery.com/mobile/1.1.1/jquery.mobile.structure-1.1.1.min.css" /> 
		  <script src="http://code.jquery.com/jquery-1.7.1.min.js"></script> 
		  <script src="http://code.jquery.com/mobile/1.1.1/jquery.mobile-1.1.1.min.js"></script> 
        <script>
					/* if(navigator.platform = "iPhone" || navigator.platform == "Android"){
						 alert('you are on an iphone!');
						 var starImage = document.getElementById("introImage");
						 starImage.style.width = "533px";
						 starImage.style.height= "533px";
						 starImage.style.background = "url(images/iphoneImage.png)";
					 }*/
		</script>
		<style>
			@font-face{
				font-family: listFont;
				src:url('fonts/GreatVibes-Regular.ttf');
			}
			.ui-page {
				background:#fff url(images/background.gif) top center;
    		}
			#introImage{
				position: relative;
				top: 50px;
				margin:0 auto;
				width:300px;
				height:400px;
				background:url(images/iphoneImage.png) no-repeat;
			}
			#goButton{
				position: relative;
				margin: 0 auto;
				width:300px;
				height:30px;
				background:#c90e0e;
				display: block;
			}
			.ui-icon-starCons{
				background:transparent;
				background-image: url(images/starCon.png);
				background-size: 18px 18px;
				
			}
			.ui-icon-homeLink{
				background:transparent;
				background-image: url(images/57.png);
				background-size: 18px 18px;
			}
			.ul-li-static{
				font-size: 10px;
			}
        </style>
    </head>

    

    <body>
		<div data-role="page" id="home">
        	<!--<div data-role="header" data-position="fixed"><h1>Welcome!</h1></div> -->
            <div data-role="content">
            	<div id="introImage"></div>
            	
            	<a href="#mainList" data-transition="none" data-role="button" data-theme="a">Search Celebrities!</a>
            	
            </div>
            
        </div> <!-- end data role page, home -->
        
    	<!-- display list of celebrities -->
    	<div data-role="page" id="mainList">
        	<div data-role="header" data-position="fixed"><h1>Map of the Stars</h1>
            <a href="#home" data-icon="homeLink" data-iconpos="notext" data-transition="none" data-direction="reverse">Home</a>
            </div>
            <div data-role="content">
            	 <ul data-role="listview" data-filter="true" data-filter-placeholder="Search Celbrities" data-filter-theme="a"data-theme="a" data-divider-theme="a" data-iconpos="left">
                	<?
                		$currentLocation = "Current Location";
						$query = mysql_query("SELECT * FROM $tblName");
						$detectDevice = new Mobile_Detect();//create mobile detect
						if($detectDevice->isiOS()){
						      while($row = mysql_fetch_array($query))
        							{
        								echo "<li data-icon='starCons' class='celebList'><a href='maps://maps?daddr=".$row['address']."&saddr='Current Location''>".$row['name']."</a></li>";
        							} 
						}else if($detectDevice->isAndroidOS()){
						      while($row = mysql_fetch_array($query))
        							{
        								echo "<li data-icon='starCons' class='celebList'><a target='_blank' href='http://maps.apple.com/maps?daddr=".$row['address']."&saddr=Current Location'>".$row['name']."</a></li>";

        							} 
						}
						else{
						      while($row = mysql_fetch_array($query))
        							{
        								echo "<li data-icon='starCons' class='celebList'><a href='https://maps.google.com/maps?daddr=".$row['address']."&saddr='Current Location''>".$row['name']."</a></li>";
        							}
						}
						
					?>
                    <!--<li data-role="list-divider">A</li>-->
                </ul>
            </div><!-- end content -->
        </div><!-- end mainList Page -->

    </body>

</html>
