<?php
defined('BASEPATH') or exit('No direct script access allowed');

class M_Event extends CI_Model
{
    public function getDataEvent()
    {
        $data = $this->db->query("SELECT * FROM event");
        return $data->result_array();
    }

    public function getEventById($event_id)
    {
        $data = $this->db->get_where('event', array('id_event' => $event_id));
        return $data->row_array();
    }

    public function InsertDataEvent($data)
    {
        $this->db->insert('event', $data);
    }

    
}
