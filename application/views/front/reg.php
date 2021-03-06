
  <body>

<div class="d-flex align-items-center justify-content-center bg-br-primary ht-100v">

  <div class="login-wrapper wd-300 wd-xs-600 pd-25 pd-xs-40 bg-white rounded shadow-base">

    <div class="signin-logo tx-center tx-28 tx-bold tx-inverse"> <?php echo $setting_info->name_s; ?> </div>
    <div class="tx-center mg-b-40"> Registered this for take Quick Services </div>




    <div class="form-group">
      <label class="d-block tx-11 tx-uppercase tx-medium tx-spacing-1"> Select Location </label>
      <div class="row row-xs">

        <div class="col-sm-3">
          <select class="form-control select2 div_list" require data-placeholder="Division">
            <option value="" > Select Division </option>
            <?php foreach ($div_info as $div) { ?>
                <option value="<?php echo $div->div_id;  ?>" > <?php echo $div->div_name;  ?> </option>
            <?php } ?>
          </select>
        </div><!-- col-3 -->

        <div class="col-sm-3 mg-t-20 mg-sm-t-0">
          <select class="form-control select2 dis_list" require data-placeholder="District"> </select>
        </div><!-- col-3 -->

        <div class="col-sm-3 mg-t-20 mg-sm-t-0">
          <select class="form-control select2 up_list" require data-placeholder="Upazilla"> </select>
        </div><!-- col-3 -->

        <div class="col-sm-3 mg-t-20 mg-sm-t-0">
          <select class="form-control select2 un_list" require data-placeholder="Union"> </select>
        </div><!-- col-3 -->

      </div><!-- row -->
    </div><!-- form-group -->

    <div class="form-group">
      <input type="text" onkeypress='return event.charCode >= 48 && event.charCode <= 57' class="form-control" placeholder="Enter your username">
    </div><!-- form-group -->

    
<div class="form-layout form-layout-2">
<div class="row no-gutters mt-3">
            <div class="col-md-12">
                <div class="form-group bd-t-0-force">
                  <label class="form-control-label">Mail address: <span class="tx-danger">*</span></label>
                  <input class="form-control" type="text" name="address" value="Market St., San Francisco" placeholder="Enter address">
                </div>
            </div>
            </div>
            </div>

            






    
    <div class="form-group">
      <input type="text" class="form-control" placeholder="Enter your username">
    </div><!-- form-group -->
    <div class="form-group">
      <input type="text" class="form-control" placeholder="Enter your username">
    </div><!-- form-group -->
    <div class="form-group">
      <input type="text" class="form-control" placeholder="Enter your username">
    </div><!-- form-group -->
    <div class="form-group">
      <input type="text" class="form-control" placeholder="Enter your username">
    </div><!-- form-group -->
    <div class="form-group">
      <input type="text" class="form-control" placeholder="Enter your username">
    </div><!-- form-group -->
    <div class="form-group">
      <input type="text" class="form-control" placeholder="Enter your username">
    </div><!-- form-group -->


    
    
    <div class="form-group tx-12">By clicking the Sign Up button below, you agreed to our privacy policy and terms of use of our website.</div>
    <button type="submit" class="btn btn-info btn-block">Sign Up</button>

    <div class="mg-t-40 tx-center">Not yet a member? <a href="" class="tx-info">Sign Up</a></div>
  </div><!-- login-wrapper -->
</div><!-- d-flex -->







<script>
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
                $('.dis_list').html(dist_data);
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
                $('.up_list').html(up_data);
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
                $('.un_list').html(un_data);
            }
        });
    });

    
</script>