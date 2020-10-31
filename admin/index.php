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
    echo "<head>
    <link rel='stylesheet' href='../css/admin.css'>
    </head>
    <body>";
    echo "<form method='POST'>";
    $i=1;
    foreach ($schedule as $name_otdel => $doctors) {
      echo "<h3>$name_otdel</h3>";
      $countd=count($doctors);
      echo "<span type='count' otdel='$i' value='$countd'></span>";
      echo "<div class='block-inputs' otdel='$i'>";

      foreach ($doctors as $doctor_id => $array_prop_doc) {
        foreach ($array_prop_doc as $prop => $value) {
          
          if(strpos($prop,"_Option")){
            echo check_option($prop,$value)."<br>";
          }
          else{
            echo "<input type='text' name='$prop' value='$value'>";
          }
        }
      }
      // for ( $col = 1; $col <= count($schedule['Otdelenie'.$row])-1/*25*/; $col++ ) {
      //   echo "<input type='text' name='Otdel".$row."_Doc".$col."_FIO' value='".$schedule['Otdelenie'.$row]['Doc'.$col]['FIO']."'>
      //       <input type='text' name='Otdel".$row."_Doc".$col."_Smena1' value='".$schedule['Otdelenie'.$row]['Doc'.$col]['Smena1']."'>
      //       <input type='text' name='Otdel".$row."_Doc".$col."_Smena2' value='".$schedule['Otdelenie'.$row]['Doc'.$col]['Smena2']."'>
      //       <input type='text' name='Otdel".$row."_Doc".$col."_Kab' value='".$schedule['Otdelenie'.$row]['Doc'.$col]['Kab']."'>";
      //       if($col == count($schedule['Otdelenie'.$row])-1){
      //         echo "<span type='count' style='display:none' otdel='$row' value='$col'></span>";
      //       }
      //   echo "<select name='Otdel".$row."_Doc".$col."_Option'>
      //         <option value=''></option>
      //         <option value='Работает'".(($schedule['Otdelenie'.$row]['Doc'.$col]['option'] == 'Работает')?' selected':'').">Работает</option>
      //         <option value='Больничный'".(($schedule['Otdelenie'.$row]['Doc'.$col]['option'] == 'Больничный')?' selected':'').">Больничный</option>
      //         <option value='Отпуск'".(($schedule['Otdelenie'.$row]['Doc'.$col]['option'] == 'Отпуск')?' selected':'').">Отпуск</option>
      //       </select>
      //       <br>";
      // }

      echo("</div><span type='button' otdel='$i'>Добавить</span><br>");
      $i++;
    }
    echo "<input type='submit' name='save' id='save' value='Сохранить'></form><br>";
  } else {
    header("WWW-Authenticate: Basic");
    header("HTTP/1.0 401 Unauthorized");
    echo "Доступ только для администраторов!";
  }

//*****************************************

function savefun(){
  $out_array;
  // $json_data=json_encode($_POST,JSON_UNESCAPED_UNICODE);
  // echo $json_data;
  $out_array=array(
    'Терапевтическое отделение'=>array(),
    'Хирургический прием'=>array(),
    'Ортопедическое отделение'=>array(),
    'Детское отделение'=>array(),
    'Дежурный администратор'=>array()
  );

  $teraotd=1;$hiruotd=1;$ortop=1;$kidsotd=1;$degotd=1;
  $temp_array=array();
  $temp_data_arr=array();
  foreach ($_POST as $key => $value) {
    switch ($key) {
      case strpos($key,"Otdel1")!==false:
        switch ($key) {
            case strpos($key,"Otdel1_"."Doc$teraotd"."_FIO")!==false:
              $temp_data_arr=array($key=>$value);
              $temp_array=array_merge($temp_array,$temp_data_arr);
              $temp_data_arr=array();
              // array_push($temp_array,$value);
              break;
            case strpos($key,"Otdel1_"."Doc$teraotd"."_Smena1")!==false:
              $temp_data_arr=array($key=>$value);
              $temp_array=array_merge($temp_array,$temp_data_arr);
              $temp_data_arr=array();
              // array_push($temp_array,$value);
              break;
            case strpos($key,"Otdel1_"."Doc$teraotd"."_Smena2")!==false:
              $temp_data_arr=array($key=>$value);
              $temp_array=array_merge($temp_array,$temp_data_arr);
              $temp_data_arr=array();
              // array_push($temp_array,$value);
              break;
            case strpos($key,"Otdel1_"."Doc$teraotd"."_Kab")!==false:
              $temp_data_arr=array($key=>$value);
              $temp_data_arr=array();

              // array_push($temp_array,$value);
              break;
            case strpos($key,"Otdel1_"."Doc$teraotd"."_Option")!==false:
              $temp_data_arr=array($key=>$value);
              $temp_array=array_merge($temp_array,$temp_data_arr);
              $temp_array=array_merge($temp_array,$temp_data_arr);
              $temp_array=array_merge($temp_array,$temp_data_arr);
              $temp_data_arr=array();
              // array_push($temp_array,$value);
              $teraotd++;
              array_push($out_array['Терапевтическое отделение'],$temp_array);
              $temp_array=array();
              break;
          }
          // $out_array["Терапевтическое отделение"][$key]=$value;
          break;
      case strpos($key,"Otdel2")!==false:
        switch ($key) {
          case strpos($key,"Otdel2_"."Doc$hiruotd"."_FIO")!==false:
            $temp_data_arr=array($key=>$value);
              $temp_array=array_merge($temp_array,$temp_data_arr);
              $temp_data_arr=array();
            break;
          case strpos($key,"Otdel2_"."Doc$hiruotd"."_Smena1")!==false:
            $temp_data_arr=array($key=>$value);
              $temp_array=array_merge($temp_array,$temp_data_arr);
              $temp_data_arr=array();
            break;
          case strpos($key,"Otdel2_"."Doc$hiruotd"."_Smena2")!==false:
            $temp_data_arr=array($key=>$value);
              $temp_array=array_merge($temp_array,$temp_data_arr);
              $temp_data_arr=array();
            break;
          case strpos($key,"Otdel2_"."Doc$hiruotd"."_Kab")!==false:
            $temp_data_arr=array($key=>$value);
              $temp_array=array_merge($temp_array,$temp_data_arr);
              $temp_data_arr=array();
            break;
          case strpos($key,"Otdel2_"."Doc$hiruotd"."_Option")!==false:
            $temp_data_arr=array($key=>$value);
              $temp_array=array_merge($temp_array,$temp_data_arr);
              $temp_data_arr=array();
            $hiruotd++;
            array_push($out_array['Хирургический прием'],$temp_array);
            $temp_array=array();
            break;
        }
          // echo $key."\r\n";
          break;
      case strpos($key,"Otdel3")!==false:
        switch ($key) {
          case strpos($key,"Otdel3_"."Doc$ortop"."_FIO")!==false:
            
            $temp_data_arr=array($key=>$value);
              $temp_array=array_merge($temp_array,$temp_data_arr);
              $temp_data_arr=array();
            break;
          case strpos($key,"Otdel3_"."Doc$ortop"."_Smena1")!==false:
            $temp_data_arr=array($key=>$value);
              $temp_array=array_merge($temp_array,$temp_data_arr);
              $temp_data_arr=array();
            break;
          case strpos($key,"Otdel3_"."Doc$ortop"."_Smena2")!==false:
            $temp_data_arr=array($key=>$value);
              $temp_array=array_merge($temp_array,$temp_data_arr);
              $temp_data_arr=array();
            break;
          case strpos($key,"Otdel3_"."Doc$ortop"."_Kab")!==false:
            $temp_data_arr=array($key=>$value);
              $temp_array=array_merge($temp_array,$temp_data_arr);
              $temp_data_arr=array();
            break;
          case strpos($key,"Otdel3_"."Doc$ortop"."_Option")!==false:
            $temp_data_arr=array($key=>$value);
              $temp_array=array_merge($temp_array,$temp_data_arr);
              $temp_data_arr=array();
            $ortop++;
            array_push($out_array['Ортопедическое отделение'],$temp_array);
            $temp_array=array();
            break;
        }
          // echo $key."\r\n";
          break;
      case strpos($key,"Otdel4")!==false:
        switch ($key) {
          case strpos($key,"Otdel4_"."Doc$kidsotd"."_FIO")!==false:
            $temp_data_arr=array($key=>$value);
              $temp_array=array_merge($temp_array,$temp_data_arr);
              $temp_data_arr=array();
            break;
          case strpos($key,"Otdel4_"."Doc$kidsotd"."_Smena1")!==false:
            $temp_data_arr=array($key=>$value);
              $temp_array=array_merge($temp_array,$temp_data_arr);
              $temp_data_arr=array();
            break;
          case strpos($key,"Otdel4_"."Doc$kidsotd"."_Smena2")!==false:
            $temp_data_arr=array($key=>$value);
              $temp_array=array_merge($temp_array,$temp_data_arr);
              $temp_data_arr=array();
            break;
          case strpos($key,"Otdel4_"."Doc$kidsotd"."_Kab")!==false:
            $temp_data_arr=array($key=>$value);
              $temp_array=array_merge($temp_array,$temp_data_arr);
              $temp_data_arr=array();
            break;
          case strpos($key,"Otdel4_"."Doc$kidsotd"."_Option")!==false:
            $temp_data_arr=array($key=>$value);
              $temp_array=array_merge($temp_array,$temp_data_arr);
              $temp_data_arr=array();
            $kidsotd++;
            array_push($out_array['Детское отделение'],$temp_array);
            $temp_array=array();
            break;
        }
          // echo $key."\r\n";
          break;
      case strpos($key,"Otdel5")!==false:
        switch ($key) {
          case strpos($key,"Otdel5_"."Doc$degotd"."_FIO")!==false:
            $temp_data_arr=array($key=>$value);
              $temp_array=array_merge($temp_array,$temp_data_arr);
              $temp_data_arr=array();
            break;
          case strpos($key,"Otdel5_"."Doc$degotd"."_Smena1")!==false:
            $temp_data_arr=array($key=>$value);
              $temp_array=array_merge($temp_array,$temp_data_arr);
              $temp_data_arr=array();
            break;
          case strpos($key,"Otdel5_"."Doc$degotd"."_Smena2")!==false:
            $temp_data_arr=array($key=>$value);
              $temp_array=array_merge($temp_array,$temp_data_arr);
              $temp_data_arr=array();
            break;
          case strpos($key,"Otdel5_"."Doc$degotd"."_Kab")!==false:
            $temp_data_arr=array($key=>$value);
              $temp_array=array_merge($temp_array,$temp_data_arr);
              $temp_data_arr=array();
            break;
          case strpos($key,"Otdel5_"."Doc$degotd"."_Option")!==false:
            $temp_data_arr=array($key=>$value);
              $temp_array=array_merge($temp_array,$temp_data_arr);
              $temp_data_arr=array();
            $degotd++;
            array_push($out_array['Дежурный администратор'],$temp_array);
            $temp_array=array();
            break;
        }
          // echo $key."\r\n";  
        break;
      }
  }
  // echo json_decode($json_data,true);
    // $out_array = array(
    //   'Otdelenie1' => array(
    //     'Label' => $_POST['Otdel1_Label'],--заменено на название отделения в массиве

    //     'Doc1' => array(
    //       'FIO' => $_POST['Otdel1_Doc1_FIO'],
    //       'Smena1' => $_POST['Otdel1_Doc1_Smena1'],
    //       'Smena2' => $_POST['Otdel1_Doc1_Smena2'],
    //       'Kab' => $_POST['Otdel1_Doc1_Kab'],
    //       'option' => $_POST['Otdel1_Doc1_Option']),

		$file_json = 'schedule_json.dat';
		$new_file_json = 'schedule_json.dat.bak';

		if (copy($file_json,$new_file_json)) {
			//echo "Файл успешно скопирован!";
			$fd = fopen ($file_json, "w");
			fwrite($fd, json_encode($out_array,JSON_UNESCAPED_UNICODE));
			fclose($fd);	
		} else {
			echo "Файл не удалось скопировать!";
		}

    return $out_array;
  }

  function loadfun(){
    $fd = fopen ("schedule_json.dat", "r");
    $int_array = json_decode(fread($fd, 10000),true);
    fclose($fd);

    return $int_array;
  }
  function check_option($key,$value){
    switch ($value) {
      case "Работает":
        return "<select name='$key'><option value=''></option>
            <option value='Работает' selected>Работает</option>
            <option value='Больничный'>Больничный</option>
            <option value='Отпуск'>Отпуск</option></select>";
        break;
      
      case "Больничный":
        return "<select name='$key'><option value=''></option>
            <option value='Работает' >Работает</option>
            <option value='Больничный' selected>Больничный</option>
            <option value='Отпуск'>Отпуск</option></select>";
        break;
      case "Отпуск":
        return "<select name='$key'><option value=''></option>
            <option value='Работает' >Работает</option>
            <option value='Больничный'>Больничный</option>
            <option value='Отпуск' selected>Отпуск</option></select>";
        break; 
      default:
        return "<select name='$key'><option value='' selected></option>
            <option value='Работает' >Работает</option>
            <option value='Больничный'>Больничный</option>
            <option value='Отпуск'>Отпуск</option></select>";
        break; 
    }
  }
  //*****************************************
?>
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="../scripts/admin.js"></script>
</body>
