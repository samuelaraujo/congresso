<?php

//ocultar os warning e alerts do php
error_reporting(E_ALL ^ E_WARNING);
ini_set('display_errors', 1);

//definindo os dados de acesso ao banco de dados
define('DB', 'mysql');
define('DB_HOST', 'localhost');
define('DB_NAME', 'congresso');
define('DB_USER', 'root');
define('DB_PASS', 'root');
define('SALT', '&$15#*cg!1='); //nunca mudar(salt padrão)

//definindo as URLs padrões do sistema e site
define('URL_APP', 'http://congresso.dev');
define('TITLE_APP', 'Iº CONGRESSO JURÍDICO :: UNINORTE ACRE');
define('EMAIL_NOREPLAY', 'naoresponda@congressojuridicoacre.com.br');
define('EMAIL_SUPPORT', 'jaissonssantos@gmail.com');
define('DEBUG', false);

//PagSeguro
define('PAGSEURO_EMAIL', 'jaissonssantos@gmail.com');
define('PAGSEURO_TOKEN', 'A23B0F63E9684FF489709FC57243801A');
define('sessionURL', 'https://ws.sandbox.pagseguro.uol.com.br/v2/sessions');
define('transactionsURL', 'https://ws.sandbox.pagseguro.uol.com.br/v2/transactions');
define('notificationsURL', 'https://ws.pagseguro.uol.com.br/v3/transactions/notifications');
define('javascriptURL', 'https://stc.sandbox.pagseguro.uol.com.br/pagseguro/api/v2/checkout/pagseguro.directpayment.js');


// Storage
// define('STORAGE_URL', 'https://markday.imgix.net');
// define('STORAGE_HOST', 'https://markday.com.br:2053');
// define('STORAGE_KEY', 'asWWxGfsfvnfgd');
// define('STORAGE_SECRET', 'dfvSsdHwvyjrpgGHFsqFrsdcEdccB');
