










<br>
<br>
	<div style="margin-left: 25px;">
		<h3 style="text-align: center;"> Personal Services Info </h3>
		<table border="1px" >
			<tr>
				<td> SL </td>
				<td> Services Name </td>
				<td> Person Name </td>
				<td> Status </td>
				<td> Date </td>
				<td> Services Amount </td>
				<td> Full Description </td>
				<td> Comments </td>
			</tr>
			<?php $sl = 1; foreach ($personal_services_info as $service) { ?>
				<tr>
					<td> <?php echo $sl ;?> </td>
					<td> <?php echo $service->services_name ;?> </td>
					<td> <?php echo $service->person_name ;?> </td>
					<td> 
						<?php
						if ($service->online_copy_pdf_src != NULL) {
							$download_link = '<a href="'.$service->online_copy_pdf_src.'" download> Download </a>';
						}else {
							$download_link = '';
						}

						if ($service->requ_status == 0) {
							echo 'Waiting ';
						}elseif ($service->requ_status == 1) {
							echo 'Success <br> '.$download_link;
						}elseif ($service->requ_status == 2) {
							echo 'Rejected';
						}else {
							echo 'Problem';
						}?> 
					</td>
					<td> <?php echo date('d-M-y', strtotime($service->entry_date));?> </td>
					<td> <?php echo $service->cut_amount ;?> </td>
					<td> <?php echo $service->slip_no.'<br>'.$service->voter_no.'<br>'.$service->nid_no.'<br>'.$service->nid_pin_no.'<br>'.$service->set_username.'<br>'.$service->set_password.'<br>'.$service->slip_no.'<br>' ;?> </td>
					<td> <?php echo $service->coment_s; ?> </td>
				</tr>
			<?php $sl+=1; } ?>
		</table>
	</div>
