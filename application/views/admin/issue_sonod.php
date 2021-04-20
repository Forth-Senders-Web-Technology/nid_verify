
<!-- ########## START: MAIN PANEL ########## -->
<div class="br-mainpanel">
        <div class="br-pageheader pd-y-15 pd-l-20">
            <div class="mx-auto ">
               <h3> এই সার্ভিসের জন্য আপনার একাউন্ট থেকে কোন টাকা কেটে নেওয়া হবে না। </h3> 
               
            </div>
        </div><!-- br-pageheader -->
            

        <div class="br-pagebody mg-t-5 pd-x-30">
        <br><br>
                <div class="d-flex justify-content-center verify_box_set" style="margin-top: 40px; margin-bottom: 30px">
                    <div class="form-row">
                        <div class="form-group col-md-12">
                            <select name="div_auto_iid" required="required" id="" class="form-control sonod_selection_opt">
                                <option value=""> Select Sonod Type </option>
                                <?php foreach ($all_sonod as $sonod) { ?>
                                    <option value="<?php echo $sonod->cer_def_p_iidi; ?>"> <?php echo $sonod->cer_title; ?> </option>
                                <?php } ?>
                            </select>
                        </div>
                    </div>
                </div>
        <br><br>
        <br><br>
            <div class="certificate_decription_assign" ></div>
        </div><!-- br-pagebody -->

    </div><!-- br-mainpanel -->
    <!-- ########## END: MAIN PANEL ########## -->








<script>

$(document).on('change', '.sonod_selection_opt', function () {
    let this_sonod_idd = $(this).val();
    get_this_sonod_full(this_sonod_idd);
});

function get_this_sonod_full(this_sonod_idd) {
    $.ajax({
        type: "post",
        url: "admin/get_this_sonod",
        data: {
            this_sonod_idd: this_sonod_idd
        },
        dataType: "json",
        success: function (res) {
            $('.certificate_decription_assign').html(`<div class="assign_full_certificate_description" id="summernote">${res.this_sonod_info.cer_deft_desc}</div>
            <br>
            <button class="btn btn-teal active btn-block mg-b-10">Entry Sonod</button>`);

            $('#summernote').summernote({
                height: 400
            });
            
        }
    });
}



</script>