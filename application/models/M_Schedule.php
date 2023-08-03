<?php
defined('BASEPATH') or exit('No direct script access allowed');

class M_Schedule extends CI_Model
{
   
    public function getDataSchedule()
    {
        $data = $this->db->query("SELECT event.id_event, event.nama_event, event.deskripsi_event, event.gambar_iklan, eventschedule.id_schedule, eventschedule.tanggal_event, eventschedule.lokasi FROM event
        INNER JOIN eventschedule ON event.id_event = eventschedule.id_event;");
    
        // Inisialisasi array untuk mengelompokkan data berdasarkan id_event
        $groupedData = array();
    
        foreach ($data->result_array() as $row) {
            $id_event = $row['id_event'];
            $id_schedule = $row['id_schedule'];
        
            // Check if the event is already in the groupedData array
            if (!isset($groupedData[$id_event])) {
                // Create a new entry for the event
                $groupedData[$id_event] = array(
                    'id_event' => $row['id_event'],
                    'nama_event' => $row['nama_event'],
                    'deskripsi_event' => $row['deskripsi_event'],
                    'gambar_iklan' => $row['gambar_iklan'],
                    'schedules' => array(), // Array to store schedules for this event
                    'lokasi' => array() // Array to store unique locations for this event
                );
            }
        
            // Add the location to the event's unique locations
            if (!in_array($row['lokasi'], $groupedData[$id_event]['lokasi'])) {
                $groupedData[$id_event]['lokasi'][] = $row['lokasi'];
            }
        
            // Add the schedule to the event's schedules
            $groupedData[$id_event]['schedules'][] = array(
                'id_schedule' => $id_schedule,
                'tanggal_event' => $row['tanggal_event'],
                'lokasi' => $row['lokasi']
            );
        }
    
        return $groupedData;
    }
           
    

    public function getSchedulesByEventId($id_event)
    {
        $this->db->where('id_event', $id_event);
        $data = $this->db->get('eventschedule');
        return $data->result_array();
    }

 
    public function getSchedulesByDate($date)
    {
        $this->db->where('tanggal_event', $date);
        $data = $this->db->get('eventschedule');
        return $data->result_array();
    }
}
