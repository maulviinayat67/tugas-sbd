
<?php  $this->load->view('include/v_header'); ?>
<?php  $this->load->view('include/v_menu');  ?>

<div class="content-wrapper">
	<?php $this->load->view($content) ?>
	<?php  $this->load->view('include/v_footer');?>
</div>


<?php  $this->load->view('include/v_lib'); ?>

