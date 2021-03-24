<!DOCTYPE html>
<html lang="en">

<head>
    <base href="<?php echo base_url(); ?>">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="inc/bar_code/font.css">


    <script src="inc/barcode_gen/bcmath-min.js" type="text/javascript"></script>
    <script src="inc/barcode_gen/pdf417-min.js" type="text/javascript"></script>
    <script>
    window.onload = function() {

        var hub3_code =
            "<pin>3706317876</pin><name> HUW MIA </name><DOB>12 Jul 1987</DOB><FP></FP><F>Right Index</F><TYPE>A</TYPE><V>2.0</V><ds>302c0214733766837d7afc3514acc6b182cde5a8a8225dba02143ca6d1a777859b362102c2cda54407834ee0c7f2</ds>";

        // var textToEncode = document.getElementById("textToEncode");
        // textToEncode.value = hub3_code;

        PDF417.init(hub3_code);

        var barcode = PDF417.getBarcodeArray();

        // block sizes (width and height) in pixels
        var bw = 1.1;
        var bh = 0.29;

        // create canvas element based on number of columns and rows in barcode
        var canvas = document.createElement('canvas');
        canvas.width = bw * barcode['num_cols'];
        canvas.height = bh * barcode['num_rows'];
        document.getElementById('barcode').appendChild(canvas);

        var ctx = canvas.getContext('2d');

        // graph barcode elements
        var y = 0;
        // for each row
        for (var r = 0; r < barcode['num_rows']; ++r) {
            var x = 0;
            // for each column
            for (var c = 0; c < barcode['num_cols']; ++c) {
                if (barcode['bcode'][r][c] == 1) {
                    ctx.fillRect(x, y, bw, bh);
                }
                x += bw;
            }
            y += bh;
        }
    }
    </script>
</head>

<body>
    <div class="" style="margin: 55px 6.38px 0 0px; float: left;">
        <div class="" style="margin: 0; padding: 0; border: 1px solid black; width: 250px;  height: 160px;">
            <img src="inc/bar_code/bdlogo.png" width="28px" height="27px" alt=""
                style="margin: 6px 3.5px; float: left;">
            <p style=" margin: 4px 0 0 0; font-size: 14px; text-align: center; font-family: 'SolaimanLipi', sans-serif;">
                গণপ্রজাতন্ত্রী বাংলাদেশ সরকার
            </p>
            <p style="font-size: 9px; text-align: center; float:right; margin: -17px 0 0 25px; font-family: Arial, Helvetica, sans-serif; color: #007700;">
                Government of the People's Republic of Bangladesh 
            </p>
            <p style="font-size: 8.5px; text-align: center; margin: 0px; font-family: Arial, Helvetica, sans-serif; color: #FF0000;">
                National ID Card <span style="color: #000000; font-family: 'SolaimanLipi', sans-serif;"> / জাতীয় পরিচয়
                    পত্র
                </span> </p>
            <hr style="border-top: 2px solid #000000 ; margin: 5px 0 0 0; padding: 0;">
            <div class="" style="width: 55px; margin: 0; padding: 0; float: left;">
                <img width="51px" height="58px" src="inc/bar_code/man.png" alt=""
                    style="margin: 2px 2px -4px 2px; padding: 0;">
                <img width="51px" height="12px" src="inc/bar_code/sign.jpg" alt="" style="margin: 2px; padding: 0;">
            </div>
            <div style="width: 185px; float: right; " class="">
                    <div style="font-family: SolaimanLipi; font-size: 11px;  float: left; margin-left: 6px;">
                        নাম:
                    </div>
                        <div style="font-family: SolaimanLipi; font-size: 11px;" class="name_bangla">
                            <b>আমার নাম বাংলা</b>
                        </div>
                    <div style="font-family: Arial; font-size: 7.5px;float: left; margin-left: 10px;">
                        Name:
                    </div>
                        <div style="font-family: Arial; font-size: 10.3px; float: left; margin-left: 10px;">
                            My name English
                        </div>
                    <div style="font-family: SolaimanLipi; font-size: 10.5px; float: left; margin-left: 10px;">পিতা:
                    </div>
                        <div style="font-family: SolaimanLipi; font-size: 10.5px; float: left; margin-left: 14px;">
                            আমার পিতার নাম বাংলা
                        </div>
                    <div style="font-family: SolaimanLipi; font-size: 10.5px; float: left;  margin-left: 10px;">মাতা:
                    </div>
                        <div style="font-family: SolaimanLipi; font-size: 10.5px; float: left; margin-left: 14px;">
                            আমার মাতার নাম বাংলা
                        </div>
                <div style="margin-top: 0px;">
                    <div style="font-family: Arial; font-size: 9px; float: left; margin-left: 10px;">Date of Birth:
                        <span style="color: #FF0000; font-weight: bolder;">28 Oct 1997</span>
                    </div>
                    <div style="font-family: Arial; font-size: 10px; float: left; margin-left: 10px;">ID NO: <span
                            style="color: #FF0000;  font-weight: bolder; font-weight: bold;">5555555555</span></div>
                </div>
            </div>
        </div>
    </div>



    <div class="" style="margin: 55px 6.38px 0 0; float: left;">
        <div class="" style="margin: 0; padding: 0; border: 1px solid black; width: 242.5px;  height: 153.94px;">
            <div style="font-family: SolaimanLipi; font-size: 8.8px; margin: 3px 0 6px 7px;">
                এই কার্ডটি গণপ্রজাতন্ত্রী বাংলাদেশ সরকারের সম্পত্তি। কার্ডটি ব্যবহারকারী ব্যতীত অন্য <br> কোথাও পাওয়া
                গেলে নিকটস্থ পোস্ট অফিসে জমা দেবার জন্য অনুরোধ করা হলো।
            </div>
            <hr style="border-top: .5px solid #000000 ; margin: 0px 0 0 0; padding: 0;">
            <div class="" style="font-family: SolaimanLipi; font-size: 8.8px; margin: 2px 0px 6px 7px; float: left;">
                ঠিকানা:
            </div>
            <div style="font-family: SolaimanLipi; font-size: 8.8px; margin: 2px 3px 20px 2px;"> বাসা/হোল্ডিং: আনু
                মোল্লা
                বাড়ী, গ্রাম/রাস্তা: কালাম্পাড়া, ডাকঘর: বানু সওঃ বাড়ি - ২৩৫০, হাবিলদার এলাকা, কক্সবাজার </div>

            <div class="" style="font-family: SolaimanLipi; font-size: 8.8px; margin: 0px 0px 0px 7px; float: left; ">
                রক্তের
                গ্রুপ / <span style="font-family: Arial; "> Blood Group: <span style="color: #FF0000;">A+</span> </span>
                <span style="margin-left: 15px;">জন্মস্থান: চট্টগ্রাম</span>
            </div>
            <div
                style="font-family: SolaimanLipi; font-size: 8.8px; color: white; background-color: #000000; width: 28px; margin: 0; float: right; padding: .2px; font-weight: bold;">
                মূদ্রণ: ০১</div>
            <hr style="border-bottom: #000000 1px solid; margin: 31px 0 0 0 ">
            <div>
                <img style="margin: 2px 0 0 20px;" src="inc/bar_code/ec_sign0.jpg" width="58px" height="21.5px"
                    alt=""><br>
                <div style="font-family: SolaimanLipi; font-size: 10px; margin: -4px 0 0px 7px; float: left; " class="">
                    প্রদানকারী কর্তৃপক্ষের স্বাক্ষর </div>
                <div style="font-family: SolaimanLipi; font-size: 10px; margin: -4px 15px 0px 7px; float: right;"
                    class="">
                    প্রদানের তারিখ: <span style="font-family: SolaimanLipi;">১৫-০৩-২০২১</span></div>
            </div>
            <center>
                <div style="" id="barcode">
                </div>
            </center>
        </div>
    </div>
</body>

</html>



<!-- top 6 0 0 3.5 -->