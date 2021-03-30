
    <!-- ########## START: MAIN PANEL ########## -->
    <div class="br-mainpanel">
      <div class="pd-30">
        <h4 class="tx-gray-800 mg-b-5">Dashboard</h4>
      </div><!-- d-flex -->

      <div class="br-pagebody mg-t-5 pd-x-30">
        <div class="row row-sm">

          <div class="col-sm-6 col-xl-3">
            <div class="bg-teal rounded overflow-hidden">
              <div class="pd-25 d-flex align-items-center">
                <i class="fa fa-tumblr tx-60 lh-0 tx-white op-7"></i> 
                <div class="mg-l-20">
                  <p class="tx-10 tx-spacing-1 tx-mont tx-medium tx-uppercase tx-white-8 mg-b-10">Your Account Balance</p>
                  <p class="tx-24 tx-white tx-lato tx-bold mg-b-2 lh-1"><?php echo $payment_added - $payment_cut; ?> /- </p>
                  <span class="tx-11 tx-roboto tx-white-6"> Balance </span>
                </div>
              </div>
            </div>
          </div> 

          <div class="col-sm-6 col-xl-3 mg-t-20 mg-sm-t-0">
            <div class="bg-danger rounded overflow-hidden">
              <div class="pd-25 d-flex align-items-center">
                <i class="fa fa-id-card tx-60 lh-0 tx-white op-7"></i>
                <div class="mg-l-20">
                  <p class="tx-10 tx-spacing-1 tx-mont tx-medium tx-uppercase tx-white-8 mg-b-10"> Today your services </p>
                  <p class="tx-24 tx-white tx-lato tx-bold mg-b-2 lh-1"><?php echo count($services_info); ?></p>
                  <span class="tx-11 tx-roboto tx-white-6">  </span>
                </div>
              </div>
            </div>
          </div> 




        <?php if ($this->ion_auth->in_group(array('admin', 's_admin'))) { ?>
          <div class="col-sm-6 col-xl-3 mg-t-20 mg-xl-t-0">
            <div class="bg-primary rounded overflow-hidden">
              <div class="pd-25 d-flex align-items-center">
                <i class="fa fa-address-card tx-60 lh-0 tx-white op-7"></i>
                <div class="mg-l-20">
                  <p class="tx-10 tx-spacing-1 tx-mont tx-medium tx-uppercase tx-white-8 mg-b-10">% Unique Visits</p>
                  <p class="tx-24 tx-white tx-lato tx-bold mg-b-2 lh-1">54.45%</p>
                  <span class="tx-11 tx-roboto tx-white-6">23% average duration</span>
                </div>
              </div>
            </div>
          </div> 

          <div class="col-sm-6 col-xl-3 mg-t-20 mg-xl-t-0">
            <div class="bg-br-primary rounded overflow-hidden">
              <div class="pd-25 d-flex align-items-center">
                <i class="ion ion-clock tx-60 lh-0 tx-white op-7"></i>
                <div class="mg-l-20">
                  <p class="tx-10 tx-spacing-1 tx-mont tx-medium tx-uppercase tx-white-8 mg-b-10">Bounce Rate</p>
                  <p class="tx-24 tx-white tx-lato tx-bold mg-b-2 lh-1">32.16%</p>
                  <span class="tx-11 tx-roboto tx-white-6">65.45% on average time</span>
                </div>
              </div>
            </div>
          </div>
          <?php } ?>
          
        </div>

        <div class="row row-sm mg-t-20">
          <div class="col-8">

            <div class="card pd-0 bd-0 shadow-base">
              <div class="pd-x-30 pd-t-30 pd-b-15">
                <div class="" style="font-size: 22px; color: black; ">
                   <!-- এই সাইটের ইনকাম থেকে 1% টাকা খরচ হবে গরীব, অসহায়, এতীমের জন্য।   -->
                </div>
              </div>
            </div><!-- card -->


          </div><!-- col-9 -->
          <div class="col-4">


            <div class="card bd-0 shadow-base pd-30">

                <div class="">                  
                  <h2 id="brTime" class="tx-black "></h2>
                  <h6 id="brDate" class="tx-black "></h6>
                </div>


              
            </div>


          </div>
        </div>

      </div>