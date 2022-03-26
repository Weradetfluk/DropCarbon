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

        date_default_timezone_set('Asia/Bangkok');
        $date_now = date("Y-m-d");

        $this->load->model('Company/M_dcs_company', 'mdc');

        $this->load->model('Event/M_dcs_event', 'mde');

        $this->load->model('Promotions/M_dcs_promotions', 'mdp');

        $this->load->model('Tourist/M_dcs_tourist', 'mdt');

        $this->load->model('Entrepreneur/M_dcs_entrepreneur', 'mdet');

        $data['arr_tou'] = $this->mdt->get_tourist()->result();

        $data['arr_ent'] = $this->mdet->get_ent()->result();

        $data['arr_pro'] = $this->mdp->get_promotions_landing_page($date_now)->result();

        $data['arr_com'] = $this->mdc->get_company_landing_page()->result();

        $data['arr_eve'] = $this->mde->get_event_landing_page()->result();


        if ($this->session->userdata("tourist_id")) {
            $topbar = 'template/Tourist/topbar_tourist_login';
        } else {
            $topbar = 'template/Tourist/topbar_tourist';
        }
        $this->output_tourist('landing_page/v_landing_page', $data, $topbar, 'footer');
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
        $this->load->view('template/dcs_javascript');
        $this->load->view('template/Admin/javascript_admin');

        if ($view_card != null) {
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
    * @input view, data
    * @output -
    * @author Suwapat Saowarod 62160340
    * @Create Date 2564-07-24
    * @Update 2564-09-13
    */
    public function output_entrepreneur($view = null, $data = null)
    {
        $this->load->view('template/Entrepreneur/header_entrepreneur');
        $this->load->view('template/dcs_javascript');
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
        $mail->Password = 'exwcdkscfpjaouei';
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

    /*
    * get_data_chart_register
    * get data chart dashboard and return data JSON
    * @input
    * @output -
    * @author Naaka Punparich 62160082
    * @Create Date 2564-12-25
    * @Update Date -
    */
    public function get_data_pros()
    {
        $this->load->model('DCS_model', 'dcmd');
        $data['arr_data_pros'] = $this->dcmd->get_data_pros();

        $this->output->set_content_type('application/json')->set_output(json_encode($data));
    }



    /*
       * show_data_consider_ajax
       * get all data entrepreneur not approve and show table
       * @input
       * @output -
       * @author Weradet Nopsombun 62160110
       * @Create Date 2564-09-14
       * @Update Date -
       */
    public function config_pagination($page, $all_count, $limit)
    {
        $total_links = ceil($all_count / $limit);  // จำนวนแถว หารด้วย จำนวน limit ในทีนี้คือ 5 (ปัดเศษขึ้น)
        $previous_link = ''; // ตัวแปร
        $next_link = ''; //ตัวแปร
        $page_link = ''; // ตัวแปร
        for ($count = 1; $count <= $total_links; $count++) {
            $page_array[] = $count;
        }
        for ($count = 0; $count < count($page_array); $count++) {
            if ($page == $page_array[$count]) {
                $page_link .= '
            <li class="page-item active">
              <a class="page-link" href="#">' . $page_array[$count] . ' <span class="sr-only">(current)</span></a>
            </li>
            ';
                $previous_id = $page_array[$count] - 1;
                if ($previous_id > 0) {
                    $previous_link = '<li class="page-item"><a class="page-link" href="javascript:void(0)" data-page_number="' . $previous_id . '">Previous</a></li>';
                } else {
                    $previous_link = '
                    <li class="page-item disabled">
                      <a class="page-link" href="#">ก่อนหน้า</a>
                    </li>
                    ';
                }
                $next_id = $page_array[$count] + 1;
                if ($next_id >= $total_links) {
                    $next_link = '
                      <li class="page-item disabled">
                        <a class="page-link" href="#">ถัดไป</a>
                      </li>
                        ';
                } else {
                    $next_link = '<li class="page-item"><a class="page-link" href="javascript:void(0)" data-page_number="' . $next_id . '">Next</a></li>';
                }
            } else {
                if ($page_array[$count] == '...') {
                    $page_link .= '
              <li class="page-item disabled">
                  <a class="page-link" href="#">...</a>
              </li>
              ';
                } else {
                    $page_link .= '
                        <li class="page-item"><a class="page-link" href="javascript:void(0)" data-page_number="' . $page_array[$count] . '">' . $page_array[$count] . '</a></li>';
                }
            }
        } //for
        return $previous_link . $page_link . $next_link;
    }
}