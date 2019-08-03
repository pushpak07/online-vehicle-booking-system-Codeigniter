<?php $this->load->view('admin/common/header'); ?>
<?php $this->load->view('admin/common/navigation'); ?>
<?php  $this->load->view($content); ?>
<?php $this->load->view('admin/common/footer'); ?>

<script type="text/javascript">
  $(document).ready(function() {
    var docHeight = $(window).height();
    var footerHeight = $('.footer').height();
    var footerTop = $('.footer').position().top + footerHeight;

    if (footerTop < docHeight) {
        $('.footer').css('margin-top', 10+ (docHeight - footerTop) + 'px');
    }
});
</script>

<!--script type="text/javascript">
	$(document).ready(function() {
    var docHeight = $(window).height();
    var footerHeight = $('.footerr').height();
    var footerTop = $('.footerr').position().top + footerHeight;

    if (footerTop < docHeight) {
        $('.footerr').css('margin-top', 10+ (docHeight - footerTop) + 'px');
    }

     function setHeight() {
    windowHeight = $(window).innerHeight();
    $('.sidebarr').css('min-height', windowHeight);
  };
  setHeight();
  
  $(window).resize(function() {
    setHeight();
  });
});
</script-->