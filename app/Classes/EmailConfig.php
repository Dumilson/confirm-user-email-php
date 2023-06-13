<?php

namespace App\Classes;

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

class EmailConfig
{
    public function sendEmail($to, $name, $hash)
    {
        $mail = new PHPMailer(true);
    try {
            $mail->isSMTP();
            $mail->Host = EMAIL_CONFIG['Host'];
            $mail->SMTPAuth = EMAIL_CONFIG['SMTPAuth'];
            $mail->Username = EMAIL_CONFIG['Username'];
            $mail->Password = EMAIL_CONFIG['Password'];
            $mail->SMTPSecure = EMAIL_CONFIG['SMTPSecure'];
            $mail->Port = EMAIL_CONFIG['Port'];
            $mail->CharSet = EMAIL_CONFIG['CharSet'];
            $mail->setFrom(EMAIL_CONFIG['Username'], 'Domingos Braganha');
            $mail->addAddress($to, $name);
            $mail->isHTML(true);
            $mail->Subject = 'Confirmação de Conta';
            $mail->Body = '<style> 
                body {
                  font-family: Arial, sans-serif;
                  background-color: #f2f2f2;
                }
                .container {
                  max-width: 600px;
                  margin: 0 auto;
                  padding: 20px;
                  background-color: #fff;
                  border-radius: 5px;
                  box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
                }
                h1 {
                  color: #333;
                }
                p {
                  color: #555;
                }
                .button {
                  display: inline-block;
                  margin-top: 20px;
                  padding: 10px 20px;
                  background-color: #4caf50;
                  color: #fff;
                  text-decoration: none;
                  border-radius: 5px;
                  font-weight: bold;
                }
                .button:hover {
                  background-color: #45a049;
                }
              </style>
            </head>
            <body>
              <div class="container">
                <h1>Confirmação de Conta</h1>
                <p>Para confirmar a sua conta, clique no link abaixo:</p>
                <a href="'.DIRPAGE.'/confirmar.php?hash='.$hash.'" class="button">Confirmar Conta</a>
              </div>';


            $mail->send();
            return true;
        } catch (Exception $e) {
            // echo 'Erro ao enviar o e-mail: ' . $mail->ErrorInfo;
            return false;
        }
    }
}
