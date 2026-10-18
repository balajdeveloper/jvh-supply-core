<?php
$header_logo  = get_option( 'jvh_header_logo' );
$top_bar_text = get_option( 'jvh_top_bar_text' );
$header_phone = get_option( 'jvh_header_phone' );
$header_email = get_option( 'jvh_header_email' );
?>

<h2>Header Configuration</h2>
<table class="form-table">
    <tr valign="top">
        <th scope="row">Top Bar Text</th>
        <td>
            <input type="text" name="jvh_top_bar_text" value="<?php echo esc_attr( $top_bar_text ); ?>" class="regular-text" />
        </td>
    </tr>
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
    <tr valign="top">
        <th scope="row">Header Phone Number</th>
        <td><input type="text" name="jvh_header_phone" value="<?php echo esc_attr( $header_phone ); ?>" class="regular-text" /></td>
    </tr>
    <tr valign="top">
        <th scope="row">Header Email Address</th>
        <td><input type="email" name="jvh_header_email" value="<?php echo esc_attr( $header_email ); ?>" class="regular-text" /></td>
    </tr>
</table>