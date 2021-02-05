<?php namespace App\Controllers;

class adminController extends BaseController
{
	protected $adminModel, $userModel, $balanceModel, $session;

	public function __construct()
	{
		$this->userModel = new \App\Models\userModel();
		$this->adminModel = new \App\Models\adminModel();
		$this->balanceModel = new \App\Models\balanceModel();
		$this->session = \Config\Services::session();
	} 

	public function index()
	{

		if(!$this->validate([
			'uname' => [
				'rules' => 'required',
				'errors' =>[
					'required'=>'Username harus diisi!'
				]
			]

		])){
			$validation =  \Config\Services::validation();
			return redirect()-> to()->withInput()->with('validation', $validation);
		}


		$uname = $this->request->getVar('uname');
		$pass = $this->request->getVar('pass');
		$passHash = password_hash($pass, PASSWORD_DEFAULT);

		$admin = $this->adminModel->where('uname', ['uname'=>$uname])->first();
		if($admin != null){	
			$user = $admin['uname'];
			$getPass = $admin['pass'];	
		}

		if($admin){
			if(password_verify($pass, $getPass)){
				echo "Login berhasil!";
				$this->session->set('login', true);

				$this->session->setFlashdata('universalMessage', 'Berhasil login!');
				return redirect()->to('/');
			}else{
				$this->session->setFlashdata('universalFailed', 'Password tidak cocok dengan username!');
				return redirect()->to('/');
			}
		}else{
			$this->session->setFlashdata('universalFailed', 'Username salah!');
			return redirect()->to('/');
		}

		

		// $data = [
		// 		'title' => 'Index',
		// 		'users' => $users
		// ];

		// // dd($data);
		
		// return view('userViews/index', $data);

	}

	public function update($id){

		$stock = $this->request->getVar('stock');
		$drinkName = $this->request->getVar('drinkName');

		$data = [
				'stock' => $stock,
				'drinkName' => $drinkName
		];

		$this->userModel->save([

			'id' => $id,
			'stock' => $stock

		]);

		$this->session->setFlashdata('universalMessage', 'Stok berhasil diupdate!');
		return redirect()->to("/");


	}

	public function wd(){

		$balanceModel = $this->balanceModel;
		

		$data = [
			'buy' => 0
		];

		$balanceModel->save([
			'id' => 1,
			'balance' => 0
		]);

		$wd = $balanceModel->findColumn('balance')[0];

		$this->userModel->update([1, 2, 3, 4, 5], $data);
		
		$this->session->setFlashdata('withdraw', $wd);
		return redirect()->to("/");
	}

	public function logout(){
		$this->session->remove('login');

		$this->session->setFlashdata('universalMessage', 'Berhasil logout!');
		return redirect()->to('/');
	}


}
