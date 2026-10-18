<div class="wrap">
    <h1>Theme Settings</h1>
    <form method="post" action="options.php">
        <?php
        settings_fields( 'jvh_theme_options_group' );
        do_settings_sections( 'jvh-supply' );
        
        $header_logo = get_option( 'jvh_header_logo' );
        $footer_logo = get_option( 'jvh_footer_logo' );
        ?>
        <table class="form-table">
            <!-- Header Logo Upload -->
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

            <!-- Footer Logo Upload -->
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

            <!-- Phone Number -->
            <tr valign="top">
                <th scope="row">Phone Number</th>
                <td><input type="text" name="jvh_site_phone" value="<?php echo esc_attr( get_option( 'jvh_site_phone' ) ); ?>" class="regular-text" /></td>
            </tr>

            <!-- Email Address -->
            <tr valign="top">
                <th scope="row">Email Address</th>
                <td><input type="email" name="jvh_site_email" value="<?php echo esc_attr( get_option( 'jvh_site_email' ) ); ?>" class="regular-text" /></td>
            </tr>

            <!-- Business Address -->
            <tr valign="top">
                <th scope="row">Business Address</th>
                <td><textarea name="jvh_site_address" rows="3" class="regular-text"><?php echo esc_textarea( get_option( 'jvh_site_address' ) ); ?></textarea></td>
            </tr>
        </table>
        <?php submit_button(); ?>
    </form>
</div>

<!-- JavaScript for Media Uploader Popup -->
<script>
jQuery(document).ready(function($){
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