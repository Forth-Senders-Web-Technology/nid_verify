<!DOCTYPE html>
<html lang="en">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="inc/style/mpdfStyle.css" />
</head>
<body>
    
<br>

<div class="left_float top_margin_80px" > 
    <?php if ($c_entry_info->bn_or_en == 1) { ?>
        Registration No : <?php echo $c_entry_info->cer_id_datewise; ?> 
    <?php }else { ?>
         রেজিষ্ট্রেশন নং : <span style="font-family: nikosh;"><?php echo $c_entry_info->cer_id_datewise; ?> </span>
    <?php } ?>
</div>
<div class="" align="right">
    <?php if ($c_entry_info->bn_or_en == 1) { ?> 
        Date : <?php echo $c_entry_info->cer_entry_date; ?>
    <?php }else { ?>
         তারিখ : <span style="font-family: nikosh;"><?php echo $c_entry_info->cer_entry_date; ?> </span>
    <?php } ?>
</div>

<br>
<br><br><br>

<div align="center" class="cer_title top_margin" > <?php echo $c_entry_info->cer_title; ?> </div>
<div class="cer_description text_justify"> <?php echo $c_entry_info->cer_entry; ?> </div>



<!--  
<div class="chairman_info" >
    <?php if ($c_entry_info->bn_or_en == 1) { ?> 
        <div class="chairman_name"><?php echo $setting->chairman; ?></div>
        <div class="ch_inf"> Chairman </div>
        <div class="up_name"><?php echo $setting->up_name_en; ?></div>
        <div class="up_address"><?php echo $setting->address; ?></div>
    <?php }else { ?>
        <div class="chairman_name"><?php echo $setting->chairman_bn_name; ?></div>
        <div class="ch_inf"> চেয়ারম্যান </div>
        <div class="up_name"><?php echo $setting->up_name_bn; ?></div>
        <div class="up_address"><?php echo $setting->bn_address; ?></div>
    <?php } ?>
</div>
  -->


<!-- 
<div class="certificate_buttom">
    <?php if ($c_entry_info->bn_or_en == 1) { ?> 
        <span> Search and verify this certificate in URL <?php echo base_url(); ?> </span>
    <?php }else { ?>
        <span> এই সার্টিফিকেটটি অনলাইনে ভেরিফাই করার জন্য ওয়েব সাইটে যান <?php echo base_url(); ?> </span>
    <?php } ?>
</div> -->

</body>
</html>
