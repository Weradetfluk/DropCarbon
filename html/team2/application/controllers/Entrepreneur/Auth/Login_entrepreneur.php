<?php
/*
* Login_entrepreneur
* Login for entrepreneur
* @author Suwapat Saowarod 62160340
* @Create Date 2564-07-19
*/
defined('BASEPATH') or exit('No direct script access allowed');
require dirname(__FILE__) . '/../../DCS_controller.php';

class Login_entrepreneur extends DCS_controller
{
    /*
    * index
    * show form login entrepreneur 
    * @input -
    * @output -
    * @author Suwapat Saowarod 62160340
    * @Create Date 2564-07-19
    * @Update Date -
    */
    public function index($data = NULL)
    {
        $this->output_login_entrepreneur('entrepreneur/auth/v_login_entrepreneur', $data);
    }

    /*
    * input_login_form
    * Login entrepreneur and get data  
    * @input username, password
    * @output -
    * @author Suwapat Saowarod 62160340
    * @Create Date 2564-07-19
    * @Update Date 2564-08-03
    */
    function input_login_form()
    {

        $username = $this->input->post('username');
        $password = md5($this->input->post('password')); //รับค่า username & password

        $this->load->model('Entrepreneur/M_dcs_entrepreneur', 'ment');  //load database

        $this->ment->ent_username = $username;
        $this->ment->ent_password = $password;
        $this->ment->ent_status = 2;
        $result = $this->ment->get_by_username_password(); //function in model

        if ($result) {
            $ent_username =  $result->ent_username;
            $ent_name = $result->ent_firstname . ' ' . $result->ent_lastname;
            $ent_id = $result->ent_id;
            $ent_password = $password;
            $ent_tel = $result->ent_tel;
            $ent_id_card = $result->ent_id_card;
            $ent_email = $result->ent_email;
            $ent_pre_id = $result->ent_pre_id;
            $this->set_session($ent_username, $ent_name, $ent_id, $ent_password, $ent_tel, $ent_id_card, $ent_email, $ent_pre_id);

            redirect("Entrepreneur/Manage_company/Company_list/show_list_company");
        } else {
            $data_warning = array();
            $this->ment->ent_status = 1;
            $result_con = $this->ment->get_by_username_password();
            if ($result_con) {
                $data_warning['warning'] = "";
                $this->session->set_userdata("login_entrepreneur", 'warning');
            } else {
                $data_warning['warning'] = "ชื่อผู้ใช้หรือรหัสผ่านของคุณไม่ถูกต้อง";
            }
            $this->index($data_warning);
        }
    }

    /*
    * logout
    * remove session and back to login  
    * @input -
    * @output -
    * @author Suwapat Saowarod 62160340
    * @Create Date 2564-07-19
    * @Update Date -
    */
    public function logout()
    {
        $this->remove_session();
        unset($_SESSION['tab_number_entrepreneur']);
        unset($_SESSION['tab_number_company']);
        $this->index(); //back to login
    }

    /*
    * set_session
    * set_session username, entrepreneur_name, entrepreneur_id, password, tel, card, email, pre_id
    * @input username, name, id, password, tel, card, email, pre_id
    * @output -
    * @author Suwapat Saowarod 62160340
    * @Create Date 2564-07-19
    * @Update Date -
    */
    public function set_session($username, $name, $id, $password, $tel, $card, $email, $pre_id)
    {
        $this->session->set_userdata("username", $username);
        $this->session->set_userdata("entrepreneur_name", $name);
        $this->session->set_userdata("entrepreneur_id", $id);
        $this->session->set_userdata("password", $password);
        $this->session->set_userdata("tel", $tel);
        $this->session->set_userdata("card", $card);
        $this->session->set_userdata("email", $email);
        $this->session->set_userdata("pre_id", $pre_id);
    }

    /*
    * remove_session
    * unset session username and entrepreneur_name
    * @input -
    * @output -
    * @author Suwapat Saowarod
    * @Create Date 2564-07-19
    * @Update Date -
    */
    public function remove_session()
    {
        $this->session->unset_userdata("username");
        $this->session->unset_userdata("entrepreneur_name");
        $this->session->unset_userdata("entrepreneur_id");
        $this->session->unset_userdata("password");
        $this->session->unset_userdata("tel");
        $this->session->unset_userdata("card");
        $this->session->unset_userdata("email");
        $this->session->unset_userdata("pre_id");
        $this->session->unset_userdata("tab_number_entrepreneur");
    }

    /*
    * forgot_password_page
    * load view forgot pass
    * @input data
    * @output -
    * @author Chutipon Thermsirisuksin 62160081
    * @Create Date 2564-09-15
    * @Update -
    */
    public function forgot_password_page($data = null)
    {
        $this->output_login_entrepreneur('entrepreneur/auth/v_forgot_password_entrepreneur', $data);
    }

    /*
    * check_email_entrepreneur
    * check email in database
    * @input user_email
    * @output -
    * @author Chutipon Thermsirisuksin 62160081
    * @Create Date 2564-09-17
    * @Update -
    */
    public function check_email_entrepreneur()
    {

        $email = $this->input->post('user_email');

        $this->load->model('Entrepreneur/M_dcs_entrepreneur', 'login');  //load database

        $this->login->ent_email = $email;

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
    * send mail to reset password
    * @input email
    * @output -
    * @author Chutipon Thermsirisuksin 62160081
    * @Create Date 2564-09-17
    * @Update -
    */
    public function send_mail_reset($email)
    {
        // set userpassword in token 
        $token = rand(1000, 9999);
        $this->load->model('Entrepreneur/M_dcs_entrepreneur', 'login');  //load database

        $this->login->ent_email = $email;

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
        $mail->Password = 'exwcdkscfpjaouei';
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
        $mail_content = "<h1>" . "กรุณาคลิกที่ลิ้งด้านล่างเพื่อเปลี่ยนรหัสผ่าน" . "</h1><br>" . "<a href='" . base_url('Entrepreneur/Auth/Login_entrepreneur/reset_password_page?token=') . $token . "'>Reset Password</a>";
        $mail->Body = $mail_content;
        if (!$mail->send()) {
            echo 'Message could not be sent.';
            echo 'Mailer Error: ' . $mail->ErrorInfo;
        }
    }

    /*
    * update_password_ajax
    * update password entrepreneur
    * @input password, token
    * @output -
    * @author Chutipon Thermsirisuksin 62160081
    * @Create Date 2564-09-17
    * @Update -
    */
    public function update_password_ajax()
    {
        $password = $this->input->post('password');

        $token = $this->input->post('token');

        $this->load->model('Entrepreneur/M_dcs_entrepreneur', 'login');  //load database

        $this->login->ent_password = $password;

        $this->login->update_pass($token);
        $this->session->set_userdata("reset_pass_entrepreneur", "success");
    }

    /*
    * reset_password_page
    * show page reset password
    * @input token
    * @output -
    * @author Chutipon Thermsirisuksin 62160081
    * @Create Date 2564-09-17
    * @Update -
    */
    public function reset_password_page()
    {
        $data['token'] = $this->input->get('token');
        $this->output_login_entrepreneur('entrepreneur/auth/v_reset_password_entrepreneur', $data);
    }
}