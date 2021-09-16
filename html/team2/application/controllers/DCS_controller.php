<?php
defined('BASEPATH') or exit('No direct script access allowed');
/*
* DCS_controller
* Base controller system
* @author weradet nopsombun 62160110
* @Create Date 2564-07-17
*/
class DCS_controller extends CI_Controller
{


    /*
    * index main
    * index Main Drop carbon Systems
    * @input
    * @output -
    * @author Weradet Nopsombun 62160110
    * @Create Date 2564-07-17
    * @Update -
    */

    public function index()
    {
        $this->output_landing_page('landing_page/register/v_landing_page'); //path
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
    * @Create Date 2021-07-19
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
    * output_regis
    * output register
    * @input data, view
    * @output -
    * @author Thanisorn thumsawanit 62160088
    * @Create Date 2021-07-15
    * @Update Date -
    */
    public function output_regis($view, $data = null)
    {
        $this->load->view('template/Tourist/header_tourist');
        $this->load->view('template/Tourist/javascript_tourist');
        $this->load->view('template/Tourist/topbar_tourist');
        $this->load->view($view, $data);
        $this->load->view('template/Tourist/footer');
    }

    /*
    * output_entrepreneur
    * output entrepreneur
    * @input $view, $data
    * @output -
    * @author Suwapat Saowarod 62160340
    * @Create Date 2021-07-24
    * @Update 2021-09-13
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
    * output_landing_page
    * show Landing page for every one
    * @input -
    * @output -
    * @author Naaka Punparich 62160082
    * @Create Date 2021-07-31
    */
    public function output_landing_page($view)
    {
        $this->load->model('Company/M_dcs_com_image', 'mdci');
        $this->load->model('Company/M_dcs_company', 'mdc');
        $this->load->model('Event/M_dcs_eve_image', 'mdei');
        $this->load->model('Event/M_dcs_event', 'mde');

        $data['arr_image_com'] = $this->mdci->get_all()->result();
        $data['arr_com'] = $this->mdc->get_all_varibles()->result();
        $data['arr_image_eve'] = $this->mdei->get_all()->result();
        $data['arr_eve'] = $this->mde->get_all()->result();

        $this->load->view('template/Tourist/header_tourist');
        $this->load->view('template/Tourist/javascript_tourist');
        $this->load->view('template/Tourist/topbar_tourist');
        $this->load->view($view, $data);
        $this->load->view('template/Tourist/footer');
    }

    /*
    * output_event
    * show every thing about
    * @input $view, topbar
    * @output -
    * @author Naaka Punparich 62160082
    * @Create Date 2021-08-03
    */
    public function output_event($view, $topbar)
    {
        $this->load->view('template/Tourist/header_tourist');
        $this->load->view('template/Tourist/javascript_tourist');
        $this->load->view($topbar);
        $this->load->view($view);
        $this->load->view('template/Tourist/footer');
    }

    /*
    * output_landing_page
    * show Landing page tourist for every one
    * @input $view
    * @output -
    * @author Jutamas Thaptong 62160079
    * @Create Date 2021-08-02
    */
    public function output_landing_page_tourist()
    {
        $this->load->view('template/Tourist/header_tourist');
        $this->load->view('template/Tourist/javascript_tourist');
        $this->load->view('template/Tourist/topbar_tourist_login');
        $this->load->view('tourist/auth/v_landing_page_tourist');
        $this->load->view('template/Tourist/footer');
    }

    /*
    * output_edit_tourist
    * show edit tourist page
    * @input $data
    * @output -
    * @author Jutamas Thaptong 62160079
    * @Create Date 2021-08-02
    */
    public function output_edit_tourist($data)
    {
        $this->load->view('template/Tourist/header_tourist');
        $this->load->view('template/Tourist/javascript_tourist');
        $this->load->view('template/Tourist/topbar_tourist_login');
        $this->load->view('tourist/manage_tourist/v_edit_tourist', $data);
        $this->load->view('template/Tourist/footer');
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
        $mail->Password = 'sykildxigujdlfnz';
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

        // Send email
        if (!$mail->send()) {
            echo 'Message could not be sent.';
            echo 'Mailer Error: ' . $mail->ErrorInfo;
        } else {
            redirect("Admin/Manage_entrepreneur/Admin_approval_entrepreneur/show_data_consider");
        }
    }

    /*
    * output_login_tourist
    * output tourist login  page
    * @input
    * @output -
    * @author Naaka Punparich 62160082
    * @Create Date 2564-07-17
    * @Update -
    */

    public function output_login_tourist($view, $data = null)
    {
        $this->load->view('template/Tourist/header_tourist');
        $this->load->view('template/Tourist/javascript_tourist');
        $this->load->view('template/Tourist/topbar_tourist');
        $this->load->view($view, $data);
        $this->load->view('template/Tourist/footer');
    }
}
