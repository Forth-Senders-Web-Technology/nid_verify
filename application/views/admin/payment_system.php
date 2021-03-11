    <!-- ########## START: MAIN PANEL ########## -->
    <div class="br-mainpanel">
        <div class="br-pageheader pd-y-15 pd-l-20">
            <nav class="breadcrumb pd-0 mg-0 tx-12">
                <a class="breadcrumb-item" href="admin"> Dashboard </a>
                <span class="breadcrumb-item active"> Payment System </span>
            </nav>
        </div><!-- br-pageheader -->

        <!--  br-pagebody --> 


        <!--NID Number Search-->
        <div>
            <div style="margin-top: 20px;">
                <form class="d-flex justify-content-center">
                    <div class="form-group mx-sm-3 mb-2">
                        <label for="inputPassword2" class="sr-only">NID Number</label>
                        <input type="text" class="form-control" id="inputPassword2" placeholder="NID Number">
                    </div>
                    <button type="submit" class="btn btn-info mb-2">Find</button>
                </form>
            </div>

            <!--Select-->
            <div style="margin-right: 180px; margin-left: 180px; margin-bottom: 50px;">
                <div class="form-group">
                    <label class="d-block tx-11 tx-uppercase tx-medium tx-spacing-1">Location </label>
                    <div class="row row-xs">

                        <div class="col-sm-3">
                        <select class="form-control select2 div_list" name="div_list" required data-placeholder="Division">
                            <option value="" > Select Division </option>
                            <?php foreach ($div_info as $div) { ?>
                                <option value="<?php echo $div->div_id;  ?>" > <?php echo $div->div_name;  ?> </option>
                            <?php } ?>
                        </select>
                        </div><!-- col-3 -->

                        <div class="col-sm-3 mg-t-20 mg-sm-t-0">
                        <select class="form-control select2 dis_list" name="dis_list"  required data-placeholder="District"> </select>
                        </div><!-- col-3 -->

                        <div class="col-sm-3 mg-t-20 mg-sm-t-0">
                        <select class="form-control select2 up_list" name="up_list" required data-placeholder="Upazilla"> </select>
                        </div><!-- col-3 -->

                        <div class="col-sm-3 mg-t-20 mg-sm-t-0">
                        <select class="form-control select2 un_list" name="un_list" required data-placeholder="Union"> </select>
                        </div><!-- col-3 -->

                    </div><!-- row -->
                </div><!-- form-group -->
            </div>


            <!--Information Table-->
            <div>
                <center>
                    <div style="width: 50%;">
                                <table class="table">
                                    <!-- class="thead-info" -->
                                    <tr>
                                        <th
                                            style="border: 1px solid; background-color: #17A2B8; color: white; text-align: right;">
                                            Name</th>
                                        <td style="color: black; padding-left: 30px;">Md. Rahim Murol</td>
                                    </tr>

                                    <tr>
                                        <th
                                            style="border: 1px solid; background-color: #17A2B8; color: white; text-align: right;">
                                            Inistitute Name</th>
                                        <td style="color: black; padding-left: 30px;">BUP</td>
                                    </tr>

                                    <tr>
                                        <th
                                            style="border: 1px solid; background-color: #17A2B8; color: white; text-align: right;">
                                            Mobile Number</th>
                                        <td style="color: black; padding-left: 30px;">01731586972</td>
                                    </tr>

                                    <tr>
                                        <th
                                            style="border: 1px solid; background-color: #17A2B8; color: white; text-align: right;">
                                            Address</th>
                                        <td style="color: black; padding-left: 30px;">Uttara, Dhaka</td>
                                    </tr>

                                    <tr>
                                        <th
                                            style="border: 1px solid; background-color: #17A2B8; color: white; text-align: right;">
                                            E-mail</th>
                                        <td style="color: black; padding-left: 30px;">demo@demo.com</td>
                                    </tr>
                                </table>
                            </div>
                        </center>
                    </div>


                    <!--Money add and cut-->
                    <div class="d-flex justify-content-center" style="margin-top: 50px;">
                    <div style="margin-right: 30px;">
                    <form>
                    <center>
                    <button type="submit" class="btn btn-success mb-2" onclick="myFunction()">Money Add</button>

                        <div id="myDIV">
                            <div class="form-group mx-sm-0.2 mb-2">
                                <input style="text-align: center;" type="text" class="form-control" id="inputPassword2" placeholder="Enter Ammount">
                            </div>
                        </div>
                    </center>
                        <!--<script>
                        function myFunction()
                        {
                            var x = document.getElementById("myDIV");
                            if (x.style.display === "none")
                            {
                                x.style.display = "block";
                            }

                            else
                            {
                                x.style.display = "none";
                            }
                        }
                        </script>-->
                        </form>
                        </div>

                    <div style="margin-left: 30px;">
                    <form>
                    <center>
                    <button type="submit" class="btn btn-warning mb-2" onclick="myFunction()">Money Cut</button>

                        <div id="myDIV">
                            <div class="form-group mx-sm-0.2 mb-2">
                                <input style="text-align: center;" type="text" class="form-control" id="inputPassword2" placeholder="Enter Ammount">
                            </div>
                        </div>
                    </center>
                        <!--<script>
                        function myFunction()
                        {
                            var x = document.getElementById("myDIV");
                            if (x.style.display === "none")
                            {
                                x.style.display = "block";
                            }

                            else
                            {
                                x.style.display = "none";
                            }
                        }
                        </script>-->
                    
                    </form>
                    </div>
                </div>

                    <!--Button-->
                    <div style="margin-top: 30px;;">
                        <div>
                            <center>
                                <button type="submit" class="btn btn-info mb-2">Password Change</button>
                            </center>
                        </div>

                        <div>
                            <center>
                                <button type="submit" class="btn btn-danger mb-2">Deactived</button>
                            </center>
                        </div>
                    </div>

        </div><!-- br-pagebody -->

    </div><!-- br-mainpanel -->
    <!-- ########## END: MAIN PANEL ########## -->