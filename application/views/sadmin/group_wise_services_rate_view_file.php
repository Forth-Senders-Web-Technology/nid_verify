
    <!-- ########## START: MAIN PANEL ########## -->
    <div class="br-mainpanel">
        <div class="br-pageheader pd-y-15 pd-l-20">
            <div class="mx-auto ">
               
            </div>
        </div><!-- br-pageheader -->
            
        <!--  br-pagebody --> 
      <div class="br-pagebody mg-t-5 pd-x-30">
          
        <div class="br-section-wrapper">
          <h6 class="tx-gray-800 tx-uppercase tx-bold tx-14 mg-b-10"> Services Rate Table </h6>

          <div class="table-wrapper">
            <table id="datatable2" class="table display responsive table-colored table-dark">
              <thead>
                <tr>
                  <th class="wd-15p">SL</th>
                  <th class="wd-15p">Group</th>
                  <th class="wd-15p">Description</th>
                  <th class="wd-15p">Services</th>
                  <th class="wd-15p">Amount</th>
                </tr>
              </thead>
              <tbody>

              <?php
                $serial = 1; 
                foreach ($groups_rates as $rates) { ?>
                <tr class="edit_service_rate_btn" data-toggle="modal" data-target="#services_group_rate_table" this_rates_id="<?php echo $rates->service_rate_by_group_id; ?>" style="cursor:pointer;">
                  <td> <?php echo $serial; ?> </td>
                  <td> <?php echo $rates->name; ?> </td>
                  <td> <?php echo $rates->description; ?> </td>
                  <td> <?php echo $rates->services_name; ?> </td>
                  <td> <?php echo $rates->serive_s_rate_s; ?>/- </td>
                </tr>
              <?php $serial += 1; } ?>

              </tbody>
            </table>
          </div>

        </div>

      </div><!-- br-pagebody -->

    </div><!-- br-mainpanel -->
    <!-- ########## END: MAIN PANEL ########## -->


    

          <!-- MODAL ALERT MESSAGE -->
          <div id="services_group_rate_table" class="modal fade">
            <div class="modal-dialog" role="document">
              <div class="modal-content tx-size-sm">
                <div class="modal-body tx-center pd-y-20 pd-x-20">
                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                  </button>

                  <h4 class="tx-success tx-semibold mg-b-20 modal_head_title"> Enter Rates </h4>

                  <form action="sadmin/update_services_rate" method="post">
                    <div class="form-layout form-layout-1">

                      <input class="form-control services_rate_p_id_set" name="services_rate_p_id_set" type="hidden" value="">

                        <div class="form-group">
                            <label class="form-control-label">This Services Rate: <span class="tx-danger">*</span></label>
                            <input class="form-control enter_services_rates" type="text" name="enter_services_rates" value="" style="text-align:right" placeholder="Enter This Services Rate">
                        </div>

                    </div>

                    <button type="submit" class="btn btn-success tx-11 tx-uppercase pd-y-12 pd-x-25 tx-mont tx-medium mg-b-20 user_pass_form_submit_btn" >Continue</button>

                  </form>
                  </div><!-- modal-body -->
                </div><!-- modal-content -->
              </div><!-- modal-dialog -->
            </div><!-- modal -->





            <script>
              $(document).on('click', '.edit_service_rate_btn', function () {
                let this_rates_id = $(this).attr('this_rates_id');
                $('.services_rate_p_id_set').val(this_rates_id);

                get_services_rate_by_id(this_rates_id);

              });

              function get_services_rate_by_id(this_rates_id) {
                $.ajax({
                  type: "post",
                  url: "sadmin/get_services_rates_json_encode",
                  data: {
                    this_rates_id: this_rates_id
                  },
                  dataType: "json",
                  success: function (rspon) {
                    $('.modal_head_title').html(`Enter "${rspon.services_name}" rate for "${rspon.description}"`);
                    $('.enter_services_rates').val(rspon.serive_s_rate_s);
                  }
                });
              }
            </script>