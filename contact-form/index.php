<?php
	// Start session.
	session_start();
	
	// Set a key, checked in mailer, prevents against spammers trying to hijack the mailer.
	$security_token = $_SESSION['security_token'] = uniqid(rand());
	
	if ( ! isset($_SESSION['formMessage'])) {
		$_SESSION['formMessage'] = 'Fill in the form below to send me an email.';	
	}
	
	if ( ! isset($_SESSION['formFooter'])) {
		$_SESSION['formFooter'] = ' ';
	}
	
	if ( ! isset($_SESSION['form'])) {
		$_SESSION['form'] = array();
	}
	
	function check($field, $type = '', $value = '') {
		$string = "";
		if (isset($_SESSION['form'][$field])) {
			switch($type) {
				case 'checkbox':
					$string = 'checked="checked"';
					break;
				case 'radio':
					if($_SESSION['form'][$field] === $value) {
						$string = 'checked="checked"';
					}
					break;
				case 'select':
					if($_SESSION['form'][$field] === $value) {
						$string = 'selected="selected"';
					}
					break;
				default:
					$string = $_SESSION['form'][$field];
			}
		}
		return $string;
	}
?><!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml" lang="en">

<head>
	<meta charset="utf-8" />
	<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0" />
	
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
		<meta name="robots" content="index, follow" />
		<meta name="generator" content="RapidWeaver" />
		
	<meta name="twitter:card" content="summary">
	<meta name="twitter:title" content="Contact Us | Third-Rate-Podcast! for the Fourth Rate Duelist">
	<meta name="twitter:image" content="https://thirdratepodcast.github.io/resources/yugikaiba6.jpg">
	<meta name="twitter:url" content="https://thirdratepodcast.github.io/contact-form/index.php">
	<meta property="og:type" content="website">
	<meta property="og:site_name" content="Third-Rate-Podcast! for the Fourth Rate Duelist">
	<meta property="og:title" content="Contact Us | Third-Rate-Podcast! for the Fourth Rate Duelist">
	<meta property="og:image" content="https://thirdratepodcast.github.io/resources/yugikaiba6.jpg">
	<meta property="og:url" content="https://thirdratepodcast.github.io/contact-form/index.php">
	
	<title>Contact Us | Third-Rate-Podcast! for the Fourth Rate Duelist</title>
	<link rel="stylesheet" type="text/css" media="all" href="../rw_common/themes/Engineer/consolidated-1.css?rwcache=652308940" />
		
	    
</head>

<!-- This page was created with RapidWeaver from Realmac Software. http://www.realmacsoftware.com -->

<body>
	<div class="hero" id="hero">
		<nav class="navbar navbar-expand-lg">
			<a class="navbar-brand" href="https://thirdratepodcast.github.io/"> <span class="navbar-title"></span></a>
			<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false"
				aria-label="Toggle navigation">
				<span class="navbar-toggler-icon"></span>
			</button>
			<div class="collapse navbar-collapse" id="navbarNav">
				<ul class="navbar-nav ml-auto"><li class="nav-item"><a href="../" rel="" class="nav-link">Announcements</a></li><li class="nav-item"><a href="../about-us/" rel="" class="nav-link">About Us</a></li><li class="nav-item"><a href="../styled-2/" rel="" class="nav-link">Forum</a></li><li class="nav-item"><a href="../styled-3/" rel="" class="nav-link">Videos</a></li><li class="nav-item"><a href="../styled/" rel="" class="nav-link">References</a></li><li class="nav-item active"><a href="./" rel="" class="nav-link">Contact Us</a></li></ul>
			</div>
		</nav>

		<div class="hero-content container d-flex align-items-center" id="hero">
			<div class="">
				<h1 class="hero-title"></h1>
				<p class="hero-slogan display-4"></p>
			</div>
			<div class="hero-background" title=""></div>
			<div class="hero-overlay"></div>
		</div>

	</div>

    <div class="content">
        <section class="main" style="position: relative;">
            <div class="container">
                <div class="row">
                    <div class="col-sm-8 main">
                        
<div class="message-text"><?php echo $_SESSION['formMessage']; unset($_SESSION['formMessage']); ?></div><br />

<form class="rw-contact-form" action="./files/mailer.php" method="post" enctype="multipart/form-data">
	 <div>
		<label>Your Name</label> *<br />
		<input class="form-input-field" type="text" value="<?php echo check('element0'); ?>" name="form[element0]" size="40"/><br /><br />

		<label>Your Email</label> *<br />
		<input class="form-input-field" type="text" value="<?php echo check('element1'); ?>" name="form[element1]" size="40"/><br /><br />

		<label>Subject</label> *<br />
		<input class="form-input-field" type="text" value="<?php echo check('element2'); ?>" name="form[element2]" size="40"/><br /><br />

		<label>Message</label> *<br />
		<textarea class="form-input-field" name="form[element3]" rows="8" cols="38"><?php echo check('element3'); ?></textarea><br /><br />

		<div style="display: none;">
			<label>Spam Protection: Please don't fill this in:</label>
			<textarea name="comment" rows="1" cols="1"></textarea>
		</div>
		<input type="hidden" name="form_token" value="<?php echo $security_token; ?>" />
		
		<input class="form-input-button" type="submit" name="submitButton" value="Submit" />
	</div>
</form>

<br />
<div class="form-footer"><?php echo $_SESSION['formFooter']; unset($_SESSION['formFooter']); ?></div><br />

<?php unset($_SESSION['form']); ?>

                    </div>

                    <div class="col-sm-12 sidebar">
                        <h2></h2>
                        <span style="color:#80003F;"><a href="https://www.tcgplayer.com" target="_blank">TCGPlayer</a></span><span style="color:#80003F;"> - </span><span style="color:#80003F;"><a href="https://podcasts.apple.com/us/podcast/during-the-end-phase-a-yu-gi-oh-podcast/id1510027046" target="_blank">During The End Phase Podcast</a></span><span style="color:#80003F;"> - </span><span style="color:#80003F;"><a href="https://podcasts.apple.com/us/podcast/x-2-drop-a-yu-gi-oh-discussion-podcast/id1455813121" target="_blank">X2 Drop Podcast</a></span><span style="color:#80003F;"> - </span><span style="color:#80003F;"><a href="https://www.facebook.com/TCGplayer/" target="_blank">TCG Player FB Page</a></span><span style="color:#80003F;"> - </span><span style="color:#80003F;"><a href="https://www.reddit.com/r/yugioh/" target="_blank">Yu-Gi-Oh! Reddit</a></span><span style="color:#80003F;"><br /></span><br /><a href="https://podcasts.apple.com/us/podcast/the-third-rate-podcast-for-the-fourth-rate-duelist/id1584006366" target="_blank"><img class="imageStyle" alt="Podcasts_(iOS).svg" src="files/podcasts_0028ios0029.svg.png" width="62" height="62" /></a><a href="https://open.spotify.com/show/1kVoe6hgmux2u2P9nkAJGL?si=bNR8B1ZDSYihGrUm9omKCQ&dl_branch=1" target="_blank"><img class="imageStyle" alt="bdab70ac-eaa9-4d8e-8e81-61923864ff7c" src="files/bdab70ac-eaa9-4d8e-8e81-61923864ff7c.png" width="65" height="65" /></a><img class="imageStyle" alt="Stitcher-Logo" src="files/stitcher-logo.png" width="58" height="58" /> <img class="imageStyle" alt="3689112" src="files/3689112.png" width="62" height="62" /> <br /><br />s 
                    </div>
                </div>
            </div>
        </section>
    </div>

	<footer class="footer">
		<div class="container">
			<div class="row">
				<div class="col-sm-12 footer-content">
					<ul class="navbar-nav ml-auto"><li class="nav-item"><a href="../" rel="" class="nav-link">Announcements</a></li><li class="nav-item"><a href="../about-us/" rel="" class="nav-link">About Us</a></li><li class="nav-item"><a href="../styled-2/" rel="" class="nav-link">Forum</a></li><li class="nav-item"><a href="../styled-3/" rel="" class="nav-link">Videos</a></li><li class="nav-item"><a href="../styled/" rel="" class="nav-link">References</a></li><li class="nav-item active"><a href="./" rel="" class="nav-link">Contact Us</a></li></ul>
					&copy; 2021 TRPFRD <a href="#" id="rw_email_contact">Contact Us</a><script type="text/javascript">var _rwObsfuscatedHref0 = "mai";var _rwObsfuscatedHref1 = "lto";var _rwObsfuscatedHref2 = ":ae";var _rwObsfuscatedHref3 = "mor";var _rwObsfuscatedHref4 = "row";var _rwObsfuscatedHref5 = "@me";var _rwObsfuscatedHref6 = ".co";var _rwObsfuscatedHref7 = "m";var _rwObsfuscatedHref = _rwObsfuscatedHref0+_rwObsfuscatedHref1+_rwObsfuscatedHref2+_rwObsfuscatedHref3+_rwObsfuscatedHref4+_rwObsfuscatedHref5+_rwObsfuscatedHref6+_rwObsfuscatedHref7; document.getElementById("rw_email_contact").href = _rwObsfuscatedHref;</script>
				</div>
			</div>
		</div>
	</footer>

	<script type="text/javascript" src="../rw_common/themes/Engineer/js/main.js?rwcache=652308940"></script>
</body>

</html>