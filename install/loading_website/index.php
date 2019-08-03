<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">

<title>Installing Website</title>

<?php 
		$redir = ((isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] == "on") ? "https" : "http");
        $redir .= "://".$_SERVER['HTTP_HOST'];
        $redir .= str_replace(basename($_SERVER['SCRIPT_NAME']),"",$_SERVER['SCRIPT_NAME']);
        $redir = str_replace('install/loading_website/','',$redir); 
 ?>
<meta http-equiv="refresh" content="30; url=<?php echo $redir; ?>">

<style type="text/css">
html, body{
          background: -webkit-linear-gradient(-90deg, #f4f8fc 0%, rgba(252, 252, 252, 0) 100%);
    background: -moz-linear-gradient(-90deg, #f4f8fc 0%, rgba(252, 252, 252, 0) 100%);
    background: -o-linear-gradient(-90deg, #f4f8fc 0%, rgba(252, 252, 252, 0) 100%);
    background: -ms-linear-gradient(-90deg, #f4f8fc 0%, rgba(252, 252, 252, 0) 100%);
      background-size:cover;
      width: 100%;
      height: auto; background-repeat:no-repeat; background-attachment:local;  font-size: 90%;
		    font-family: Helvetica,Arial,sans-serif;
		   
		    margin: 0 auto; 
      }
      .search-wrapper{
    padding: 40px 50px;position: relative;border-radius: 3px;
    background: #fff;
    -webkit-box-shadow: 0 2px 44px 0 rgba(0, 0, 0, 0.08);
    box-shadow: 0 2px 44px 0 rgba(0, 0, 0, 0.08);max-width: 500px;
}
.search-wrapper:before {
    position: absolute;
    content: "";
    background: rgba(255, 255, 255, 0.66);
    width: 97%;
    height: 30px;
    top: -10px;
    left: 0;
    right: 0;
    margin: auto;
    border-radius: 3px;
}
.search-wrapper:after {
    position: absolute;
    content: "";
    background: rgba(255, 255, 255, 0.88);
    width: 98%;
    height: 20px;
    top: -5px;
    left: 0;
    right: 0;
    margin: auto;
    border-radius: 3px;
}
.install{    background: none repeat scroll 0 0 #fff;
    border-radius: 5px;
    margin: 65px auto 0;
    width: 32%;}
		  .tag {
font-size: 16px;
    color: #403d3c;
    text-align: center;
    position: relative;
    left: 81px;
    top: -13px;
  }

code {
	font-family: Consolas, Monaco, Courier New, Courier, monospace;
	font-size: 15px;
	
	color: #002166;
	display: block;
	margin: 20px 0;
	padding: 70px 10px;
}
.logo {
	padding:0px 10px; float:left; height:48px;
}


.prog {
    width:100%;
    height:50px;
    border:1px solid #269abc;
}
.filler {
    width:0%;
    height:50px;
    background-color:#31b0d5;
}

</style>
</head>

<body>
<div class="install search-wrapper"> 
<p align="middle" class="img-header"><img style="width:220px" src="../logo.png" align="center" > <div class="tag">Installation in Progress</div> </p>

    

	<code>
		<div id="prog" class="prog">
		    <div id="filler" class="filler"></div>
		</div>
		<p>Your website will be ready in next <span id="counter">30</span> seconds</p>
	</code>

</div>

<script>

	var stepSize = 290;
	setTimeout((function() {
	    var filler 		= document.getElementById("filler"),
	    	prog 		= document.getElementById("prog"),
	        percentage 	= 0;
	    return function progress() {
	        filler.style.width = percentage + "%";
	        percentage +=1;
	        if (percentage <= 100) {
	        	if(percentage >= 70) {
	        		prog.style.border 		= "1px solid #4cae4c";
	        		filler.style.background = "#5cb85c";
	        	}
	            setTimeout(progress, stepSize);
	        }
	    }

	}()), stepSize);


	setInterval(function(){
		counter_val = parseInt(document.getElementById('counter').innerHTML);
		if(counter_val > 0)
			counter_val = counter_val - 1;
		document.getElementById('counter').innerHTML = counter_val;
	}, 1000);
</script>

</body>
</html>
