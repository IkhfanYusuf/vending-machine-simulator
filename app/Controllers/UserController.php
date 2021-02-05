<?php namespace App\Controllers;

class userController extends BaseController
{
	protected $userModel, $session;

	public function __construct()
	{
		$this->userModel = new \App\Models\userModel();
		$this->session = \Config\Services::session();
	
	} 

	public function index()
	{

		$users = $this->userModel->findAll();

		$data = [
				'title' => 'Index',
				'users' => $users,
				'validation' => \Config\Services::validation()
		];

		return view('userViews/index', $data);
	}

	public function view($id){

		$users = $this->userModel->find($id);

		$data = [
				'title' => 'Bayar',
				'users' => $users
		];

		// dd($data);
		
		return view('userViews/view', $data);
	}

	public function update($id){

		$session = \Config\Services::session();

		$price = (int)$this->request->getVar('price');
		$balance = (int) $this->request->getVar('balance');
		// $total = (int) $this->request->getVar('total');


		// dd($change, $balance, $total);

		if($balance<$price){

			session()->setFlashData('failedMessage', $balance);
			return redirect()-> to("/");
	
		}else if($balance>10000){
				session()->setFlashData('universalFailed', "Terlalu banyak! Uang yang kamu masukan lebih dari Rp. 10000! transaksi dibatalkan.");
				return redirect()-> to("/");
		};

		$this->userModel->save([
			'id' => $id,
			'buy'=> $this->request->getVar('buy')+1,
			'stock' => $this->request->getVar('stock')-1
		]);

			$change = $balance-($price);

			if($change == 7000){
				$change =$change."! 1 lembar Rp.5000 + 1 lembar Rp.2000.";
			}
			else if($change == 6000){
				$change =$change."! 1 lembar Rp.5000 + 1 keping Rp.1000.";
			}
			else if($change == 5000){
				$change =$change."! 1 lembar Rp.5000";
			}
			else if($change == 4000){
				$change =$change."! 2 lembar Rp.2000.";
			}
			else if($change == 3000){
				$change =$change."! 1 lembar Rp.2000 + 1 keping Rp.1000.";
			}
			else if($change == 2000){
				$change =$change."! 1 lembar Rp.2000.";
			}
			else if($change == 0){
				$change =$change." ";
			}


		session()->setFlashData('message', $change);

		return redirect()-> to("/");

	}

}
