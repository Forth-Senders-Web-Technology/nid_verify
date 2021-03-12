<br><br><br><br><br><br><br>


    <script src="inc/lib/popper.js/popper.js"></script>
    <script src="inc/lib/bootstrap/bootstrap.js"></script>
    <script src="inc/lib/perfect-scrollbar/js/perfect-scrollbar.jquery.js"></script>
    <script src="inc/lib/moment/moment.js"></script>
    <script src="inc/lib/jquery-ui/jquery-ui.js"></script>
    <script src="inc/lib/jquery-switchbutton/jquery.switchButton.js"></script>
    <script src="inc/lib/peity/jquery.peity.js"></script>
    <script src="inc/lib/jquery.sparkline.bower/jquery.sparkline.min.js"></script>
    <script src="inc/lib/d3/d3.js"></script>
    <script src="inc/lib/highlightjs/highlight.pack.js"></script>
    <script src="inc/lib/chart.js/Chart.js"></script>
    <script src="inc/lib/Flot/jquery.flot.js"></script>
    <script src="inc/lib/Flot/jquery.flot.pie.js"></script>
    <script src="inc/lib/Flot/jquery.flot.resize.js"></script>
    <script src="inc/lib/flot-spline/jquery.flot.spline.js"></script>
    <script src="inc/lib/codemirror/codemirror.js"></script>
    <script src="inc/lib/codemirror/mode/javascript/javascript.js"></script>
    <script src="inc/lib/codemirror/addon/scroll/simplescrollbars.js"></script>
    <script src="inc/lib/summernote/summernote-bs4.min.js"></script>
    <script src="inc/lib/medium-editor/medium-editor.js"></script>
    <script src="inc/lib/select2/js/select2.min.js"></script>
    <script src="inc/lib/jquery-toggles/toggles.min.js"></script>
    <script src="inc/lib/jt.timepicker/jquery.timepicker.js"></script>
    <script src="inc/lib/spectrum/spectrum.js"></script>
    <script src="inc/lib/jquery.maskedinput/jquery.maskedinput.js"></script>
    <script src="inc/lib/bootstrap-tagsinput/bootstrap-tagsinput.js"></script>
    <script src="inc/lib/ion.rangeSlider/js/ion.rangeSlider.min.js"></script>
    <script src="inc/lib/parsleyjs/parsley.js"></script>
    <script src="inc/lib/jquery.steps/jquery.steps.js"></script>
    <script src="inc/lib/datatables/jquery.dataTables.js"></script>
    <script src="inc/lib/datatables-responsive/dataTables.responsive.js"></script>
    <script src="inc/lib/raphael/raphael.min.js"></script>
    <script src="inc/lib/morris.js/morris.js"></script>
    <script src="inc/lib/Jcrop/Jcrop.js"></script>
    <script src="inc/lib/jqvmap/jquery.vmap.min.js"></script>
    <script src="inc/lib/leaflet/leaflet-src.js"></script>
    <script src="inc/lib/mocha/mocha.js"></script>
    <script src="inc/lib/toastr/build/toastr.min.js"></script>

    

    <script src="inc/js/bracket.js"></script>
<!--    
    <script src="inc/js/chart.chartist.js"></script>
    <script src="inc/js/chart.chartjs.js"></script>
    <script src="inc/js/chart.echarts.js"></script> 
    <script src="inc/js/chart.flot.js"></script> 
    <script src="inc/js/chart.morris.js"></script>
    <script src="inc/js/chart.peity.js"></script>
    <script src="inc/js/chart.rickshaw.js"></script>
    <script src="inc/js/chart.sparkline.js"></script>
    <script src="inc/js/map.apple.js"></script>
    <script src="inc/js/map.bluewater.js"></script>
    <script src="inc/js/map.mapbox.js"></script>
    <script src="inc/js/map.shadesofgray.js"></script>
    <script src="inc/js/map.shiftworker.js"></script>
    <script src="inc/js/jquery.vmap.sampledata.js"></script>
 -->
    <script src="inc/js/dashboard.js"></script>
    <script src="inc/js/ResizeSensor.js"></script>
    <!-- <script src="inc/js/widgets.js"></script> -->
    
    <script>
      $(function(){
        'use strict'

        // FOR DEMO ONLY
        // menu collapsed by default during first page load or refresh with screen
        // having a size between 992px and 1299px. This is intended on this page only
        // for better viewing of widgets demo.
        $(window).resize(function(){
          minimizeMenu();
        });

        minimizeMenu();

        function minimizeMenu() {
          if(window.matchMedia('(min-width: 992px)').matches && window.matchMedia('(max-width: 1299px)').matches) {
            // show only the icons and hide left menu label by default
            $('.menu-item-label,.menu-item-arrow').addClass('op-lg-0-force d-lg-none');
            $('body').addClass('collapsed-menu');
            $('.show-sub + .br-menu-sub').slideUp();
          } else if(window.matchMedia('(min-width: 1300px)').matches && !$('body').hasClass('collapsed-menu')) {
            $('.menu-item-label,.menu-item-arrow').removeClass('op-lg-0-force d-lg-none');
            $('body').removeClass('collapsed-menu');
            $('.show-sub + .br-menu-sub').slideDown();
          }
        }
      });

        var initValue = '$(\'#btnLeftMenu\').on(\'click\', function(){\n  var menuText = $(\'.menu-item-label,.menu-item-arrow\');\n\n  if($(\'body\').hasClass(\'collapsed-menu\')) {\n    $(\'body\').removeClass(\'collapsed-menu\');\n\n    // show current sub menu when reverting back from collapsed menu\n    $(\'.show-sub + .br-menu-sub\').slideDown();\n\n    $(\'.br-sideleft\').one(\'transitionend\', function(e) {\n      menuText.removeClass(\'op-lg-0-force\');\n      menuText.removeClass(\'d-lg-none\');\n    });\n\n  } else {\n    $(\'body\').addClass(\'collapsed-menu\');\n\n    // hide toggled sub menu\n    $(\'.show-sub + .br-menu-sub\').slideUp();\n\n    menuText.addClass(\'op-lg-0-force\');\n    $(\'.br-sideleft\').one(\'transitionend\', function(e) {\n      menuText.addClass(\'d-lg-none\');\n    });\n  }\n  return false;\n});';

        var myCodeMirror = CodeMirror(document.getElementById('code'), {
            lineNumbers: true,
            theme: 'eclipse',
            mode: 'javascript',
            value: initValue,
            scrollbarStyle: 'simple'
        });

        var myCodeMirror2 = CodeMirror(document.getElementById('code2'), {
            lineNumbers: true,
            theme: 'dracula',
            mode: 'javascript',
            value: initValue,
            scrollbarStyle: 'overlay'
        });

        var myCodeMirror3 = CodeMirror(document.getElementById('code3'), {
            lineNumbers: true,
            theme: 'base16-light',
            mode: 'javascript',
            value: initValue,
            scrollbarStyle: 'overlay'
        });

        var myCodeMirror3 = CodeMirror(document.getElementById('code4'), {
            lineNumbers: true,
            theme: 'lesser-dark',
            mode: 'javascript',
            value: initValue,
            scrollbarStyle: 'overlay'
        });

        // Inline editor
        var editor = new MediumEditor('.editable');

        // Summernote editor
        $('#summernote').summernote({
            height: 150,
            tooltip: false
        })

            // Toggles
            $('.toggle').toggles({
                on: true,
                height: 26
            });

            // Input Masks
            $('#dateMask').mask('99/99/9999');
            $('#phoneMask').mask('(999) 999-9999');
            $('#ssnMask').mask('999-99-9999');

            // Datepicker
            $('.fc-datepicker').datepicker({
                showOtherMonths: true,
                selectOtherMonths: true
            });

            $('#datepickerNoOfMonths').datepicker({
                showOtherMonths: true,
                selectOtherMonths: true,
                numberOfMonths: 2
            });

            // Time Picker
            $('#tpBasic').timepicker();
            $('#tp2').timepicker({
                'scrollDefault': 'now'
            });
            $('#tp3').timepicker();

            $('#setTimeButton').on('click', function() {
                $('#tp3').timepicker('setTime', new Date());
            });

            // Color picker
            $('#colorpicker').spectrum({
                color: '#17A2B8'
            });

            $('#showAlpha').spectrum({
                color: 'rgba(23,162,184,0.5)',
                showAlpha: true
            });

            $('#showPaletteOnly').spectrum({
                showPaletteOnly: true,
                showPalette: true,
                color: '#DC3545',
                palette: [
                    ['#1D2939', '#fff', '#0866C6', '#23BF08', '#F49917'],
                    ['#DC3545', '#17A2B8', '#6610F2', '#fa1e81', '#72e7a6']
                ]
            });


            // Rangeslider
            if ($().ionRangeSlider) {
                $('#rangeslider1').ionRangeSlider();

                $('#rangeslider2').ionRangeSlider({
                    min: 100,
                    max: 1000,
                    from: 550
                });

                $('#rangeslider3').ionRangeSlider({
                    type: 'double',
                    grid: true,
                    min: 0,
                    max: 1000,
                    from: 200,
                    to: 800,
                    prefix: '$'
                });

                $('#rangeslider4').ionRangeSlider({
                    type: 'double',
                    grid: true,
                    min: -1000,
                    max: 1000,
                    from: -500,
                    to: 500,
                    step: 250
                });
            }

        $('.form-layout .form-control').on('focusin', function(){
        $(this).closest('.form-group').addClass('form-group-active');
        });

        $('.form-layout .form-control').on('focusout', function(){
          $(this).closest('.form-group').removeClass('form-group-active');
        });

        // Select2
        $('#select2-a, #select2-b').select2({
          minimumResultsForSearch: Infinity
        });

        $('#select2-a').on('select2:opening', function (e) {
          $(this).closest('.form-group').addClass('form-group-active');
        });

        $('#select2-a').on('select2:closing', function (e) {
          $(this).closest('.form-group').removeClass('form-group-active');
        });

        $('#selectForm').parsley();
        $('#selectForm2').parsley();

        $('#wizard1').steps({
          headerTag: 'h3',
          bodyTag: 'section',
          autoFocus: true,
          titleTemplate: '<span class="number">#index#</span> <span class="title">#title#</span>'
        });

        $('#wizard2').steps({
          headerTag: 'h3',
          bodyTag: 'section',
          autoFocus: true,
          titleTemplate: '<span class="number">#index#</span> <span class="title">#title#</span>',
          onStepChanging: function (event, currentIndex, newIndex) {
            if(currentIndex < newIndex) {
              // Step 1 form validation
              if(currentIndex === 0) {
                var fname = $('#firstname').parsley();
                var lname = $('#lastname').parsley();

                if(fname.isValid() && lname.isValid()) {
                  return true;
                } else {
                  fname.validate();
                  lname.validate();
                }
              }

              // Step 2 form validation
              if(currentIndex === 1) {
                var email = $('#email').parsley();
                if(email.isValid()) {
                  return true;
                } else { email.validate(); }
              }
            // Always allow step back to the previous step even if the current step is not valid.
            } else { return true; }
          }
        });

        $('#wizard3').steps({
          headerTag: 'h3',
          bodyTag: 'section',
          autoFocus: true,
          titleTemplate: '<span class="number">#index#</span> <span class="title">#title#</span>',
          stepsOrientation: 1
        });

        $('#wizard4').steps({
          headerTag: 'h3',
          bodyTag: 'section',
          autoFocus: true,
          titleTemplate: '<span class="number">#index#</span> <span class="title">#title#</span>',
          cssClass: 'wizard step-equal-width'
        });

        $('#wizard5').steps({
          headerTag: 'h3',
          bodyTag: 'section',
          autoFocus: true,
          titleTemplate: '<span class="number">#index#</span> <span class="title">#title#</span>',
          cssClass: 'wizard wizard-style-1'
        });

        $('#wizard6').steps({
          headerTag: 'h3',
          bodyTag: 'section',
          autoFocus: true,
          titleTemplate: '<span class="number">#index#</span> <span class="title">#title#</span>',
          cssClass: 'wizard wizard-style-2'
        });

        $('#wizard7').steps({
          headerTag: 'h3',
          bodyTag: 'section',
          autoFocus: true,
          titleTemplate: '<span class="number">#index#</span> <span class="title">#title#</span>',
          cssClass: 'wizard wizard-style-3'
        });

        // Showing sub left menu
        $('#showSubLeft').on('click', function(){
          if($('body').hasClass('show-subleft')) {
            $('body').removeClass('show-subleft');
          } else {
            $('body').addClass('show-subleft');
          }
        });

        $('.select2').select2({
          minimumResultsForSearch: Infinity
        });

        $('#datatable1').DataTable({
          responsive: true,
          language: {
            searchPlaceholder: 'Search...',
            sSearch: '',
            lengthMenu: [10, 25, 50, "All"],
          }
        });

        $('#datatable2').DataTable({
          bLengthChange: false,
          searching: true,
          responsive: true
        });

        // Select2
        $('.dataTables_length select').select2({ minimumResultsForSearch: Infinity });

        $(function($) {
            let url = window.location.href;
            $('#sidebar-menu a').each(function() {
                if (this.href === url) {
                    $(this).addClass(' active ');
                }
            });
        });
      

	    <?php if ($this->session->flashdata('success')) {?>
	        toastr.success("<?php echo $this->session->flashdata('success'); ?>", "Success");
	    <?php } else if ($this->session->flashdata('error')) {?>
	        toastr.error("<?php echo $this->session->flashdata('error'); ?>", "Error");
	    <?php } else if ($this->session->flashdata('warning')) {?>
	        toastr.warning("<?php echo $this->session->flashdata('warning'); ?>", "Deleted");
	    <?php } else if ($this->session->flashdata('info')) {?>
	        toastr.info("<?php echo $this->session->flashdata('info'); ?>", "Info");
      <?php }?>



      $('.datepicker').datepicker({ dateFormat: 'dd/mm/yy' });
      
    </script>

<script src="inc/lib/rickshaw/rickshaw.min.js"></script>
<script src="inc/lib/chartist/chartist.js"></script>
  </body>
</html>
