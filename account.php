<?php

  define("_VALID_PHP", true);
  require_once("init.php");
  
  if (!$user->logged_in)
      redirect_to("login.php");
	  
  $row = $user->getUserData();
?>
<!DOCTYPE html>
<html lang="en">

<head>
 
  <!--Meta-->
  <meta charset="UTF-8">
  <meta http-equiv="x-ua-compatible" content="ie=edge">
  <meta name="keywords" content="Courier DEPRIXA-Integral Web System" />
  <meta name="author" content="Jaomweb">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  
  <!--Favicon-->
  <link rel="icon" href="uploads/favicon.png">
  
  <!-- Title-->
  <title><?php echo $lang['langs_01044'] ?> <?php echo $row->fname;?> <?php echo $row->lname;?> | <?php echo $core->site_name;?></title>
  
  <!--Google fonts-->
  <link href="https://fonts.googleapis.com/css?family=Dosis:400,500,600,700%7COpen+Sans:400,600,700" rel="stylesheet">
  
	<!--Icon fonts-->
	<link rel="stylesheet" href="assets-theme/vendor/strokegap/style.css">
	<link rel="stylesheet" href="assets-theme/vendor/font-awesome/css/font-awesome.min.css">
	<link rel="stylesheet" href="assets-theme/vendor/linearicons/style.css">
  
	<link rel="stylesheet" href="assets-theme/css/bundle.css">
	<link rel="stylesheet" href="assets-theme/css/style.css">
	<script type="text/javascript" src="assets/js/jquery.js"></script>
	<script type="text/javascript" src="assets/js/jquery-ui.js"></script>
	<script src="assets/js/jquery.ui.touch-punch.js"></script>
	<script src="assets/js/jquery.wysiwyg.js"></script>
	<script src="assets/js/global.js"></script>
	<script src="assets/js/custom.js"></script>
	<script>
		function bs_input_file() {
		$(".input-file").before(
			function() {
				if ( ! $(this).prev().hasClass('input-ghost') ) {
					var element = $("<input type='file' class='input-ghost' style='visibility:hidden; height:0'>");
					element.attr("name",$(this).attr("name"));
					element.change(function(){
						element.next(element).find('input').val((element.val()).split('\\').pop());
					});
					$(this).find("button.btn-choose").click(function(){
						element.click();
					});
					$(this).find("button.btn-reset").click(function(){
						element.val(null);
						$(this).parents(".input-file").find('input').val('');
					});
					$(this).find('input').css("cursor","pointer");
					$(this).find('input').mousedown(function() {
						$(this).parents('.input-file').prev().click();
						return false;
					});
					return element;
				}
			}
		);
	}
	$(function() {
		bs_input_file();
	});
	</script>
  
</head>

 <body id="top">
 
 <!--headers-->
 <header class="header header-shrink header-inverse fixed-top">
	<div class="container">
		<nav class="navbar navbar-expand-lg px-md-0">
			
			<?php require_once("header.php");?> 
			
		</nav>
	</div> <!-- END container-->
</header> <!-- END header --> 

<section data-dark-overlay="6" data-init="parallax" class="u-py-30 u-pt-lg-200 u-pb-lg-50 u-flex-center" style="background:url(assets-theme/img/about/hero.jpg);">
  <div class="container">
    <div class="row">
    	<div class="col-12 text-center text-white">
    		<h1 class="text-white"><?php echo $lang['langs_01045'] ?> <?php echo $row->fname;?> <?php echo $row->lname;?></h1>
    		<div class="u-h-4 u-w-50 bg-white rounded mx-auto my-4"></div>
    		<p class="lead">
    			<?php echo $lang['langs_01046'] ?>
    		</p>
    	</div>
    </div> <!-- END row-->
  </div> <!-- END container-->
</section> <!-- END intro-hero-->

<section class="pt-5">
	<div class="container">
		<div class="row">
			<div class="col-lg-8">
				<article class="blog-details">
						<div id="msgholder"></div>
						<div class="row">
							<div class="col-md-12">
								<div class="payment-title">
									<span class="ti-files"></span>
									<h4><?php echo $lang['user-account1'] ?> <i class="icon-double-angle-right"></i> <?php echo $row->username;?></span></h4>
								</div>
							</div>
						</div>
						<form id="admin_form" method="post">
							<div class="row">
								<div class="col-md-6">
									<div class="form-group">
										<input type="text" disabled="disabled" name="username" readonly="readonly" value="<?php echo $row->username;?>" placeholder="<?php echo $lang['user-account2'] ?>">
									</div>
									 <div class="note note-error"><?php echo $lang['user-account2'] ?></div>
								</div>
								<div class="col-md-6">
									<div class="form-group">
										<input type="password" name="password" placeholder="********">
									</div>
									 <div class="note note-info"><?php echo $lang['user-account3'] ?></div>
								</div>
							</div>
							<div class="row">
								<div class="col-md-12">
									<div class="form-group">
										<input type="text" name="email" value="<?php echo $row->email;?>" placeholder="<?php echo $lang['user-account4'] ?>">
									</div>
									 <div class="note note-error"><?php echo $lang['user-account4'] ?></div>
								</div>
								<div class="col-md-4">
									<div class="form-group">
										<input type="text" name="fname" value="<?php echo $row->fname;?>" placeholder="<?php echo $lang['user-account5'] ?>">
									</div>
									 <div class="note note-error"><?php echo $lang['user-account5'] ?></div>
								</div>
								<div class="col-md-4">
									<div class="form-group">
										<input type="text" name="lname" value="<?php echo $row->lname;?>" placeholder="<?php echo $lang['user-account6'] ?>">
									</div>
									 <div class="note note-error"><?php echo $lang['user-account6'] ?></div>
								</div>
								<div class="col-md-4">
									<div class="form-group">
										<input type="text" name="gender" value="<?php echo $row->gender;?>" placeholder="<?php echo $lang['user-account10'] ?>">
									</div>
									 <div class="note note-error"><?php echo $lang['user-account10'] ?></div>
								</div>
							</div>
							<div class="row">
								<div class="col-md-4">
									<div class="form-group">
										<input type="text" name="code_phone" value="<?php echo $row->code_phone;?>" placeholder="<?php echo $lang['user-account7'] ?>">
									</div>
									 <div class="note note-error"><?php echo $lang['user-account7'] ?></div>
								</div>
								<div class="col-md-4">
									<div class="form-group">
										<input type="text" name="phone" value="<?php echo $row->phone;?>" placeholder="<?php echo $lang['user-account8'] ?>">
									</div>
									 <div class="note note-error"><?php echo $lang['user-account8'] ?></div>
								</div>
								<div class="col-md-4">
									<div class="form-group">
										<input type="text" name="address" value="<?php echo $row->address;?>" placeholder="<?php echo $lang['user-account9'] ?>">
									</div>
									 <div class="note note-error"><?php echo $lang['user-account9'] ?></div>
								</div>
							</div>
							
							<div class="row">
								<div class="col-md-4">
									<div class="form-group">
										<input type="text" name="country" value="<?php echo $row->country;?>" placeholder="<?php echo $lang['user-account11'] ?>">
									</div>
									 <div class="note note-error"><?php echo $lang['user-account11'] ?></div>
								</div>
								<div class="col-md-4">
									<div class="form-group">
										<input type="text" name="city" value="<?php echo $row->city;?>" placeholder="<?php echo $lang['user-account12'] ?>y">
									</div>
									 <div class="note note-error"><?php echo $lang['user-account12'] ?></div>
								</div>
								<div class="col-md-4">
									<div class="form-group">
										<input type="text" name="postal" value="<?php echo $row->postal;?>" placeholder="<?php echo $lang['user-account13'] ?>">
									</div>
									 <div class="note note-error"><?php echo $lang['user-account13'] ?></div>
								</div>
							</div>
							<hr class="m-t-0 m-b-5">
							<div class="row">
								<div class="col-md-6">
									<div class="form-group">
									  <label class="radio">
										<input type="radio" name="newsletter" value="1" <?php getChecked($row->newsletter, 1); ?>>
										<i></i><?php echo $lang['user-account14'] ?></label>
									  <label class="radio">
										<input type="radio" name="newsletter" value="0" <?php getChecked($row->newsletter, 0); ?>>
										<i></i><?php echo $lang['user-account15'] ?></label>
									  <div class="note"><?php echo $lang['user-account16'] ?></div>
									</div>
								</div>
								
								<div class="col-md-6">
									<div class="form-group">
										<div class="input-group input-file" name="avatar">
											<input type="text"  class="form-control" placeholder='Choose a file...' />			
											<span class="input-group-btn">
												<button class="btn btn-default btn-choose" type="button">Choose</button>
											</span>
										</div>
									</div>
									 <div class="note note-error"><?php echo $lang['user-account17'] ?></div>
								</div>
							</div>
							<hr class="m-t-0 m-b-5">
							<div class="row">
								<div class="col-md-6">
									<div class="form-group">
										<input type="text" name="created" disabled="disabled" readonly="readonly" value="<?php echo $row->cdate;?>" placeholder="<?php echo $lang['user-account18'] ?>">
									</div>
									 <div class="note note-error"><?php echo $lang['user-account18'] ?></div>
								</div>
								
								<div class="col-md-6">
									<div class="form-group">
										<input type="text" name="lastlogin" disabled="disabled" readonly="readonly" value="<?php echo $row->ldate;?>" placeholder="<?php echo $lang['user-account19'] ?>">
									</div>
									 <div class="note note-error"><?php echo $lang['user-account19'] ?></div>
								</div>
							</div>
							<hr class="m-t-0 m-b-5">
							<footer>
								<button class="btn btn-outline-primary btn-confirmation" name="doupdate" type="submit"><?php echo $lang['user-account20'] ?><span><i class="icon-ok"></i></span></button>
							</footer>
						</form>
						<?php echo Core::doForm("processUser","ajax/controller.php");?> 
						
				</article>
			</div> <!-- END col-lg-8 -->
			<aside id="sidebar" class="col-lg-4">
			
			<div class="widget sidebar-widget">
			  <div class="widget-content text-center mt-4">
					<img class="rounded-circle u-w-80 mx-auto u-mt-40 u-mb-20" src="thumbmaker.php?src=<?php echo UPLOADURL;?><?php echo ($row->avatar) ? $row->avatar : "blank.png";?>&amp;w=<?php echo $core->thumb_w;?>&amp;h=<?php echo $core->thumb_h;?>&amp;s=1&amp;a=t1" alt="" title="" class="avatar" />
					<h4 class="u-mb-5">
						<?php echo $row->fname;?> <?php echo $row->lname;?>
					</h4>
					<p class="text-muted">
					<span class="icon icon-User text-warning"></span>	<?php echo $user->username;?>
					</p>
					
					<p>
						<div class="contact-info text-left mt-4">
							<div class="address">
								<span class="icon icon-Pointer text-primary"></span>
								<?php echo $row->country;?>, <?php echo $row->city;?>, <?php echo $row->postal;?>, <?php echo $row->address;?>
							</div>
							<div class="address">
								<span class="icon icon-Phone2 text-primary"></span>
								<?php echo $row->code_phone;?> <?php echo $row->phone;?>
							</div>
							<div class="address">
								<span class="icon icon-Mail text-primary"></span>
								<?php echo $row->email;?>
							</div>
						</div>
					</p>
					</br>
					<div class="follow">
						<ul class="d-flex">
							<li class=" flex-fill">
								<h6><?php echo $row->cdate;?></h6>
								<span><?php echo $lang['user-account18'] ?></span>
							</li>
							<li class=" flex-fill">
								<h6><?php echo $row->ldate;?></h6>
								<span><?php echo $lang['user-account19'] ?></span>
							</li>
						</ul>
					</div>
				
			  </div>
			</div> <!-- END sidebar-widget-->
     
      </aside>
		</div> <!-- END row-->
	</div>	 <!-- END container-->
</section> <!-- END section--> 


<?php require_once("footer.php");?> 

	<div class="scroll-top bg-white box-shadow-v1">
		<i class="fa fa-angle-up" aria-hidden="true"></i>
	</div> 
	
		<script src="assets-theme/js/fury.js"></script>
	<script src="assets/js_/script.js"></script>
    <!-- Validate JS -->
    <script src="assets/js_/validate.js"></script>
    <!-- Contact JS -->
    <script src="assets/js_/contact.js"></script>

    <script src="assets/js_/popper.min.js"></script>
    <script src="assets/js_/bootstrap.min.js"></script>
	

  </body>	

</html>