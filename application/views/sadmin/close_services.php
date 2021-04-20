    <!-- ########## START: MAIN PANEL ########## -->
    <div class="br-mainpanel">
        <div class="br-pageheader pd-y-15 pd-l-20">
            <nav class="breadcrumb pd-0 mg-0 tx-12">
                <a class="breadcrumb-item" href="admin"> Dashboard </a>
                <span class="breadcrumb-item active"> Service Close </span>
            </nav>
        </div><!-- br-pageheader -->


        <!--  br-pagebody --> 

        <div class="br-pagebody mg-t-5 pd-x-30">
            <div class="br-section-wrapper">
                <div class="row row-sm mt-3 services_activity_include_here"></div>
            </div>
        </div>        
    </div><!-- br-mainpanel -->

    <!-- ########## END: MAIN PANEL ########## -->




    <script>
        
        get_services_activity();

        $(document).on('click', '.home_page_services_activity', function () {
            let confirmation = confirm("Want to change?");
            if (confirmation) {
                home_page_activity();
            }
        });

        $(document).on('click', '.secret_services_activity', function () {
            let confirmation = confirm("Want to change?");
            if (confirmation) {
                secret_services_activity();
            }
        });

        $(document).on('click', '.ec_office_service_activity', function () {
            let confirmation = confirm("Want to change?");
            if (confirmation) {
                ec_office_service_activity();
            }
        });

        $(document).on('click', '.ec_office_service_on_off', function () {
            let confirmation = confirm("Want to change?");
            if (confirmation) {
                ec_office_service_on_off_fun();
            }
        });

        function get_services_activity() {
            $.ajax({
                type: "get",
                url: "sadmin/get_services_activity",
                dataType: "json",
                success: function (resp) {

                    let home_page_activity = resp.setting_info.home_page_ISactive;
                    let screte_service_activity = resp.setting_info.all_services_ISactive;
                    let ec_services_activity = resp.setting_info.ec_services_is_active;
                    let ec_services_is_on_off = resp.setting_info.ec_services_is_on_off;

                    let home_bg;
                    let home_icon;
                    let home_activity;

                    let services_bg;
                    let services_icon;
                    let services_activity;

                    let ec_running_services_bg;
                    let ec_running_services_icon;
                    let ec_running_services_activity;

                    if (home_page_activity == 1) {
                        home_bg = 'teal';
                        home_icon = 'check';
                        home_activity = 'Active';
                    }else {
                        home_bg = 'danger';
                        home_icon = 'close';
                        home_activity = 'Inctive';
                    }

                    if (screte_service_activity == 1) {
                        services_bg = 'teal';
                        services_icon = 'check';
                        services_activity = 'Active';
                    }else {
                        services_bg = 'danger';
                        services_icon = 'close';
                        services_activity = 'Inactive';
                    }

                    if (ec_services_activity == 1) {
                        ec_services_bg = 'teal';
                        ec_services_icon = 'check';
                        ec_services_activity = 'Active';
                    }else {
                        ec_services_bg = 'danger';
                        ec_services_icon = 'close';
                        ec_services_activity = 'Inactive';
                    }

                    if (ec_services_is_on_off == 1) {
                        ec_running_services_bg = 'teal';
                        ec_running_services_icon = 'check';
                        ec_running_services_activity = 'ON';
                    }else {
                        ec_running_services_bg = 'danger';
                        ec_running_services_icon = 'close';
                        ec_running_services_activity = 'OFF';
                    }

                    $('.services_activity_include_here').html(`
                        <div class="col-sm-6 col-xl-4 mt-3  home_page_services_activity" style="cursor:pointer; ">
                            <div class="bg-${home_bg} rounded overflow-hidden">
                                <div class="pd-25 d-flex align-items-center">
                                    <i class="fa fa-${home_icon} tx-60 lh-0 tx-white op-7"></i> 
                                    <div class="mg-l-20">
                                        <p class="tx-10 tx-spacing-1 tx-mont tx-medium tx-uppercase tx-white-8 mg-b-10"> </p>
                                        <p class="tx-24 tx-white tx-lato tx-bold mg-b-2 lh-1"> Home Page </p>
                                        <span class="tx-18 tx-roboto tx-white-6"> Now ${home_activity} </span>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="col-sm-6 col-xl-4 mt-3  secret_services_activity" style="cursor:pointer; ">
                            <div class="bg-${services_bg} rounded overflow-hidden">
                                <div class="pd-25 d-flex align-items-center">
                                    <i class="fa fa-${services_icon} tx-60 lh-0 tx-white op-7"></i> 
                                    <div class="mg-l-20">
                                        <p class="tx-10 tx-spacing-1 tx-mont tx-medium tx-uppercase tx-white-8 mg-b-10"> </p>
                                        <p class="tx-24 tx-white tx-lato tx-bold mg-b-2 lh-1"> Secret Services </p>
                                        <span class="tx-18 tx-roboto tx-white-6 "> Now ${services_activity} </span>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="col-sm-6 col-xl-4 mt-3  ec_office_service_activity" style="cursor:pointer; ">
                            <div class="bg-${ec_services_bg} rounded overflow-hidden">
                                <div class="pd-25 d-flex align-items-center">
                                    <i class="fa fa-${ec_services_icon} tx-60 lh-0 tx-white op-7"></i> 
                                    <div class="mg-l-20">
                                        <p class="tx-10 tx-spacing-1 tx-mont tx-medium tx-uppercase tx-white-8 mg-b-10"> </p>
                                        <p class="tx-24 tx-white tx-lato tx-bold mg-b-2 lh-1"> EC Service </p>
                                        <span class="tx-18 tx-roboto tx-white-6 "> Now ${ec_services_activity} </span>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="col-sm-6 col-xl-4 mt-3  ec_office_service_on_off" style="cursor:pointer; ">
                            <div class="bg-${ec_running_services_bg} rounded overflow-hidden">
                                <div class="pd-25 d-flex align-items-center">
                                    <i class="fa fa-${ec_running_services_icon} tx-60 lh-0 tx-white op-7"></i> 
                                    <div class="mg-l-20">
                                        <p class="tx-10 tx-spacing-1 tx-mont tx-medium tx-uppercase tx-white-8 mg-b-10"> </p>
                                        <p class="tx-24 tx-white tx-lato tx-bold mg-b-2 lh-1"> EC Service ${ec_running_services_activity} </p>
                                        <span class="tx-18 tx-roboto tx-white-6 "> Now ${ec_running_services_activity} </span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    `);
                }
            });
        }

        function home_page_activity() {
            $.ajax({
                type: "post",
                url: "sadmin/update_home_page_activity",
                data: "",
                success: function () {
                    get_services_activity();
                    toastr.success('Home Page Activity Change Successfully', 'Success');
                }
            });
        }

        function secret_services_activity() {
            $.ajax({
                type: "post",
                url: "sadmin/update_secret_service_activity",
                data: "",
                success: function () {
                    get_services_activity();
                    toastr.success('Secret Services Activity Change Successfully', 'Success');
                }
            });
        }
        
        function ec_office_service_activity() {
            $.ajax({
                type: "post",
                url: "sadmin/update_ec_office_service_activity",
                data: "",
                success: function () {
                    get_services_activity();
                    toastr.success('EC Office Services Activity Change Successfully', 'Success');
                }
            });
        }

        function ec_office_service_on_off_fun() {
            $.ajax({
                type: "post",
                url: "sadmin/update_ec_service_on_off",
                data: "",
                success: function () {
                    get_services_activity();
                    toastr.success('EC Services ON OFF Change Successfully', 'Success');
                }
            });
        }

    </script>