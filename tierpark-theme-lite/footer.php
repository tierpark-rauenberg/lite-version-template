<?php
/**
 * The template for displaying the footer.
 *
 * Contains all content after the main content area and sidebar
 *
 * @package Admiral
 */

?>

	</div><!-- #content -->

	<?php do_action( 'admiral_before_footer' ); ?>

	<div id="footer" class="footer-wrap">

		<footer id="colophon" class="site-footer container clearfix" role="contentinfo">

			<?php do_action( 'admiral_footer_menu' ); ?>

			<div class="site-info-impressum"><a href="impressum/">Impressum</a></div>
			<div id="footer-text" class="site-info">
				
				<?php do_action( 'admiral_footer_text' ); ?> | <a href="/wp-admin/">Login</a>
			</div><!-- .site-info -->

		</footer><!-- #colophon -->

	</div>

</div><!-- #page -->

<?php wp_footer(); ?>

</body>
</html>
