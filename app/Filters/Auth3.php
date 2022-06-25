<?php 
namespace App\Filters;
use CodeIgniter\HTTP\RequestInterface;
use CodeIgniter\HTTP\ResponseInterface;
use CodeIgniter\Filters\FilterInterface;

class Auth3 implements FilterInterface 
{
    public function before(RequestInterface $request, $arguments = null) {
        // si el usuario no esta logeado
        if(!session()->get('isLoggedIn') or session()->get('perfil_id') != 2) {
            if (!session()->get('isLoggedIn')){
                // se lo redirecciona al login
                return redirect()->to('/login');
            }
            else {
                // se lo redirecciona al panel
                return redirect()->to('/panel');
            } 
        }
    }
    public function after(RequestInterface $request, ResponseInterface $response, $arguments = null) {
    // Do something here
    }
}