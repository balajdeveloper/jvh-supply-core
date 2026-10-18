<?php
/**
 * Global Contact and Business Info Settings Template
 */
$options        = get_option( 'jvh_theme_options', array() );
$global_phone   = isset( $options['jvh_global_phone'] ) ? $options['jvh_global_phone'] : '';
$global_email   = isset( $options['jvh_global_email'] ) ? $options['jvh_global_email'] : '';
$global_address = isset( $options['jvh_global_address'] ) ? $options['jvh_global_address'] : '';
$global_hours   = isset( $options['jvh_global_hours'] ) ? $options['jvh_global_hours'] : '';
?>

<h2>Global Contact & Business Info</h2>
<p class="description">These details will automatically display across the Header, Footer, and Contact page.</p>

<table class="form-table">
    <tr valign="top">
        <th scope="row">Phone Number</th>
        <td><input type="text" name="jvh_theme_options[jvh_global_phone]" value="<?php echo esc_attr( $global_phone ); ?>" class="regular-text" placeholder="+1 (555) 000-0000" /></td>
    </tr>
    <tr valign="top">
        <th scope="row">Email Address</th>
        <td><input type="email" name="jvh_theme_options[jvh_global_email]" value="<?php echo esc_attr( $global_email ); ?>" class="regular-text" placeholder="info@jvhsupply.com" /></td>
    </tr>
    <tr valign="top">
        <th scope="row">Location / Business Address</th>
        <td><textarea name="jvh_theme_options[jvh_global_address]" rows="3" class="regular-text" placeholder="123 Business St, Suite 100"><?php echo esc_textarea( $global_address ); ?></textarea></td>
    </tr>
    <tr valign="top">
        <th scope="row">Business Hours</th>
        <td><input type="text" name="jvh_theme_options[jvh_global_hours]" value="<?php echo esc_attr( $global_hours ); ?>" class="regular-text" placeholder="Mon - Fri: 8:00 AM - 5:00 PM" /></td>
    </tr>
</table>