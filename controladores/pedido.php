<?php

use manuel\cine\Email;
use manuel\cine\Usuario;
use manuel\cine\Vista;

require 'vendor/phpmailer/phpmailer/src/PHPMailer.php';
require 'vendor/phpmailer/phpmailer/src/SMTP.php';
require 'vendor/phpmailer/phpmailer/src/Exception.php';

Email::send(Usuario::usuario(), "Se ha completado correctamente el proceso de compra de tus entradas. Esperamos volver a verte");

Vista::mostrar('pedido');