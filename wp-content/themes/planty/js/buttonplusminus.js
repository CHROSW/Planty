jQuery( document ).ready(function($){
    $(document).ready(function(){

$('span.qf-increase-btn').click(function(){
    
    input=$(this).parent().parent().prev().children().find('.ff-el-form-control');
    var value = parseInt(input.val(), 10);
    
    value = value+1;
    console.log(value);
   
    input.val(value);
    input.attr("defaultvalue", value);
});

$('span.qf-decrease-btn').click( function(){
    input=$(this).parent().parent().prev().children().find('.ff-el-form-control');
    
    var value=parseInt(input.val());
    
    value = value-1;
    
    input.val(value);
    input.attr("defaultvalue", value);
    
});


});
});


/* html content to insert in order form*/
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