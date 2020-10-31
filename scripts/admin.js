$("span[type='button']").click((e) => {
    $(`span[type="count"][otdel='${e
        .currentTarget
        .attributes["otdel"]
        .value}']`)
        .attr("value", Number.parseInt($(`span[type="count"][otdel='${e
            .currentTarget
            .attributes["otdel"]
            .value}']`)
            .attr("value")) + 1);
    let cO = Number.parseInt($(`span[type="count"][otdel='${e
        .currentTarget
        .attributes["otdel"]
        .value}']`)
        .attr("value"))
    // let cO = Number.parseInt(cO) + 1;
    // e.currentTarget.attributes["otdel"].value.attr("value")
    let new_stroke = $(`<input type="text" placeholder="ФИО врача" name='Otdel${e.currentTarget.attributes["otdel"].value}_Doc${Number.parseInt(cO)}_FIO'>
    <input type="text" placeholder="Четные числа" name='Otdel${e.currentTarget.attributes["otdel"].value}_Doc${Number.parseInt(cO)}_Smena1'>
    <input type="text" placeholder="Нечетные числа" name='Otdel${e.currentTarget.attributes["otdel"].value}_Doc${Number.parseInt(cO)}_Smena2' >
    <input type="text" placeholder="Кабинет" name='Otdel${e.currentTarget.attributes["otdel"].value}_Doc${Number.parseInt(cO)}_Kab'>
    <select name='Otdel${e.currentTarget.attributes["otdel"].value}_Doc${Number.parseInt(cO)}_Option'>
      <option value="Работает">Работает</option>
      <option value="Больничный">Больничный</option>
      <option value="Отпуск">Отпуск</option>
    </select>`)
    let btnDelete = $(`<div class="btnDel"><span role="delete">Удалить</span></div>`).click(() => {
        $(`span[type="count"][otdel='${e
            .currentTarget
            .attributes["otdel"]
            .value}']`)
            .attr("value", Number.parseInt($(`span[type="count"][otdel='${e
                .currentTarget
                .attributes["otdel"]
                .value}']`)
                .attr("value")) - 1);
        new_stroke.remove()
        btnDelete.remove()
    })
    $(`.block-inputs[otdel='${e.currentTarget.attributes["otdel"].value}']`).append(new_stroke).append(btnDelete)
})