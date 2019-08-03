<style> 
   .yellow-the >img, .red-theme >img {
   width: 360px; border:0; padding:0;
   }
   .yellow-the >img:hover, .red-theme >img:hover{ transform: scale(1.1,1.1);  transition: all ease 1s; overflow:auto; }
   .yellow-the{   
   float: left;
   font-size: 90px;
   padding-top: 35px;
   text-align: center;
   margin:10px 0 0 0px; transition: all ease 1s;}
   .yellow-the:hover{   transition: all ease 1s; }
   .red-theme { float:left;     font-size: 90px;
   height: 175px;
   transition: all ease 1s;     padding-top: 35px;
   text-align: center;  margin:10px 0 0 0px}
   .red-theme:hover{  transition: all ease 1s; }
   .yellow-the i{ color:#fcc000;}
   .red-theme i{color:#9f2525;}
   .hed {
   color: black;
   float: left;
   font-size: 18px;
   font-weight: bold;
   padding: 10px;
   text-align: center;
   width: 100%;
   }
   .sh {
   background:none repeat scroll 0 0 #1e1e1e;
   color: #ffffff;
   font-size: 22px;
   font-weight: bold;
   margin: 0 auto !important;
   max-width: 350px;
   padding: 10px; 
   position: relative;
   text-align: center;
   width: 100%;
   }
   a {
   cursor:pointer;
   }
</style>
<div class="col-md-10 padding white right-p">
   <div class="content">
      <div class="main-hed"> 
         <a href="<?php echo site_url();?>auth"><?php echo $this->lang->line('home');?></a>
         <?php if(isset($title)) echo " >> Master Settings >> ".$title;?>
      </div>
      <div class="col-md-12 padding-p-l">
         <?php echo $this->session->flashdata('message');?>
         <div class="module">
            <div class="module-head">
               <h3> <?php if(isset($title)) echo $title;?></h3>
            </div>
            <div class="module-body">
               <div class="sh"> <i class="fa fa-check-square"></i> <?php echo $this->lang->line('select_your_theme');?></div>
               <div class="col-md-6">
                  <a data-toggle="modal" data-target="#myModal" onclick="changeThemeColor('Yellow')">
                     <div class="yellow-the">
                       <img src="<?php echo IMGS_SYSTEM_DSN;?>yellow-theme.jpg"/> 
                        <div class="hed"> <?php echo $this->lang->line('yellow_theme');?> </div>
                     </div>
                  </a>
               </div>
               <div class="col-md-6">
                  <a data-toggle="modal" data-target="#myModal" onclick="changeThemeColor('Red')">
                     <div class="red-theme">
                        <img src="<?php echo IMGS_SYSTEM_DSN;?>red-theme.jpg"/> 
                        <div class="hed"> <?php echo $this->lang->line('red_theme');?> </div>
                     </div>
                  </a>
               </div>
            </div>
         </div>
      </div>
   </div>
</div>
<!-- Modal -->
<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
   <div class="modal-dialog">
      <div class="modal-content">
         <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only"><?php echo $this->lang->line('close');?></span></button>
            <h4 class="modal-title" id="myModalLabel"><?php echo $this->lang->line('info');?></h4>
         </div>
         <div class="modal-body" id="modal_body">
            
         </div>
         <div class="modal-footer">
		 <?php echo form_open(site_url().'settings/theme_settings');?>
		 <input type="hidden" name="colorName" id="colorName">
            <button type="submit" class="btn btn-default"><?php echo $this->lang->line('yes');?></button>		
            <button type="button" class="btn btn-default" data-dismiss="modal"><?php echo $this->lang->line('no');?></button>
			<?php echo form_close();?>
         </div>
      </div>
   </div>
</div>
<script>
   function changeThemeColor(color) {
	document.getElementById('colorName').value = color;
	document.getElementById('modal_body').innerHTML = "<?php echo $this->lang->line('alert_change_site_theme');?><b><i>"+color+"</i></b> ?";
   }
</script>