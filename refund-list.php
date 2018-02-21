<?php
/* this file is located in refunded order plugin folder . it is used to display listing of refunded orders*/
function refund_list() {
global $wpdb;
$Sql =	"SELECT * FROM refund_ids";
$content =	$wpdb->get_results($Sql); 
?>
 <link type="text/css" href="<?php echo WP_PLUGIN_URL; ?>/refundedorders/style-admin.css" rel="stylesheet" />
    <div class="wrap">
        <h2>List of All Refunded Orders with comments </h2>
        <table class='wp-list-table widefat fixed striped posts'>
            <tr>
                <th class="manage-column ss-list-width">#</th>
                <th class="manage-column ss-list-width">Order Id</th>
                <th class="manage-column ss-list-width">Email</th>
                <th class="manage-column ss-list-width">Account Holder's Name</th>
                <th class="manage-column ss-list-width">Bank Name</th>
                <th class="manage-column ss-list-width">Account Number</th>
                <th class="manage-column ss-list-width">Ifsc Code</th>
                <th class="manage-column ss-list-width">Pancard Number</th>
			</tr>
			<?php 
				$i = 1 ;
				foreach ($content as $row) {
				$order_id = $row->order_id;
				$loop = new WP_Query( $row );
				switch_to_blog( 2 ); 
				$email = get_post_meta( $order_id, '_billing_email', true );
			?>
                <tr>
				    <td class="manage-column ss-list-width"><?php echo $i; ?></td>
					<td class="manage-column ss-list-width"><?php echo $row->order_id; ?></td>
					<td class="manage-column ss-list-width"><?php echo $email; ?></td>
					<td class="manage-column ss-list-width"><?php echo $row->user_name; ?></td>
                    <td class="manage-column ss-list-width"><?php echo $row->bank_name; ?></td>
                    <td class="manage-column ss-list-width"><?php echo $row->Account_no; ?></td>
                    <td class="manage-column ss-list-width"><?php echo $row->ifsc_code; ?></td>
                    <td class="manage-column ss-list-width"><?php echo $row->pan_number; ?></td>
				</tr>
            <?php 
				$i++;}
			?>
        </table>
    </div>
	<?php 
	switch_to_blog( 1 ); 
}
?>