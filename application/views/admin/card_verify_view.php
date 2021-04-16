
<!-- ########## START: MAIN PANEL ########## -->
<div class="br-mainpanel">
        <div class="br-pageheader pd-y-15 pd-l-20">
            <div class="mx-auto ">
               <h3> এই সার্ভিসের জন্য আপনার একাউন্ট থেকে <b class="services_rates"> <?php if (!empty($service_rate->serive_s_rate_s)) {
                   echo $service_rate->serive_s_rate_s;
               }  ?> </b> টাকা কেটে নেওয়া হবে। </h3> 
               
            </div>
        </div><!-- br-pageheader -->
            
        <div class="pd-x-20 pd-sm-x-30 pd-t-20 pd-sm-t-30">
            <h5 class="text-center"> এই সার্ভিসে আপনি ভুল NID দিলেও টাকা কেটে নেওয়া হবে তাই খুব সতর্ক হয়ে NID নাম্বার দিন  </h5>
            <h4 class="tx-gray-800 mg-b-5">Your Balance: <span class="bal_value"></span></h4>
            <p class="mg-b-0"></p>
        </div>
        <!--  br-pagebody --> 

        <div class="br-pagebody mg-t-5 pd-x-30">
            <div class="d-flex justify-content-center verify_box_set" style="margin-top: 40px; margin-bottom: 30px">
             
            </div>


            <div>
                <center class="nid_get_data"></center>
            </div>



        </div><!-- br-pagebody -->

    </div><!-- br-mainpanel -->
    <!-- ########## END: MAIN PANEL ########## -->















    <script type="text/javascript">

        $(document).on('click', '.nid_data_search_btn', function () {
            get_nid_data();
        });

        let services_rate = '<?php echo $service_rate->serive_s_rate_s; ?>';
        balance_query();

        let now_balance;


        function balance_query() {
            let total_added_money;
            let total_cut_money;
            $.ajax({
                type: "get",
                url: "admin/balance_query",
                data: "",
                dataType: "json",
                success: function (bal) {

                    if (bal.payment_added) {
                        total_added_money = bal.payment_added;
                    }else {
                        total_added_money = 0;
                    }

                    if (bal.payment_cut) {
                        total_cut_money = bal.payment_cut;
                    }else {
                        total_cut_money = 0;
                    }
                    now_balance = parseInt(total_added_money) - parseInt(total_cut_money);

                    $('.bal_value').html(now_balance);
                    

                    if (now_balance >= services_rate) {
                        $('.verify_box_set').html(`
                        <div class="input-group wd-xs-300">
                            <input type="text" maxlength="10" onkeypress='return event.charCode >= 48 && event.charCode <= 57' size="10" class="form-control nid_number_type" placeholder=" NID Number ">
                            <div class="input-group-btn">
                                <button class="btn btn-info nid_data_search_btn" style="cursor:pointer"><i class="fa fa-search"></i></button>
                            </div>
                        </div>  
                        `);
                    }else {
                        $('.verify_box_set').html('আপনার একাউন্টে টাকা বেশি নেই দয়া করে আগে রিচার্গ করুন .... ');
                    }
                }
            });
        }


        function insert_porichoy_verify_request() {
            if ($('.nid_number_type').val() == '') {
                alert('Please give nid number');
            }else {
                $.ajax({
                    type: "post",
                    url: "admin/insert_porichoy_verify_data",
                    data: {
                        nid_number_type:  $('.nid_number_type').val(),
                        services_rate: services_rate,
                    },
                    success: function () {
                        balance_query();
                    }
                });
            }                
        }


        function get_nid_data() {
            let get_nid_no_typing = $('.nid_number_type').val();
            if (get_nid_no_typing == '' || get_nid_no_typing.length != 10) {
                alert('Please give nid number and NID must be 10 digits');
            }else {
                            
                $.ajax({
                    type: "post",
                    url: "admin/nid_verify_data",
                    data: {
                        nid_number_type:  $('.nid_number_type').val()
                    },
                    success: function (get_data) {
                    
                        let full_data = JSON.parse(get_data);

                        insert_porichoy_verify_request();

                        $('.nid_get_data').html(`
                        <div style="width: 150px; margin-bottom: 30px;">
                            <img src="data:image/png;base64,${full_data.voter.photo}" class="card-img-top" alt="image" style="">
                        </div>
                        <div style="width: 50%;">
                            <table class="table">
                                <!-- class="thead-info" -->
                                <tr>
                                    <th class="wd-25p"
                                        style="border: 1px solid; background-color: #17A2B8; color: white; text-align: right;">
                                        Name</th>
                                    <td style="color: black; padding-left: 30px;">${full_data.voter.name}</td>
                                </tr>

                                <tr>
                                    <th class="wd-25p"
                                        style="border: 1px solid; background-color: #17A2B8; color: white; text-align: right;">
                                        Father's Name</th>
                                    <td style="color: black; padding-left: 30px;">${full_data.voter.father}</td>
                                </tr>

                                <tr>
                                    <th class="wd-25p"
                                        style="border: 1px solid; background-color: #17A2B8; color: white; text-align: right;">
                                        Mother's Name</th>
                                    <td style="color: black; padding-left: 30px;">${full_data.voter.mother}</td>
                                </tr>
                            </table>
                        </div><br>
                                    
                        <form action="download/card_file" method="post" target="_blank">
                            <input type="hidden" value="${get_nid_no_typing}" name="nid_typing_data">
                            <textarea name="data_arr" id="" style="display:none" cols="30" rows="10">${get_data}</textarea>
                            <input type="submit" style="cursor:pointer;" class="btn btn-info mx-auto btn-lg click_download_btn" value="Download">
                        </form>    
                        `); 
                    }
                });
            }

        }


        $(document).on('click', '.click_download_btn', function () {
            setTimeout(function() {
                $('.nid_get_data').html(``);
            }, 1500);
        });



/* 
        $(document).on('click', '.click_download_btn', function () {
            pass_data_to_controller_for_download(full_data.voter);
        });

        function pass_data_to_controller_for_download(param_s) {
            $.ajax({
                type: "post",
                url: "download/porichoy_verify", 
                data: {
                    data_arr: param_s
                },
                success: function (response) {
                    
                }
            });
        }
 */
    
    </script>



