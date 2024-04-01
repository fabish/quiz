<?php
    namespace App\Models;
    use CodeIgniter\Model;
    

    class PersonModel extends Model{
public function listarCustomers(){
        $username = $this->db->query("SELECT * FROM persons");
        return $username->getResult();
       }
       public function insertar($data) {
        $username = $this->db->table('persons');
        $username->insert($data);

        return $this->db->insertID(); 
    }
    public function obtenerUserName($datos){
        $username= $this->db->table('persons');
        $username->where($datos);
        return $username->get()->getResultArray();
    }

    public function actualizar($datos, $pkPhone){
        $username = $this->db->table('persons');
        $username->set($datos);
        $username->where('pkPhone', $pkPhone);
        return $username->update();
    }

    public function eliminar($data){
        $username = $this->db->table('persons');
        $username->where($data);
        return $username->delete();
    }

}
?>