require_once '../Logica/LFamilias.php';
require_once '../Entidades/Familia.php';

$lFamilia = LFamilia();

if(isset($_GET['idfamilia'])) {
    $id = $_GET['idfamilia'];

    $familiaTemp = new Familia($id);
    $familias = $lFamilia->Cargar();
    
}
