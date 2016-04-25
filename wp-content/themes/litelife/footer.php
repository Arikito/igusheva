		<footer>
			<p>
				<?php bloginfo('name') ?> - &copy; <?php echo date('Y');?>
				Все права защищены. <br> При копировании контента указывайте ссылку на источник!
			</p>
		</footer>
		<?php wp_footer(); ?>
	</div>
	<!--Import jQuery before materialize.js-->
	<script type="text/javascript" src="https://code.jquery.com/jquery-2.1.1.min.js"></script>
	<script type="text/javascript" src="<?php echo get_template_directory_uri(); ?>/js/main.js"></script>
</body>
</html>