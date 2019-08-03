<?php 
   $this->db->select('*');
   		$records = $this->db->get_where($this->db->dbprefix('instructions'),array('status'=>'Active'))->result();
   if(count($records)>0) {
   $r = $records[0];	
   
   ?>
<div class="right-side-cont">
   <div class="services">
      <div class="right-side-hed ">
         <?php echo $r->title; ?>
      </div>
      <?php echo $r->content; ?>
   </div>
</div>
<?php } ?>