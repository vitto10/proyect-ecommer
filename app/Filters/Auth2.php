<?php 
namespace App\Filters;
use CodeIgniter\HTTP\RequestInterface;
use CodeIgniter\HTTP\ResponseInterface;
use CodeIgniter\Filters\FilterInterface;

class Auth2 implements FilterInterface 
{
    public function before(RequestInterface $request, $arguments = null) {
        // si el usuario esta logeado
        if(session()->get('isLoggedIn')) {
            // se lo redirecciona al login
            return redirect()->to('/'); 
        }
    }
    public function after(RequestInterface $request, ResponseInterface $response, $arguments = null) {
    // Do something here
    }
}