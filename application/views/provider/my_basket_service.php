    <!-- ########## START: MAIN PANEL ########## -->
    <div class="br-mainpanel">
        <div class="br-pageheader pd-y-15 pd-l-20">
            <div class="mx-auto ">
            </div>
        </div>

        <div class="br-pagebody">
            <div class="br-section-wrapper">

                <h6 class="tx-gray-800 tx-uppercase tx-bold tx-14 mg-b-10"> All Services Here, Select your's services </h6><br>

                <div class="table-wrapper">
                    <table id="services_data_table" class="table table-bordered table-colored table-info">
                        <thead>
                            <tr>
                                <th class="wd-5p">SL</th>
                                <th class="wd-15p">Slip No</th>
                                <th class="wd-15p">Voter No</th>
                                <th class="wd-15p">Nid No</th>
                                <th class="wd-15p">Nid Pin No</th>
                                <th class="wd-15p">Name</th>
                                <th class="wd-15p">Birth Date</th>
                                <th class="wd-15p">Services Name</th>
                                <th class="wd-50p">Action</th>
                            </tr>
                        </thead>
                        <tbody class="assign_services_data"></tbody>
                    </table>
                </div>

            </div>
        </div>

    </div>
    <!-- ########## END: MAIN PANEL ########## -->






          <!-- MODAL ALERT MESSAGE -->
          <div id="insert_nid" class="modal fade">
            <div class="modal-dialog" role="document">
              <div class="modal-content tx-size-sm">
                <div class="modal-body tx-center pd-y-20 pd-x-20">
                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                  </button>

                  <h4 class="tx-success tx-semibold mg-b-20"> Provide NID No Service </h4>

                    <div class="form-layout form-layout-1">
                        <div class="row mg-b-25">

                            <div class="col-lg-6">
                                <div class="form-group">
                                    <label class="form-control-label">NID No: <span class="tx-danger">*</span></label>
                                    <input class="form-control" type="text" name="nid_number" value="" placeholder="Enter NID No">
                                </div>
                            </div>

                            <div class="col-lg-6">
                                <div class="form-group">
                                    <label class="form-control-label">NID Pin No: <span class="tx-danger">*</span></label>
                                    <input class="form-control" type="text" name="nid_pin_no" value="" placeholder="Enter Nid Pin No">
                                </div>
                            </div>

                        </div>
                    </div>
                  
                    <button type="button" class="btn btn-success tx-11 tx-uppercase pd-y-12 pd-x-25 tx-mont tx-medium mg-b-20 nid_form_submit_btn" data-dismiss="modal" aria-label="Close">Continue</button>
                  </div><!-- modal-body -->
                </div><!-- modal-content -->
              </div><!-- modal-dialog -->
            </div><!-- modal -->











          <!-- MODAL ALERT MESSAGE -->
          <div id="upload_pdf" class="modal fade">
            <div class="modal-dialog" role="document">
              <div class="modal-content tx-size-sm">
                <div class="modal-body tx-center pd-y-20 pd-x-20">
                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                  </button>

                  <h4 class="tx-success tx-semibold mg-b-20"> Upload EC PDF </h4>

                    <div class="form-layout form-layout-1">
                        <div class="row mg-b-25">

                            <div class="col-lg-12">
                                <div class="form-group">
                                    <label class="form-control-label">Upload PDF: <span class="tx-danger">*</span></label>
                                    <input class="form-control" type="file" name="pdf_upload">
                                </div>
                            </div>

                        </div>
                    </div>
                  
                    <button type="button" class="btn btn-success tx-11 tx-uppercase pd-y-12 pd-x-25 tx-mont tx-medium mg-b-20 pdf_form_submit_btn" data-dismiss="modal" aria-label="Close">Continue</button>
                  </div><!-- modal-body -->
                </div><!-- modal-content -->
              </div><!-- modal-dialog -->
            </div><!-- modal -->

















          <!-- MODAL ALERT MESSAGE -->
          <div id="insert_user_pass" class="modal fade">
            <div class="modal-dialog" role="document">
              <div class="modal-content tx-size-sm">
                <div class="modal-body tx-center pd-y-20 pd-x-20">
                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                  </button>

                  <h4 class="tx-success tx-semibold mg-b-20"> Set Username Password </h4>

                    <div class="form-layout form-layout-1">
                        <div class="row mg-b-25">

                            <div class="col-lg-6">
                                <div class="form-group">
                                    <label class="form-control-label">Username: <span class="tx-danger">*</span></label>
                                    <input class="form-control" type="text" name="set_username" value="" placeholder="Enter Username">
                                </div>
                            </div>

                            <div class="col-lg-6">
                                <div class="form-group">
                                    <label class="form-control-label">Password: <span class="tx-danger">*</span></label>
                                    <input class="form-control" type="text" name="set_password" value="" placeholder="Enter Password">
                                </div>
                            </div>

                        </div>
                    </div>
                  
                    <button type="button" class="btn btn-success tx-11 tx-uppercase pd-y-12 pd-x-25 tx-mont tx-medium mg-b-20 user_form_submit_btn" data-dismiss="modal" aria-label="Close">Continue</button>
                  </div><!-- modal-body -->
                </div><!-- modal-content -->
              </div><!-- modal-dialog -->
            </div><!-- modal -->








          <!-- MODAL ALERT MESSAGE -->
          <div id="cancel_services_provide" class="modal fade">
            <div class="modal-dialog" role="document">
              <div class="modal-content tx-size-sm">
                <div class="modal-body tx-center pd-y-20 pd-x-20">
                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                  </button>

                  <h4 class="tx-danger tx-semibold mg-b-20"> Cancel Service </h4>

                    <div class="form-layout form-layout-1">
                        <div class="row mg-b-25">

                            <div class="col-lg-12">
                                <div class="form-group">
                                    <label class="form-control-label">Problem Entry: <span class="tx-danger">*</span></label>
                                    <input class="form-control" type="text" name="problem_entry" value="" placeholder="Enter Problem ">
                                </div>
                            </div>

                        </div>
                    </div>
                  
                    <button type="button" class="btn btn-danger tx-11 tx-uppercase pd-y-12 pd-x-25 tx-mont tx-medium mg-b-20 user_form_submit_btn" data-dismiss="modal" aria-label="Close">Continue</button>

                  </div><!-- modal-body -->
                </div><!-- modal-content -->
              </div><!-- modal-dialog -->
            </div><!-- modal -->


























    <script>

        get_my_provide_services();

        function get_my_provide_services() {
            $.ajax({
                url: "servicesprovider/get_my_provide_services",
                type: "get",
                dataType: 'json',
                success: function (resp) {                    
                    let html_data = '';
                    let sl = 1;
                    for (let z = 0; z < resp.length; z++) {

                        let modal_id = '';

                        if (resp[z].services_id == 1 || resp[z].services_id == 4) {
                            modal_id = 'insert_nid';
                        }else if (resp[z].services_id == 2) {
                            modal_id = 'upload_pdf';
                        }else if (resp[z].services_id == 5) {
                            modal_id = 'insert_user_pass';
                        }

                        
                        html_data += `<tr style="cursor:pointer;" class="services_table_row">
                                        <td data-toggle="modal" data-target="#${modal_id}">${sl}</td>
                                        <td data-toggle="modal" data-target="#${modal_id}">${resp[z].slip_no}</td>
                                        <td data-toggle="modal" data-target="#${modal_id}">${resp[z].voter_no}</td>
                                        <td data-toggle="modal" data-target="#${modal_id}">${resp[z].nid_no}</td>
                                        <td data-toggle="modal" data-target="#${modal_id}">${resp[z].nid_pin_no}</td>
                                        <td data-toggle="modal" data-target="#${modal_id}">${resp[z].person_name}</td>
                                        <td data-toggle="modal" data-target="#${modal_id}">${resp[z].birth_date}</td>
                                        <td data-toggle="modal" data-target="#${modal_id}">${resp[z].services_name}</td>
                                        <td>
                                            <button class="btn btn-success btn-sm service_provide_btn" data-toggle="modal" data-target="#${modal_id}" this_id="${resp[z].services_tbl_a_idd}" style="cursor:pointer;"><i class="fa fa-check"></i></button>
                                            <button class="btn btn-danger  btn-sm service_cancel_btn" this_id="${resp[z].services_tbl_a_idd}" data-toggle="modal" data-target="#cancel_services_provide" style="cursor:pointer;"><i class="fa fa-times"></i></button>
                                        </td>
                                    </tr>`;
                        sl += 1;
                    }

                    $('.assign_services_data').html(html_data);
                }
            });
        }

        function insert_nid_data(services_id) {
          $.ajax({
            type: "post",
            url: "servicesprovider/insert_nid_data",
            data: {
              nid_no: nid_no,
              nid_pin_no: nid_pin_no,
              services_id: services_id,
            },
            success: function () {
              
            }
          });
        }

        function upload_ec_pdf_file(services_id) {
          $.ajax({
            type: "post",
            url: "servicesprovider/",
            data: {
              services_id: services_id,

            },
            success: function () {
              
            }
          });
        }

        function insert_username_password(services_id) {
          $.ajax({
            type: "post",
            url: "servicesprovider/",
            data: {
              services_id: services_id,

            },
            success: function () {
              
            }
          });
        }

        function insert_problem(services_id) {
          $.ajax({
            type: "post",
            url: "servicesprovider/",
            data: {
              services_id: services_id,

            },
            success: function () {
              
            }
          });
        }

    </script>



















