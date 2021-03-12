    <!-- ########## START: MAIN PANEL ########## -->
    <div class="br-mainpanel">
        <div class="br-pageheader pd-y-15 pd-l-20">
            <nav class="breadcrumb pd-0 mg-0 tx-12">
                <a class="breadcrumb-item" href="admin"> Dashboard </a>
                <span class="breadcrumb-item active">Get NID No</span>
            </nav>
        </div><!-- br-pageheader -->
            
        <div class="pd-x-20 pd-sm-x-30 pd-t-20 pd-sm-t-30">
            <h4 class="tx-gray-800 mg-b-5">Your Balance: <span class="bal_value"></span></h4>
            <p class="mg-b-0"></p>
        </div>
        
        <!--  br-pagebody --> 
        <div class="br-pagebody">
            <div class="br-section-wrapper">

            

                <div class="table-wrapper">
                    <table id="datatable2" class="table display responsive nowrap">
                        <thead>
                            <tr>
                                <th class="wd-15p">SL</th>
                                <th class="wd-15p">Slip No</th>
                                <th class="wd-20p">Viter No</th>
                                <th class="wd-15p">Name</th>
                                <th class="wd-10p">Birth Date</th>
                                <th class="wd-25p">NID No</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                            </tr>
                        </tbody>
                    </table>
                </div><!-- table-wrapper -->

            </div>
        </div>
        
    </div><!-- br-mainpanel -->
    <!-- ########## END: MAIN PANEL ########## -->



    <script>
        let now_balance;
        balance_query();

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

                }
            });
        }

        function get_full_data_table() {
            $.ajax({
                type: "get",
                url: "admin/getNID_request_by_user",
                data: "",
                dataType: "json",
                success: function (table_data) {
                    
                }
            });
        }
    </script>