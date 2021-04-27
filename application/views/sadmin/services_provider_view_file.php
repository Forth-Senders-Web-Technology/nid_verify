<?php 
	$this_success_services_count = 0; 
	$this_reject_services_count = 0; 
?>


<br>
<br>
	<div style="margin-left: 25px;">
		<table border="1px" >
			<tr>
				<th colspan="4">User Wise Services Information</th>
			</tr>
				<tr>
					<th> Service </th>
					<th> Success </th>
					<th> Rejected </th>
				</tr>
			<?php foreach ($services_provide_user_info as $user) {?>
				<tr>
					<td colspan="4" style="text-align: center; "> <?php echo $user->user_person_name; ?> </td>
				</tr>


				<?php foreach ($get_services_list as $list) {?>
					<tr>
						<td> <?php echo $list->services_name; ?> </td>
					<?php foreach ($services_provide_info as $provide) { 
						if ($user->udc_list_auto_p_iidd == $provide->delivery_user_id && $list->services_list_tbl_p_id == $provide->services_id && $provide->requ_status == 1) {
							$this_success_services_count += 1;
						}

						if ($user->udc_list_auto_p_iidd == $provide->delivery_user_id && $list->services_list_tbl_p_id == $provide->services_id && $provide->requ_status == 2) {
							$this_reject_services_count += 1;
						}
					} ?>
							<td>
								<?php echo $this_success_services_count; ?>
							</td>
							<td>
								<?php echo $this_reject_services_count; ?>
							</td>
					</tr>
				<?php 
					$this_success_services_count = 0; 
					$this_reject_services_count = 0; 
				} ?>




				<!-- get_services_list -->
			<?php } ?>
		</table>
	</div>
