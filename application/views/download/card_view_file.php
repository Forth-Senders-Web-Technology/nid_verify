<!DOCTYPE html>
<html lang="en">

<head>
    <base href="<?php echo base_url(); ?>">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="inc/bar_code/font.css">
</head>

<body>
    <div class="" style=" width: 332px; margin: 0px 6.38px 0 20px; float: left;">
        <div class="" style="margin: 0; padding: 0; border: 1.5px solid black; width: 320px;  height: 205px;">
            <img src="inc/card_img/bd_logo_0.jpg" width="37px" height="35px" alt=""
                style="margin: 8px 0 0 5px; float: left;">
            <p
                style=" margin: 3px 0 0 0px; font-size: 17px; text-align: center; font-family: 'SolaimanLipi', sans-serif;">
                গণপ্রজাতন্ত্রী বাংলাদেশ সরকার
            </p>
            <p
                style="font-size: 11px; text-align: center;  margin: -19px 0 0 35px; font-family: Arial; color: #007700;">
                Government of the People's Republic of Bangladesh
            </p>
            <p
                style="font-size: 10px; text-align: center; margin: 2px 0 0 20px; font-family: Arial, Helvetica, sans-serif; color: #FF0000;">
                National ID Card
                <span style="color: #000000; font-family: 'SolaimanLipi', sans-serif;">
                    / জাতীয় পরিচয় পত্র
                </span>
            </p>
            <div style="border: 1px solid #000000 ; margin: 7px 0 0 0; padding: 0;"></div>
            <div class="" style=" width:72px; margin: 0; padding: 0; float: left; ">
                <img width="68px" height="77px" src="data:image/jpg;base64, <?php echo $voter_info->voter->photo; ?>" alt=""
                    style=" margin: 2px 2px 2px 2px; padding: 0;"><br>
                <img width="68px" height="13px" src="data:image/jpg;base64, <?php echo $sign->photo; ?>" alt=""
                    style="margin: 5px 2px 2px 2px; padding: 0;">
            </div>
            <div style=" width: 245px; float: left; margin: 2px 0 0 0; background:url('inc/card_img/back.jpg'); background-repeat: no-repeat; background-size: 680px 380px; background-position: 5px 0px;"
                class="">
                <div style="font-family: SolaimanLipi; font-size: 13px; float: left; margin: 2px 2px 0 10px">
                    নাম<span style="font-family: Arial;">:</span>
                </div>
                <div style="font-family: SolaimanLipi; font-size: 14px; margin: -18px 0 0 49px" class="name_bangla">
                    <b><?php echo $voter_info->voter->name; ?></b>
                </div>
                <div style="font-family: SolaimanLipi; font-size: 10px;float: left; margin: 7px 0 0 8px ;">
                    Name:
                </div>
                <div style="font-family: SolaimanLipi; font-size: 12px; float: left; margin: -16px 0 0 50px;">
                    <?php echo $voter_info->voter->nameEn; ?>
                </div>
                <div style="font-family: SolaimanLipi; font-size: 12px; float: left; margin: 6px 0 0 8px ;">
                    পিতা:
                </div>
                <div style="font-family: SolaimanLipi; font-size: 12px; float: left; margin: -16px 0 0 50px;">
                    <?php echo $voter_info->voter->father; ?>
                </div>
                <div style="font-family: SolaimanLipi; font-size: 12px; float: left;  margin: 6px 0 0 8px ;">
                    মাতা:
                </div>
                <div style="font-family: SolaimanLipi; font-size: 12px; float: left; margin:  -16px 0 0 49px;">
                    <?php echo $voter_info->voter->mother; ?>
                </div>
                <div style="margin-top: 0px;">
                    <div style="font-family: SolaimanLipi; font-size: 12px; float: left; margin:  4px 0 0 9px ;">Date of
                        Birth:
                        <span style="color: #FF0000; font-weight: bolder;"> <?php echo date('d M Y', strtotime($voter_info->voter->dob)); ?></span>
                    </div>
                    <div style="font-family: SolaimanLipi; font-size: 13px; float: left; margin: 2px 0 0 9px ;">ID NO:
                        <span style="color: #FF0000; font-weight: bold; font-size: 12px; "><?php echo $nid_no_type; ?></span>
                    </div>
                </div>
            </div>
        </div>
    </div>



    <div class="" style="margin: 0px 6.38px 0 0px; float: left; width: 322px;">
        <div class="" style="margin: 0; padding: 0; border: 1.5px solid black; width: 320px;  height: 205px;">
            <div style="font-family: SolaimanLipi; font-size: 9.5px; margin: 3px 0 4px 7px;">
                এই কার্ডটি গণপ্রজাতন্ত্রী বাংলাদেশ সরকারের সম্পত্তি। কার্ডটি ব্যবহারকারী ব্যতীত অন্য <br> কোথাও পাওয়া
                গেলে নিকটস্থ পোস্ট অফিসে জমা দেবার জন্য অনুরোধ করা হলো।
            </div>
            <div style="border-top: 1.5px solid #000000 ; margin: 0px 0 0 0; padding: 0;"></div>
            <div class=""
                style=" width: 30px; font-family: SolaimanLipi; font-size: 9.5px; margin: 1px 0px 6px 7px; float: left;">
                ঠিকানা:
            </div>
            <div style="font-family: SolaimanLipi; font-size: 9.5px; margin: 1px 3px 20px 2px; height: 30px">
                <?php if (empty($voter_info->voter->presentAddress)) {
                    echo $voter_info->voter->permanentAddress;
                }else { echo $voter_info->voter->presentAddress; } ?>
            </div>

            <div class=""
                style=" width: 130px; font-family: SolaimanLipi; font-size: 9.5px; margin: 5px 0px 0px 4px; float: left; ">
                রক্তের গ্রুপ /
                <span style="font-family: SolaimanLipi; ">
                    Blood Group:
                    <span style="color: #FF0000;">

                    </span>
                </span>
            </div>
            <div style="margin-left: 5px; font-size: 9px; width: 100px; float: left;">
                জন্মস্থান: <?php  if (empty($voter_info->voter->presentAddress)) {
                            $strArray = explode(' ', $voter_info->voter->permanentAddress);
                            $lastElement = end($strArray);
                        }else {
                            $strArray = explode(' ', $voter_info->voter->presentAddress);
                            $lastElement = end($strArray);
                        } echo $lastElement; ?>
            </div>
            <div
                style="font-family: SolaimanLipi; font-size: 8.8px; color: white; background-color: #000000; width: 35px; margin: 0; float: right; padding: 0 1px 1px 0; ">
                মূদ্রণ: ০২</div>
            <div style="border-bottom: #000000 1.5px solid; margin: 13px 0 0 0 "></div>
            <div>
                <img style="margin: 2px 0 0 20px;" src="inc/bar_code/ec_sign0.jpg" width="70px" height="32px"
                    alt=""><br>
                <div style="font-family: SolaimanLipi; width: 160px ; font-size: 11px; margin: -4px 0 0px 7px; float: left; "
                    class="">
                    প্রদানকারী কর্তৃপক্ষের স্বাক্ষর
                </div>
                <div style="font-family: SolaimanLipi; font-size: 10px; margin: 2px 0px 0px 25px; float: right;"
                    class="">
                    প্রদানের তারিখ:
                    <span style="font-family: SolaimanLipi;"><?php echo BanglaConverter::en2bn(date("d/m/Y", time())) ; ?></span>
                </div>
            </div>
            <center style="margin: 5px 0 0 5px;">
                <img src="<?php echo $pdf417_barcode->encoded; ?>" width="310px" height="40" alt="">
            </center>
        </div>
    </div>
</body>

</html>



<!-- top 6 0 0 3.5 -->