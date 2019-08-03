//General Functions
function statustoggle(obj, targeturl,type)
{
	
	var ids = check = '';
	if(typeof(type) == 'undefined')
		type = 'single';
	if(type == 'single')
	{
		ids = $(obj).val();
		check = $(obj).is(':checked');
	}
	else
	{
		ids = obj;
		if(type == 'Active')
		check = 'true';
		else
		check = 'false';
	}
	
	
	var token = '';
	if($('[name="csrf_digi_name"]').length)
	token = document.getElementsByName('csrf_digi_name')[0].value;
	
	$.ajax({
		   type:'POST',
		   url:targeturl,
		   data:{
			   ajax:1,
			   csrf_digi_name:token,
			   id:ids,
			   status:check
		   },
		   success:function(data){				   
				   var t = $.parseJSON( data );
				   
			    if (t['action']=='success') {
					checkNotify('',t['message'],'success');
				} else {
				   	checkNotify('',t['message'],'error');
				}
					
				reload_table();
		   }
		   });
}

function delete_record(id, url)
{
	
	$("#deleting_record_id").val(id);
	$("#deleting_record_id_url").val(url);
}

function delete_record_final()
{ 
	var token = '';
	if($('[name="csrf_digi_name"]').length)
	token = document.getElementsByName('csrf_digi_name')[0].value;
		
	$.ajax({
		   type:'POST',
		   url:$("#deleting_record_id_url").val(),
		   data:{
			   ajax:1,
			   csrf_digi_name:token,
			   id:$("#deleting_record_id").val(),
		   },
		   success:function(data){				   
		   
				   var t = $.parseJSON(data);
				   
				   if(t['status'] == 1)
				   {
						checkNotify('FAQs',t['message'],'success');
				   }
				   else
				   {
					    checkNotify('FAQs',t['message'],'error');
				   }
				   $('#deletemodal').modal('hide');
				  
				   reload_table();
		   }
		   });
}

function reload_table()
{
  $('.selectall').prop('checked', false);
  $('#multioperation').val('');
  datatablevar.api().ajax.reload(null,false); //reload datatable ajax 
}

function multioperationfunction(val, delurl, toggleurl) 
{
   var selected = 0;
   var ids = '';
   
   if($('.checkbox_class').length > 0) {
	   $('.checkbox_class').each(function(index, element){
		   if($(this).is(':checked'))
		   {
				selected++;
				ids += $(this).val() + ',';
		   }
	   });
   }
   
   
   
   if(selected == 0)
   {
	   checkNotify('FAQs','Please select at least one record','info');
	   
	   $('#multioperation').val('');
	   return false;
   }
   if(val == 'Active' || val == 'Inactive') {
	   statustoggle(ids, toggleurl, val);
   }	   
   if(val == 'delete') {
	   $("#deletemodal").modal();
	   $("#deleting_record_id").val(ids);
	   $("#deleting_record_id_url").val(delurl);	   
   }
}

function deselectall_check(classname)
{
	$('.'+classname).prop('checked', false);
}

function selectall(obj, classname)
{
	if($(obj).is(':checked'))
	$('.'+classname).prop('checked', true);
	else
	$('.'+classname).prop('checked', false);
}


function delete_record(id, url)
{
	
	$("#deleting_record_id").val(id);
	$("#deleting_record_id_url").val(url);
}

function chnage_booking_status(id,bkstatus,url)
{ 
	var token = '';
	if($('[name="csrf_digi_name"]').length)
	token = document.getElementsByName('csrf_digi_name')[0].value;
		
	$.ajax({
		   type:'POST',
		   url:url,
		   data:{
			   ajax:1,
			   csrf_digi_name:token,
			   id:id,
			   bkstatus:bkstatus
		   },
		   success:function(data){				   
		   
				   var t = $.parseJSON(data);
				   
				   if(t['status'] == 1)
				   {
						checkNotify('Booking',t['message'],'success');
				   }
				   else
				   {
					    checkNotify('Booking',t['message'],'error');
				   }
				   
				   reload_table();
		   }
		   });
}


function bkng_status_record(id, url)
{
	
	$("#bkng_record_id").val(id);
	$("#bkng_status_url").val(url);
}

function bkng_status_final()
{ 
	var token = '';
	if($('[name="csrf_digi_name"]').length)
	token = document.getElementsByName('csrf_digi_name')[0].value;
		
	$.ajax({
		   type:'POST',
		   url:$("#bkng_status_url").val(),
		   data:{
			   ajax:1,
			   csrf_digi_name:token,
			   id:$("#bkng_record_id").val(),
		   },
		   success:function(data){				   
		   
				   var t = $.parseJSON(data);
				   
				   if(t['status'] == 1)
				   {
						checkNotify('FAQs',t['message'],'success');
				   }
				   else
				   {
					    checkNotify('FAQs',t['message'],'error');
				   }
				   $('#bkng_status_modal').modal('hide');
				  
				   reload_table();
		   }
		   });
}



