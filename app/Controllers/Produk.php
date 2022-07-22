<?php
namespace App\Controllers;

use App\Models\ProdukModel;
use Config\Services;

class Produk extends BaseController
{
    public function __construct()
      {
         header('Access-Control-Allow-Origin: website_url');
         header("Content-Type: application/json; charset=UTF-8");
         header('Access-Control-Allow-Methods: GET, POST, OPTIONS, PUT, DELETE');
      }

    public function index()
    {
        $produk = new produkModel();
		$data['produk'] = $produk->query("select * from produk")->getResult();
        $header['title']='Data Produk';
        echo view('partials/header',$header);
        echo view('partials/top-menu');
        echo view('produk/dataproduk',$data);
        echo view('partials/footer');
    }

    public function tambahproduk()
	{
        $header['title']='Tambah produk';
        echo view('partials/header',$header);
        echo view('partials/top-menu');        
        echo view('produk/form');
        echo view('partials/footer');
	}

    public function insertproduk()
	{
        $produk = new produkModel();
        $data = [
            'nama_produk' => $this->request->getVar("nama_produk"),
            'kategori' => $this->request->getVar("kategori"),
            'harga' => $this->request->getVar("harga"),
            'status' => $this->request->getVar("status")
            
        ];
        
        $save=$produk->save($data);
        if ($save) {
            session()->setFlashData('success', 'Berhasil '.'success');
		    return redirect()->to(base_url('/produk'));
        }else{
            session()->setFlashData('danger', 'Gagal '.'danger');
		    return redirect()->to(base_url('/produk'));
        }
	}

    public function updateproduk()
	{
        $produk = new produkModel();
        $id   =$this->request->getVar("id_produk");
        $data = [
            'nama_produk' => $this->request->getVar("nama_produk"),
            'kategori' => $this->request->getVar("kategori"),
            'harga' => $this->request->getVar("harga"),
            'status' => $this->request->getVar("status")
            
        ];
        $save=$produk->update($id, $data);
        if ($save) {
            session()->setFlashData('success', 'Berhasil '.'success');
		    return redirect()->to(base_url('/produk'));
        }else{
            session()->setFlashData('danger', 'Gagal '.'danger');
		    return redirect()->to(base_url('/produk'));
        }
	}

    public function deleteproduk($id)
	{
        $produk = new produkModel();
        $data = [
            'id_produk' => $id,
        ];
        $save=$produk->delete($id);
        if ($save) {
            $data = [
                'success' => true,
                'id'      => $id,
            ];

            return $this->response->setJSON($data);
        }else{
            $data = [
                'success' => false,
                'id'      => $id,
            ];

            return $this->response->setJSON($data);
        }
	}

    public function viewproduk($id)
	{
		$produk = new ProdukModel();
        $data['produk'] = $produk->query("select * from produk where id_produk='$id'")->getResult();

        // tampilkan 404 error jika data tidak ditemukan
		if (!$data) {
			throw PageNotFoundException::forPageNotFound();
		}
        $header['title']='Edit produk';
        echo view('partials/header',$header);
        echo view('partials/top-menu');
        
        echo view('produk/edit-form',$data);
        echo view('partials/footer');
	}

    public function getData()
    {
        $produk = new produkModel();
        $datajs = json_decode(file_get_contents(ROOTPATH . 'public/tambahan/data.json'), true);
        $extract=$datajs['data'];
        echo("<pre>");
        $jml =count($extract);
       for ($i=0; $i <=$jml ; $i++) { 
         $data = [
            'nama_produk' => $extract[$i]['nama_produk'],
            'kategori' => $extract[$i]['kategori'],
            'harga' => $extract[$i]['harga'],
            'status' => $extract[$i]['status'],
            
        ];
        $save=$produk->save($data);
       }
        
        echo "done";
        
        
    }
}