
  <body>

<div class="d-flex align-items-center justify-content-center bg-br-primary ht-100v">

  <div class="login-wrapper wd-300 wd-xs-350 pd-25 pd-xs-40 bg-white rounded shadow-base">
    <div class="signin-logo tx-center tx-28 tx-bold tx-inverse"> <?php echo $setting_info->name_s; ?> </div>
    <div class="tx-center mg-b-60"> </div>

    <form action="reset_password" method="post" enctype="multipart/form-data" autocomplete="off" data-parsley-validate>
        <div class="form-group">
            <input type="email" class="form-control" required name="entry_email" placeholder="Enter your email">
        </div><!-- form-group -->
        <button type="submit" class="btn btn-info btn-block"> Reset Password </button>
    </form>

  </div><!-- login-wrapper -->
</div><!-- d-flex -->