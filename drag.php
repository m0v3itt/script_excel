
<link type="text/css" rel="stylesheet" href="https://code.jquery.com/ui/1.8.24/themes/blitzer/jquery-ui.css" />
<script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/1.8.3/jquery.min.js"></script>
<script type="text/javascript" src="https://code.jquery.com/ui/1.8.24/jquery-ui.min.js"></script>
<p align="center" class="draggable" style="border: 1px solid red; width: 100px;">
    <select id="ddlVehicles" name="ogrenciler" style="font-family: Tahoma; font-size: 8pt">
        <option value="BMV">BMV</option>
        <option value="Mercedes">Mercedes</option>
        <option value="Fiat">Fiat</option>
        <option value="Volvo">Volvo</option>
        <option value="Nissan">Nissan</option>
        <option value="Audio">Audio</option>
        <option value="Ford">Ford</option>
        <option value="Lada">Lada</option>
    </select>
</p>
<p>
    &nbsp;</p>
<div align="center">
    <table border="1">
        <tr>
            <td align="center">
                <b><font face="Tahoma" size="1">Order </font></b>
            </td>
            <td align="center" colspan="2">
                <b><font face="Tahoma" size="1">GARAGE1</font></b>
            </td>
            <td align="center" colspan="2">
                <b><font face="Tahoma" size="1">GARAGE2</font></b>
            </td>
            <td align="center" colspan="2">
                <b><font face="Tahoma" size="1">GARAGE3</font></b>
            </td>
            <td align="center" colspan="2">
                <b><font face="Tahoma" size="1">GARAGE4</font></b>
            </td>
        </tr>
        <tr>
            <td align="center">
                <b><font face="Tahoma" size="1">1</font></b>
            </td>
            <td style="float: right" align="center">
                <font size="1" face="Tahoma">
                    <input name="kapi1" size="17" style="border: 1px solid #FFFFFF" /></font>
            </td>
            <td align="center">
                <font size="1" face="Tahoma">
                    <input name="kapi11" size="17" style="border: 1px solid #FFFFFF" /></font>
            </td>
            <td align="center">
                <font size="1" face="Tahoma">
                    <input name="ortak1" size="17" style="border: 1px solid #FFFFFF" /></font>
            </td>
            <td align="center">
                <font size="1" face="Tahoma">
                    <input name="ortak11" size="17" style="border: 1px solid #FFFFFF" /></font>
            </td>
            <td align="center">
                <font size="1" face="Tahoma">
                    <input name="ortap1" size="17" style="border: 1px solid #FFFFFF" /></font>
            </td>
            <td align="center">
                <font size="1" face="Tahoma">
                    <input name="ortap11" size="17" style="border: 1px solid #FFFFFF" /></font>
            </td>
            <td align="center">
                <font size="1" face="Tahoma">
                    <input name="pencere1" size="17" style="border: 1px solid #FFFFFF" /></font>
            </td>
            <td align="center">
                <font size="1" face="Tahoma">
                    <input name="pencere11" size="17" style="border: 1px solid #FFFFFF" /></font>
            </td>
        </tr>
    </table>
    <script type="text/javascript">
    $(function () {
        $(".draggable").draggable({
            revert: true,
            helper: 'clone',
            start: function (event, ui) {
                $(this).fadeTo('fast', 0.5);
            },
            stop: function (event, ui) {
                DeleteValues()
                $(this).fadeTo(0, 1);
            }
        });
 
        $("table input").droppable({
            drop: function (event, ui) {
                this.value = $(ui.draggable).find('select option:selected').text();
            }
        });
    });
    function DeleteValues() {
        var dropDown = document.getElementById("ddlVehicles");
        for (var i = 0; i <= dropDown.options.length; i++) {
            if (dropDown.options[i].selected) {
                dropDown.removeChild(dropDown.options[i]);
                break;
            }
        }
    }
</script>
</div>