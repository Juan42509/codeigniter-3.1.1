<?php

class MensajesModel extends CI_Model{

    public function __construct(){
        $this->load->database();
    }

    public function AllMensajes(){
        $query = $this->db
        ->query("SELECT CONCAT(u.nombre,' ',u.apellidos) AS 'nombre',m.id, m.usuario_id, m.titulo, m.descripcion, m.fecha
        FROM mensajes m
        INNER JOIN usuarios u ON m.usuario_id = u.id");

        return $query->result();
    }

    public function insertEntradas($data){
        $datos = array(
            'usuario_id' => $data['usuario_id'],
            'titulo' => $data['titulo'],
            'descripcion' => $data['descripcion'],
        );
        
        $datos = $this->db->insert('mensajes',$datos);
    }

    public function ObtenerMensaje($data){
        
        $query = $this->db->get_where('mensajes', array('id' => $data['id']));

        return $query->result();
    }

    public function editar_Mensaje($datos){
        //Se hace el where para actualizar el registro que se desea
        $this->db->where('id', $datos['id']);
        //Se hace el update a la tabla con los datos enviados
        $this->db->update('mensajes', $datos);
    }

    public function eliminar_mensaje($data){

        $this->db->delete('mensajes', array('id' => $data['id']));
    }

    public function buscarMensaje($data){

        $buscar = $data['buscar'];
        $query = $this->db->query("SELECT CONCAT(u.nombre,' ',u.apellidos) AS 'nombre',m.id, m.usuario_id, m.titulo, m.descripcion, m.fecha
        FROM mensajes m
        INNER JOIN usuarios u ON m.usuario_id = u.id
        WHERE m.titulo LIKE '%$buscar%'");

        return $query->result();
    }
}