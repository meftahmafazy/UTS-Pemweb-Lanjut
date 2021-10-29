<?php

namespace App\Filters;

use CodeIgniter\HTTP\RequestInterface;
use CodeIgniter\HTTP\ResponseInterface;
use CodeIgniter\Filters\FilterInterface;

class AuthUser implements FilterInterface
{

    public function before(RequestInterface $request, $arguments = null)
    {
        if (session()->role == "") {
            return redirect()->to('/login/index');
        }
    }

    public function after(RequestInterface $request, ResponseInterface $response, $arguments = null)
    {
        if (session()->role == "pengguna") {
            return redirect()->to('/surat/index');
        }
    }
}
