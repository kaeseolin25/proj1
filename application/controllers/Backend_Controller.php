<?php
defined ('BASEPATH') OR exit('No direct script access allowed');

class Backend_Controller extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
        $this->load->database();
        $this->load->library(['form_validation']);
        $this->load->library('session');
        $this->load->model('Users_model');
    }
    
    
    public function index ()
    {

        if(isset($_SESSION['user'])){
            redirect(base_url('index.php/dashboard'));
        }

        if (isset($_POST['login_btn'])) {
            $email= $this->input->post('user_email');
            $pw= $this->input->post('user_password');

            $user_data=$this->Users_model->authenticate($email,$pw);

            if($user_data!==0){

                $user_info = [
                    'user_id'=>$user_data[0]->Id,
                    'firstname'=>$user_data[0]->Firstname,
                ];

                $this->session->set_userdata('user',$user_info);
                redirect('dashboard');

            }else{

                $this->session->set_flashdata('msg_login','Invalid Password. Please try again.');
            }
    
        }                  

        $this->load->view('backend/page/login');
    }
   
        public function index2() {
            $this->load->model('Users_model');
            $data['resident'] = $this->Users_model->getResidents();
            $this->load->view('edit_blotter', $data);
        }
        
    

    

    public function action()
{
    // Process the form data
    $name = $this->input->post('name');
    $email = $this->input->post('email');

    // Perform necessary actions with the form data

    // Redirect or display a success message
}
    public function register()
    {
        $this->form_validation->set_rules('firstname', 'First Name', 'trim|required|min_length[2]|max_length[50]');
        $this->form_validation->set_rules('lastname', 'Last Name', 'trim|required|min_length[2]|max_length[50]');
        $this->form_validation->set_rules('email', 'Email', 'trim|required|min_length[2]|max_length[50]');
        $this->form_validation->set_rules('password', 'Password', 'trim|required|min_length[2]|max_length[50]');
        $this->form_validation->set_rules('repeatpass', 'Confirm Password', 'trim|required|matches[password]');
        $this->form_validation->set_error_delimiters('<p style="color:red;">', '</p>');
    
        if ($this->form_validation->run() == FALSE) {
            $this->load->view('backend/page/register');
        }else {
            $admin_data = [
                'firstname' => $this->input->post('firstname', TRUE),
                'lastname' => $this->input->post('lastname', TRUE),
                'email' => $this->input->post('email', TRUE),
                'password' => $this->input->post('password', TRUE),
                'repeatpass' => $this->input->post('repeatpass', TRUE),
            ];
    
        
            $insert = $this->db->insert('admin', $admin_data);

            if ($insert) {
               /* echo $jsCode;*/
                $this->load->view('backend/page/register');
            }
        }
    }

    public function dashboard ()
    { 
        if(!isset($_SESSION['user'])){

            $this->session->set_flashdata('msg_login','Please Login');
            redirect(base_url('index.php/admin'));
        }
    

        $this->load->view('backend/include/header');
        $this->load->view('backend/include/nav');
        $this->load->view('backend/page/dashboard');
        $this->load->view('backend/include/footer');
    }

    public function logout()
{
    $this->session->unset_userdata('user'); // Assuming 'logged_in' is the session variable that indicates a user is logged in
    redirect('admin'); // Redirect to the login page or any other desired page
}
    public function add_resident(){
        
        if(!isset($_SESSION['user'])){
            $this->session->set_flashdata('msg_login','You are not logged in. Please Login First');
            redirect(base_url('index.php/admin'));
        }


        $this->form_validation->set_rules('first_name','First Name','trim|required|min_length[2]|max_length[50]');
        $this->form_validation->set_rules('middle_name','Middle Name','trim|required|min_length[2]|max_length[50]');
        $this->form_validation->set_rules('last_name','Last Name','trim|required|min_length[2]|max_length[50]');
        $this->form_validation->set_rules('birth_date','Birth Date','trim|required');
        $this->form_validation->set_rules('sex','Sex','trim|required|min_length[2]|max_length[50]');
        $this->form_validation->set_rules('street','Street','trim|required|min_length[2]|max_length[50]');
        $this->form_validation->set_rules('purok','Purok','trim|required|min_length[2]|max_length[50]');
        $this->form_validation->set_rules('barangay','Barangay','trim|required|min_length[2]|max_length[50]');
        $this->form_validation->set_rules('contact','Contact','trim|required|min_length[2]|max_length[50]');
        $this->form_validation->set_rules('religion','Religion','trim|required|min_length[2]|max_length[50]');
        $this->form_validation->set_rules('civil_status','Civil Status','trim|required|min_length[2]|max_length[50]');
        $this->form_validation->set_rules('nationality','Nationality','trim|required|min_length[2]|max_length[50]');

        $this->form_validation->set_error_delimiters('<p style="color:red;">','<p>');

        if($this->form_validation->run()==FALSE){

            $this->load->view('backend/include/header');
            $this->load->view('backend/include/nav');
            $this->load->view('backend/page/add_resident');
            $this->load->view('backend/include/footer');

        }else{

            $resident_data = [
                'first_name'=>$this->input->post('first_name',TRUE),
                'middle_name'=>$this->input->post('middle_name',TRUE),
                'last_name'=>$this->input->post('last_name',TRUE),
                'birth_date'=>$this->input->post('birth_date',TRUE),
                'sex'=>$this->input->post('sex',TRUE),
                'street'=>$this->input->post('street',TRUE),
                'purok'=>$this->input->post('purok',TRUE),
                'barangay'=>$this->input->post('barangay',TRUE),
                'contact'=>$this->input->post('contact',TRUE),
                'religion'=>$this->input->post('religion',TRUE),
                'civil_status'=>$this->input->post('civil_status',TRUE),
                'nationality'=>$this->input->post('nationality',TRUE),
            ];


            $insert = $this->db->insert('resident', $resident_data);

            if ($insert) {
                $this->session->set_flashdata('success','Successfully Added!');
                redirect(base_url('index.php/dashboard/view-residents'));
            } else {
                $this->session->set_flashdata('error',' Added Failed!');
                // Handle the case when insertion fails
            }


        }
        
		

    }

    public function search()
{
    $search_query = $this->input->get('search_query');
    // Perform search query using the provided input
    
    // Pass the search results to your view
    $data['search_results'] = $search_results;
    $this->load->view('your_view', $data);
}
	public function delete_resident($id)
	{
		$this->db->db_debug = TRUE;
		$this->db->where('resident_id', $id);
		$this->db->delete('resident');
		redirect('dashboard/view-residents');
	}

    public function edit_resident($resident_id) {
        if (!isset($_SESSION['user'])) {
            $this->session->set_flashdata('msg_login', 'You are not logged in. Please Login First');
            redirect(base_url('index.php/admin'));
        }
    // Validate the input if necessary
    
    $this->form_validation->set_rules('first_name','First Name','trim|required|min_length[2]|max_length[50]');
    $this->form_validation->set_rules('middle_name','Middle Name','trim|required|min_length[2]|max_length[50]');
    $this->form_validation->set_rules('last_name','Last Name','trim|required|min_length[2]|max_length[50]');
    $this->form_validation->set_rules('birth_date','Birth Date','trim|required');
    $this->form_validation->set_rules('sex','Sex','trim|required|min_length[2]|max_length[50]');
    $this->form_validation->set_rules('street','Street','trim|required|min_length[2]|max_length[50]');
    $this->form_validation->set_rules('purok','Purok','trim|required|min_length[2]|max_length[50]');
    $this->form_validation->set_rules('barangay','Barangay','trim|required|min_length[2]|max_length[50]');
    $this->form_validation->set_rules('contact','Contact','trim|required|min_length[2]|max_length[50]');
    $this->form_validation->set_rules('religion','Religion','trim|required|min_length[2]|max_length[50]');
    $this->form_validation->set_rules('civil_status','Civil Status','trim|required|min_length[2]|max_length[50]');
    $this->form_validation->set_rules('nationality','Nationality','trim|required|min_length[2]|max_length[50]');
    $this->form_validation->set_error_delimiters('<p style="color:red;">', '<p>');
    
  
      
    
    if ($this->form_validation->run() == FALSE) {
        
        $resident_data = $this->db->get_where('resident', array('resident_id' => $resident_id))->row();
    
        $data = [
            'resident_data' => $resident_data
        ];

          
        $this->load->view('backend/include/header');
        $this->load->view('backend/include/nav');
        $this->load->view('backend/page/edit_resident', $data);
        $this->load->view('backend/include/footer');
    } else {
        // Form validation passed, update the resident's information
        $resident_data =[
            'first_name'=>$this->input->post('first_name',TRUE),
            'middle_name'=>$this->input->post('middle_name',TRUE),
            'last_name'=>$this->input->post('last_name',TRUE),
            'birth_date'=>$this->input->post('birth_date',TRUE),
            'sex'=>$this->input->post('sex',TRUE),
            'street'=>$this->input->post('street',TRUE),
            'purok'=>$this->input->post('purok',TRUE),
            'barangay'=>$this->input->post('barangay',TRUE),
            'contact'=>$this->input->post('contact',TRUE),
            'religion'=>$this->input->post('religion',TRUE),
            'civil_status'=>$this->input->post('civil_status',TRUE),
            'nationality'=>$this->input->post('nationality',TRUE),
        ];
    
        $this->db->where('resident_id', $resident_id);
        $update = $this->db->update('resident', $resident_data);

        if ($update) {
            redirect(base_url('index.php/dashboard/view-residents'));
        }
    }

}


    public function view_resident(){

        if(!isset($_SESSION['user'])){
            $this->session->set_flashdata('msg_login','You are not logged in. Please Login First');
            redirect(base_url('index.php/admin'));
        }


        $resident_list = $this->db->get('resident')->result();

        $data = [
'resident_list'=>$resident_list
        ];

        $this->load->view('backend/include/header');
        $this->load->view('backend/include/nav');
        $this->load->view('backend/page/view_resident',$data);
        $this->load->view('backend/include/footer');
    }

    public function view_blotter(){

        if(!isset($_SESSION['user'])){
            $this->session->set_flashdata('msg_login','You are not logged in. Please Login First');
            redirect(base_url('index.php/admin'));
        }


        $blotter_list = $this->db->get('blotter')->result();

        $data = [
'blotter_list'=>$blotter_list
        ];

        $this->load->view('backend/include/header');
        $this->load->view('backend/include/nav');
        $this->load->view('backend/page/view_blotter',$data);
        $this->load->view('backend/include/footer');
    }
    public function add_blotter(){
       
        
        if(!isset($_SESSION['user'])){
            $this->session->set_flashdata('msg_login','You are not logged in. Please Login First');
            redirect(base_url('index.php/admin'));
        }

    
        $this->form_validation->set_rules('complainant','Complainant','trim|required|min_length[2]|max_length[50]');
        $this->form_validation->set_rules('age','Age','trim|required|min_length[2]|max_length[50]');
        $this->form_validation->set_rules('address','Address','trim|required|min_length[2]|max_length[50]');
        $this->form_validation->set_rules('con_complainant','Contact # ','trim|required');
        $this->form_validation->set_rules('complainee','Complainee','trim|required|min_length[2]|max_length[50]');
        $this->form_validation->set_rules('age_c','Age','trim|required|min_length[2]|max_length[50]');
        $this->form_validation->set_rules('address_c','Address','trim|required|min_length[2]|max_length[50]');
        $this->form_validation->set_rules('con_complainee','Contact #','trim|required|min_length[2]|max_length[50]');
        $this->form_validation->set_rules('complaint','Complaint','trim|required|min_length[2]|max_length[50]');
        $this->form_validation->set_rules('action','Action','trim|required|min_length[2]|max_length[50]');
        $this->form_validation->set_rules('status','Status','trim|required|min_length[2]|max_length[50]');
        $this->form_validation->set_rules('location','Location of Incidence','trim|required|min_length[2]|max_length[50]');
      

        $this->form_validation->set_error_delimiters('<p style="color:red;">','<p>');

        if($this->form_validation->run()==FALSE){
 $this->load->model('Users_model');
        $data['residents'] = $this->Users_model->getResidents();
       
            $this->load->view('backend/include/header');
            $this->load->view('backend/include/nav');
            $this->load->view('backend/page/add_blotter',$data);
            $this->load->view('backend/include/footer');

        }else{

            $blotter_data = [
                'complainant'=>$this->input->post('complainant',TRUE),
                'age'=>$this->input->post('age',TRUE),
                'address'=>$this->input->post('address',TRUE),
                'con_complainant'=>$this->input->post('con_complainant',TRUE),
                'complainee'=>$this->input->post('complainee',TRUE),
                'age_c'=>$this->input->post('age_c',TRUE),
                'address_c'=>$this->input->post('address_c',TRUE),
                'con_complainee'=>$this->input->post('con_complainee',TRUE),
                'complaint'=>$this->input->post('complaint',TRUE),
                'action'=>$this->input->post('action',TRUE),
                'status'=>$this->input->post('status',TRUE),
                'location'=>$this->input->post('location',TRUE),
       
            ];
    

            $insert = $this->db->insert('blotter', $blotter_data);

            if ($insert) {
                $this->session->set_flashdata('success','Successfully Added!');
                redirect(base_url('index.php/dashboard/view-blotter'));
            } else {
                $this->session->set_flashdata('error',' Added Failed!');
                // Handle the case when insertion fails
            }
    
    }
    }
    public function edit_blotter($blotter_id) {
        if (!isset($_SESSION['user'])) {
            $this->session->set_flashdata('msg_login', 'You are not logged in. Please Login First');
            redirect(base_url('index.php/admin'));
        }
    // Validate the input if necessary
    
    $this->form_validation->set_rules('complainant','Complainant','trim|required|min_length[2]|max_length[50]');
    $this->form_validation->set_rules('age','Age','trim|required|min_length[2]|max_length[50]');
    $this->form_validation->set_rules('address','Address','trim|required|min_length[2]|max_length[50]');
    $this->form_validation->set_rules('con_complainant','Contact # ','trim|required');
    $this->form_validation->set_rules('complainee','Complainee','trim|required|min_length[2]|max_length[50]');
    $this->form_validation->set_rules('age_c','Age','trim|required|min_length[2]|max_length[50]');
    $this->form_validation->set_rules('address_c','Address','trim|required|min_length[2]|max_length[50]');
    $this->form_validation->set_rules('con_complainee','Contact #','trim|required|min_length[2]|max_length[50]');
    $this->form_validation->set_rules('complaint','Complaint','trim|required|min_length[2]|max_length[50]');
    $this->form_validation->set_rules('action','Action','trim|required|min_length[2]|max_length[50]');
    $this->form_validation->set_rules('status','Status','trim|required|min_length[2]|max_length[50]');
    $this->form_validation->set_rules('location','Location of Incidence','trim|required|min_length[2]|max_length[50]');
  
    $this->form_validation->set_error_delimiters('<p style="color:red;">', '<p>');
  
    if ($this->form_validation->run() == FALSE) {
        
        $blotter_data = $this->db->get_where('blotter', array('blotter_id' => $blotter_id))->row();
    
        $data = [
            'blotter_data' => $blotter_data
        ];

        
        $this->load->view('backend/include/header');
        $this->load->view('backend/include/nav');
        $this->load->view('backend/page/edit_blotter',$data);
        $this->load->view('backend/include/footer');
    } else {
        // Form validation passed, update the resident's information
        $blotter_data = [
            'complainant'=>$this->input->post('complainant',TRUE),
            'age'=>$this->input->post('age',TRUE),
            'address'=>$this->input->post('address',TRUE),
            'con_complainant'=>$this->input->post('con_complainant',TRUE),
            'complainee'=>$this->input->post('complainee',TRUE),
            'age_c'=>$this->input->post('age_c',TRUE),
            'address_c'=>$this->input->post('address_c',TRUE),
            'con_complainee'=>$this->input->post('con_complainee',TRUE),
            'complaint'=>$this->input->post('complaint',TRUE),
            'action'=>$this->input->post('action',TRUE),
            'status'=>$this->input->post('status',TRUE),
            'location'=>$this->input->post('location',TRUE),
   
        ];
    
        $this->db->where('blotter_id', $blotter_id);
        $update = $this->db->update('blotter', $blotter_data);

        if ($update) {
            redirect(base_url('index.php/dashboard/view-blotter'));
        }
    }

}
}
   ?>