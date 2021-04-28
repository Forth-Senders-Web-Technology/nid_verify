
  <body>

    <!-- ########## START: LEFT PANEL ########## -->
    <div class="br-logo"><a href=""> <?php echo $setting_info->name_s; ?> </a></div>
    <div class="br-sideleft overflow-y-auto">
      <label class="sidebar-label pd-x-15 mg-t-20"> Sidebar Menu </label>

      <div class="br-sideleft-menu " id="sidebar-menu">
        <a href="admin" class="br-menu-link">
          <div class="br-menu-item">
            <i class="fa fa-home"></i>
            <span class="menu-item-label">Dashboard</span>
          </div>
        </a>
      </div> 
    

    <?php if ($this->ion_auth->in_group(array('admin', 's_admin'))) { ?>
      <div class="br-sideleft-menu " id="sidebar-menu">
        <a href="services_close" class="br-menu-link">
          <div class="br-menu-item">
              <i class="fa fa-window-close"></i>
            <span class="menu-item-label"> Close Services </span>
          </div>
        </a>
      </div>

      <div class="br-sideleft-menu " id="sidebar-menu">
        <a href="user_manage" class="br-menu-link">
          <div class="br-menu-item">
            <i class="fa fa-users"></i>
            <span class="menu-item-label"> User Management </span>
          </div>
        </a>
      </div>

      <div class="br-sideleft-menu " id="sidebar-menu">
        <a href="user_approve" class="br-menu-link">
          <div class="br-menu-item">
            <i class="fa fa-users"></i>
            <span class="menu-item-label"> User Approve </span>
          </div>
        </a>
      </div>
    <?php } ?>


    <?php if ($this->ion_auth->in_group(array('s_admin'))) { ?>

      <div class="br-sideleft-menu " id="sidebar-menu">
        <a href="payment_check" class="br-menu-link">
          <div class="br-menu-item">
            <i class="fa fa-check-square"></i>
            <span class="menu-item-label"> Payment Confirm </span>
          </div>
        </a>
      </div>

      <div class="br-sideleft-menu " id="sidebar-menu">
        <a href="withdraw_check" class="br-menu-link">
          <div class="br-menu-item">
            <i class="fa fa-contao"></i>
            <span class="menu-item-label"> Withdraw Confirm </span>
          </div>
        </a>
      </div>

<!-- 
      <div class="br-sideleft-menu " id="sidebar-menu">
        <a href="" class="br-menu-link">
          <div class="br-menu-item">
            <i class="fa fa-user-circle"></i>
            <span class="menu-item-label"> Admin List </span>
          </div>
        </a>
      </div>
 -->

      <div class="br-sideleft-menu " id="sidebar-menu">
        <a href="group_services_rate" class="br-menu-link">
          <div class="br-menu-item">
            <i class="fa fa-user-circle"></i>
            <span class="menu-item-label"> Services Rate </span>
          </div>
        </a>
      </div>

      <div class="br-sideleft-menu " id="sidebar-menu">
        <a href="agent_view" class="br-menu-link">
          <div class="br-menu-item">
            <i class="fa fa-male"></i>
            <span class="menu-item-label"> Agent List </span>
          </div>
        </a>
      </div>

<!-- 
      <div class="br-sideleft-menu " id="sidebar-menu">
        <a href="" class="br-menu-link">
          <div class="br-menu-item">
            <i class="fa fa-envelope"></i>
            <span class="menu-item-label"> SMS Marketing </span>
          </div>
        </a>
      </div> 

      <div class="br-sideleft-menu " id="sidebar-menu">
        <a href="" class="br-menu-link">
          <div class="br-menu-item">
            <i class="fa fa-inbox"></i>
            <span class="menu-item-label"> Add Payment in Porichoy </span>
          </div>
        </a>
      </div>
-->

    <?php } ?>

    <?php if ($this->ion_auth->in_group(array('admin', 's_admin', 'agent', 's_udc', 'udc'))) { ?>

      <div class="br-sideleft-menu " id="sidebar-menu">
        <a href="admin/issue_new_sonod_view" class="br-menu-link">
          <div class="br-menu-item">
            <i class="fa fa-file"></i>
            <span class="menu-item-label"> নতুন সনদ ইস্যু </span>
          </div>
        </a>
      </div>

      <div class="br-sideleft-menu " id="sidebar-menu">
        <a href="admin/get_the_issued_certificate" class="br-menu-link">
          <div class="br-menu-item">
            <i class="fa fa-book"></i>
            <span class="menu-item-label"> ইস্যুকৃত পুরাতন সনদ </span>
          </div>
        </a>
      </div>
    
      <div class="br-sideleft-menu " id="sidebar-menu">
        <a href="" class="br-menu-link">
          <div class="br-menu-item">
            <i class="fa fa-file"></i>
            <span class="menu-item-label"> সনদ সেট করুন </span>
          </div>
        </a>
      </div>

      <div class="br-sideleft-menu " id="sidebar-menu">
        <a href="payment" class="br-menu-link">
          <div class="br-menu-item">
            <i class="fa fa-btc"></i>
            <span class="menu-item-label"> টাকা রিচার্জ </span>
          </div>
        </a>
      </div>
      <?php } ?>


      <?php if ($this->ion_auth->in_group(array('admin', 's_admin', 'services'))) { ?>
        <div class="br-sideleft-menu " id="sidebar-menu">
        <a href="all_services" class="br-menu-link">
          <div class="br-menu-item">
            <i class="fa fa-address-book"></i>
            <span class="menu-item-label"> All Request </span>
          </div> 
        </a> 
      </div>

      <div class="br-sideleft-menu " id="sidebar-menu">
        <a href="my_provide" class="br-menu-link">
          <div class="br-menu-item">
            <i class="fa fa-shopping-basket"></i>
            <span class="menu-item-label"> My Basket </span>
          </div> 
        </a> 
      </div>
      <?php } ?>

      <?php if ($this->ion_auth->in_group(array('admin', 's_admin', 'agent'))) { ?>

        <div class="br-sideleft-menu " id="sidebar-menu">
          <a href="birth_verify" class="br-menu-link">
            <div class="br-menu-item">
              <i class="fa fa-credit-card"></i>
              <span class="menu-item-label"> জন্ম নিবন্ধন ভেরিফাই </span>
            </div>
          </a>
        </div>
        
        <div class="br-sideleft-menu " id="sidebar-menu">
          <a href="statement" class="br-menu-link">
            <div class="br-menu-item">
              <i class="fa fa-align-justify"></i>
              <span class="menu-item-label"> সকল সেবার রিপোর্ট </span>
            </div>
          </a>
        </div>
      <?php } ?>



      <?php if ($this->ion_auth->in_group(array('admin', 's_admin', 'agent', 's_udc'))) { ?>
        <div class="br-sideleft-menu " id="sidebar-menu">
          <a href="nid_verify" class="br-menu-link">
            <div class="br-menu-item">
              <i class="fa fa-id-card"></i>
              <span class="menu-item-label"> NID Verify </span>
            </div>
          </a>
        </div>
      <?php } ?>

      <?php if ($this->ion_auth->in_group(array('admin', 's_admin', 'agent'))) { ?>

        <?php if ($setting_info->all_services_ISactive == 1) { ?>
          <?php if ($setting_info->ec_services_is_active == 1) { ?> 

            <div class="br-sideleft-menu " id="sidebar-menu">
              <a href="get_nid_no" class="br-menu-link">
                <div class="br-menu-item">
                  <i class="fa fa-list-ol"></i>
                  <span class="menu-item-label"> NID নং দরকার </span>
                </div>
              </a>
            </div>

            <div class="br-sideleft-menu " id="sidebar-menu">
              <a href="serve_view" class="br-menu-link">
                <div class="br-menu-item">
                  <i class="fa fa-address-book"></i>
                  <span class="menu-item-label"> অনলাইন কপি দরকার </span>
                </div>
              </a>
            </div>

            <div class="br-sideleft-menu " id="sidebar-menu">
              <a href="search_copy" class="br-menu-link">
                <div class="br-menu-item">
                  <i class="fa fa-search"></i>
                  <span class="menu-item-label"> NID খোজা </span>
                </div>
              </a>
            </div>

						<div class="br-sideleft-menu " id="sidebar-menu">
							<a href="card_view_s" class="br-menu-link">
								<div class="br-menu-item">
									<i class="fa fa-address-card"></i>
									<span class="menu-item-label"> ২ মিনিটে কার্ড ডাউনলোড </span>
								</div>
							</a>
						</div>

						<div class="br-sideleft-menu " id="sidebar-menu">
							<a href="card_request_view" class="br-menu-link">
								<div class="br-menu-item">
									<i class="fa fa-address-card"></i>
									<span class="menu-item-label"> কার্ড রিইস্যুর দরকার </span>
								</div>
							</a>
						</div>

          <?php } ?>

          <div class="br-sideleft-menu " id="sidebar-menu">
            <a href="username_password" class="br-menu-link">
              <div class="br-menu-item">
                <i class="fa fa-user-secret"></i>
                <span class="menu-item-label"> ফেইচ ভেরিফাই ছাড়া আইডি পাসওয়ার্ড </span>
              </div>
            </a>
          </div>

          <div class="br-sideleft-menu " id="sidebar-menu">
            <a href="create_card" class="br-menu-link">
              <div class="br-menu-item">
                <i class="fa fa-id-card"></i>
                <span class="menu-item-label"> কার্ড তৈরী করুন </span>
              </div> 
            </a> 
          </div>
        <?php } ?>
      <?php } ?>
      
      <div class="br-sideleft-menu " id="sidebar-menu">
        <a href="withdraw_view" class="br-menu-link">
          <div class="br-menu-item">
            <i class="fa fa-dollar"></i>
            <span class="menu-item-label"> টাকা তুলে ফেলুন </span>
          </div>
        </a>
      </div>

      <br>
    </div><!-- br-sideleft -->
    <!-- ########## END: LEFT PANEL ########## -->



    <!-- ########## START: HEAD PANEL ########## -->
    <div class="br-header">
      <div class="br-header-left">
        <div class="navicon-left hidden-md-down"><a id="btnLeftMenu" href=""><i class="icon ion-navicon-round"></i></a></div>
        <div class="navicon-left hidden-lg-up"><a id="btnLeftMenuMobile" href=""><i class="icon ion-navicon-round"></i></a></div>
        <div class="input-group hidden-xs-down wd-170 transition">
          
        </div><!-- input-group -->
      </div><!-- br-header-left -->
      <div class="br-header-right">
        <nav class="nav"> 
          
          <div class="dropdown">
            <a href="" class="nav-link nav-link-profile" data-toggle="dropdown">
              <span class="logged-name hidden-md-down"><?php echo $user_info->user_person_name; ?></span>
              <img src="inc/img/user_icon.png" class="wd-32 rounded-circle" alt="">
              <span class="square-10 bg-success"></span>
            </a>
            <div class="dropdown-menu dropdown-menu-header wd-200">
              <ul class="list-unstyled user-profile-nav">
                <li> <br>
                  <center>
                    <b> 
                      <?php
                        if (!empty($user_info->un_bn_name)) {
                          echo $user_info->un_bn_name. '  ইউনিয়ন পরিষদ';
                        }else {
                          echo 'Company User';
                        } 
                      ?>  
                    </b>
                  </center> 
                </li>
                <li><a href="edit_profile"><i class="icon ion-ios-person"></i> Edit Profile </a></li>
                <li><a href="logout"><i class="icon ion-power"></i> লগ আউট </a></li>
              </ul>
            </div><!-- dropdown-menu -->
          </div><!-- dropdown -->
        </nav>

        <div class="navicon-right"> </div><!-- navicon-right -->
      </div><!-- br-header-right -->
    </div><!-- br-header -->
    <!-- ########## END: HEAD PANEL ########## -->

    
