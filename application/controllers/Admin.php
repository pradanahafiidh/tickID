<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin extends CI_Controller {

	/**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 * 		http://example.com/index.php/welcome
	 *	- or -
	 * 		http://example.com/index.php/welcome/index
	 *	- or -
	 * Since this controller is set as the default controller in
	 * config/routes.php, it's displayed at http://example.com/
	 *
	 * So any other public methods not prefixed with an underscore will
	 * map to /index.php/welcome/<method_name>
	 * @see https://codeigniter.com/userguide3/general/urls.html
	 */

     public function __construct()
     {
         parent::__construct();
         $this->load->model('M_Event');
         $this->load->model('M_Schedule');
         $this->load->model('M_Seat');
     }
	public function Dashboard()
	{
        $DATA ['dataSchedule'] = $this->M_Schedule->getDataSchedule();
        $this->load->view('dashboard', $DATA);
	}

    public function DataEvent()
	{
        $DATA['dataEvent'] = $this->M_Event->getDataEvent();
        $this->load->view('dataEvent', $DATA);
	}

    public function EventDetail($event_id)
    {
        $data['event'] = $this->M_Event->getEventById($event_id);
        $data['schedules'] = $this->M_Schedule->getSchedulesByEventId($event_id);
        $this->load->view('eventDetail', $data);
    }

    public function AksiInsertEvent()
    {
        $nama_event = $this->input->post('nama_event');
        $deskripsi_event = $this->input->post('deskripsi_event');
    
        // Upload gambar_iklan
        $config['upload_path'] = './uploads/';
        $config['allowed_types'] = 'jpg|jpeg|png';
        $config['max_size'] = 0;
    
        $this->load->library('upload', $config);
    
        if (!$this->upload->do_upload('gambar_iklan')) {
            $error = $this->upload->display_errors();
            // Menampilkan pesan error jika upload gagal
            echo $error;
        } else {
            $upload_data = $this->upload->data();
            $gambar_iklan = $upload_data['file_name'];
    
            // Upload gambar_deskripsi
            $config['file_name'] = 'gambar_deskripsi'; // Set a specific file name for gambar_deskripsi
            $this->upload->initialize($config);
    
            if (!$this->upload->do_upload('gambar_deskripsi')) {
                $error = $this->upload->display_errors();
                // Menampilkan pesan error jika upload gagal
                echo $error;
            } else {
                $upload_data = $this->upload->data();
                $gambar_deskripsi = $upload_data['file_name'];
                    
                            $data = array(
                                'nama_event' => $nama_event,
                                'deskripsi_event' => $deskripsi_event,
                                'gambar_iklan' => $gambar_iklan,
                                'gambar_deskripsi' => $gambar_deskripsi,
                              
                            );
                        }
                    }
                    

    
                $this->M_Event->InsertDataEvent($data, 'event');
                redirect(base_url('DataEvent'));
            }

    public function dataSchedule()
    {
        $this->load->view('dataSchedule');
    }
    
    public function bookingSeat()
{
    $selectedDate = $this->input->get('date');
    $event_id = $this->input->get('event_id');

    $data['event'] = $this->M_Event->getEventById($event_id);
    $data['schedules'] = $this->M_Schedule->getSchedulesByDate($selectedDate);
    $data['schedules'] = $this->M_Schedule->getSchedulesByEventId($event_id);

    if (!empty($data['schedules'])) {
        // Get the first schedule's date from the schedules array
        $selectedDate = $data['schedules'][0]['tanggal_event'];
    } else {
        // If no schedules found, set the selectedDate to an empty string or a default value
        $selectedDate = '';
    }


    $data['selectedDate'] = $selectedDate;

    $data['dataseat'] = $this->M_Seat->getDataSeat();
    $this->load->view('bookingSeat', $data);
}

public function personalInfo()
{
    // Retrieve form data from the POST request
    $event_id = $this->input->post("event_id");
    $id_schedule = $this->input->post("id_schedule");
    $id_seat = $this->input->post("id_seat");
    $quantity = $this->input->post("quantity");

    // Create an associative array to hold the form data
    $data = array (
        "event_id" => $event_id,
        "id_schedule" => $id_schedule,
        "id_seat" => $id_seat,
        "quantity" => $quantity
    );

    // Now you can process the form data as needed, such as saving it to a database or sending it via email.
    // Example: Saving the data to the database using a model
    $this->load->model('M_Seat'); 
    $this->M_Seat->saveBookingData($event_id, $id_schedule, $id_seat, $quantity);

    // Load the "personalInfo" view and pass the data array to the view
    $this->load->view('personalInfo', $data);
}



    
}