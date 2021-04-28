    <!-- ########## START: MAIN PANEL ########## -->
    <div class="br-mainpanel">
        <div class="br-pageheader pd-y-15 pd-l-20"> </div><!-- br-pageheader -->
            
        <div class="pd-x-20 pd-sm-x-30 pd-t-20 pd-sm-t-30">
        </div>
        
        <!--  br-pagebody --> 
        <div class="br-pagebody">

            <div class="br-section-wrapper">


				<?php if ($this->ion_auth->in_group(array('admin', 's_admin', 'services'))) { ?>

					<div class="bd pd-x-20">
						<h6 class="tx-gray-800 tx-uppercase tx-bold tx-14 mg-b-10 mt-3">Services Provide Statement</h6>
						<p class="mg-b-30 tx-gray-600"> Total services provide information </p>

						<div class="d-flex align-items-center justify-content-center bg-gray-100 ht-md-60 ">
							<div class="d-md-flex pd-y-20 pd-md-y-0">
								<input type="text" class="form-control fc-datepicker provide_selected_start_date" placeholder="Select Start Date">
								<input type="text" class="form-control mg-md-l-10 mg-t-10 mg-md-t-0 fc-datepicker provide_selected_ended_date" placeholder="Select End Date">
								<button class="btn btn-info pd-y-13 pd-x-20 bd-0 mg-md-l-10 mg-t-10 mg-md-t-0 tx-uppercase tx-11 tx-spacing-2 get_services_provide_info_ss" style="cursor: pointer; ">View</button>
							</div>
						</div>
					</div>

				<?php } ?>



				<div class="bd pd-x-20 mt-2">
					<h6 class="tx-gray-800 tx-uppercase tx-bold tx-14 mg-b-10 mt-3">Services Statement</h6>
					<p class="mg-b-30 tx-gray-600"> Total services information </p>

					<div class="d-flex align-items-center justify-content-center bg-gray-100 ht-md-60 ">
						<div class="d-md-flex pd-y-20 pd-md-y-0">
							<input type="text" class="form-control fc-datepicker personal_services_start_date" placeholder="Select Start Date">
							<input type="text" class="form-control mg-md-l-10 mg-t-10 mg-md-t-0 fc-datepicker personal_services_ended_date" placeholder="Select End Date">
							<button class="btn btn-info pd-y-13 pd-x-20 bd-0 mg-md-l-10 mg-t-10 mg-md-t-0 tx-uppercase tx-11 tx-spacing-2 get_personal_services_infos" style="cursor: pointer; ">View</button>
						</div>
					</div>
				</div>



				<?php if ($this->ion_auth->in_group(array('admin', 's_admin'))) { ?>

					<div class="bd pd-x-20 mt-2">
						<h6 class="tx-gray-800 tx-uppercase tx-bold tx-14 mg-b-10 mt-3">Agent Statement</h6>
						<p class="mg-b-30 tx-gray-600"> Total Agent User services </p>


						<div class="d-flex align-items-center justify-content-center bg-gray-100 ht-md-60 ">
							<div class="d-md-flex pd-y-20 pd-md-y-0">
								<input type="text" class="form-control fc-datepicker agent_user_start_date" placeholder="Select Start Date">
								<input type="text" class="form-control mg-md-l-10 mg-t-10 mg-md-t-0 fc-datepicker agent_user_ended_date" placeholder="Select End Date">
								<button class="btn btn-info pd-y-13 pd-x-20 bd-0 mg-md-l-10 mg-t-10 mg-md-t-0 tx-uppercase tx-11 tx-spacing-2 agent_user_services_info_btn" style="cursor: pointer; ">View</button>
							</div>
						</div>
					</div>

				<?php } ?>



            </div>

        </div>
        
    </div><!-- br-mainpanel -->
    <!-- ########## END: MAIN PANEL ########## -->



	<script>
	
		$(document).on('click', '.get_services_provide_info_ss', function () {
			let selected_start_date = $('.provide_selected_start_date').val();
			let selected_ended_date = $('.provide_selected_ended_date').val();

			if (selected_start_date != '' || selected_ended_date != '') {
				window.open('get_services_provide?start_date=' + selected_start_date + '&end_date=' + selected_ended_date, '_blank', 'width=800,height=800,left=300,top=300');
			}

		});

		$(document).on('click', '.get_personal_services_infos', function () {
			let selecte_start_date = $('.personal_services_start_date').val();
			let selecte_ended_date = $('.personal_services_ended_date').val();

            if (selecte_start_date != '' || selecte_ended_date != '') {
                window.open('get_services_information?start_date=' + selecte_start_date + '&end_date=' + selecte_ended_date, '_blank', 'width=800,height=800,left=300,top=300');
            }
		});

		$(document).on('click', '.agent_user_services_info_btn', function () {
			let selecte_start_date = $('.agent_user_start_date').val();
			let selecte_ended_date = $('.agent_user_ended_date').val();

            if (selecte_start_date != '' || selecte_ended_date != '') {
                window.open('agent_statement?start_date=' + selecte_start_date + '&end_date=' + selecte_ended_date, '_blank', 'width=800,height=800,left=300,top=300');
            }
		});

	</script>
