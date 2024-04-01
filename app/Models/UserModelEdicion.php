<?php
    namespace App\Models;
    use CodeIgniter\Model;
    

    class UserModelEdicion extends Model{
        public function listarUsers(){
            $username = $this->db->query("SELECT * FROM users");
            return $username->getResult();
           }
           public function insertarUser($data) {
            $username = $this->db->table('users');
            $username->insert($data);
    
            return $this->db->insertID(); 
        }
        public function obtenerUserNameUser($datos){
            $username= $this->db->table('users');
            $username->where($datos);
            return $username->get()->getResultArray();
        }
    
        public function actualizarUser($datos, $pkUser){
            $username = $this->db->table('users');
            $username->set($datos);
            $username->where('pkUser', $pkUser);
            return $username->update();
        }
    
        public function eliminarUser($data){
            $username = $this->db->table('users');
            $username->where($data);
            return $username->delete();
        }
        /*
       public function listarNombres(){
        $username = $this->db->query("SELECT * FROM users");
        return $username->getResult();
       }
       public function insertar($data) {
        $username = $this->db->table('users');
        $username->insert($data);

        return $this->db->insertID(); 
    }

    public function obtenerPhone($data){
        $username= $this->db->table('users');
        $username->where($data);
        $resultado=$username->get()->getRowArray();
    }
      */  
    }
    
?>