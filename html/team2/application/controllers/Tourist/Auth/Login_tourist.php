<?php
defined('BASEPATH') or exit('No direct script access allowed');
include_once dirname(__FILE__) . '/../../DCS_controller.php';
/*
* Login_tourist
* login tourist controller system
* @author Chutipon Thermsirisuksin 62160081
* @Create Date 2564-08-05
*/
class Login_tourist extends DCS_controller
{
    /*
    * @author Chutipon Thermsirisuksin 62160081
    */

    public function __construct()
    {
        parent::__construct();
    }

    /*
    * index
    * index 
    * @input 
    * @output -
    * @author Chutipon Thermsirisuksin 62160081
    * @Create Date 2564-08-05
    * @Update -
    */


    public function index()
    {
        $this->output_login_tourist('tourist/auth/v_login_tourist');
    }



    /*
    * warnning 
    * show warnning 
    * @input 
    * @output -
    * @author Chutipon Thermsirisuksin 62160081
    * @Create Date 2564-08-05
    * @Update -
    */

    public function warnning($data)
    {
        $this->output_login_tourist('tourist/auth/v_login_tourist', $data);
        //echo $data['warning'];
    }


    /*
    * input_login_form
    * Login admin and get data 
    * @input 
    * @output -
    * @author Chutipon Thermsirisuksin 62160081
    * @Create Date 2564-08-05
    * @Update -
    */

    function input_login_form()
    {
        $username = $this->input->post('username');
        $password = $this->input->post('password'); //รับค่า username & password

        //$password = md5($password);

        $this->load->model('Tourist/M_dcs_login_tourist', 'mlog');  //load database
        $this->load->model('Tourist/M_dcs_tourist_image', 'mpic');

        $this->mlog->tus_username =  $username;
        $this->mlog->tus_password = $password;

        $result = $this->mlog->login(); //function in model

        if ($result) {
            $this->mpic->tus_img_tus_id = $result->tus_id;
            $result_img = $this->mpic->get_by_tourist_id()->row();
            $tus_username =  $result->tus_username;
            $tus_name = $result->tus_firstname . ' ' . $result->tus_lastname;
            $tus_id = $result->tus_id;
            if ($result_img != null) {
                $tus_img_path = $result_img->tus_img_path;
                $this->set_session($tus_username, $tus_name, $tus_id, $tus_img_path);
            } else {
                $this->set_session($tus_username, $tus_name, $tus_id, '');
            }
            //echo $tus_name; test name
            // echo $tus_img_path; test path
            redirect("Tourist/Auth/Landing_page_tourist");
        } else {
            $data_warning = array();
            $data_warning['warning'] = "ชื่อผู้ใช้หรือรหัสผ่านของคุณไม่ถูกต้อง";

            $this->warnning($data_warning);
        }
    }

    /*
    * logout
    * Logout and remove session
    * @input 
    * @output -
    * @author Chutipon Thermsirisuksin 62160081
    * @Create Date 2564-08-05
    * @Update -
    */

    public function logout()
    {
        $this->remove_session();
        $this->index(); //back to login
    }

    /*
    * set_session
    * set session data
    * @input 
    * @output -
    * @author Chutipon Thermsirisuksin 62160081
    * @Create Date 2564-08-05
    * @Update -
    */

    public function set_session($username, $name, $id, $tus_img_path)
    {
        $this->session->set_userdata("username", "$username");
        $this->session->set_userdata("Tourist_name", "$name");
        $this->session->set_userdata("tourist_id", "$id");
        $this->session->set_userdata("tus_img_path", $tus_img_path);
    }


    /*
    * remove_session
    * remove session data
    * @input 
    * @output -
    * @author Chutipon Thermsirisuksin 62160081
    * @Create Date 2564-08-05
    * @Update -
    */

    public function remove_session()
    {
        $this->session->unset_userdata("username");
        $this->session->unset_userdata("Tourist_name");
    }


    /*
    * forgot_password_page
    * load view forgot pass
    * @input 
    * @output -
    * @author Chutipon Thermsirisuksin 62160081
    * @Create Date 2564-09-15
    * @Update -
    */


    public function forgot_password_page()
    {
        $this->output_login_tourist('tourist/auth/v_forgot_password_tourist');
    }

    /*
    * check_email_admin
    * check email in database
    * @input 
    * @output -
    * @author Weradet Nopsombun 62160110 
    * @Create Date 2564-08-12
    * @Update -
    */
    public function check_email_tourist()
    {

        $email = $this->input->post('user_email');

        $this->load->model('Tourist/M_dcs_login_tourist', 'login');  //load database

        $this->login->tus_email = $email;

        $result =  $this->login->check_email();


        if ($result) {
            echo 1;

            $this->send_mail_reset($email);
        } else {
            echo 2;
        }
    }

    /*
    * send_mail_reset
    * check email in database
    * @input 
    * @output -
    * @author Weradet Nopsombun 62160110 
    * @Create Date 2564-08-12
    * @Update -
    */

    public function send_mail_reset($email)
    {



        // set userpassword in token 
        $token = rand(1000, 9999);


        $this->load->model('Tourist/M_dcs_login_tourist', 'login');  //load database

        $this->login->tus_email = $email;

        $this->login->update_pass_token($token);

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
        $mail->addAddress($email);

        // Email subject
        $mail->Subject = "Reset Password";

        // Set email format to HTML
        $mail->isHTML(true);

        // Email body content
        $mail_content = "<h1>" . "กรุณาคลิกที่ลิ้งด้านล่างเพื่อเปลี่ยนรหัสผ่าน" . "</h1><br>" . "<a href='" . base_url('Tourist/Auth/Login_tourist/reset_password_page?token=') . $token . "'>Reset Password</a>";
        $mail->Body = $mail_content;
        if (!$mail->send()) {
            echo 'Message could not be sent.';
            echo 'Mailer Error: ' . $mail->ErrorInfo;
        }
    }

    /*
    * update_password_ajax
    * check email in database
    * @input 
    * @output -
    * @author Weradet Nopsombun 62160110 
    * @Create Date 2564-08-12
    * @Update -
    */
    public function update_password_ajax()
    {
        $password = $this->input->post('password');

        $token = $this->input->post('token');

        $this->load->model('Tourist/M_dcs_login_tourist', 'login');  //load database

        $this->login->tus_password = $password;

        $this->login->update_pass($token);
    }

    /*
    * reset_password_page
    * check email in database
    * @input 
    * @output -
    * @author Weradet Nopsombun 62160110 
    * @Create Date 2564-08-12
    * @Update -
    */
    public function reset_password_page()
    {
        $data['token'] = $this->input->get('token');
        $this->output_login_tourist('tourist/auth/v_reset_password_tourist', $data);
    }
}