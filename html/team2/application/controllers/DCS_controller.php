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
        $this->output_Landing_page(); //path
    }

    /*
    * output_admin
    * output admin page
    * @input
    * @output -
    * @author Weradet Nopsombun 62160110
    * @Create Date 2564-07-17
    * @Update -
    */

    public function output_admin($view, $data = null)
    {

        $this->load->view('template/Admin/header_admin'); // path
        $this->load->view('template/Admin/topbar_admin');
        $this->load->view('template/Admin/javascript_admin');
        $this->load->view($view, $data);
        $this->load->view('template/Admin/footer');
    }

    /*
    * output_admin_card
    * output admin page card
    * @input
    * @output -
    * @author Weradet Nopsombun 62160110
    * @Create Date 2564-08-02
    * @Update -
    */

    public function output_admin_card($view, $data = null)
    {
        $this->load->view('template/Admin/header_admin'); // path
        $this->load->view('template/Admin/topbar_admin');
        $this->load->view('template/Admin/javascript_admin');
        $this->load->view('admin/manage_entrepreneur/v_data_card_entrepreneur');
        $this->load->view($view, $data);
        $this->load->view('template/Admin/footer');
    }


    /*
    * output_login_admin
    * output admin login  page
    * @input
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
    * @input
    * @output -
    * @author Suwapat Saowarod
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
    * output_company
    * show list company
    * @input
    * @output -
    * @author Suwapat Saowarod
    * @Create Date 2021-07-18
    * @Update Date -
    */
    public function output_company($data = null)
    {
        $this->load->view('template/Entrepreneur/header_entrepreneur');
        $this->load->view('template/Entrepreneur/javascript_entrepreneur');
        $this->load->view('template/Entrepreneur/topbar_entrepreneur');
        $this->load->view('entrepreneur/manage_company/v_list_company', $data);
        $this->load->view('template/Entrepreneur/footer');
    }

    public function output_regis($view, $data = null)
    {
        $this->load->view('template/Register/header_register');
        $this->load->view('template/Register/javascript_register');
        $this->load->view('template/Landing_page/topbar_landing');
        $this->load->view($view, $data);
        $this->load->view('template/Register/footer');
    }

    /*
    * output_edit_entrepreneur
    * show edit profile page for entrepreneur
    * @input -
    * @output -
    * @author Naaka Punparich 62160082
    * @Create Date 2021-07-24
    */
    public function output_edit_entrepreneur($data)
    {
        $this->load->view('template/Entrepreneur/header_entrepreneur');
        $this->load->view('template/Entrepreneur/javascript_entrepreneur');
        $this->load->view('template/Entrepreneur/topbar_entrepreneur');
        $this->load->view('entrepreneur/manage_entrepreneur/v_edit_entrepreneur', $data);
        $this->load->view('template/Entrepreneur/footer');
    }

    /*
    * output_Landing_page
    * show Landing page for every one
    * @input -
    * @output -
    * @author Naaka Punparich 62160082
    * @Create Date 2021-07-31
    */
    public function output_Landing_page()
    {
        $this->load->view('template/Landing_page/header_landing');
        $this->load->view('template/Landing_page/javascript_landing');
        $this->load->view('template/Landing_page/topbar_landing');
        $this->load->view('landing_page/register/v_landing_page');
        $this->load->view('template/Landing_page/footer');
    }

    /*
    * output_event
    * show every thing about
    * @input $view
    * @output -
    * @author Naaka Punparich 62160082
    * @Create Date 2021-08-03
    */
    public function output_event($view, $topbar)
    {
        $this->load->view('template/Landing_page/header_landing');
        $this->load->view('template/Tourist/javascript_tourist');
        $this->load->view($topbar);
        $this->load->view($view);
        $this->load->view('template/Tourist/footer');
    }

    /*
    * output_Landing_page
    * show Landing page tourist for every one
    * @input -
    * @output -
    * @author Jutamas Thaptong 62160079
    * @Create Date 2021-08-02
    */
    public function output_Landing_page_tourist()
    {
        $this->load->view('template/Landing_page/header_landing');
        $this->load->view('template/Landing_page/javascript_landing');
        // $this->load->view('template/Landing_page/topbar_landing');
        $this->load->view('landing_page_tourist/v_landing_page_tourist');
        $this->load->view('template/Landing_page/footer');
    }

    public function output_edit_tourist($data)
    {
        $this->load->view('template/Register/header_register');
        $this->load->view('template/Register/javascript_register');
        $this->load->view('template/Tourist/topbar_tourist_login');
        $this->load->view('tourist/manage_tourist/v_edit_tourist', $data);
        $this->load->view('template/Tourist/footer');
    }


    /*
      * email_send
      * send email to user
      * @input
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

    /*
    * change_tab_number_ajax
    * Change tab number
    * @input tab
    * @output -
    * @author weradet nopsombun 62160110
    * @Create Date 2021-08-14
    */
    public function change_tab_number_ajax()
    {
        $_SESSION['tab_number'] = $this->input->post('tab');
    }
}
