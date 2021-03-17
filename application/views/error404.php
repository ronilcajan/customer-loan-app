<body style="margin-top: 10%;">
<center>
    <div class="h-100 w-50 mt-5">
    	<h1 class="font-weight-bold">OOPS! ERROR 404!</h1>
    	<p class="">You have some trouble. The Web page you're looking for does not exist. Make sure you've typed the page correctly. It may have moved or try another link.</p>
    	<button class="btn btn-outline-secondary font-weight-bold" onclick="location.href='<?php echo base_url();?>'">Go home</button>
    </div>
</center>
    <?php  $this->load->view('templates/footer') ?>
</body>
