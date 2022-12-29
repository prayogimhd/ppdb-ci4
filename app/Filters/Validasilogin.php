<?php

namespace App\Filters;

use CodeIgniter\HTTP\RequestInterface;
use CodeIgniter\HTTP\ResponseInterface;
use CodeIgniter\Filters\FilterInterface;

class Validasilogin implements FilterInterface
{
    public function before(RequestInterface $request, $arguments = null)
    {
        if (!session('login')) {
            return redirect()->to('/auth/login');
        }
    }

    //--------------------------------------------------------------------

    public function after(RequestInterface $request, ResponseInterface $response, $arguments = null)
    {
        //     if (session()->get('userlevelid') == 2) {
        //         return redirect()->to('/menumahasiswa');
        //     }
    }
}
