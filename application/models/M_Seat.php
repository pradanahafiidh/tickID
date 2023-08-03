<?php
defined('BASEPATH') or exit('No direct script access allowed');

class M_Seat extends CI_Model
{
    public function getDataSeat()
    {
        $data = $this->db->query("SELECT * FROM eventseat");
        return $data->result_array();
    }

    public function saveBookingData($id_event, $id_schedule, $id_seat, $quantity)
    {
        // Perform database insert or update operations to save the form data
        // Replace the following lines with your actual database handling code
        $data = array(
            'id_event' => $id_event,
            'id_schedule' => $id_schedule,
            'id_seat' => $id_seat,
            'quantity' => $quantity,
        );

        // Example: Assuming you have a table named "booking_data" in your database
        $this->db->insert('orders', $data);
    }
}
