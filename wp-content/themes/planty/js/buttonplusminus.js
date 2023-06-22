jQuery(document).ready(function ($) {
    $(document).ready(function () {
 
       if (($('#ff_4_numeric-field').val() == 0) && ($('#ff_4_numeric-field_1').val() == 0) && ($('#ff_4_numeric-field_2').val() == 0) && ($('#ff_4_numeric-field_3').val() == 0)) {
          $('button[name="custom_submit_button-4_18"]').attr('disabled', 'disabled');
       } else {
          $('button[name="custom_submit_button-4_18"]').removeAttr('disabled');
       }
       
       $('.ff-el-form-control.ff_numeric').on('keyup', function(){
         if (($('#ff_4_numeric-field').val() == 0) && ($('#ff_4_numeric-field_1').val() == 0) && ($('#ff_4_numeric-field_2').val() == 0) && ($('#ff_4_numeric-field_3').val() == 0)) {
            $('button[name="custom_submit_button-4_18"]').attr('disabled', 'disabled');
         } else {
            $('button[name="custom_submit_button-4_18"]').removeAttr('disabled');
         }
       });

       $('span.qf-increase-btn').click(function () {
          input = $(this).parent().parent().prev().children().find('.ff-el-form-control');
          var value = parseInt(input.val(), 10);
          value = value + 1;
          input.val(value);
          input.attr("defaultvalue", value);
          if (($('#ff_4_numeric-field').val() == 0) && ($('#ff_4_numeric-field_1').val() == 0) && ($('#ff_4_numeric-field_2').val() == 0) && ($('#ff_4_numeric-field_3').val() == 0)) {
             $('button[name="custom_submit_button-4_18"]').attr('disabled', 'disabled');
          } else {
             $('button[name="custom_submit_button-4_18"]').removeAttr('disabled');
          }
       });
 
       $('span.qf-decrease-btn').click(function () {
          input = $(this).parent().parent().prev().children().find('.ff-el-form-control');
          var value = parseInt(input.val());
          if (value > 0) {
             value = value - 1;
          } else {
             value = 0;
          }
          input.val(value);
          input.attr("defaultvalue", value);
          if (($('#ff_4_numeric-field').val() == 0) && ($('#ff_4_numeric-field_1').val() == 0) && ($('#ff_4_numeric-field_2').val() == 0) && ($('#ff_4_numeric-field_3').val() == 0)) {
             $('button[name="custom_submit_button-4_18"]').attr('disabled', 'disabled');
          } else {
             $('button[name="custom_submit_button-4_18"]').removeAttr('disabled');
          }
       });
    });
 });
 
 /* html content insert into order form*/
 /*
 <div class="q-field-wrapper">	
     <span class="qf-increase-btn" id='increase'>
         <svg xmlns="http://www.w3.org/2000/svg" width="31" height="28" viewBox="0 0 24 24"><path d="M24 10h-10v-10h-4v10h-10v4h10v10h4v-10h10z"/></svg>
     </span>
     <span class="qf-decrease-btn" id='decrease'>
       <svg xmlns="http://www.w3.org/2000/svg" width="31" height="28" viewBox="0 0 24 24"><path d="M0 10h24v4h-24z"/></svg>
     </span>
 </div>
 */