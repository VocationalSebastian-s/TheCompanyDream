
<?php
print_r($_FILES)."<br />";
/*
Array ( 
[uoloadFile] => Array ( 
[name] => Chrysanthemum.jpg 
[type] => image/pjpeg 
[tmp_name] => C:\Windows\Temp\php7679.tmp 
[error] => 0 
[size] => 879394 ) ) 
*/
echo $ _FILES ['uoloadFile'] ['tmp_name']. "<br />"; // La ruta del archivo cargado
//C:\Windows\Temp\php7679.tmp
 
echo $_SERVER['DOCUMENT_ROOT']."<br />";
//D:/Program Files (x86)/Apache Software Foundation/PHPWorkspace
 
echo __FILE__."<br />";
//D:\Program Files (x86)\Apache Software Foundation\PHPWorkspace\Test\Test\index.php
 
 // La función basename (ruta, sufijo) devuelve la parte del nombre del archivo de la ruta.
 // ruta: requerida. Especifica la ruta a verificar.
 //Sufijo (opcional. Especifica la extensión del archivo. Si el archivo tiene sufijo, esta extensión no se generará.
echo basename(__FILE__)."<br />";
//index.php
 
echo basename(__FILE__, '.php')."<br />";
//index
 
echo dirname(__FILE__)."<br />";
//D:\Program Files (x86)\Apache Software Foundation\PHPWorkspace\Test\Test
 
 // La función dirname (ruta) devuelve la parte del directorio de la ruta. El parámetro de ruta es una cadena que contiene la ruta completa a un archivo. Esta función devuelve el nombre del directorio después de eliminar el nombre del archivo.
echo dirname(dirname(__FILE__))."<br />";
//D:\Program Files (x86)\Apache Software Foundation\PHPWorkspace\Test
