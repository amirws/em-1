<?php
namespace Micrositio\Controller;

use Zend\Mvc\Controller\AbstractActionController;
use Zend\View\Model\ViewModel;
use Micrositio\Model\Entity\Usuario;
use Zend\Db\ResultSet\ResultSet;
use Zend\Db\Sql\Sql;
use Zend\Db\Adapter\Adapter;
use Micrositio\Controller\BMEAPI; 
use Zend\Mail;
use Micrositio\Model\Entity\LoginUser as LoginService;
use Zend\Math\Rand;

class UsuarioController extends AbstractActionController {
public $dbAdapter;
public $login;
	public function indexAction(){
		$vista = new ViewModel();
		$this->layout('layout/simple');
		return  $vista;
	}
	public function nuevoAction(){
		$this->dbAdapter=$this->getServiceLocator()->get('Zend\Db\Adapter');
		$email= $this->request->getPost('email');
		$password=$this->request->getPost('password');
		$repeatPassword = $this->request->getPost('repeatPassword');
		$usuarios=$this->dbAdapter->query("SELECT * FROM usuario where email='$email' limit 1", Adapter::QUERY_MODE_EXECUTE);
		foreach ($usuarios as $user) {
			$email_exist=$user['email'];
		}
		if (!@ereg("^[a-zA-Z0-9_\.\-]+@[a-zA-Z0-9\-]+\.[a-zA-Z0-9\-\.]",$email)) {
			$mensaje='Tu correo electrónico es inválido.';
			$status=0;
		}
		elseif ($password<>$repeatPassword || strlen($password)<5) {
			$mensaje='Tu contraseña no coincide o es muy corta';
			$status=0;
		}
	
		elseif (@$email_exist==$email) {
			$mensaje='La cuenta de correo ya existe';
			$status=0;
		}
		else {
			$add = new Usuario($this->dbAdapter);
			$string = Rand::getString(32,'abcdefghijklmnopqrstuvwxyz', true);
			$datos=array(
				'email'=>$email,
				'contrasena'=>$password,
				'verificado'=>'no',
				'cod'=>$string
				);
			$add->addUser($datos);
			$usuario=$add->getUserEmail($email);
			$mail = new Mail\Message();
			$base=base64_encode($email);
			$mail->setBody('¡Gracias por registrarte!. Para gozar de todos los beneficios es necesario que valides tu cuenta de correo electrónico en el siguiente enlace <a href="'.$this->getRequest()->getBaseUrl().'/usuario/validar/'.$usuario[0]['id_usuario'].'/'.$usuario[0]['cod'].'">Validar Cuenta</a><br><br><img src="'.$this->getRequest()->getBaseUrl().'/img/empresasveracruz2.png">');
			$mail->setFrom('info@empresasveracruz.com.mx', 'Directorio EmpresasVeracruz');
			$mail->addTo($email);
			$mail->setSubject('Bienvenido a EmpresasVeracruz');

$transport = new Mail\Transport\Sendmail();
$transport->send($mail);
$mensaje="Registrado, por favor revisa tu bandeja de entrada para validar tu cuenta.";
$status=200;
			
		}
		$vista = new ViewModel(array(
			'mensaje'=>$mensaje,
			'status'=>$status));
			$this->layout('layout/ajax');
		return  $vista;
	}

	public function validarAction(){
		$this->dbAdapter=$this->getServiceLocator()->get('Zend\Db\Adapter');
		$email= $this->params()->fromRoute('pagina',0);
		$email=base64_decode($email);
		$validar = new Usuario($this->dbAdapter);
		if ($email!=null){
			$datos=array(
				'verificado'=>'si'
				);
			$validar->validarEmail($email, $datos);
			@$user = $validar->getUserEmail($email);
			foreach ($user as $us) {
			$email=$us['email'];
			$verificado=$us['verificado'];
			$username=$us['us'];
			}
		}
		else {
		$verificado='';
		}
		$vista = new ViewModel(array(
			'verificado'=>@$verificado,
			'email'=>$email,
			'username'=>$username));
			$this->layout('layout/simple');
		return  $vista;
	}
	public function updateuserAction(){
		$this->dbAdapter=$this->getServiceLocator()->get('Zend\Db\Adapter');
		$username= htmlentities($this->request->getPost('username'));
		$email= $this->request->getPost('email');
		$nombre=htmlentities($this->request->getPost('nombre'));
		$direccion=$this->request->getPost('direccion');
		$buscar=new Usuario($this->dbAdapter);
		$username_s=$buscar->getUserUsername($username);
		  foreach ($username_s as $result) {
    		$username_search=$result['us'];
  }
		if (@$username_search==null){
		if($username==''){
			$mensaje="porfavor elige un nombre de usuario";
		}
		elseif(strlen($username)<5){
			$mensaje="Nombre de usuario muy corto.";
		}
		elseif (!@ereg("^[a-zA-Z0-9_\-]+$",$username)) {
			$mensaje="Nombre de usuario inválido, solo caracteres alfanuméricos.";
		}
		elseif($nombre==''){
			$mensaje='Escribe tu nombre completo. Esta información no será visible.';
		}
		elseif(!@ereg("^[a-zA-Z]+ [a-zA-Z]",$nombre)){
			$mensaje="Nombre Incompleto. Ejemplo: Juan Pérez Rodriguez";
		}
		elseif($direccion==''){
			$mensaje="Escribe tu dirección";
		}
		else {
			$datos=array('nombre'=>$nombre,
				'direccion'=>$direccion,
				'us'=>$username);
			$actualizar=$buscar->validarEmail($email, $datos);
			$username_s=$buscar->getUserUsername($username);
		  foreach ($username_s as $result) {
    		$password=$result['contrasena'];
  			}
			$this->login = new LoginService($this->dbAdapter, 'usuario', 'us', 'contrasena');
			$this->login->login($username, $password);
			$mensaje="<span class='ui-icon ui-icon-circle-check' style='float:left; margin:0 7px 50px 0;'></span>Datos actualizados correctamente";
			$status=200;
		}

	}
	elseif($username_search!=null) {
		$mensaje="usuario ya existe. Porfavor elige otro nombre de usuario.";
	}
	else {

	}
		$vista = new ViewModel(array('mensaje'=>$mensaje,
			'status'=>@$status));
		$this->layout('layout/ajax');
		return  $vista;
	}
	public function logoutAction(){
		$this->dbAdapter=$this->getServiceLocator()->get('Zend\Db\Adapter');
		$this->login = new LoginService($this->dbAdapter);
        $this->login->logout();
        session_destroy();
        $this->redirect()->toUrl('http://www.empresasveracruz.com.mx/acceso_clientes');
	}
}