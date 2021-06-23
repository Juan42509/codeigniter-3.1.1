<?php

class UsuarioModel extends CI_Model{

    public function __construct(){
        $this->load->database();
    }

    public function insertUsuarios($data){

        $datos = array(
            'nombre' => $data['nombre'],
            'apellidos' => $data['apellidos'],
            'email' => $data['email'],
            'password' => $data['password'],
            'rol' => 'user'
        );
        
        $datos = $this->db->insert('usuarios',$datos);

    }

    public function login($data){

        $query = $this->db->get_where('usuarios', array('email' => $data['email']));
        return $query->result();
    }

    public function editar_usuario($data){
        //Se hace el where para actualizar el registro que se desea
        $this->db->where('id', $data['id']);
        //Se hace el update a la tabla con los datos enviados
        $this->db->update('usuarios', $data);
    }



}