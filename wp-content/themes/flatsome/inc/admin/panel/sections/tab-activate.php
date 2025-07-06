<?php
/**
 * Welcome screen getting started template
 */

use function Flatsome\Admin\status;
?>

<div id="tab-activate" class="col cols panel flatsome-panel">
	<div class="cols">
		<div class="inner-panel col-span-3">
			<div class="inner-panel col-span-3">
			<h3 style="color: #3f51b5;"><?php esc_html_e( 'لایسنس قالب فلتسام :', 'flatsome' ); ?></h3>
		<p><?php esc_html_e( 'قالب flatsome به وسیله تیم ایران فلتسام فعال شده و در اختیار شما قرار گرفته است. لطفا قالب فلتسام را مستقیما از سایت ایران فلتسام به آدرس flatsomee.ir تهیه کنید.', 'flatsome' ); ?></p>
	
	<h3 style="color: #3f51b5;"><?php esc_html_e( 'شرایط منع استفاده :', 'flatsome' ); ?></h3>
		
	<p><?php esc_html_e( 'کلیه حقوق مادی و معنوی قالب فلتسام متعلق به سایت تخصصی ایران فلتسام است. هرگونه تکثیر و نشر مجدد قالب فلتسام ممنوع بوده و رضایتی مبنی بر این عمل وجود ندارد.', 'flatsome' ); ?></p>
	<p><?php esc_html_e( 'تنها منبع معتبر قالب فلتسام وب سایت ایران فلتسام می باشد، لذا دریافت این قالب از هرگونه آکادمی و یا وب سایت های فروش قالب غیرقانونی و بدون اجازه است.', 'flatsome' ); ?></p>	
	<p style="color: #e91e63; font-weight: bold;"><?php esc_html_e( 'لذا در صورت استفاده غیرمجاز و دریافت از منابع دیگر بجز وب سایت ایران فلتسام، سایت شما دچار مشکل و نقص خواهد شد.', 'flatsome' ); ?></p>		
		
		<h3 style="color: #3f51b5;"><?php esc_html_e( 'شرایط استفاده قانونی از ایران فلتسام :', 'flatsome' ); ?></h3>
		<p><?php esc_html_e( 'طبق قوانین و سیاست های کاری ایران فلتسام، شخص خریدار قالب میتواند از قالب بر روی سایت شخصی خود و همچنین  در پروژه های طراحی سایت خود از قالب فلتسام بدون هیچ مشکلی بهره ببرد. ', 'flatsome' ); ?></p>
		</div>
		</div>
		<div class="inner-panel">
			<h3><?php esc_html_e( 'Status', 'flatsome' ); ?></h3>
			<?php status()->render_section_overview(); ?>
		</div>
	</div>
</div>


