<div class="wrap">
    <h1>Workshop WPD</h1>
    <?php settings_errors(); ?>
    <form action="options.php" method="post">
        <?php 
            settings_fields( 'workshopwpd_options_group' );
            do_settings_sections( 'workshopwpd' );
            submit_button( "Save" );
        ?>
    </form>
</div>