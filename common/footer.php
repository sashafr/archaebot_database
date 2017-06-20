</div><!-- end content -->

<footer role="contentinfo">

        <div id="custom-footer-text">
            <hr>
            <?php if ( $footerText = get_theme_option('Footer Text') ): ?>
            <!--<img src="http://pennds.org/archaebot_database/files/square_thumbnails/f82540ecd8036fa8cd0fd069541111e7.jpg" style="width: 100px; height: 100px; display: inline;">-->
            <p><?php echo $footerText; ?></p>
            <?php endif; ?>
            <?php if ((get_theme_option('Display Footer Copyright') == 1) && $copyright = option('copyright')): ?>
                <p><?php echo $copyright; ?></p>
            <?php endif; ?>
        </div>

        <p><?php //echo __('Proudly powered by <a href="http://omeka.org">Omeka</a>.'); ?></p>

    <?php fire_plugin_hook('public_footer', array('view' => $this)); ?>

</footer>

</div><!--end wrap-->

<script type="text/javascript">
 jQuery(document).ready(function () {
    Omeka.showAdvancedForm();
    Omeka.skipNav();
    Omeka.megaMenu("#top-nav");
    Seasons.mobileSelectNav();
});
</script>

</body>

</html>
