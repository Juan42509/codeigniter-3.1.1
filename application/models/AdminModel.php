<?php

class AdminModel extends CI_Model{

    public function __construct(){
        $this->load->database();
    }

    public function AllUsers(){
        $query = $this->db->get('Usuarios');

        return $query->result();
    }

    public function OneUser($data){
        $query = $this->db->get_where('usuarios', array('id' => $data['id']));

        return $query->result();
    }

    public function editar_usuario($data){
         //Se hace el where para actualizar el registro que se desea
         $this->db->where('id', $data['id']);
         //Se hace el update a la tabla con los datos enviados
         $this->db->update('usuarios', $data);
    }

    public function eliminar_usuario($data){

        $this->db->delete('usuarios', array('id' => $data['id']));
    }


}