<?php
$footer_logo      = get_option( 'jvh_footer_logo' );
$footer_desc      = get_option( 'jvh_footer_desc' );
$footer_phone     = get_option( 'jvh_footer_phone' );
$footer_email     = get_option( 'jvh_footer_email' );
$footer_addr      = get_option( 'jvh_footer_address' );
$footer_hours     = get_option( 'jvh_footer_hours' );
$footer_copyright = get_option( 'jvh_footer_copyright' );
?>

<h2>Footer Configuration</h2>
<table class="form-table">
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
    <tr valign="top">
        <th scope="row">Footer Description</th>
        <td><textarea name="jvh_footer_desc" rows="3" class="regular-text"><?php echo esc_textarea( $footer_desc ); ?></textarea></td>
    </tr>
    <tr valign="top">
        <th scope="row">Footer Phone</th>
        <td><input type="text" name="jvh_footer_phone" value="<?php echo esc_attr( $footer_phone ); ?>" class="regular-text" /></td>
    </tr>
    <tr valign="top">
        <th scope="row">Footer Email</th>
        <td><input type="email" name="jvh_footer_email" value="<?php echo esc_attr( $footer_email ); ?>" class="regular-text" /></td>
    </tr>
    <tr valign="top">
        <th scope="row">Business Address</th>
        <td><textarea name="jvh_footer_address" rows="2" class="regular-text"><?php echo esc_textarea( $footer_addr ); ?></textarea></td>
    </tr>
    <tr valign="top">
        <th scope="row">Business Hours</th>
        <td><input type="text" name="jvh_footer_hours" value="<?php echo esc_attr( $footer_hours ); ?>" class="regular-text" /></td>
    </tr>
    <tr valign="top">
        <th scope="row">Copyright Text</th>
        <td><input type="text" name="jvh_footer_copyright" value="<?php echo esc_attr( $footer_copyright ); ?>" class="regular-text" /></td>
    </tr>
</table>