</div>
</main>

<footer role="contentinfo" id="footer">
    <div class="cols">
        <?php
        if ( is_active_sidebar( 'widget-footer-1' ) ) {
            dynamic_sidebar( 'widget-footer-1' );
        }
        ?>

        <?php
        if ( is_active_sidebar( 'widget-footer-2' ) ) {
            dynamic_sidebar( 'widget-footer-2' );
        }
        ?>

        <?php
        if ( is_active_sidebar( 'widget-footer-3' ) ) {
            dynamic_sidebar( 'widget-footer-3' );
        }
        ?>
    </div>

    <?php
    if ( is_active_sidebar( 'widget-footer-4' ) ) {
        dynamic_sidebar( 'widget-footer-4' );
    }
    ?>
</footer>
</div>

<?php wp_footer(); ?>
</body>
</html>