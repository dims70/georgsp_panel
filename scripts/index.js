setInterval(getData, 15000);

let labelrow = `<div class='row border-line'>
  <div class='col-4 d-none d-lg-block text-label'>ФИО ВРАЧА</div>
  <div class='col d-none d-lg-block'>ЧЕТНЫЕ ЧИСЛА</div>
  <div class='col d-none d-lg-block'>НЕЧЕТНЫЕ ЧИСЛА</div>
  <div class='col-3 d-none d-lg-block'>КАБИНЕТ</div>
  </div>`
//## загрузка названий отделений 1раз при загрузке страницы
function loadlabels() {
  
  let xhr = new XMLHttpRequest()
  xhr.open("GET", "admin/schedule_json.dat")
  xhr.send()
  xhr.onload = function () {
    let responseJsonData = JSON.parse(xhr.response)
    var arrayJsonData = Object.entries(responseJsonData)
    let onecol = $(`<div class='col-xl-6 onecol'></div>`)
    for (let objIndex = 0; objIndex < arrayJsonData.length; objIndex++) {
      if (objIndex == 0) {
        let label = $(`<div class='col-xl-6'>
            <div class='row label'>
              <div class='col'>
                ${arrayJsonData[objIndex][1].Label}
              </div>
            </div>
            ${labelrow}
            
            <div class='item-inner'></div>
      </div>`);
        $('.row-content').append(label)
      }
      else {
        let label1 = $(`
            <div class='row ${objIndex == 4 ? "label_" : "label"}'>
              <div class='col'>
                ${arrayJsonData[objIndex][1].Label}
              </div>
            </div>
            ${objIndex > 1 ? "" : labelrow}
            <div class='item-inner'></div>`);
        onecol.append(label1)
        if (objIndex == 4) {
          $('.row-content').append(onecol)
                }
        
            }
      
    }
  }
}
//
loadlabels()
getData()
function getData() {
  getLines(0).then(htmldata => document.querySelectorAll('.item-inner')[0].innerHTML = htmldata)  
  getLines(1).then(htmldata => document.querySelectorAll('.item-inner')[1].innerHTML = htmldata)  
  getLines(2).then(htmldata => document.querySelectorAll('.item-inner')[2].innerHTML = htmldata)  
  getLines(3).then(htmldata => document.querySelectorAll('.item-inner')[3].innerHTML = htmldata)  
  getLines(4).then(htmldata => document.querySelectorAll('.item-inner')[4].innerHTML = htmldata )  
};

function getLines(idotdel) {
  var promise = new Promise((resolve, reject) => {
  let otdel = "";
  let xhr = new XMLHttpRequest()
  xhr.open("GET", "admin/schedule_json.dat")
  xhr.send()
  xhr.onload = function () {
    let responseJsonData = JSON.parse(xhr.response)
    var arrayJsonData = Object.entries(responseJsonData)
    let alldoc = Object.values(arrayJsonData[idotdel][1])
    for (let i = 1; i < alldoc.length; i++) {
      otdel += `<div class="row">
        <div class="col-lg-4">${alldoc[i].FIO}</div>
        <div class="col-7 d-lg-none d-block">Четные числа:</div>
        <div class="col time-label">${alldoc[i].Smena1}</div>
        <div class="col-7 d-lg-none d-block">Нечетные числа:</div>
        <div class="col time-label">${alldoc[i].Smena2}</div>
        <div class="col-7 d-lg-none d-block">Кабинет:</div>
        <div class="col-3 ${alldoc[i].option == "Работает"? "kab-label":"time-label"} kab-label">${alldoc[i].option != "Работает" ? alldoc[i].option : (!isNaN(Number.parseInt(alldoc[i].Kab)) ? alldoc[i].Kab : alldoc[i].option)
    }</div >
      </div>`
    }
    resolve(otdel)
    }

  })
  return promise;
}



function getNormalText(text,option) {
  switch (text) {
    case "Отпуск":
      return "Отпуск"
      break;
    case "Больничный":
      return "Больничный"
      break;
    case "":
      return option
    default:
      return option ? option : "Ошибка привязки."
    }
}
