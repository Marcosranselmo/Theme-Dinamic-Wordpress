<footer class="site-footer">
            <div class="container">
                <div class="copyright">
                    <p>Copyright X - All Rights Reserved</p>
                </div>
                <nav class="footer-menu">
                    <?php wp_nav_menu( array( 'theme_location' => 'wp_devs_footer_menu' ,
                    'depth' => 1 )); ?>
                </nav>
            </div>
        </footer>
    </div>
    <?php wp_footer(); ?>
</body>
</html>