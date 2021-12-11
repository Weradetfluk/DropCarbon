<?php
/*
* DCS_controller
* Base controller system
* @author weradet nopsombun 62160110
* @Create Date 2564-07-17
*/
defined('BASEPATH') or exit('No direct script access allowed');

class DCS_controller extends CI_Controller
{

    public function __construct()
    {
		parent::__construct();
    } 
    /*
    * index
    * index Main Drop carbon Systems
    * @input
    * @output -
    * @author Weradet Nopsombun 62160110
    * @Create Date 2564-07-17
    * @Update -
    */

    public function index()
    {

        $this->load->model('Company/M_dcs_company', 'mdc');
   
        $this->load->model('Event/M_dcs_event', 'mde');

        $this->load->model('Promotions/M_dcs_promotions', 'mdp');

        $this->load->model('Tourist/M_dcs_tourist', 'mdt');

        $this->load->model('Entrepreneur/M_dcs_entrepreneur', 'mdet');
        
        $data['arr_tou'] = $this->mdt->get_tourist()->result();

        $data['arr_ent'] = $this->mdet->get_ent()->result();

        $data['arr_pro'] = $this->mdp->get_promotions_landing_page()->result();
       
        $data['arr_com'] = $this->mdc->get_company_landing_page()->result();

        $data['arr_eve'] = $this->mde->get_event_landing_page()->result();

        $this->output_tourist('landing_page/v_landing_page', $data, 'template/Tourist/topbar_tourist', 'footer');
    }

    /*
    * output_admin
    * output admin page
    * @input data, view
    * @output -
    * @author Weradet Nopsombun 62160110
    * @Create Date 2564-07-17
    * @Update Date 2564-08-28
    */

    public function output_admin($view, $data = null, $view_card = null)
    {

        $this->load->view('template/Admin/header_admin'); // path
        $this->load->view('template/Admin/topbar_admin');
        $this->load->view('template/Admin/javascript_admin');

        if ($view_card != NULL) {
            $this->load->view($view_card);
        }
        $this->load->view($view, $data);
        $this->load->view('template/Admin/footer');
    }

    /*
    * output_Tourist
    * output Tourist
    * @input $view, $data
    * @output -
    * @author Suwapat Saowarod 62160340
    * @Create Date 2564-09-22
    */
    public function output_tourist($view, $data = null, $topbar = null, $footer = null)
    {
        $this->load->view('template/Tourist/header_tourist');
        $this->load->view('template/Tourist/javascript_tourist');
        // $this->load->view('template/Tourist/topbar_tourist');
        if ($topbar) {
            $this->load->view($topbar);
        }
        $this->load->view($view, $data);
        if ($footer) {
            $this->load->view('template/Tourist/footer');
        }
    }

    /*
    * output_entrepreneur
    * output entrepreneur
    * @input $view, $data
    * @output -
    * @author Suwapat Saowarod 62160340
    * @Create Date 2564-07-24
    * @Update 2564-09-13
    */
    public function output_entrepreneur($view = null, $data = null)
    {
        $this->load->view('template/Entrepreneur/header_entrepreneur');
        $this->load->view('template/Entrepreneur/javascript_entrepreneur');
        $this->load->view('template/Entrepreneur/topbar_entrepreneur');
        $this->load->view($view, $data);
        $this->load->view('template/Entrepreneur/footer');
    }

    /*
    * output_admin_card
    * output admin page card
    * @input data, view
    * @output -
    * @author Kasama Donwong 62160074
    * @Create Date 2564-08-25
    * @Update -
    */

    public function output_admin_company_card($view, $data = null)
    {
        $this->load->view('template/Admin/header_admin'); // path
        $this->load->view('template/Admin/topbar_admin');
        $this->load->view('template/Admin/javascript_admin');
        $this->load->view('admin/manage_company/v_data_card_company');
        $this->load->view($view, $data);
        $this->load->view('template/Admin/footer');
    }


    /*
    * output_login_admin
    * output admin login  page
    * @input data, view
    * @output -
    * @author Weradet Nopsombun 62160110
    * @Create Date 2564-07-17
    * @Update -
    */

    public function output_login_admin($view, $data = null)
    {
        $this->load->view('template/Admin/header_admin'); //path
        $this->load->view('template/Admin/javascript_admin');
        $this->load->view($view, $data);
        $this->load->view('template/Admin/footer');
    }

    /*
    * output_login_entrepreneur
    * show form login entrepreneur
    * @input data, view
    * @output - 
    * @author Suwapat Saowarod 62160340
    * @Create Date 2564-07-19
    * @Update Date -
    */
    public function output_login_entrepreneur($view, $data = null)
    {
        $this->load->view('template/Entrepreneur/header_entrepreneur');
        $this->load->view('template/Entrepreneur/javascript_entrepreneur');
        $this->load->view($view, $data);
        $this->load->view('template/Entrepreneur/footer');
    }

    /*
      * email_send
      * send email to user
      * @input reason, user_email, subject, mail_content_h1
      * @output -
      * @author Weradet Nopsombun 62160110
      * @Create Date 2564-07-17
      * @Update Date -
      */

    public function email_send($reason, $user_email, $subject, $mail_content_h1)
    {
        // Load PHPMailer library
        $this->load->library('phpmailer_lib');
        // PHPMailer object
        $mail = $this->phpmailer_lib->load();
        // SMTP configuration
        $mail->isSMTP();
        $mail->Host     = 'smtp.gmail.com';
        $mail->SMTPAuth = true;
        $mail->Username = 'weradet2543@gmail.com';
        $mail->Password = 'sozftcaimvjxykek';
        $mail->SMTPSecure = 'tls';
        $mail->Port     = 587;
        $mail->charSet = "UTF-8";
        $mail->setFrom('dropcarbonsystem@gmail.com', 'Dropcarbonsystem');
        // Add a recipient
        $mail->addAddress($user_email);

        // Email subject
        $mail->Subject = $subject;

        // Set email format to HTML
        $mail->isHTML(true);

        // Email body content
        $mail_content = "<h1>" . $mail_content_h1 . "</h1>" . "<p>.$reason.</p>";
        $mail->Body = $mail_content;
        if (!$mail->send()) {
            echo 'Message could not be sent.';
            echo 'Mailer Error: ' . $mail->ErrorInfo;
        }
    }

    /*
      * send_email_admin_ajax
      * send email to user
      * @input reason, user_email, subject, mail_content_h1
      * @output -
      * @author Weradet Nopsombun 62160110
      * @Create Date 2564-09-20
      * @Update Date -
      */
    public function send_email_admin_ajax()
    {
        $content = $this->input->post('content');
        $user_email = $this->input->post('user_email');
        $subject = $this->input->post('subject');
        $content_h1 = $this->input->post('content_h1');
        $this->email_send($content, $user_email, $subject, $content_h1);
    }
}
