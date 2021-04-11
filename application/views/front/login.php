
  <body>

    <div class="d-flex align-items-center justify-content-center bg-br-primary ht-100v">

      <div class="login-wrapper wd-300 wd-xs-350 pd-25 pd-xs-40 bg-white rounded shadow-base">
        <div class="signin-logo tx-center tx-28 tx-bold tx-inverse"> <?php echo $setting_info->name_s; ?> </div>
        <div class="tx-center mg-b-60"> </div>

        <form action="login_check" method="post" enctype="multipart/form-data" autocomplete="off" data-parsley-validate>
            <div class="form-group">
            <input type="text" class="form-control" required name="identity" placeholder="Enter your username">
            </div><!-- form-group -->
            <div class="form-group">
            <input type="password" class="form-control" required name="password" placeholder="Enter your password">
            <a href="forget_password_view" class="tx-info tx-12 d-block mg-t-10">Forgot password?</a>
            </div><!-- form-group -->
            <button type="submit" class="btn btn-info btn-block">Sign In</button>
        </form>



        <!-- <div class="mg-t-60 tx-center">Not yet a member? <a href="reg_form" class="tx-info">Sign Up</a></div> -->
      </div><!-- login-wrapper -->
    </div><!-- d-flex -->