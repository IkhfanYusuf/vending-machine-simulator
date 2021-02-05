
<?= $this->extend('baseTemplate') ?>
<?= $this->section('content') ?>

	<!-- <?php if (session()->getFlashdata('message')): ?>
		<div class="alert alert-success" role="alert">
		  <?= session()->getFlashdata('message') ?>
		</div>
	<?php endif ?> -->

	<div class="flash-data" data-flashdata="<?= session()->getFlashdata('message') ?>"></div>
	<div class="flash-data-universal" data-flashdata="<?= session()->getFlashdata('universalMessage') ?>"></div>
	<div class="flash-data-universal-failed" data-flashdata="<?= session()->getFlashdata('universalFailed') ?>"></div>
	<div class="flash-data-failed" data-flashdata="<?= session()->getFlashdata('failedMessage') ?>"></div>
	<div class="flash-data-wd" data-flashdata="<?= session()->getFlashdata('withdraw') ?>"></div>
    
    <div class="row d-flex justify-content-around">

		<?php $no=1; foreach ($users as $user): ?>
		<?php if (session()->has('login')){ ?>
    	<div class="col my-3">
    	<?php }else{ ?>
    	<div class="col-md-4 my-3">
    	<?php } ?>
    		<div class="card text-center">
			  <img class="card-img-top pt-2" src="img/<?= $user['img'] ?>" alt="<?= $user['price'] ?>">
			  <div class="card-body">

			  	<?php if (session()->has('login')){ ?>
		    		<span class="card-title"><?= $user['drinkName'] ?></span><br>
		    		<span>Stok : <?= $user['stock'] ?></span>
		    	<?php }else{ ?>
			    	<h5 class="card-title"><?= $user['drinkName'] ?></h5>
		    	<?php } ?>
			    <!-- <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p> -->
			  </div>
			  <ul class="list-group list-group-flush">
			  	<?php if (session()->has('login')){ ?>
			    	<li class="list-group-item">
			  	<?php }else{ ?>
			    	<li class="list-group-item d-flex justify-content-between align-items-center">
			    <?php } ?>

			    	<?php if (!(session()->has('login'))){ ?>
			    		<span>Rp. <?= $user['price'] ?></span>
			    	<?php } ?>


			    	<div>
			    	<?php if (!(session()->has('login'))){ ?>
			    		Sisa : <span style="border: 1px dotted grey" class="mr-2 py-1 pl-2 pr-1"><?= $user['stock'] ?> </span>
			    	<?php } ?>
				  	<?php if (session()->has('login')){ ?>
			    		<button type="button" class="btn btn-primary btn-sm" data-toggle="modal" data-target="#stockModal<?= $user['id'] ?>">
						  Update Stok
						</button>
			    	<?php }else{ ?>
					    <?php if ($user['stock']<1){?>
					    	<button type="button" class="btn btn-secondary btn-sm" disabled>
							  Habis
							</button>
					    <?php }else{ ?>
						    <button type="button" class="btn btn-primary btn-sm clickbuy" data-id="<?= $user['id'] ?>" data-toggle="modal" data-target="#exampleModal<?= $user['id'] ?>">
							  Beli
							</button>

					    <?php } ?>
				    	
			    	</div>
			    	<?php } ?>
			 
				</li>
			  </ul>
			 
			</div>
    	</div>

    	<!-- Modal -->
		<div class="modal fade" id="exampleModal<?= $user['id'] ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
		  <div class="modal-dialog modal-sm">
		    <div class="modal-content">
		      <div class="modal-header">
		        <h5 class="modal-title" id="exampleModalLabel">Pembayaran</h5>
		        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
		          <span aria-hidden="true">&times;</span>
		        </button>
		      </div>
		      <div class="modal-body">
		        <div class="img">
		        	<img class="card-img-top" src="img/<?= $user['img'] ?>" alt="<?= $user['price'] ?>">
		        </div>
		        <h6 class="d-flex justify-content-around">	
			        <span>Rp. <?= $user['price'] ?></span>
			        <span>Stok : <?= $user['stock'] ?></span>
		        </h6>
		        <hr><h6>Nominal Uang</h6>
		        <div class="row d-flex justify-content-between py-2 mr-1">
		        	<div class="col-3">	
		        		<button class="btn btn-secondary btn-sm buy" onclick="buy(1000)" data-id="<?= $user['id'] ?>">1000</button>
		        	</div>
		        	<div class="col-3">	
		        		<button class="btn btn-secondary btn-sm buy" onclick="buy(2000)" data-id="<?= $user['id'] ?>">2000</button>
		        	</div>
		        	<div class="col-3">	
		        		<button class="btn btn-secondary btn-sm buy" onclick="buy(5000)" data-id="<?= $user['id'] ?>">5000</button>
		        	</div>
		        	<div class="col-3">	
		        		<button class="btn btn-secondary btn-sm buy" onclick="buy(10000)" data-id="<?= $user['id'] ?>">10000</button>
		        	</div>
		        </div>
		        <form action="/update/<?= $user['id']  ?>" method="post">
		        	<?=  csrf_field() ?>
		        	<div class="row d-flex align-items-center">
		        		<div class="col-2">
		        			Rp. 
		        		</div>
					    <div class="col-10">
					      <input type="text" class="form-control input-sm" name="balance" id="liveBalance<?= $user['id'] ?>" value="0" readonly>
					    </div>
					    <!-- <div class="col-5">
					      <input type="number" min="1" max="<?= $user['stock'] ?>" class="form-control input-sm" name='total' value="1" placeholder="Jumlah">
					    </div> -->
					</div>
					<div class="form-group row">
					    
					    <div class="col-sm-10">
					      <input type="hidden" class="form-control input-sm" name="price" value="<?= $user['id'] ?>">
					      <input type="hidden" class="form-control input-sm" name="stock" value="<?= $user['stock'] ?>">
					      <input type="hidden" class="form-control input-sm" name="buy" value="<?= $user['buy'] ?>">  
					      <input type="hidden" class="form-control input-sm" name="price" value="<?= $user['price'] ?>">
					    </div>
					</div>		        
		      </div>
		      <div class="modal-footer">
		        <!-- <button type="button" class="btn btn-secondary btn-sm" data-dismiss="modal">Close</button> -->
		        <input type="submit" class="btn btn-primary btn-sm" value="Bayar">
		      </div>
		      </form>
		    </div>
		  </div>
		</div>

		<!-- Modal -->
		<div class="modal fade" id="stockModal<?= $user['id'] ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
		  <div class="modal-dialog modal-sm">
		    <div class="modal-content">
		      <div class="modal-header">
		        <h5 class="modal-title" id="exampleModalLabel">Update Stok</h5>
		        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
		          <span aria-hidden="true">&times;</span>
		        </button>
		      </div>
		      <div class="modal-body">
		        <div class="img">
		        	<img class="card-img-top" src="img/<?= $user['img'] ?>" alt="<?= $user['price'] ?>">
		        </div>
		        <h6 class="d-flex justify-content-around">	
			        <span>Rp. <?= $user['price'] ?></span>
			        <span>Stok : <?= $user['stock'] ?></span>
		        </h6>
		        <form action="/updateStock/<?= $user['id'] ?>" method="post">
		        	<?=  csrf_field() ?>
					<div class="form-group row">
					    <label for="stock" class="col-sm-6 col-form-label">Update Stock</label>
					    <div class="col-sm-6">
					      <input type="number" min="<?= $user['stock'] ?>" id="stock" value="<?= $user['stock'] ?>" class="form-control input-sm" name='stock' placeholder="Jumlah">
					      <input type="hidden" name='drinkName' value="<?= $user['drinkName'] ?>" class="form-control input-sm" name='total' placeholder="Jumlah">
					    </div>
					  </div>
						        
		      </div>
		      <div class="modal-footer">
		        <!-- <button type="button" class="btn btn-secondary btn-sm" data-dismiss="modal">Close</button> -->
		        <input type="submit" class="btn btn-primary btn-sm" value="Update">
		      </div>
		      </form>
		    </div>
		  </div>
		</div>
    	
		<?php endforeach ?>  	
    	
    </div>
    	
    <?php if (session()->has('login')):?>
	    <div class="row mt-5">
	    	<a href="/wd" class="btn btn-success btn-lg m-auto" type="button">Tarik Siss....</a>
	    </div>
    <?php endif ?>


	

<?= $this->endSection() ?>