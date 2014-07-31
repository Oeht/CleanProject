<table border=1 width="500" style="position:absolute;left:50%;margin-left:-250px;top:50px;">
<colgroup>
<col width="100">
<col width="10">
</colgroup>
<tr>
    <th colspan=3>Projekt Information</th>
</tr>
<tr>
    <td>Smarty</td>
    <td></td>
    <td><b>{$smarty_version}</b></td>
</tr>
<tr>
    <td>Bootstrap <span class="glyphicon glyphicon-search"></span></td>
    <td></td>
    <td><b>{$bootstrap_version}</b></td>
</tr>
<tr>
    <td>jQuery</td>
    <td></td>
    <td><b>{$jquery_version}</b>{if substr($jquery_version,0,1) == "2"} (IE 6, 7, 8 nicht supported){/if}</td>
</tr>
<tr>
    <td>jQuery-UI</td>
    <td></td>
    <td><b>{$jqueryUI_version}</b></td>
</tr>
<tr>
    <td>Tiny MCE</td>
    <td></td>
    <td><b>{$tinyMCE_version}</b></td>
</tr>
<tr>
    <td>PDO</td>
    <td></td>
    <td><b>Zum aktivieren pdo_init() im controller</b></td>
</tr>
<tr>
    <td colspan="3" style="font-size:10px;text-align:center;"><b>leeres Projekt</b> Stand: 12.07.2014<br />
    (Diese Information wird nur angezeigt weil <span style="font-weight:bold"> main.tpl </span> leer ist)</td>
</tr>
</table>

