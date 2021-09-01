<html lang="en">
<head>
  <title>Under Construction</title>
  <link rel="shortcut icon" type="image/x-icon" href="http://i.imgur.com/M9ECrbH.png">
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.2/jquery.min.js"></script>
  <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
</head>

<style>

@-webkit-keyframes fadeIn { from { opacity:0; } to { opacity:1; } }
@-moz-keyframes fadeIn { from { opacity:0; } to { opacity:1; } }
@keyframes fadeIn { from { opacity:0; } to { opacity:1; } }

.fade-in {
  opacity:0;
  -webkit-animation:fadeIn ease-in 1; 
  -moz-animation:fadeIn ease-in 1;
  animation:fadeIn ease-in 1;

  -webkit-animation-fill-mode:forwards;
  -moz-animation-fill-mode:forwards;
  animation-fill-mode:forwards;

  -webkit-animation-duration:1s;
  -moz-animation-duration:1s;
  animation-duration:1s;

  text-align: center;

}

.fade-in.one {
  -webkit-animation-delay: 0.7s;
  -moz-animation-delay: 0.7s;
  animation-delay: 0.7s;
  color: rgb(40, 40, 40);
}
.fade-in.two {
  -webkit-animation-delay: 2s;
  -moz-animation-delay: 2s;
  animation-delay: 2s;
  color: rgb(43, 48, 53);
}
.fade-in.three {
  -webkit-animation-delay: 3.5s;
  -moz-animation-delay: 3.5s;
  animation-delay: 3.5s;
  color: rgb(43, 48, 53);
}

.fade-in.three a:hover{
	text-decoration: none;
}

.Box {
	margin-top: 30vh; 
}
.VidBox {
	background: transparent url(http://i.imgur.com/pQkkLRh.png) no-repeat;
	width: 100%;
	height: 100%;
	position: absolute;
	padding:0;
	margin:0;
	left: 0px;
	top: 0px;
	z-index: -1000;
	overflow:hidden;
}

.video-bg {
  min-height: 100%;
	position:absolute;
	bottom:0;
	left:0;
}

.jumbotron {
	background-color: rgba(240, 240, 239, 0.1);
}
</style>

<body>
	<div class='VidBox'>
		<video autoplay loop muted poster="https://i.gyazo.com/ac3c0f42f11a733d115a7b19b9cd8a33.png" class="video-bg">
			<source src="Glimmering.mp4" type="video/webm">
		</video>
	</div>
	<div class="Box">
		<h1 class='jumbotron fade-in one'>Hi</h1>
		<h3 class='fade-in two'>This site is currently under construction and will be available soon...</h3>
		<h4 class='fade-in three'>While you wait... Why not checkout some <a href="https://www.reddit.com/r/catpictures/">cat pictures?</a></h4>
	</div>
</body>


</html>