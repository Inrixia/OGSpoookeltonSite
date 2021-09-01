<!DOCTYPE html>
<html>
<?php
require '../src/HTMLCore.php';
?>
<style>
body {
	background-image: url("img/back.jpg");
	background-size: cover;
	background-repeat: repeat-y;
	background-position: center top;
}
#title {
	font-family: "chiller";
	color: DimGrey;
	text-align: "center";
	font-size: 100px;
}
#subheading {
	font-family: "chiller";
	color: Red;
	font-size: 60px;
}
#text {
	font-family: fantasy;
	color: Gray;
	font-size: 30px;
}
#button {
	font-family: fantasy;
	text-align: left;
	background-color: Gray;
	color: Black;
	font-size: 20px;
	width: 300px;
	border: 2px solid #000000;
	outline: none;
}
.button {
   border: 1px solid #808080;
   background: #808080;
   background: -webkit-gradient(linear, left top, left bottom, from(#808080), to(#808080));
   background: -webkit-linear-gradient(top, #808080, #808080);
   background: -moz-linear-gradient(top, #808080, #808080);
   background: -ms-linear-gradient(top, #808080, #808080);
   background: -o-linear-gradient(top, #808080, #808080);
   background-image: -ms-linear-gradient(top, #808080 0%, #808080 100%);
   padding: 10.5px 21px;
   -webkit-border-radius: 6px;
   -moz-border-radius: 6px;
   border-radius: 6px;
   -webkit-box-shadow: rgba(255,255,255,0.4) 0 0px 0, inset rgba(255,255,255,0.4) 0 1px 0;
   -moz-box-shadow: rgba(255,255,255,0.4) 0 0px 0, inset rgba(255,255,255,0.4) 0 1px 0;
   box-shadow: rgba(255,255,255,0.4) 0 0px 0, inset rgba(255,255,255,0.4) 0 1px 0;
   text-shadow: #FF0000 0 1px 0;
   color: #000000;
   font-size: 14px;
   font-family: fantasy;
   text-decoration: none;
   vertical-align: middle;
   width: 500px;

   }
.button:hover {
   border: 1px solid #808080;
   text-shadow: #1e4158 0 1px 0;
   background: #808080;
   background: -webkit-gradient(linear, left top, left bottom, from(#808080), to(#3e779d));
   background: -webkit-linear-gradient(top, #808080, #808080);
   background: -moz-linear-gradient(top, #808080, #808080);
   background: -ms-linear-gradient(top, #808080, #808080);
   background: -o-linear-gradient(top, #808080, #808080);
   background-image: -ms-linear-gradient(top, #808080 0%, #808080 100%);
   color: #fff;
   }
.button:active {
   text-shadow: #1e4158 0 1px 0;
   border: 1px solid #0a3c59;
   background: #FF0000;
   background: -webkit-gradient(linear, left top, left bottom, from(#3e779d), to(#3e779d));
   background: -webkit-linear-gradient(top, #FF0000, #FF0000);
   background: -moz-linear-gradient(top, #FF0000, #FF0000);
   background: -ms-linear-gradient(top, #FF0000, #FF0000);
   background: -o-linear-gradient(top, #FF0000, #FF0000);
   background-image: -ms-linear-gradient(top, #FF0000 0%, #FF0000 100%);
   color: #fff;
}
p.small {
	line-height: 10px;
}
</style>

<title>Unbansheee's Den</title>

<body>

<font id="title">Unbansheee's Scream Den</font>
<p>
<p>
<font id="subheading"> Voice Samples</font>
<p>
<a onclick="this.firstChild.play()" class="button" width="600px"><audio src="audio/testaudio.wav"></audio>Audio Test</a>
<br> <br> <br>
<a onclick="this.firstChild.play()" class="button"><audio src="audio/MinorityWorker.wav"></audio>Minority Worker</a>
<br>
</p>
</body>
</html>