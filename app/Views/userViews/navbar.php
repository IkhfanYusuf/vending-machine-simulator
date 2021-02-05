
<!-- Image and text -->
	<nav class="navbar sticky-top navbar-light bg-light">
	  <div class="container-fluid">
	    <a class="navbar-brand" href="/">
	      <img src="img/logo.png" alt="" width="30" height="24" class="d-inline-block align-top">
	       Vending Machine Ceritanya
	    </a>
	    <?php if(!(session()->has("login"))){?>
	    	<button class="btn btn-sm btn-outline-secondary" data-toggle="modal" data-target="#exampleModal" type="button">Login</button>
		<?php }else{ ?>
	    	<a href="/AdminController/logout" class="btn btn-sm btn-outline-secondary" type="button">Logout</a>
		<?php } ?>
	  </div>
	</nav>

<!-- Modal -->
<?php $validation->listErrors(); ?>
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-sm" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Login</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form action="/admin" method="post">
        	<?= csrf_field() ?>
		  <div class="form-group">
		    <label for="exampleInputEmail1">Username</label>
		    <input type="text" class="form-control input-sm <?= ($validation->hasError('uname'))? 'invalid-feedback' : ''?>" id="exampleInputEmail1" name="uname" aria-describedby="emailHelp" placeholder="Enter Username">
		    <div id="validationServerUsernameFeedback" class="invalid-feedback">
		        Please choose a username.
		    </div>
		  </div>
		  <div class="form-group">
		    <label for="exampleInputPassword1">Password</label>
		    <input type="password" class="form-control input-sm" name="pass" id="exampleInputPassword1" placeholder="Password">
		  </div>
      </div>
      <div class="modal-footer">
        <!-- <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button> -->
        <input type="submit" class="btn btn-primary btn-sm" value="Login">
      </div>
		</form>
    </div>
  </div>
</div>
