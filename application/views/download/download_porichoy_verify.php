<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

</head>
    <body>

        <div style="border: 1px solid black; width: 100%; height: 100%; ">
            <div style="margin: 0 auto; width: 80px;" >
                <img style=" margin-top: 15px; " src="inc/verify_file/ec_logo.png" alt="">
            </div>
            <h2 style="text-align:center; " >অনলাইন জাতীয় পরিচয় পত্র যাচাই</h2>

            <div style="margin: 0 auto; width: 120px; border: 1.5px solid grey;" >
                <img style="margin: 3px" src="data:image/jpg;base64, <?php echo $voter_info->voter->photo; ?>" alt="">
            </div>

            <div style="margin: 3px auto; width: 120px; border: 1.5px solid grey;" >
                <img style="margin: 3px" src="data:image/jpg;base64, <?php echo $signa_ture->photo; ?>" alt="">
            </div>


            <table border="1" style="border-collapse: collapse; margin: 5px 10px 0 55px;">
                <tr>
                    <td class="td_head">নাম (বাংলা)</td>
                    <td class="td_value"> <?php echo $voter_info->voter->name; ?></td>
                </tr>
                <tr>
                    <td class="td_head">নাম (ইংরেজী)</td>
                    <td class="td_value"><?php echo $voter_info->voter->nameEn; ?></td>
                </tr>
                <tr>
                    <td class="td_head">জন্ম তারিখ</td>
                    <td class="td_value"><?php echo $voter_info->voter->dob; ?></td>
                </tr>
                <tr>
                    <td class="td_head">পিতার নাম (বাংলা)</td>
                    <td class="td_value"><?php echo $voter_info->voter->father; ?></td>
                </tr>
                <tr>
                    <td class="td_head">পিতার নাম (ইংরেজী)</td>
                    <td class="td_value"><?php echo $voter_info->voter->fatherEn; ?></td>
                </tr>
                <tr>
                    <td class="td_head">মাতার নাম (বাংলা)</td>
                    <td class="td_value"><?php echo $voter_info->voter->mother; ?></td>
                </tr>
                <tr>
                    <td class="td_head">মাতার নাম (ইংরেজী)</td>
                    <td class="td_value"><?php echo $voter_info->voter->motherEn; ?></td>
                </tr>
                <tr>
                    <td class="td_head">স্বামী/স্ত্রীর নাম (বাংলা)</td>
                    <td class="td_value"><?php echo $voter_info->voter->spouse; ?></td>
                </tr>
                <tr>
                    <td class="td_head">স্বামী/স্ত্রীর নাম (ইংরেজী)</td>
                    <td class="td_value"><?php echo $voter_info->voter->spouseEn; ?></td>
                </tr>
                <tr>
                    <td class="td_head">লিঙ্গ</td>
                    <td class="td_value"><?php echo $voter_info->voter->gender; ?></td>
                </tr>
                <tr>
                    <td class="td_head">জাতীয় পরিচয় পত্র নম্বর</td>
                    <td class="td_value"><?php echo $nid_no_type; ?></td>
                </tr>
<!--                 <tr>
                    <td class="td_head">পিন নম্বর</td>
                    <td class="td_value"></td>
                </tr> -->
                <tr>
                    <td class="td_head">বর্তমান ঠিকানা (বাংলা)</td>
                    <td class="td_value"><?php echo $voter_info->voter->presentAddress; ?></td>
                </tr>
                <tr>
                    <td class="td_head">বর্তমান ঠিকানা (ইংরেজী)</td>
                    <td class="td_value"><?php echo $voter_info->voter->presentAddressEn; ?></td>
                </tr>
                <tr>
                    <td class="td_head">স্থায়ী ঠিকানা (বাংলা)</td>
                    <td class="td_value"><?php echo $voter_info->voter->permanentAddress; ?></td>
                </tr>
                <tr>
                    <td class="td_head">স্থায়ী ঠিকানা (ইংরেজী)</td>
                    <td class="td_value"><?php echo $voter_info->voter->permanentAddressEn; ?></td>
                </tr>
            </table>

            <div style="margin: 70px 0 0 50px; ">
                <h3> * উপরের প্রদত্ত সকল তথ্য NID ডাটাবেইজ হতে পরিচয় এর মাধ্যমে প্রাপ্ত। <br> * এই কপিটি শুধুমাত্র অনলাইন NID যাচাইয়ের জন্য ব্যবহার করা যাবে। </h3>
            </div>

            <div style="float:right; width:100px" >
                <img src="inc/verify_file/porichoy_main_logo_big.jpg" width="80px" height="60px" alt="">
            </div>
            <div style="margin-top:20px;text-align:center">
                <p>Company</p>
            </div>








        </div>
    </body>
</html>











<?php 

    // echo $voter_info->voter->name;

?>