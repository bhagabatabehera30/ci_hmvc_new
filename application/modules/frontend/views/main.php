<?php $this->load->view('includes/upper-header');?>
<!-- get header data here-->
<?php echo html_entity_decode($MyAppSettings->customStyles); ?>
<?php echo html_entity_decode($MyAppSettings->customScriptsHead); ?>
<!-- end header data here-->
<?php $this->load->view('includes/main-header');?>
<!-- get content page here-->
<?php $this->load->view($page);?>  
<!-- end content page here--> 
<?php $this->load->view('includes/footer');?>
<?php $this->load->view('includes/footer-js');?>  
<!-- get footer data here-->
<?php echo html_entity_decode($MyAppSettings->customScriptsFooter); ?> 
<!-- end footer data here-->
</body></html> 