
<!-- ########## START: MAIN PANEL ########## -->
<div class="br-mainpanel">
        <div class="br-pageheader pd-y-15 pd-l-20">
            <div class="mx-auto ">
               <h3> এই সার্ভিসের জন্য আপনার একাউন্ট থেকে কোন টাকা কেটে নেওয়া হবে না। </h3> 
               
            </div>
        </div><!-- br-pageheader -->
            

            <!--   
// $link = window.open('print_certificate?get_id=$last_insert_id','_blank', 'width=700,height=700,left=260,top=270');window.location.href = 'add_view';;
        // echo $link;  -->


        <div class="br-pagebody mg-t-5 pd-x-30">
        <br><br>
                <div class="d-flex justify-content-center verify_box_set" style="margin-top: 40px; margin-bottom: 30px">
                    <div class="form-row">
                        <div class="form-group col-md-12">
                            <select name="div_auto_iid" required="required" id="" name="sonod_selection_opt" class="form-control sonod_selection_opt">
                                <option value=""> Select Sonod Type </option>
                                <?php foreach ($all_sonod as $sonod) { ?>
                                    <option value="<?php echo $sonod->cer_def_p_iidi; ?>" selected_sonod_id_title="<?php echo $sonod->cer_title; ?>"> <?php echo $sonod->cer_title; ?> </option>
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

    $(document).on('click', '.clickable_entry_button', function () {
        entry_new_certificate();
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
                $('.certificate_decription_assign').html(`<div class="assign_full_certificate_description" id="summernote" name="assign_full_certificate_description">${res.this_sonod_info.cer_deft_desc}</div>
                <br>
                <button class="btn btn-teal active btn-block mg-b-10 clickable_entry_button">Entry Sonod</button>`);

                $('#summernote').summernote({
                    height: 400
                });
                
            }
        });
    }

    function entry_new_certificate() {
        let sonod_title = $('.sonod_selection_opt option:selected').text();
        let full_certificate_description = $('.assign_full_certificate_description').html();

        $.ajax({
            type: "post",
            url: "admin/entry_new_certificate",
            data: {
                sonod_title: sonod_title,
                full_certificate_description: full_certificate_description
            },
            dataType: "json",
            success: function (this_new_id) {
                window.open('download/print_certificate?get_id='+this_new_id,'_blank');
            }
        });
    }



</script>