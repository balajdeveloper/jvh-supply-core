<?php
/**
 * Header Settings Form Template
 */
$options      = get_option( 'jvh_theme_options', array() );
$header_logo  = isset( $options['jvh_header_logo'] ) ? $options['jvh_header_logo'] : '';
$top_bar_text = isset( $options['jvh_top_bar_text'] ) ? $options['jvh_top_bar_text'] : '';
?>

<h2>Header Configuration</h2>
<table class="form-table">
    <!-- Top Bar Notification Text -->
    <tr valign="top">
        <th scope="row">Top Bar Text</th>
        <td>
            <input type="text" name="jvh_theme_options[jvh_top_bar_text]" value="<?php echo esc_attr( $top_bar_text ); ?>" class="regular-text" placeholder="Janitorial & safety supplies for..." />
            <p class="description">Notice text displayed in the top bar.</p>
        </td>
    </tr>

    <!-- Header Logo -->
    <tr valign="top">
        <th scope="row">Header Logo</th>
        <td>
            <div class="image-preview-wrapper" style="margin-bottom: 10px;">
                <img id="header_logo_preview" src="<?php echo esc_url( $header_logo ); ?>" style="max-height: 60px; display: <?php echo $header_logo ? 'block' : 'none'; ?>;" />
            </div>
            <input type="hidden" id="jvh_header_logo" name="jvh_theme_options[jvh_header_logo]" value="<?php echo esc_attr( $header_logo ); ?>" />
            <button type="button" class="button upload_image_button" data-target="jvh_header_logo" data-preview="header_logo_preview">Upload Header Logo</button>
            <button type="button" class="button remove_image_button" data-target="jvh_header_logo" data-preview="header_logo_preview" style="color: #a00;">Remove</button>
        </td>
    </tr>
</table>