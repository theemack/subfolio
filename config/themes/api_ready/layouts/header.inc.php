<?php if (!SubfolioTheme::get_mobile_viewport() && SubfolioTheme::get_option('display_header', true)) { ?>
	<div id="header">  <!-- Can we move the hiding stuff in the JS onLoad? -->
		<h1 id="logo"><a href='/' ><?php echo SubfolioTheme::get_site_name(); ?></a></h1>	
	</div>
<?php } ?>

<div id="breadcrumbtools">

	<?php if (SubfolioTheme::get_option('breadcrumb', true)) { ?>
	  <div id="breadcrumb">
			<?php if (SubfolioUser::is_logged_in()) { ?>
				<span><?php echo SubfolioUser::current_user_name(); echo " "; echo SubfolioLanguage::get_text('browsing'); ?></span>
	    <?php } ?>
			<span><?php echo SubfolioLanguage::get_text('indexof'); ?></span> <a href="/"><?php echo Kohana::config('filebrowser.site_domain'); ?></a>
			<?php foreach (SubfolioTheme::get_breadcrumb() as $crumb) { ?>
        <span class='slash'>&nbsp;/&nbsp;</span>
        <?php if ($crumb['url'] <> '') { ?>
          <a href="<?php echo $crumb['url'] ?>"><?php echo $crumb['name'] ?></a>
        <?php } else { ?>
          <span><?php echo $crumb['name'] ?></span>
        <?php }  ?>
		  <?php } ?>
	  </div>
  <?php } ?>

  <?php if (!SubfolioTheme::get_mobile_viewport()) { ?>
	  <ul id="tools">

			<?php if (SubfolioUser::is_logged_in()) { ?>
				<li><?php echo Subfolio::link_to(SubfolioLanguage::get_text('logout'),'/logout') ?></li>
			<?php } ?>
			<!-- Or should we just do API_LogoutButton('li'); a function that includes the test + the rendering using li -->
						
			
			<?php if (SubfolioTheme::get_option('display_send_page')) { 
        $subject = "Link from " . $_SERVER["SERVER_NAME"];
        $body = Subfolio::current_url();
			  ?>
				<li><?php echo Subfolio::mail_to(SubfolioLanguage::get_text('sendpage'), '', $subject, $body) ?></li>
			<?php } ?>

			<?php if (SubfolioTheme::get_option('display_tiny_url')) {
  			echo SubfolioTheme::get_tiny_url(SubfolioLanguage::get_text('generatetinyurl'), 'li');
			} ?>
				
			<?php if (SubfolioTheme::get_option('display_collapse_header')) {
  			echo SubfolioTheme::get_collapse_header_button('li');
			} ?>

	  </ul>
  <?php } ?>
</div>
 
<?php if (SubfolioTheme::get_option('display_navigation')) { ?>
  <?php require("prev_next.inc.php") ?>
<?php } ?>