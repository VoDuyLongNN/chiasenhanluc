<?php
    header("Access-Control-Allow-Origin: *");
    class ForgotPassword extends Controller
    {
        function show()
        {
            self::view("ForgotPassword");
        }

        function recovery()
        {
            require "./Public/package/PHPMailer-master/src/PHPMailer.php"; 
            require "./Public/package/PHPMailer-master/src/SMTP.php"; 
            require './Public/package/PHPMailer-master/src/Exception.php'; 
        
                $email = isset($_POST['email']) ? $_POST['email'] : null;
                $newPassWord = "";
                
                //tạo mật khẩu mới random
                for($i = 0; $i < 6; $i++)
                {
                    $newPassWord = $newPassWord.random_int(1,9);
                }

                $mode = $this->model("UserModel");

                    $mail = new PHPMailer\PHPMailer\PHPMailer(true);//true:xử lý lỗi nếu có

                        if($mode->checkEmail($email) === true)
                        {
                            try {
                                $mail->SMTPDebug = 0; //0,1,2: chế độ debug. khi chạy ngon thì chỉnh lại 0 nhé
                                $mail->isSMTP();  
                                $mail->CharSet  = "utf-8";
                                $mail->Host = 'smtp.gmail.com';  //địa chỉ mail sever gmail
                                $mail->SMTPAuth = true; // Enable authentication
                                $mail->Username = 'myphamskincares@gmail.com'; //TK email gửi
                                $mail->Password = 'ifyhydkcxtdgwazl';   // pass email gửi
                                $mail->SMTPSecure = 'ssl';  // encryption SSL/Port = 465  TSL/Port = 587
                                $mail->Port = 465;  // port to connect to                
                                $mail->setFrom('myphamskincares@gmail.com', 'NQASkincare' ); //địa chỉ email người gửi
                                $mail->addAddress($email, $email); //mail và tên người nhận  
                                $mail->isHTML(true);  // Set email format to HTML
                                $mail->Subject = 'Quên mật khẩu'; //tiêu đề thư
                
                                $mail->Body = 
                                            "<div class='Main__Mailer'
                                                        style='
                                                            background: #f3f3f3;
                                                            width: 700px;
                                                            height: 500px;
                                                            border-radius: 10px;
                                                            color: #252a2b;                         
                                                        '>
                                                        <img style='
                                                                width: 150px; 
                                                                height: 150px; 
                                                                margin: 10px 40%;
                                                                border-radius: 50%;'  
                                                                src='https://adtimin.vn/wp-content/uploads/2017/09/Logo-1.jpg' >  
        
                                                        <h2 style='text-align: center'>Quên mật khẩu</h2>
        
                                                        <div style='margin: 0 87px;'>
                                                            <h3>Xin chào:$email</h3>
                                                            <p style='color: rgb(119,119,119)'>Chúc mừng bạn lấy mật khẩu mới thành công!!!
                                                            <hr> 
                                                            <p style='color: rgb(119,119,119); line-height: 1.7;'>
                                                                Mật khẩu mới:  <b style='font-weight: bold'>$newPassWord</b>
                                                                <br>
                                                                Bạn vui lòng đổi mật khẩu mạnh hơn
                                                                <br>
                                                                Hãy bảo quản thông tin kỹ lưỡng tránh tình trạng tổn thất về thông tin và tài sản.
                                                                <br>
                                                                Nếu bạn có câu hỏi nào hãy liên hệ với ADMIN website để được giúp đỡ nhanh nhất!!!
                                                                <br>xin cảm ơn bạn.
                                                            </p>
                                                        </div>                   
                                                    </div>"; 
                                $mail->smtpConnect( array(
                                    "ssl" => array(
                                    "verify_peer" => false,
                                    "verify_peer_name" => false,
                                    "allow_self_signed" => true
                                    )
                                ));
                                $mail->send(); //gủi mail

                                $mode->recovery($email,password_hash($newPassWord, PASSWORD_DEFAULT));
                                echo 'Mật khẩu mới đã gửi vào Email của bạn. Vui lòng đổi mật khẩu mới an toàn hơn!!!';
                            } catch (Exception $e) {
                            }
                        }
                        else
                            echo "Email bạn nhập chưa được liên kết tài khoản";
            }
    }
?>