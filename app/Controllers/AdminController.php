<?php

namespace App\Controllers;

/*use CodeIgniter\Controller;
use BaconQrCode\Common\Mode;
use BaconQrCode\Writer\PngWriter;
use BaconQrCode\Encoder\QrCode;
use BaconQrCode\Common\ErrorCorrectionLevel;
use BaconQrCode\Common\Version;
use BaconQrCode\Matrix\ByteMatrix;*/

use App\Models\CustomerModel;
use App\Models\UserModel;
use App\Models\UserModelEdicion;
use App\Models\ProfessionModel;
use App\Models\LevelModel;
use Dompdf\Dompdf;

require_once 'app/Libraries/BaconQrCode/Png.php';
require_once 'app/Libraries/BaconQrCode/Common/Mode.php';
require_once 'app/Libraries/BaconQrCode/Common/ErrorCorrectionLevel.php';
require_once 'app/Libraries/BaconQrCode/Common/Version.php';
require_once 'app/Libraries/BaconQrCode/Encoder/Encoder.php';
require_once 'app/Libraries/BaconQrCode/Encoder/ByteMatrix.php';
require_once 'app/Libraries/BaconQrCode/Encoder/Encoder.php';
require_once 'app/Libraries/BaconQrCode/Encoder/MatrixUtil.php';
require_once 'app/Libraries/BaconQrCode/Encoder/QrCode.php';

use BaconQrCode\Common\Mode;
use BaconQrCode\Common\ErrorCorrectionLevel;
use BaconQrCode\Common\Version;
use BaconQrCode\Encoder\ByteMatrix;
use BaconQrCode\Encoder\QrCode;
use BaconQrCode\Encoder\Writer\Png;
//require_once APPPATH . 'vendor/autoload.php';
//use Endroid\QrCode\QrCode;


class AdminController extends BaseController
{
    public $session=null;
	public function __construct(){
       
		helper('form');
		$this->session= \Config\Services::session();
	}
    public function generarQR()
    {
     // Configurar el modo, nivel de corrección de errores y versión
    $mode = Mode::create(Mode::NUMERIC);
    // Asegúrate de pasar el valor entero del modo
    $errorCorrectionLevel = ErrorCorrectionLevel::getL();
    // Obtener la versión adecuada
    $version = Version::getVersionForNumber(1); // Ejemplo: aquí se elige la versión 1, debes elegir la versión adecuada para tu caso

    // Crear un objeto ByteMatrix con el ancho y alto adecuados
    $byteMatrix = new ByteMatrix($version->getDimensionForVersion(), $version->getDimensionForVersion());

    // Crear el código QR
    $qrCode = new QrCode($mode, $errorCorrectionLevel, $version, -1, $byteMatrix);

    // Configurar el renderer (por ejemplo, Png)
    $renderer = new Png(400); // Suponiendo que tienes una clase llamada PngRenderer para renderizar el código QR en formato PNG

    // Personalizar el diseño del código QR
    $renderer->setForegroundColor('rgb(255, 255, 255)'); // Establecer el color de los módulos activos
    $renderer->setBackgroundColor('rgb(255, 255, 255)'); // Establecer el color de los módulos inactivos
    $renderer->setModuleSize(5); // Establecer el tamaño de los módulos
    // Otras opciones de personalización según lo permita la biblioteca que estés utilizando

    // Renderizar el código QR en una imagen
    // Renderizar el código QR en una imagen y obtener los datos de la imagen
$imageData = $renderer->render($qrCode);

// Guardar los datos de la imagen en un archivo
$file = 'C:/Users/fabia/Downloads/qrcod.png';
file_put_contents($file, $imageData);

// Devolver la vista con la ruta de la imagen o los datos de la imagen
// Dependiendo de cómo desees mostrarla en la vista QRView
return view('QRView', ['imageData' => $imageData]);
    }
    public function descargarQR()
    {
        $tempFile = $this->request->getVar('file');
        $filename = 'qrcode.png';
    
        return $this->response->download($tempFile, null)->setFileName($filename);
    }

    public function generarJSON()
{

$userModel = new UserModel();
$datos = $userModel->listarUsers();

$levelModel = new LevelModel();
$professionModel = new ProfessionModel();

foreach ($datos as $dato) {
    
    $level = $levelModel->find($dato->fkLevel);
    $dato->fkLevel = $level ? $level['level'] : '';

    $profession = $professionModel->find($dato->fkProfession);
    $dato->fkProfession = $profession ? $profession['Profession'] : '';

    $dato->status = $dato->status ? 'Activo' : 'Inactivo';
    $dato->locked = $dato->locked ? 'Desbloqueado' : 'Bloqueado';
    $dato->inSession = $dato->inSession ? 'Iniciado' : 'Desactivado';
}

$jsonString = json_encode($datos, JSON_PRETTY_PRINT);

return view('JSONView', ['jsonString' => $jsonString]);
}

    public function generarXML()
    {
    $userModel = new UserModel();
    $datos = $userModel->listarUsers();

    $xml = new \SimpleXMLElement('<users></users>');

    foreach ($datos as $dato) {
        $user = $xml->addChild('customer');
        $user->addChild('pkUser', $dato->pkUser);
        $user->addChild('fkPhone', $dato->fkPhone);
        
        $levelModel = new LevelModel();
        $level = $levelModel->find($dato->fkLevel);
        $user->addChild('fkLevel', $level ? $level['level'] : '');

        $professionModel = new ProfessionModel();
        $profession = $professionModel->find($dato->fkProfession);
        $user->addChild('fkProfession', $profession ? $profession['Profession'] : '');

        $user->addChild('status', $dato->status ? 'Activo' : 'Inactivo');
        $user->addChild('locked', $dato->locked ? 'Desbloqueado' : 'Bloqueado');
        $user->addChild('inSession', $dato->inSession ? 'Iniciado' : 'Desactivado');
        $user->addChild('create_Ad', $dato->create_ad);
    }

    $xmlString = $xml->asXML();

    return view('XMLView', ['xmlString' => $xmlString]);
    }

    public function index()
    {
        
        $datos = [];
        $professions = [];
        $levels = [];

if ($this->session->has('user') && $this->session->has('tipo') && $this->session->get('tipo') == 1) {
    $professionModel = new ProfessionModel();
    $professions = $professionModel->findAll();

    $levelModel = new LevelModel();
    $levels = $levelModel->findAll();

    $userModel = new UserModel();
    $datos = $userModel->listarUsers();

    $userModel = new UserModel();
    $users = $userModel->findAll();
    
    echo view('AdminView', compact('users', 'professions', 'datos', 'levels'));
} else {
   
    return view('welcome_message');
}
        
    }

    private function decryptPassword($password) {
       
        return $password; 
    }
    public function demoPDF(){
        $userModel = new UserModel();
$datos = $userModel->listarUsers();
$logoPath = realpath(APPPATH . 'images/logo-isc.png');

$html = '<style>
    .table {
        width: 100%;
        border-collapse: collapse;
    }
    .table th, .table td {
        border: 1px solid #dddddd;
        padding: 8px;
    }
    .table th {
        background-color: #3413934;
    }
    .logo img {
        width: 500px; /* Ajusta el tamaño del logo */
        height: auto;
    }
    .table tr:nth-child(even) {
        background-color: #7B68EE ; /* Cambia el color de fondo de las filas pares */
    }
</style>';

$html .= '<h1>Datos de los Usuarios del sistema</h1>'; 

$html .= '<div class="logo"><img src="' . $logoPath . '" alt="Logo"></div>'; 
$html .= '<table class="table table-hover table-bordered">';
$html .= '<tr>';
$html .= '<th>pkUser</th>';
$html .= '<th>fkPhone</th>';
$html .= '<th>fkLevel</th>';
$html .= '<th>fkProfession</th>';
$html .= '<th>status</th>';
$html .= '<th>locked</th>';
$html .= '<th>inSession</th>';
$html .= '<th>create_Ad</th>';
$html .= '</tr>';
foreach($datos as $key) {
    $levelModel = new LevelModel();
    $level = $levelModel->find($key->fkLevel);
    
    $professionModel = new ProfessionModel();
    $profession = $professionModel->find($key->fkProfession);

    $html .= '<tr>';
    $html .= '<td>' . $key->pkUser . '</td>';
    $html .= '<td>' . $key->fkPhone . '</td>';
    $html .= '<td>';
    if ($level) {
        $html .= $level['level'];
    } else {
        $html .= $key->fkLevel;
    }
    $html .= '</td>';
    $html .= '<td>';
    if (isset($profession)) {
        $html .= $profession['Profession'];
    } else {
        $html .= $key->fkProfession;
    }
    $html .= '</td>';
    $html .= '<td class="' . ($key->status ? 'text-success' : 'text-danger') . '">' . ($key->status ? 'Activo' : 'Inactivo') . '</td>';
    $html .= '<td class="' . ($key->locked ? 'text-success' : 'text-danger') . '">' . ($key->locked ? 'Desbloqueado' : 'Bloqueado') . '</td>';
    $html .= '<td class="' . ($key->inSession ? 'text-success' : 'text-danger') . '">' . ($key->inSession ? 'Iniciado' : 'Desactivado') . '</td>';
    $html .= '<td>' . $key->create_ad . '</td>';
    $html .= '</tr>';
}

$html .= '</table>';
 
 $dompdf = new Dompdf();

 $dompdf->loadHtml($html);

 $dompdf->setPaper('A4', 'portrait');

 $dompdf->render();

 $dompdf->stream('StatusUsuarios.pdf');
    }
    public function crearUser(){
        $datos = [
            "pkUser"   => $_POST['pkUser'],
            "fkPhone"      => $_POST['fkPhone'],
            "password" => password_hash($_POST['password'], PASSWORD_DEFAULT), 
            "fkLevel"  => $_POST['level'],
            "fkProfession"  => $_POST['profession'],
            "locked"  => $_POST['locked'],
            "inSession"  => $_POST['inSession'],
        ];
        
        $userModel = new UserModel();
        $respuesta = $userModel->insertarUser($datos);
    
        if ($respuesta > 0) {
            return redirect()->to(base_url('type/admin'));
        } else {
            return redirect()->to(base_url('type/admin'));
        }
    }
    public function actualizarUser(){
$professionModel = new ProfessionModel();
$professions = $professionModel->findAll();

$levelModel = new LevelModel();
$levels = $levelModel->findAll();
        $datos = [
            "pkUser"   => $_POST['pkUser'],
            "fkPhone"      => $_POST['fkPhone'],
            "password" => $_POST['password'],
            "fkLevel"  => $_POST['level'],
            "fkProfession"  => $_POST['profession'],
            "status"  => $_POST['status'],
            "locked"  => $_POST['locked'],
            "inSession"  => $_POST['inSession']
        ];
        $pkUser = $_POST['pkUser'];
        $userModelEdicion = new UserModelEdicion();
        $respuesta = $userModelEdicion->actualizarUser($datos,$pkUser);
        if ($respuesta) {
            return redirect()->to(base_url('type/admin'));
        } else {
            return redirect()->to(base_url('type/admin'));
        }
        
    }
    public function obtenerUserNameUser($pkUser){
    $datos = ["pkUser" => $pkUser];
    $userModelEdicion = new UserModelEdicion();
    $levelModel = new LevelModel();
    $professionModel = new ProfessionModel();
    $respuesta = $userModelEdicion->obtenerUserNameUser($datos);
    $professions = $professionModel->findAll();
    $levels = $levelModel->findAll();
    $datos = [
        'tittle'  => 'Vista de Edicion',
        "datos" => $respuesta,
        'levels' => $levels,
        'professions' => $professions,
    ];
    return view('ActualizarUser', $datos);
       
    }
    public function eliminarUser($pkUser){
        $userModel = new UserModel();
        $data = ["pkUser" => $pkUser];
        $respuesta = $userModel->eliminarUser($data);
    
        if ($respuesta) {
            return redirect()->to(base_url('type/admin'));
        } else {
            return redirect()->to(base_url('type/admin'));
        }
    }
}