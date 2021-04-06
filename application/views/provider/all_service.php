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
                                <th class="wd-15p">SL</th>
                                <th class="wd-15p">Slip No</th>
                                <th class="wd-15p">Voter No</th>
                                <th class="wd-15p">Nid No</th>
                                <th class="wd-15p">Nid Pin No</th>
                                <th class="wd-15p">Name</th>
                                <th class="wd-15p">Birth Date</th>
                                <th class="wd-15p">Services Name</th>
                                <th class="wd-15p">Select</th>
                            </tr>
                        </thead>
                        <tbody class="assign_services_data"></tbody>
                    </table>
                </div>


            </div>
        </div>

    </div>
    <!-- ########## END: MAIN PANEL ########## -->



    <script>

get_all_services();


        function get_all_services() {
            $.ajax({
                url: "servicesprovider/get_all_Waiting_services",
                type: "get",
                dataType: 'json',
                success: function (resp) {                    
                    let html_data = '';
                    let sl = 1;
                    for (let z = 0; z < resp.length; z++) {
                        html_data += `<tr style="cursor:pointer;" this_id="${resp[z].services_tbl_a_idd}" class="table_row">
                                        <td>${sl}</td>
                                        <td>${resp[z].slip_no}</td>
                                        <td>${resp[z].voter_no}</td>
                                        <td>${resp[z].nid_no}</td>
                                        <td>${resp[z].nid_pin_no}</td>
                                        <td>${resp[z].person_name}</td>
                                        <td>${resp[z].birth_date}</td>
                                        <td>${resp[z].services_name}</td>
                                        <td><button class="btn btn-info active btn-block mg-b-2" style="cursor:pointer;">Select</button></td>
                                    </tr>`;
                        sl += 1;
                    }

                    $('.assign_services_data').html(html_data);
                }
            });
        }

        $(document).on('click', '.table_row', function () {
            let request_services_iid = $(this).attr('this_id');
            $.ajax({
                type: "post",
                url: "servicesprovider/select_this_services_in_login_user",
                data: {
                    request_services_iid: request_services_iid,
                },
                success: function (response) {
                    get_all_services();
                    toastr.success("adde in your basket", "Success");
                }
            });
        });

    </script>