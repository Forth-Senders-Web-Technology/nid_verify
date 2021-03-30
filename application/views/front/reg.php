
  <body>
  

<div class="d-flex align-items-center justify-content-center bg-br-primary " style="height: 1000px;">

  <div class="login-wrapper wd-300 wd-xs-600 pd-25 pd-xs-40 bg-white rounded shadow-base">

    <div class="signin-logo tx-center tx-28 tx-bold tx-inverse"> <?php echo $setting_info->name_s; ?> </div>
    <div class="tx-center mg-b-40"> Registered this for take Quick Services </div>


<form action="registration" method="post" enctype="multipart/form-data" autocomplete="off" data-parsley-validate>

    <div class="form-group">
      <label class="d-block tx-11 tx-uppercase tx-medium tx-spacing-1"> Select Location </label>
      <div class="row row-xs">

        <div class="col-sm-3">
          <select class="form-control   div_list" name="div_list" required data-placeholder="Division">
            <option value="" > Select Division </option>
            <?php foreach ($div_info as $div) { ?>
                <option value="<?php echo $div->div_id;  ?>" > <?php echo $div->div_name;  ?> </option>
            <?php } ?>
          </select>
        </div><!-- col-3 -->

        <div class="col-sm-3 mg-t-20 mg-sm-t-0">
          <select class="form-control  dis_list" name="dis_list"  required data-placeholder="District"> </select>
        </div><!-- col-3 -->

        <div class="col-sm-3 mg-t-20 mg-sm-t-0">
          <select class="form-control  up_list" name="up_list" required data-placeholder="Upazilla"> </select>
        </div><!-- col-3 -->

        <div class="col-sm-3 mg-t-20 mg-sm-t-0">
          <select class="form-control  un_list" name="un_list" required data-placeholder="Union"> </select>
        </div><!-- col-3 -->

      </div><!-- row -->
    </div><!-- form-group -->


    <div class="form-layout form-layout-2">
      <div class="row no-gutters mt-3">
          <div class="col-md-12">
              <div class="form-group bd-t-0-force">
                <label class="form-control-label">Your Full Name <span class="tx-danger">*</span></label>
                <input required class="form-control" type="text" name="person_name" value="" placeholder="Enter Your Full Name">
              </div>
          </div>
      </div>
    </div>

    
    <div class="form-layout form-layout-2">
      <div class="row no-gutters mt-3">
          <div class="col-md-12">
              <div class="form-group bd-t-0-force">
                <label class="form-control-label">Your Inistitute Name <span class="tx-danger">*</span></label>
                <input required class="form-control" type="text" name="inistitute" value="" placeholder="Enter Your Inistitute">
              </div>
          </div>
      </div>
    </div>

    <div class="form-layout form-layout-2">
      <div class="row no-gutters mt-3">
          <div class="col-md-12">
              <div class="form-group bd-t-0-force">
                <label class="form-control-label">Your Full Address <span class="tx-danger">*</span></label>
                <input required class="form-control" type="text" name="address" value="" placeholder="Enter Your Full Address">
              </div>
          </div>
      </div>
    </div>

    <div class="form-group">
      <input type="text" required class="form-control" onkeypress='return event.charCode >= 48 && event.charCode <= 57'  name="nid_no" placeholder="Enter your NID Number">
    </div><!-- form-group -->

    <div class="form-group">
      <input type="text" required class="form-control" onkeypress='return event.charCode >= 48 && event.charCode <= 57'  name="mobile_no" placeholder="Enter your mobile number">
    </div><!-- form-group -->

    <div class="form-group">
      <input type="email" required class="form-control" name="email_no" placeholder="Enter your Email">
    </div><!-- form-group -->

    <div class="form-group">
      <input type="text" required name="username" class="form-control user_name" placeholder="Enter your username">
    </div><!-- form-group -->

    <div class="form-group">
      <input type="password" required name="password" class="form-control pass_word" placeholder="Enter your Password">
    </div><!-- form-group -->



    <div class="from-group">
        
      <div class="form-control tx-12">
        <input type="checkbox" required name="terms_checkbox_1" id="">
              
          ১. এই ওয়েবসাইটের তথ্য এবং লিংককৃত ওয়েবসাইটের তথ্য ব্যবহার করার ফলে প্রত্যক্ষ্য বা অপ্রত্যক্ষভাবে কোন ক্ষতির সম্মুখীন হলে তার জন্য কোন দায়দায়িত্ব কর্তৃপক্ষ গ্রহণ করবে না । <br>
        <input type="checkbox" required name="terms_checkbox_2" id="">
          ২. এই ওয়েবসাইটের কর্মকাণ্ডের কোনো ধরনের অবিচ্ছিন্নতার জন্য বাংলাদেশ সরকার এবং সংশ্লিষ্ট কেউ নিশ্চয়তা প্রদান করবে না ।

      </div>
    </div>

    <button type="submit" class="btn btn-info tx-11 pd-y-12 tx-uppercase tx-spacing-2 btn-block" style="cursor:pointer">Sign Up</button>

</form>


    <div class="mg-t-40 tx-center"> Are you a member ? <a href="login" class="tx-info"> Login </a></div>
  </div><!-- login-wrapper -->
</div><!-- d-flex -->






<script type="text/javascript">

    $(document).on('change', '.div_list', function () {
        let div_id = $(this).val();
        $.ajax({
            type: "post",
            url: "home/getDistrict_byDivID",
            data: {
                div_id: div_id
            },
            dataType: "json",
            success: function (dist_info) {
                let dist_data = '';
                for (let n = 0; n < dist_info.length; n++) {
                    dist_data += '<option value="'+dist_info[n].dist_id+'" > '+dist_info[n].dist_name+' </option>';                    
                }
                $('.dis_list').html('<option value="" > Select District </option>'+dist_data);
            }
        });
    });



    $(document).on('change', '.dis_list', function () {
        let dist_id = $(this).val();
        $.ajax({
            type: "post",
            url: "home/getUpazilla_byDistID",
            data: {
                dist_id: dist_id
            },
            dataType: "json",
            success: function (up_info) {
                let up_data = '';
                for (let n = 0; n < up_info.length; n++) {
                    up_data += '<option value="'+up_info[n].up_id+'" > '+up_info[n].up_name+' </option>';                    
                }
                $('.up_list').html('<option value="" > Select Upazilla </option>'+up_data);
            }
        });
    });



    $(document).on('change', '.up_list', function () {
        let upid = $(this).val();
        $.ajax({
            type: "post",
            url: "home/getUnion_byUPID",
            data: {
                upid: upid
            },
            dataType: "json",
            success: function (un_info) {
                let un_data = '';
                for (let n = 0; n < un_info.length; n++) {
                    un_data += '<option value="'+un_info[n].un_id+'" > '+un_info[n].un_name+' </option>';                    
                }
                $('.un_list').html('<option value="" > Select Union </option>'+un_data);
            }
        });
    });

    
</script>