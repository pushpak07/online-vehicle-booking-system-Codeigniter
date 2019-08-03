<?php $this->load->view('executives/common/header'); ?>
<?php $this->load->view('executives/common/navigation'); ?>
<?php  $this->load->view($content); ?>
<?php $this->load->view('executives/common/footer'); ?>

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