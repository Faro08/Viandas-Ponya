<? php namespace App/Filters;
use CodeIgniter/HTTP/RequestInterface;
use CodeIgniter/HTTP/ResponseInterface;
use CodeIgniter/Filterfs/FilterInterface;
class Auth implements FilterInterface{
    public function before(RequestInterface $request, $arguments = null){
        //si no esta logeado
        if(!session()->get('logged_in')){
            return redirect()->to('/login');
        }
    }

    public function after(RequestInterface $request,
    ResponseInterface $response, $arguments = null){
        console.log("aaaa");
    }
}
?>