<table id="list-bang" class="tbplugin">
    <tr class="titletb">
        <td colspan="6">
            <span class="sans-serif">
                Danh sách bảng
            </span>
        </td>
    </tr>

    <tr>

        <td class="td_logo" colspan="6">

<select
    data-role="none"
    id="select-formbang"
    class="modern-select"
    onchange="changeFormbang(this)"
> 
    <?php

    $id_formbang = $_GET['id_formbang'] ?? '';

    $data_formbang1 =
    $conn->query("SELECT * FROM decor_formbang")->fetchAll();

    foreach ($data_formbang1 as $row_formbang1){

        $url_svgform1 =
        "img/".$row_formbang1['tenfile'].".png";

        $selected =
        ($id_formbang == $row_formbang1['ID_formbang'])
        ? 'selected'
        : '';
    ?>

    <option
        value="<?php echo $row_formbang1['ID_formbang']; ?>"
        data-img_src="<?php echo $url_svgform1; ?>"
        <?php echo $selected; ?>
    >
        <?php echo $row_formbang1['tenbang']; ?>
    </option>

    <?php } ?>

</select>

        </td>

    </tr>

</table>
<script>
function changeFormbang(obj){

    if(obj.value != ""){

        window.location.href =
            "formbang.php?id_formbang=" + obj.value;

    }

}

/* TEMPLATE IMAGE OPTION */

function custom_template(obj){

    var data = $(obj.element).data();

    var text = $(obj.element).text();

    if(data && data['img_src']){

        var img_src = data['img_src'];

        var template = $(
            '<div class="select-item">' +
                '<img src="' + img_src + '" class="select-svg">' +
                '<span>' + text + '</span>' +
            '</div>'
        );

        return template;
    }

    return text;
}

$('#select-formbang').select2({

    templateSelection: custom_template,
    templateResult: custom_template,
    minimumResultsForSearch: 0

});

</script>