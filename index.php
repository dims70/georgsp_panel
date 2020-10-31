<!doctype html>
<html lang="ru">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>График работы</title>
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel='stylesheet' href='css/style.css'>
  </head>

  <body>

    <span id='hours'>
      <script language = "JavaScript" type = "text/javascript">

        obj_hours = document.getElementById("hours");

        name_month = new Array ("Января","Февраля","Марта","Апреля","Мая","Июня","Июля","Августа","Сентября","Октября","Ноября","Декабря");
        name_day = new Array ("Воскресенье","Понедельник","Вторник","Среда","Четверг","Пятница","Суббота");

        var sep
        function wr_hours() {
          time = new Date();

          time_sec = time.getSeconds();
          time_min = time.getMinutes();
          time_hours = time.getHours();
          //time_wr = ((time_hours < 10) ? "0" : "") + time_hours;
          time_wr = time_hours;
          sep = ((sep == ":") ? " " : ":");
          time_wr += sep;
          //time_wr += ":";
          time_wr += ((time_min < 10) ? "0" : "") + time_min;
          time_wr += " ";
          //time_wr+=((time_sec<10)?"0":"")+time_sec;

          dateNum = ((time.getDate() % 2) ? "Нечетное число" : "Четное число");

          time_wr = "<div class='container-fluid fixed-top d-none d-lg-block'><div class='row'><div class='col-md-6 date'>"+name_day[time.getDay()]+", "+time.getDate()+" "+name_month[time.getMonth()]+" "+time.getFullYear()+"<br>"+dateNum+"</div><div class='col-md-6 text-right time'>"+time_wr+"<span class='second'>"+((time_sec<10)?"0":"")+time_sec+"</span></div></div></div>";

          obj_hours.innerHTML = time_wr;
        }

        wr_hours();
        setInterval(wr_hours, 1000);

      </script>
      
    </span>

    <div class="container-fluid">
      <div class="row justify-content-center">
        <div class="col-xs-12 text-center">
          <h4>ГРАФИК РАБОТЫ ВРАЧЕЙ</h1>
          <h6>ГЕОРГИЕВСКОЙ СТОМАТОЛОГИЧЕСКОЙ ПОЛИКЛИНИКИ</h3>
        </div>
      </div>
    <div class='row row-content'>
        </div>
    </div>
    </div>

    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
    <script src="scripts/index.js"></script>
  </body>
</html>