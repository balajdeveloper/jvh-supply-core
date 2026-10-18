<div class="wrap">
    <h1>Theme Settings</h1>
    
    <!-- Tab Navigation Links -->
    <h2 class="nav-tab-wrapper">
        <a href="#header-settings" class="nav-tab nav-tab-active" data-tab="header-settings">Header Settings</a>
        <a href="#footer-settings" class="nav-tab" data-tab="footer-settings">Footer Settings</a>
    </h2>

    <form method="post" action="options.php">
        <?php
        settings_fields( 'jvh_theme_options_group' );
        do_settings_sections( 'jvh-supply' );
        
        // Get saved options
        $header_logo  = get_option( 'jvh_header_logo' );
        $top_bar_text = get_option( 'jvh_top_bar_text' );
        $header_phone = get_option( 'jvh_header_phone' );
        $header_email = get_option( 'jvh_header_email' );

        $footer_logo  = get_option( 'jvh_footer_logo' );
        $footer_desc  = get_option( 'jvh_footer_desc' );
        $footer_phone = get_option( 'jvh_footer_phone' );
        $footer_email = get_option( 'jvh_footer_email' );
        $footer_addr  = get_option( 'jvh_footer_address' );
        $footer_hours = get_option( 'jvh_footer_hours' );
        ?>

        <!-- TAB 1: HEADER SETTINGS -->
        <div id="header-settings" class="tab-content" style="display: block;">
            <h2>Header Configuration</h2>
            <table class="form-table">
                <!-- Top Bar Notification Text -->
                <tr valign="top">
                    <th scope="row">Top Bar Text</th>
                    <td>
                        <input type="text" name="jvh_top_bar_text" value="<?php echo esc_attr( $top_bar_text ); ?>" class="regular-text" placeholder="Janitorial & safety supplies for..." />
                        <p class="description">Top bar mein show hone wala notice text.</p>
                    </td>
                </tr>

                <!-- Header Logo -->
                <tr valign="top">
                    <th scope="row">Header Logo</th>
                    <td>
                        <div class="image-preview-wrapper" style="margin-bottom: 10px;">
                            <img id="header_logo_preview" src="<?php echo esc_url( $header_logo ); ?>" style="max-height: 60px; display: <?php echo $header_logo ? 'block' : 'none'; ?>;" />
                        </div>
                        <input type="hidden" id="jvh_header_logo" name="jvh_header_logo" value="<?php echo esc_attr( $header_logo ); ?>" />
                        <button type="button" class="button upload_image_button" data-target="jvh_header_logo" data-preview="header_logo_preview">Upload Header Logo</button>
                        <button type="button" class="button remove_image_button" data-target="jvh_header_logo" data-preview="header_logo_preview" style="color: #a00;">Remove</button>
                    </td>
                </tr>

                <!-- Header Phone -->
                <tr valign="top">
                    <th scope="row">Header Phone Number</th>
                    <td><input type="text" name="jvh_header_phone" value="<?php echo esc_attr( $header_phone ); ?>" class="regular-text" /></td>
                </tr>

                <!-- Header Email -->
                <tr valign="top">
                    <th scope="row">Header Email Address</th>
                    <td><input type="email" name="jvh_header_email" value="<?php echo esc_attr( $header_email ); ?>" class="regular-text" /></td>
                </tr>
            </table>
        </div>

        <!-- TAB 2: FOOTER SETTINGS -->
        <div id="footer-settings" class="tab-content" style="display: none;">
            <h2>Footer Configuration</h2>
            <table class="form-table">
                <!-- Footer Logo -->
                <tr valign="top">
                    <th scope="row">Footer Logo</th>
                    <td>
                        <div class="image-preview-wrapper" style="margin-bottom: 10px;">
                            <img id="footer_logo_preview" src="<?php echo esc_url( $footer_logo ); ?>" style="max-height: 60px; display: <?php echo $footer_logo ? 'block' : 'none'; ?>;" />
                        </div>
                        <input type="hidden" id="jvh_footer_logo" name="jvh_footer_logo" value="<?php echo esc_attr( $footer_logo ); ?>" />
                        <button type="button" class="button upload_image_button" data-target="jvh_footer_logo" data-preview="footer_logo_preview">Upload Footer Logo</button>
                        <button type="button" class="button remove_image_button" data-target="jvh_footer_logo" data-preview="footer_logo_preview" style="color: #a00;">Remove</button>
                    </td>
                </tr>

                <!-- Footer Description Text -->
                <tr valign="top">
                    <th scope="row">Footer Description</th>
                    <td>
                        <textarea name="jvh_footer_desc" rows="3" class="regular-text"><?php echo esc_textarea( $footer_desc ); ?></textarea>
                        <p class="description">Logo ke neechay aane wala chota description text.</p>
                    </td>
                </tr>

                <!-- Footer Phone -->
                <tr valign="top">
                    <th scope="row">Footer Phone</th>
                    <td><input type="text" name="jvh_footer_phone" value="<?php echo esc_attr( $footer_phone ); ?>" class="regular-text" /></td>
                </tr>

                <!-- Footer Email -->
                <tr valign="top">
                    <th scope="row">Footer Email</th>
                    <td><input type="email" name="jvh_footer_email" value="<?php echo esc_attr( $footer_email ); ?>" class="regular-text" /></td>
                </tr>

                <!-- Footer Address -->
                <tr valign="top">
                    <th scope="row">Business Address</th>
                    <td><textarea name="jvh_footer_address" rows="2" class="regular-text"><?php echo esc_textarea( $footer_addr ); ?></textarea></td>
                </tr>

                <!-- Footer Hours -->
                <tr valign="top">
                    <th scope="row">Business Hours</th>
                    <td><input type="text" name="jvh_footer_hours" value="<?php echo esc_attr( $footer_hours ); ?>" class="regular-text" placeholder="Mon - Fri: 8am - 5pm" /></td>
                </tr>
            </table>
        </div>

        <?php submit_button(); ?>
    </form>
</div>

<!-- JavaScript for Tabs Switching & Media Uploader -->
<script>
jQuery(document).ready(function($){
    // Tab switching logic
    $('.nav-tab-wrapper a').on('click', function(e){
        e.preventDefault();
        $('.nav-tab-wrapper a').removeClass('nav-tab-active');
        $(this).addClass('nav-tab-active');
        
        $('.tab-content').hide();
        var targetTab = $(this).data('tab');
        $('#' + targetTab).show();
    });

    // WordPress Media Uploader logic
    var file_frame;
    $('.upload_image_button').on('click', function(e){
        e.preventDefault();
        var button = $(this);
        var targetId = button.data('target');
        var previewId = button.data('preview');

        if (file_frame) {
            file_frame.open();
            return;
        }

        file_frame = wp.media.frames.file_frame = wp.media({
            title: 'Select or Upload Logo',
            button: { text: 'Use this logo' },
            multiple: false
        });

        file_frame.on('select', function(){
            var attachment = file_frame.state().get('selection').first().toJSON();
            $('#' + targetId).val(attachment.url);
            $('#' + previewId).attr('src', attachment.url).show();
        });

        file_frame.open();
    });

    $('.remove_image_button').on('click', function(e){
        e.preventDefault();
        var targetId = $(this).data('target');
        var previewId = $(this).data('preview');
        $('#' + targetId).val('');
        $('#' + previewId).hide().attr('src', '');
    });
});
</script>