<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

    <link rel="stylesheet" type="text/css" href="css/style.css">

    <title><?= $title ?></title>
  </head>
  <body>

  	<?= view('userViews/navbar') ?>

  	<div class="container">
  		
  		<?= $this->renderSection('content') ?>
  	
  	</div>

  	<?= view('userViews/footer') ?>


    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>

    <script>
  		
  		const flashData = $('.flash-data').data('flashdata');
  		const universalMessage = $('.flash-data-universal').data('flashdata');
  		const universalFailed = $('.flash-data-universal-failed').data('flashdata');
  		const flashDataFailed = $('.flash-data-failed').data('flashdata');
  		const withdraw = $('.flash-data-wd').data('flashdata');


  		if(flashData){
  			Swal.fire({
			  icon: 'success',
			  title: 'Berhasil!',
			  text: 'Pembelian Berhasil!',
			  footer: 'Uang kembalian kamu Rp. '+flashData
			})
  		}

  		if(withdraw){
  			Swal.fire({
			  icon: 'success',
			  title: 'Berhasil Withdraw!',
			  text: 'Tarik saldo sebesar Rp. '+withdraw+' berhasil!'
			})
  		}

  		if(universalMessage){
  			Swal.fire({
			  icon: 'success',
			  title: 'Berhasil!',
			  text: universalMessage
			})
  		}

  		if(flashDataFailed){
  			Swal.fire({
			  icon: 'warning',
			  title: 'Gagal!',
			  text: 'Uang kamu tidak cukup!',
			  footer: 'Uang yang kamu masukan Rp. '+flashDataFailed
			})
  		}

  		if(universalFailed){
  			Swal.fire({
			  icon: 'warning',
			  title: 'Gagal!',
			  text: universalFailed
			})
  		}

  		let id;

  		$('.clickbuy').click(function(){
  			id = $(this).data('id');

  		});

  		function buy(nominal){
  			
  			let balance = document.getElementById(`liveBalance${id}`);
  			balance.value = parseInt(balance.value)+parseInt(nominal)

  		}

  	</script>

  </body>
</html>