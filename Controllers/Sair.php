<?php

namespace App\Controllers;

class Sair extends BaseController
{
	public function index()
	{
        session()->destroy();
		return redirect()->to('/');
    }

}