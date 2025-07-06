<?php
/**
 * Welcome screen getting started template
 */

?>
<div id="tab-support" class="coltwo-col panel flatsome-panel">
	<div class="cols">

	<div class="inner-panel" style="text-align: center;">
		<img style="width:100px; margin:30px 15px 0;" src="<?php echo get_template_directory_uri().'/inc/admin/panel/img/videos.png'; ?>"/>
		<h3>آموزش صفر تا صد فلتسام</h3>
		<p>آموزش حرفه ای صفر تا صد و طراحی سایت با قالب فلتسام</p>
        <a href="https://flatsomee.ir/product/flatsome-theme-video-tutorials/" target="_blank" class="button button-primary">
        <?php _e( 'مشاهده پکیج', 'flatsome-admin' ); ?></a>
	</div>

	<div class="inner-panel" style="text-align: center;">
		<img style="width:100px; margin:30px 15px 0;" src="<?php echo get_template_directory_uri().'/inc/admin/panel/img/documentation.png'; ?>"/>
		<h3>آموزش در ایران فلتسام</h3>
		<p>آموزش های فارسی و به زبان ساده قالب فلتسام تنها در ایران فلتسام</p>
        <a href="https://flatsomee.ir/flatsome-tutorials/" target="_blank" class="button button-primary">
        <?php _e( 'مشاهده اموزش ها', 'flatsome-admin' ); ?></a>
	</div>

	<div class="inner-panel" style="text-align: center;">
	<img style="width:100px; margin:30px 15px 0;" src="<?php echo get_template_directory_uri().'/inc/admin/panel/img/emailsupport.png'; ?>"/>			<h3>پشتیبانی سریع</h3>
		<p>پشتیبانی سریع تنها در ایران فلتسام</p>
		<?php if(!flatsome_is_theme_enabled())	{ ?>
			<a href="https://flatsomee.ir/contact-us/" class="button button-primary">مشاهده راه های ارتباطی</a>
    	<?php } else if(flatsome_is_support_expired(basename( get_template_directory() ))){ ?>
    		
    		<a target="_blank" href="https://flatsomee.ir/" class="button button-warning" style="color:red;">پشتیبانی</a>
		<?php } else {
			global $current_user;
			?>
		<a href="mailto:support@uxthemes.com?subject=Need help with Flatsome &body=Enter Your Message here...%0D%0A%0D%0A Best regards,%0D%0A <?php echo $current_user->user_firstname.' '; echo $current_user->user_lastname; ?> %0D%0A %0D%0A%0D%0A[Keep this] Theme license: <?php echo sanitize_text_field( get_option( basename( get_template_directory() ) . '_wup_purchase_code', '' ) );?> [Required for support]" class="button button-primary">
			<?php _e( 'Send us a Support Ticket', 'flatsome-admin' ); ?>
		</a>
		<br><br><small><a href="https://themeforest.net/page/item_support_policy" target="_blank">What does support include?</a></small>
		<?php } ?>
    </div>

	</div>

</div>
