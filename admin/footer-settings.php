<?php
/**
 * Footer Settings Form Template
 */
$options          = get_option( 'jvh_theme_options', array() );
$footer_logo      = isset( $options['jvh_footer_logo'] ) ? $options['jvh_footer_logo'] : '';
$footer_desc      = isset( $options['jvh_footer_desc'] ) ? $options['jvh_footer_desc'] : '';
$footer_copyright = isset( $options['jvh_footer_copyright'] ) ? $options['jvh_footer_copyright'] : '';
?>

<h2>Footer Configuration</h2>
<table class="form-table">
    <!-- Footer Logo -->
    <tr valign="top">
        <th scope="row">Footer Logo</th>
        <td>
            <div class="image-preview-wrapper" style="margin-bottom: 10px;">
                <img id="footer_logo_preview" src="<?php echo esc_url( $footer_logo ); ?>" style="max-height: 60px; display: <?php echo $footer_logo ? 'block' : 'none'; ?>;" />
            </div>
            <input type="hidden" id="jvh_footer_logo" name="jvh_theme_options[jvh_footer_logo]" value="<?php echo esc_attr( $footer_logo ); ?>" />
            <button type="button" class="button upload_image_button" data-target="jvh_footer_logo" data-preview="footer_logo_preview">Upload Footer Logo</button>
            <button type="button" class="button remove_image_button" data-target="jvh_footer_logo" data-preview="footer_logo_preview" style="color: #a00;">Remove</button>
        </td>
    </tr>

    <!-- Footer Description Text -->
    <tr valign="top">
        <th scope="row">Footer Description</th>
        <td>
            <textarea name="jvh_theme_options[jvh_footer_desc]" rows="3" class="regular-text"><?php echo esc_textarea( $footer_desc ); ?></textarea>
            <p class="description">The short description text placed below the logo.</p>
        </td>
    </tr>

    <!-- Footer Copyright Text -->
    <tr valign="top">
        <th scope="row">Copyright Text</th>
        <td>
            <input type="text" name="jvh_theme_options[jvh_footer_copyright]" value="<?php echo esc_attr( $footer_copyright ); ?>" class="regular-text" placeholder="&copy; 2026 JVH Supply. All rights reserved." />
            <p class="description">The copyright text displayed at the bottom of the footer.</p>
        </td>
    </tr>
</table>