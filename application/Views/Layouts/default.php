<!doctype html>
<html>
	<head>
		<base href="<?php echo Joztiq::app()->config->getVar('fullURL');?>" />
	    <!-- Framework CSS -->
	    <link rel="stylesheet" href="<?php echo Joztiq::app()->config->rootPath;?>public/css/blueprint/screen.css" type="text/css" media="screen, projection" />
	    <link rel="stylesheet" href="<?php echo Joztiq::app()->config->rootPath;?>public/css/blueprint/print.css" type="text/css" media="print" />
	    <link rel="stylesheet" href="<?php echo Joztiq::app()->config->rootPath;?>public/css/blueprint/plugins/fancy-type/screen.css" type="text/css" />
	    <!--[if lt IE 8]><link rel="stylesheet" href="<?php echo Joztiq::app()->config->rootPath;?>/public/css/blueprint/ie.css" type="text/css" media="screen, projection" /><![endif]-->
	    
	        <script src="<?php echo Joztiq::app()->config->rootPath;?>/public/js/jquery-1.4.2.min.js" type="text/javascript"></script>
    		<script src="<?php echo Joztiq::app()->config->rootPath;?>/public/js/jquery-ui-1.8.6.custom.min.js" type="text/javascript"></script>
	</head>
	<body>
	<style type="text/css">
		#logo
		{
			
		}
		.nav
		{
			font-size:2em;
			line-height:1;
			margin-bottom:5px;
		}
		.nav a
		{
			text-decoration:none;
		}
		#header
		{
			margin-top:25px;
		}
		.post
		{
			background-color:#EEEEEE;
			padding-left:10px;
			padding-bottom:7px;
			padding-right:10px;
			margin-bottom:5px;
		}
		.comment
		{
			background-color:#C3D9FF;
			padding-top:5px;
		}
		.author
		{
			float:right;
			font-weight:bold;
		}
		.postTime
		{
			float:right;
			font-style:italic;
		}
		.deletePost
		{
			padding-bottom:0px;
		}
		#load
		{
			background:url('<?php echo Joztiq::app()->config->rootPath;?>public/images/loading-bg.png') center no-repeat;
			width:159px;
			color:#999;
			font-size:18px;
			font-family:Arial, Helvetica, sans-serif;
			height:40px;
			font-weight:300;
			margin-left:20%;
			position: absolute;
			margin-top: 5%;
		}
		.commentLink
		{
			float:right;
		}
	</style>
	<script type="text/javascript">
	var rootPath = "<?php echo joztiq::app()->config->rootPath;?>";
	$(function() {
		//Hide loader...
			$('#load').hide();

			$('.deletePost').live('click' , function() {
				
				$('#load').fadeIn();
				var id = $(this).attr("id");
				var box = $(this).parent().parent();
				$.ajax({
					  url: rootPath+'/post/delete',
					  type: "POST",
					  data: "ajax=true&id="+id,
					  success: function(data) {
						  box.slideUp('slow', function() {$(this).remove();});
					    $('#load').fadeOut();
					  }
					});
			});
		});
	</script>
		<div class="container">
			<div id="header">
				<a id="logo" href="/" ><?php joztiq::app()->config->applicationName;?></a>
				<div class="nav alt">
					<a class="alt" href="<?php echo Joztiq::app()->config->rootPath;?>home/index/">Home</a>
					|
					<a class="alt" href="<?php echo Joztiq::app()->config->rootPath;?>post/create/">New post</a>
				</div>
			</div>
			<hr/>
			<div id="content" class="span-15 prepend-1 colborder">
				<?php echo $content;?>
			</div>
			<div id="sidebar" class="span-7 last">
				<?php $this->renderElement('/layouts/_sidebar.php',array());?>
			</div>
		</div>
	</body>
</html>