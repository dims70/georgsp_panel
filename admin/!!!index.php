<?php
  $login = "admin";
  $password = "Reg7417";

  if (!isset($_SERVER['PHP_AUTH_USER'])) {
    header("WWW-Authenticate: Basic");
    header("HTTP/1.0 401 Unauthorized");
    echo "Доступ только для администраторов!";
    exit;
  }

  if ($_SERVER['PHP_AUTH_USER'] == $login && $_SERVER['PHP_AUTH_PW'] == $password) {
    //header("Location: gsp_admin.php") ;
    $schedule = loadfun();

    if (array_key_exists('save', $_POST)){
      $schedule = savefun();
    }

    echo "<form method='POST'>";
    for ( $row = 1; $row <= count($schedule); $row++ ) {
      echo "<input type='text' size='50' name='Otdel".$row."_Label' value='".$schedule['Otdelenie'.$row]['Label']."'><br>";

      for ( $col = 1; $col <= count($schedule['Otdelenie'.$row])-1/*25*/; $col++ ) {
        echo "<input type='text' name='Otdel".$row."_Doc".$col."_FIO' value='".$schedule['Otdelenie'.$row]['Doc'.$col]['FIO']."'>
            <input type='text' name='Otdel".$row."_Doc".$col."_Smena1' value='".$schedule['Otdelenie'.$row]['Doc'.$col]['Smena1']."'>
            <input type='text' name='Otdel".$row."_Doc".$col."_Smena2' value='".$schedule['Otdelenie'.$row]['Doc'.$col]['Smena2']."'>
            <input type='text' name='Otdel".$row."_Doc".$col."_Kab' value='".$schedule['Otdelenie'.$row]['Doc'.$col]['Kab']."'>
            <select name='Otdel".$row."_Doc".$col."_Option'>
              <option value=''></option>
              <option value='Работает'".(($schedule['Otdelenie'.$row]['Doc'.$col]['option'] == 'Работает')?' selected':'').">Работает</option>
              <option value='Больничный'".(($schedule['Otdelenie'.$row]['Doc'.$col]['option'] == 'Больничный')?' selected':'').">Больничный</option>
              <option value='Отпуск'".(($schedule['Otdelenie'.$row]['Doc'.$col]['option'] == 'Отпуск')?' selected':'').">Отпуск</option>
            </select><br>";
      }
      echo('<br>');
    }
    echo "<input type='submit' name='save' id='save' value='Сохранить'></form><br>";
  } else {
    header("WWW-Authenticate: Basic");
    header("HTTP/1.0 401 Unauthorized");
    echo "Доступ только для администраторов!";
  }

//*****************************************

function savefun(){

    $out_array = array(
      'Otdelenie1' => array(
        'Label' => $_POST['Otdel1_Label'],

        'Doc1' => array(
          'FIO' => $_POST['Otdel1_Doc1_FIO'],
          'Smena1' => $_POST['Otdel1_Doc1_Smena1'],
          'Smena2' => $_POST['Otdel1_Doc1_Smena2'],
          'Kab' => $_POST['Otdel1_Doc1_Kab'],
          'option' => $_POST['Otdel1_Doc1_Option']),

        'Doc2' => array(
          'FIO' => $_POST['Otdel1_Doc2_FIO'],
          'Smena1' => $_POST['Otdel1_Doc2_Smena1'],
          'Smena2' => $_POST['Otdel1_Doc2_Smena2'],
          'Kab' => $_POST['Otdel1_Doc2_Kab'],
          'option' => $_POST['Otdel1_Doc2_Option']),

        'Doc3' => array(
          'FIO' => $_POST['Otdel1_Doc3_FIO'],
          'Smena1' => $_POST['Otdel1_Doc3_Smena1'],
          'Smena2' => $_POST['Otdel1_Doc3_Smena2'],
          'Kab' => $_POST['Otdel1_Doc3_Kab'],
          'option' => $_POST['Otdel1_Doc3_Option']),

        'Doc4' => array(
          'FIO' => $_POST['Otdel1_Doc4_FIO'],
          'Smena1' => $_POST['Otdel1_Doc4_Smena1'],
          'Smena2' => $_POST['Otdel1_Doc4_Smena2'],
          'Kab' => $_POST['Otdel1_Doc4_Kab'],
          'option' => $_POST['Otdel1_Doc4_Option']),

        'Doc5' => array(
          'FIO' => $_POST['Otdel1_Doc5_FIO'],
          'Smena1' => $_POST['Otdel1_Doc5_Smena1'],
          'Smena2' => $_POST['Otdel1_Doc5_Smena2'],
          'Kab' => $_POST['Otdel1_Doc5_Kab'],
          'option' => $_POST['Otdel1_Doc5_Option']),

        'Doc6' => array(
          'FIO' => $_POST['Otdel1_Doc6_FIO'],
          'Smena1' => $_POST['Otdel1_Doc6_Smena1'],
          'Smena2' => $_POST['Otdel1_Doc6_Smena2'],
          'Kab' => $_POST['Otdel1_Doc6_Kab'],
          'option' => $_POST['Otdel1_Doc6_Option']),

        'Doc7' => array(
          'FIO' => $_POST['Otdel1_Doc7_FIO'],
          'Smena1' => $_POST['Otdel1_Doc7_Smena1'],
          'Smena2' => $_POST['Otdel1_Doc7_Smena2'],
          'Kab' => $_POST['Otdel1_Doc7_Kab'],
          'option' => $_POST['Otdel1_Doc7_Option']),

        'Doc8' => array(
          'FIO' => $_POST['Otdel1_Doc8_FIO'],
          'Smena1' => $_POST['Otdel1_Doc8_Smena1'],
          'Smena2' => $_POST['Otdel1_Doc8_Smena2'],
          'Kab' => $_POST['Otdel1_Doc8_Kab'],
          'option' => $_POST['Otdel1_Doc8_Option']),

        'Doc9' => array(
          'FIO' => $_POST['Otdel1_Doc9_FIO'],
          'Smena1' => $_POST['Otdel1_Doc9_Smena1'],
          'Smena2' => $_POST['Otdel1_Doc9_Smena2'],
          'Kab' => $_POST['Otdel1_Doc9_Kab'],
          'option' => $_POST['Otdel1_Doc9_Option']),

        'Doc10' => array(
          'FIO' => $_POST['Otdel1_Doc10_FIO'],
          'Smena1' => $_POST['Otdel1_Doc10_Smena1'],
          'Smena2' => $_POST['Otdel1_Doc10_Smena2'],
          'Kab' => $_POST['Otdel1_Doc10_Kab'],
          'option' => $_POST['Otdel1_Doc10_Option']),

        'Doc11' => array(
          'FIO' => $_POST['Otdel1_Doc11_FIO'],
          'Smena1' => $_POST['Otdel1_Doc11_Smena1'],
          'Smena2' => $_POST['Otdel1_Doc11_Smena2'],
          'Kab' => $_POST['Otdel1_Doc11_Kab'],
          'option' => $_POST['Otdel1_Doc11_Option']),

        'Doc12' => array(
          'FIO' => $_POST['Otdel1_Doc12_FIO'],
          'Smena1' => $_POST['Otdel1_Doc12_Smena1'],
          'Smena2' => $_POST['Otdel1_Doc12_Smena2'],
          'Kab' => $_POST['Otdel1_Doc12_Kab'],
          'option' => $_POST['Otdel1_Doc12_Option']),

        'Doc13' => array(
          'FIO' => $_POST['Otdel1_Doc13_FIO'],
          'Smena1' => $_POST['Otdel1_Doc13_Smena1'],
          'Smena2' => $_POST['Otdel1_Doc13_Smena2'],
          'Kab' => $_POST['Otdel1_Doc13_Kab'],
          'option' => $_POST['Otdel1_Doc13_Option']),

        'Doc14' => array(
          'FIO' => $_POST['Otdel1_Doc14_FIO'],
          'Smena1' => $_POST['Otdel1_Doc14_Smena1'],
          'Smena2' => $_POST['Otdel1_Doc14_Smena2'],
          'Kab' => $_POST['Otdel1_Doc14_Kab'],
          'option' => $_POST['Otdel1_Doc14_Option']),

        'Doc15' => array(
          'FIO' => $_POST['Otdel1_Doc15_FIO'],
          'Smena1' => $_POST['Otdel1_Doc15_Smena1'],
          'Smena2' => $_POST['Otdel1_Doc15_Smena2'],
          'Kab' => $_POST['Otdel1_Doc15_Kab'],
          'option' => $_POST['Otdel1_Doc15_Option']),

        'Doc16' => array(
          'FIO' => $_POST['Otdel1_Doc16_FIO'],
          'Smena1' => $_POST['Otdel1_Doc16_Smena1'],
          'Smena2' => $_POST['Otdel1_Doc16_Smena2'],
          'Kab' => $_POST['Otdel1_Doc16_Kab'],
          'option' => $_POST['Otdel1_Doc16_Option']),

        'Doc17' => array(
          'FIO' => $_POST['Otdel1_Doc17_FIO'],
          'Smena1' => $_POST['Otdel1_Doc17_Smena1'],
          'Smena2' => $_POST['Otdel1_Doc17_Smena2'],
          'Kab' => $_POST['Otdel1_Doc17_Kab'],
          'option' => $_POST['Otdel1_Doc17_Option']),

        'Doc18' => array(
          'FIO' => $_POST['Otdel1_Doc18_FIO'],
          'Smena1' => $_POST['Otdel1_Doc18_Smena1'],
          'Smena2' => $_POST['Otdel1_Doc18_Smena2'],
          'Kab' => $_POST['Otdel1_Doc18_Kab'],
          'option' => $_POST['Otdel1_Doc18_Option']),

        'Doc19' => array(
          'FIO' => $_POST['Otdel1_Doc19_FIO'],
          'Smena1' => $_POST['Otdel1_Doc19_Smena1'],
          'Smena2' => $_POST['Otdel1_Doc19_Smena2'],
          'Kab' => $_POST['Otdel1_Doc19_Kab'],
          'option' => $_POST['Otdel1_Doc19_Option']),

        'Doc20' => array(
          'FIO' => $_POST['Otdel1_Doc20_FIO'],
          'Smena1' => $_POST['Otdel1_Doc20_Smena1'],
          'Smena2' => $_POST['Otdel1_Doc20_Smena2'],
          'Kab' => $_POST['Otdel1_Doc20_Kab'],
          'option' => $_POST['Otdel1_Doc20_Option']),

        'Doc21' => array(
          'FIO' => $_POST['Otdel1_Doc21_FIO'],
          'Smena1' => $_POST['Otdel1_Doc21_Smena1'],
          'Smena2' => $_POST['Otdel1_Doc21_Smena2'],
          'Kab' => $_POST['Otdel1_Doc21_Kab'],
          'option' => $_POST['Otdel1_Doc21_Option']),

        'Doc22' => array(
          'FIO' => $_POST['Otdel1_Doc22_FIO'],
          'Smena1' => $_POST['Otdel1_Doc22_Smena1'],
          'Smena2' => $_POST['Otdel1_Doc22_Smena2'],
          'Kab' => $_POST['Otdel1_Doc22_Kab'],
          'option' => $_POST['Otdel1_Doc22_Option']),

        'Doc23' => array(
          'FIO' => $_POST['Otdel1_Doc23_FIO'],
          'Smena1' => $_POST['Otdel1_Doc23_Smena1'],
          'Smena2' => $_POST['Otdel1_Doc23_Smena2'],
          'Kab' => $_POST['Otdel1_Doc23_Kab'],
          'option' => $_POST['Otdel1_Doc23_Option'])
      ),

      'Otdelenie2' => array(
        'Label' => $_POST['Otdel2_Label'],

        'Doc1' => array(
          'FIO' => $_POST['Otdel2_Doc1_FIO'],
          'Smena1' => $_POST['Otdel2_Doc1_Smena1'],
          'Smena2' => $_POST['Otdel2_Doc1_Smena2'],
          'Kab' => $_POST['Otdel2_Doc1_Kab'],
          'option' => $_POST['Otdel2_Doc1_Option']),

        'Doc2' => array(
          'FIO' => $_POST['Otdel2_Doc2_FIO'],
          'Smena1' => $_POST['Otdel2_Doc2_Smena1'],
          'Smena2' => $_POST['Otdel2_Doc2_Smena2'],
          'Kab' => $_POST['Otdel2_Doc2_Kab'],
          'option' => $_POST['Otdel2_Doc2_Option']),

        'Doc3' => array(
          'FIO' => $_POST['Otdel2_Doc3_FIO'],
          'Smena1' => $_POST['Otdel2_Doc3_Smena1'],
          'Smena2' => $_POST['Otdel2_Doc3_Smena2'],
          'Kab' => $_POST['Otdel2_Doc3_Kab'],
          'option' => $_POST['Otdel2_Doc3_Option']),

        'Doc4' => array(
          'FIO' => $_POST['Otdel2_Doc4_FIO'],
          'Smena1' => $_POST['Otdel2_Doc4_Smena1'],
          'Smena2' => $_POST['Otdel2_Doc4_Smena2'],
          'Kab' => $_POST['Otdel2_Doc4_Kab'],
          'option' => $_POST['Otdel2_Doc4_Option'])
      ),

      'Otdelenie3' => array(
        'Label' => $_POST['Otdel3_Label'],

        'Doc1' => array(
          'FIO' => $_POST['Otdel3_Doc1_FIO'],
          'Smena1' => $_POST['Otdel3_Doc1_Smena1'],
          'Smena2' => $_POST['Otdel3_Doc1_Smena2'],
          'Kab' => $_POST['Otdel3_Doc1_Kab'],
          'option' => $_POST['Otdel3_Doc1_Option']),

        'Doc2' => array(
          'FIO' => $_POST['Otdel3_Doc2_FIO'],
          'Smena1' => $_POST['Otdel3_Doc2_Smena1'],
          'Smena2' => $_POST['Otdel3_Doc2_Smena2'],
          'Kab' => $_POST['Otdel3_Doc2_Kab'],
          'option' => $_POST['Otdel3_Doc2_Option']),

        'Doc3' => array(
          'FIO' => $_POST['Otdel3_Doc3_FIO'],
          'Smena1' => $_POST['Otdel3_Doc3_Smena1'],
          'Smena2' => $_POST['Otdel3_Doc3_Smena2'],
          'Kab' => $_POST['Otdel3_Doc3_Kab'],
          'option' => $_POST['Otdel3_Doc3_Option']),

        'Doc4' => array(
          'FIO' => $_POST['Otdel3_Doc4_FIO'],
          'Smena1' => $_POST['Otdel3_Doc4_Smena1'],
          'Smena2' => $_POST['Otdel3_Doc4_Smena2'],
          'Kab' => $_POST['Otdel3_Doc4_Kab'],
          'option' => $_POST['Otdel3_Doc4_Option']),

        'Doc5' => array(
          'FIO' => $_POST['Otdel3_Doc5_FIO'],
          'Smena1' => $_POST['Otdel3_Doc5_Smena1'],
          'Smena2' => $_POST['Otdel3_Doc5_Smena2'],
          'Kab' => $_POST['Otdel3_Doc5_Kab'],
          'option' => $_POST['Otdel3_Doc5_Option']),

        'Doc6' => array(
          'FIO' => $_POST['Otdel3_Doc6_FIO'],
          'Smena1' => $_POST['Otdel3_Doc6_Smena1'],
          'Smena2' => $_POST['Otdel3_Doc6_Smena2'],
          'Kab' => $_POST['Otdel3_Doc6_Kab'],
          'option' => $_POST['Otdel3_Doc6_Option'])
      ),

      'Otdelenie4' => array(
        'Label' => $_POST['Otdel4_Label'],

        'Doc1' => array(
          'FIO' => $_POST['Otdel4_Doc1_FIO'],
          'Smena1' => $_POST['Otdel4_Doc1_Smena1'],
          'Smena2' => $_POST['Otdel4_Doc1_Smena2'],
          'Kab' => $_POST['Otdel4_Doc1_Kab'],
          'option' => $_POST['Otdel4_Doc1_Option']),

        'Doc2' => array(
          'FIO' => $_POST['Otdel4_Doc2_FIO'],
          'Smena1' => $_POST['Otdel4_Doc2_Smena1'],
          'Smena2' => $_POST['Otdel4_Doc2_Smena2'],
          'Kab' => $_POST['Otdel4_Doc2_Kab'],
          'option' => $_POST['Otdel4_Doc2_Option']),

        'Doc3' => array(
          'FIO' => $_POST['Otdel4_Doc3_FIO'],
          'Smena1' => $_POST['Otdel4_Doc3_Smena1'],
          'Smena2' => $_POST['Otdel4_Doc3_Smena2'],
          'Kab' => $_POST['Otdel4_Doc3_Kab'],
          'option' => $_POST['Otdel4_Doc3_Option']),

        'Doc4' => array(
          'FIO' => $_POST['Otdel4_Doc4_FIO'],
          'Smena1' => $_POST['Otdel4_Doc4_Smena1'],
          'Smena2' => $_POST['Otdel4_Doc4_Smena2'],
          'Kab' => $_POST['Otdel4_Doc4_Kab'],
          'option' => $_POST['Otdel4_Doc4_Option']),

        'Doc5' => array(
          'FIO' => $_POST['Otdel4_Doc5_FIO'],
          'Smena1' => $_POST['Otdel4_Doc5_Smena1'],
          'Smena2' => $_POST['Otdel4_Doc5_Smena2'],
          'Kab' => $_POST['Otdel4_Doc5_Kab'],
          'option' => $_POST['Otdel4_Doc5_Option']),

        'Doc6' => array(
          'FIO' => $_POST['Otdel4_Doc6_FIO'],
          'Smena1' => $_POST['Otdel4_Doc6_Smena1'],
          'Smena2' => $_POST['Otdel4_Doc6_Smena2'],
          'Kab' => $_POST['Otdel4_Doc6_Kab'],
          'option' => $_POST['Otdel4_Doc6_Option']),

        'Doc7' => array(
          'FIO' => $_POST['Otdel4_Doc7_FIO'],
          'Smena1' => $_POST['Otdel4_Doc7_Smena1'],
          'Smena2' => $_POST['Otdel4_Doc7_Smena2'],
          'Kab' => $_POST['Otdel4_Doc7_Kab'],
          'option' => $_POST['Otdel4_Doc7_Option'])
      ),

      'Otdelenie5' => array(
        'Label' => $_POST['Otdel5_Label'],

        'Doc1' => array(
          'FIO' => $_POST['Otdel5_Doc1_FIO'],
          'Smena1' => $_POST['Otdel5_Doc1_Smena1'],
          'Smena2' => $_POST['Otdel5_Doc1_Smena2'],
          'Kab' => $_POST['Otdel5_Doc1_Kab'],
          'option' => $_POST['Otdel5_Doc1_Option'])
      )
    );

    $file = 'schedule.dat';
    $new_file = 'schedule.dat.bak';

    if (copy($file, $new_file)) {
      //echo "Файл успешно скопирован!";
      $fd = fopen ("schedule.dat", "w");
      fwrite($fd, serialize($out_array)."\r\n");
      fclose($fd);
    } else {
      echo "Файл не удалось скопировать!";
    }

    return $out_array;
  }

  function loadfun(){
    $fd = fopen ("schedule.dat", "r");
    $int_array = unserialize(fread($fd, 10000));
    fclose($fd);

    return $int_array;
  }

//*****************************************
?>