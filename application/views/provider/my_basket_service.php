    <!-- ########## START: MAIN PANEL ########## -->
    <div class="br-mainpanel">
        <div class="br-pageheader pd-y-15 pd-l-20">
            <div class="mx-auto ">
            </div>
        </div>

        <div class="br-pagebody">
            <div class="br-section-wrapper">

            <input type="hidden" value="" class="clickable_services_idd">
            <input type="hidden" value="" class="clickable_services_payment_cut_idd">

                <h6 class="tx-gray-800 tx-uppercase tx-bold tx-14 mg-b-10"> All Services Here, Select your's services </h6>

            <button class="btn btn-primary tx-11 tx-uppercase pd-y-12 pd-x-25 tx-mont tx-medium reload_my_basket_function">Reload</button><br>

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
                                <th class="wd-15p">Description</th>
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
                                    <input class="form-control nid_number" type="text" name="nid_number" value="" placeholder="Enter NID No">
                                </div>
                            </div>

                            <div class="col-lg-6">
                                <div class="form-group">
                                    <label class="form-control-label">NID Pin No: <span class="tx-danger">*</span></label>
                                    <input class="form-control nid_pin_no" type="text" name="nid_pin_no" value="" placeholder="Enter Nid Pin No">
                                </div>
                            </div>

                        </div>
                    </div>
                  
                    <button type="button" class="btn btn-success tx-11 tx-uppercase pd-y-12 pd-x-25 tx-mont tx-medium mg-b-20 nid_no_form_submit_btn" data-dismiss="modal" aria-label="Close">Continue</button>
                  </div><!-- modal-body -->
                </div><!-- modal-content -->
              </div><!-- modal-dialog -->
            </div><!-- modal -->











          <!-- MODAL ALERT MESSAGE -->
          <div id="insert_search_copy_nid" class="modal fade">
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
                                    <input class="form-control search_nid_number" type="text" name="nid_number" value="" placeholder="Enter NID No">
                                </div>
                            </div>

                            <div class="col-lg-6">
                                <div class="form-group">
                                    <label class="form-control-label">NID Pin No: <span class="tx-danger">*</span></label>
                                    <input class="form-control search_nid_pin_no" type="text" name="nid_pin_no" value="" placeholder="Enter Nid Pin No">
                                </div>
                            </div>

                        </div>
                    </div>
                  
                    <button type="button" class="btn btn-success tx-11 tx-uppercase pd-y-12 pd-x-25 tx-mont tx-medium mg-b-20 search_nid_no_form_submit_btn" data-dismiss="modal" aria-label="Close">Continue</button>
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
                                    <button id="upload-dialog">Choose PDF</button>
                                    <input type="file" style="display:none;" id="pdf-file" class="uploadFileThis" name="pdf" accept="application/pdf" />
                                    <div id="pdf-loader">Loading Preview ..</div>
                                    <canvas id="pdf-preview" width="150"></canvas>
                                    <span id="pdf-name"></span>
                                    <button style="display:none;" id="upload-button">Upload</button>
                                    <button id="cancel-pdf">Cancel</button>
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
                                    <input class="form-control set_username" type="text" name="set_username" value="" placeholder="Enter Username">
                                </div>
                            </div>

                            <div class="col-lg-6">
                                <div class="form-group">
                                    <label class="form-control-label">Password: <span class="tx-danger">*</span></label>
                                    <input class="form-control set_password" type="text" name="set_password" value="" placeholder="Enter Password">
                                </div>
                            </div>

                        </div>
                    </div>
                  
                    <button type="button" class="btn btn-success tx-11 tx-uppercase pd-y-12 pd-x-25 tx-mont tx-medium mg-b-20 user_pass_form_submit_btn" data-dismiss="modal" aria-label="Close">Continue</button>
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
                                    <input class="form-control problem_entry" type="text" name="problem_entry" value="" placeholder="Enter Problem ">
                                </div>
                            </div>

                        </div>
                    </div>
                  
                    <button type="button" class="btn btn-danger tx-11 tx-uppercase pd-y-12 pd-x-25 tx-mont tx-medium mg-b-20 cancel_form_submit_btn" data-dismiss="modal" aria-label="Close">Continue</button>

                  </div><!-- modal-body -->
                </div><!-- modal-content -->
              </div><!-- modal-dialog -->
            </div><!-- modal -->






    <script src="inc/pdf_preview/pdf.js"></script>
    <script src="inc/pdf_preview/pdf.worker.js"></script>

    <script type="text/javascript">

      $(document).on('click', ".service_cancel_btn", function() {
        let services_id = $(this).attr('this_id');
        let services_payment_cut_id = $(this).attr('payment_cut_id');
        $('.clickable_services_idd').val(services_id);
        $('.clickable_services_payment_cut_idd').val(services_payment_cut_id);
      });
      
      $(document).on('click', '.service_provide_btn', function () {
        let services_id = $(this).attr('this_id');
        $('.clickable_services_idd').val(services_id);
      });

      $(document).on('click', '.reload_my_basket_function', function () {
        get_my_provide_services();
      });



      $(document).on('click', '.pdf_form_submit_btn', function () {
        let services_id = $('.clickable_services_idd').val();
        upload_ec_pdf_file(services_id);
      });

      $(document).on('click', '.user_pass_form_submit_btn', function () {
        let services_id = $('.clickable_services_idd').val();
        insert_username_password(services_id);
      });

      $(document).on('click', '.nid_no_form_submit_btn', function () {
        let services_id = $('.clickable_services_idd').val();
        insert_nid_data(services_id);
      });

      $(document).on('click', '.search_nid_no_form_submit_btn', function () {
        let services_id = $('.clickable_services_idd').val();
        search_insert_nid_data(services_id);
      });

      $(document).on('click', '.cancel_form_submit_btn', function () {
        let services_id = $('.clickable_services_idd').val();
        let services_payment_cut_idd = $('.clickable_services_payment_cut_idd').val();
        insert_problem(services_id, services_payment_cut_idd);
      });



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

                        if (resp[z].services_id == 1) {
                            modal_id = 'insert_nid';
                        }else if (resp[z].services_id == 2 || resp[z].services_id == 4) {
                            modal_id = 'upload_pdf';
                        }else if (resp[z].services_id == 5) {
                            modal_id = 'insert_user_pass';
                        }
                        
                        html_data += `<tr class="services_table_row">
                                        <td>${sl}</td>
                                        <td>${resp[z].slip_no}</td>
                                        <td>${resp[z].voter_no}</td>
                                        <td>${resp[z].nid_no}</td>
                                        <td>${resp[z].nid_pin_no}</td>
                                        <td>${resp[z].person_name}</td>
                                        <td>${resp[z].des_cribe}</td>
                                        <td>${resp[z].birth_date}</td>
                                        <td>${resp[z].services_name}</td>
                                        <td>
                                            <button class="btn btn-success btn-sm service_provide_btn" data-toggle="modal" data-target="#${modal_id}" this_id="${resp[z].services_tbl_a_idd}" style="cursor:pointer;"><i class="fa fa-check"></i></button>
                                            <button class="btn btn-danger btn-sm service_cancel_btn" this_id="${resp[z].services_tbl_a_idd}" payment_cut_id="${resp[z].payment_cut_a_iddd}" data-toggle="modal" data-target="#cancel_services_provide" style="cursor:pointer;"><i class="fa fa-times"></i></button>
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
              nid_no: $('.nid_number').val(),
              nid_pin_no: $('.nid_pin_no').val(),
              services_id: services_id,
            },
            success: function () {
                get_my_provide_services();
                toastr.success('Data send successfully', 'Success');
            }
          });
        }

        function search_insert_nid_data(services_id) {
          $.ajax({
            type: "post",
            url: "servicesprovider/search_insert_nid_data",
            data: {
              nid_no: $('.search_nid_number').val(),
              nid_pin_no: $('.search_nid_pin_no').val(),
              services_id: services_id,
            },
            success: function () {
                get_my_provide_services();
                toastr.success('Data send successfully', 'Success');
            }
          });
        }

        function upload_ec_pdf_file(services_id) {
          var fd = new FormData();
          var UploadThisFile = $('.uploadFileThis');                 
          var files = $(UploadThisFile)[0].files[0];
            fd.append('file', files);
            fd.append('service_id', services_id);
            $.ajax({
              url: "servicesprovider/ec_server_file_upload",
              type: 'post',
              data: fd,                   
              contentType: false,
              processData: false,
              success: function () {
                get_my_provide_services();
                toastr.success('File upload success', 'Success');                
              }
            });
        }

        function insert_username_password(services_id) {
          $.ajax({
            type: "post",
            url: "servicesprovider/set_user_password",
            data: {
              services_id: services_id,
              set_username: $('.set_username').val(),
              set_password: $('.set_password').val()
            },
            success: function () {
                get_my_provide_services();
                toastr.success('Data send successfully', 'Success');
            }
          });
        }

        function insert_problem(services_id, services_payment_cut_idd) {
          let problem_text = $('.problem_entry').val();
          $.ajax({
            type: "post",
            url: "servicesprovider/cancel_this_services",
            data: {
              services_id: services_id,
              problem_entry: problem_text,
              services_payment_cut_idd: services_payment_cut_idd
            },
            success: function () {
                get_my_provide_services();
                toastr.warning('Data canceled', 'Cancel');              
            }
          });
        }




























































  var _PDF_DOC,

	_CANVAS = document.querySelector('#pdf-preview'),
	_OBJECT_URL;

function showPDF(pdf_url) {
	PDFJS.getDocument({ url: pdf_url }).then(function(pdf_doc) {
		_PDF_DOC = pdf_doc;

		// Show the first page
		showPage(1);

		// destroy previous object url
    	URL.revokeObjectURL(_OBJECT_URL);
	}).catch(function(error) {
		// trigger Cancel on error
		document.querySelector("#cancel-pdf").click();
		
		// error reason
		alert(error.message);
	});;
}

function showPage(page_no) {
	// fetch the page
	_PDF_DOC.getPage(page_no).then(function(page) {
		// set the scale of viewport
		var scale_required = _CANVAS.width / page.getViewport(1).width;

		// get viewport of the page at required scale
		var viewport = page.getViewport(scale_required);

		// set canvas height
		_CANVAS.height = viewport.height;

		var renderContext = {
			canvasContext: _CANVAS.getContext('2d'),
			viewport: viewport
		};
		
		// render the page contents in the canvas
		page.render(renderContext).then(function() {
			document.querySelector("#pdf-preview").style.display = 'inline-block';
			document.querySelector("#pdf-loader").style.display = 'none';
		});
	});
}


/* Show Select File dialog */
document.querySelector("#upload-dialog").addEventListener('click', function() {
    document.querySelector("#pdf-file").click();
});

/* Selected File has changed */
document.querySelector("#pdf-file").addEventListener('change', function() {
    // user selected file
    var file = this.files[0];

    // allowed MIME types
    var mime_types = [ 'application/pdf' ];
    
    // Validate whether PDF
    if(mime_types.indexOf(file.type) == -1) {
        alert('Error : Incorrect file type');
        return;
    }

    // validate file size
    if(file.size > 10*1024*1024) {
        alert('Error : Exceeded size 10MB');
        return;
    }

    // validation is successful

    // hide upload dialog button
    document.querySelector("#upload-dialog").style.display = 'none';
    
    // set name of the file
    document.querySelector("#pdf-name").innerText = file.name;
    document.querySelector("#pdf-name").style.display = 'inline-block';

    // show cancel and upload buttons now
    document.querySelector("#cancel-pdf").style.display = 'inline-block';
    document.querySelector("#upload-button").style.display = 'inline-block';

    // Show the PDF preview loader
    document.querySelector("#pdf-loader").style.display = 'inline-block';

    // object url of PDF 
    _OBJECT_URL = URL.createObjectURL(file)

    // send the object url of the pdf to the PDF preview function
	showPDF(_OBJECT_URL);
});

/* Reset file input */
document.querySelector("#cancel-pdf").addEventListener('click', function() {
    // show upload dialog button
    document.querySelector("#upload-dialog").style.display = 'inline-block';

    // reset to no selection
    document.querySelector("#pdf-file").value = '';

    // hide elements that are not required
    document.querySelector("#pdf-name").style.display = 'none';
    document.querySelector("#pdf-preview").style.display = 'none';
    document.querySelector("#pdf-loader").style.display = 'none';
    document.querySelector("#cancel-pdf").style.display = 'none';
    document.querySelector("#upload-button").style.display = 'none';
});

/* Upload file to server */
document.querySelector("#upload-button").addEventListener('click', function() {
    // AJAX request to server
    alert('This will upload file to server');
});













    </script>



















