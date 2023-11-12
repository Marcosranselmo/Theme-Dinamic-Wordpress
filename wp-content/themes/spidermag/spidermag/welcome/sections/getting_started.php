<div class="welcome-getting-started">
    <div class="welcome-demo-import">
        <h3><?php echo esc_html__('Manual Setup', 'spidermag'); ?></h3>

        <p><?php echo esc_html__('You can setup the home page sections either from Customizer Panel or from Elementor Pagebuilder', 'spidermag'); ?></p>
        <p><strong><?php echo esc_html__('FROM CUSTOMIZER', 'spidermag'); ?></strong></p>
        <ol>
            <li><?php echo esc_html__('Go to Appearance &gt; Customize', 'spidermag'); ?></li>
            <li><?php echo esc_html__('Click on ', 'spidermag'); ?><strong>"<a href="<?php echo esc_url(admin_url('customize.php?autofocus[section]=static_front_page')); ?>" target="_blank"><?php echo esc_html__('Enable Front Page', 'spidermag'); ?></a>"</strong> <?php echo esc_html__('and choose "Your Latest Post" and check the Enable SpiderMag Front Page.', 'spidermag'); ?></li>
            <li><?php echo sprintf(
                    esc_html__('Now go back to %s and manage the sections.', 'spidermag'), '<a href="'.esc_url(admin_url('customize.php?autofocus[panel]=construction_light_frontpage_settings')).'" target="_blank">' . esc_html__('Home Sections', 'spidermag') . '</a>'); ?></li>
        </ol>
        <p><strong><?php echo esc_html__('FROM ELEMENTOR', 'spidermag'); ?></strong></p>
        <ol>
            <li><?php echo esc_html__('Firstly install and activate "Elementor Website Builder" plugin from', 'spidermag'); ?> <a href="<?php echo esc_url(admin_url('post-new.php?page=spidermag-welcome&section=recommended_plugins')); ?>" target="_blank"><?php echo esc_html__('Recommended Plugin page.', 'spidermag'); ?></a></li>
            <li><?php echo esc_html__('Create a new page and edit with Elementor. Drag and drop the elements in the Elementor to create your own design.', 'spidermag'); ?></li>
            <li><?php echo esc_html__('Now go to Appearance &gt; Customize &gt; Homepage Settings and choose "A static page" for "Your latest posts" and select the created page for "Home Page" option.', 'spidermag'); ?></li>
        </ol>
        
        <p>
            <?php echo sprintf(esc_html__('For more detail visit our theme %s.', 'spidermag'), '<a href="'.esc_url('https://docs.sparklewpthemes.com/spidermag/').'" target="_blank">' . esc_html__('Documentation Page', 'spidermag') . '</a>'); ?>
        </p>
    </div>

    <div class="welcome-demo-import">
        <h3><?php echo esc_html__('Demo Importer', 'spidermag'); ?></h3>
        <div class="welcome-theme-thumb">
            <img src="<?php echo esc_url(get_stylesheet_directory_uri() . '/screenshot.png'); ?>" alt="<?php printf(esc_attr__('%s Demo', 'spidermag'), $this->theme_name); ?>">
        </div>

        <div class="welcome-demo-import-text">
            <p><?php esc_html_e('Or you can get started by importing the demo with just one click.', 'spidermag'); ?></p>
            <p><?php echo sprintf(esc_html__('Click on the button below to install and activate the One Click Demo Importer Plugin. For more detailed documentation on how the demo importer works, click %s.', 'spidermag'), '<a href="'.esc_url('https://docs.sparklewpthemes.com/spidermag/').'" target="_blank">' . esc_html__('here', 'spidermag') . '</a>'); ?></p>
            <?php echo $this->generate_demo_installer_button(); ?>
        </div>
    </div>
</div>