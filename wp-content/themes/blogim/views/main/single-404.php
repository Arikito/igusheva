<div class="content single-content">
	<div class="format-text">
		<?php
			$blogim_posterror = get_post(get_theme_mod('blogim_404_page'));
			if($blogim_posterror){
				echo $blogim_posterror->post_content;
			}
		?>
	</div><!-- end of format text -->
</div><!-- end of content -->