{block name="frontend_content_header"}
Projektinformationen
{/block}
{block name="frontend_content"}
<table border=1 width="500">
    <colgroup>
    <col width="100">
    <col width="10">
    </colgroup>
    <tr>
        <th colspan=3>Projekt Information</th>
    </tr>
    <tr>
        <td><a href="http://getbootstrap.com/" target="_blank">Bootstrap</a> <span class="glyphicon glyphicon-search"></span></td>
        <td></td>
        <td><b>{$bootstrap_version}</b></td>
    </tr>
    <tr>
        <td><a href="http://jquery.com/" target="_blank">jQuery</a></td>
        <td></td>
        <td><b>{$jquery_version}</b>{if substr($jquery_version,0,1) == "2"} (IE 6, 7, 8 nicht supported){/if}</td>
    </tr>
    <tr>
        <td><a href="http://jqueryui.com/" target="_blank">jQuery-UI</a></td>
        <td></td>
        <td><b>{$jqueryUI_version}</b></td>
    </tr>
    <tr>
        <td><a href="http://de2.php.net/manual/de/book.pdo.php" target="_blank">PDO</a></td>
        <td></td>
        <td><b>Zum aktivieren pdo_init() im controller</b></td>
    </tr>
    <tr>
        <td><a href="https://github.com/PHPMailer/PHPMailer" target="_blank">PHPMailer</a></td>
        <td></td>
        <td><b>{$phpmailer_version}</b></td>
    </tr>
    <tr>
        <td><a href="http://sciactive.com/pnotify/" target="_blank">PNotify</a></td>
        <td></td>
        <td><b>{$PNotify_version}</b></td>
    </tr>
    <tr>
        <td><a href="http://www.smarty.net/docs/en/" target="_blank">Smarty</a></td>
        <td></td>
        <td><b>{$smarty_version}</b></td>
    </tr>
    <tr>
        <td><a href="http://www.tinymce.com/index.php" target="_blank">Tiny MCE</a></td>
        <td></td>
        <td><b>{$tinyMCE_version}</b></td>
    </tr>
    <tr>
        <td colspan="3" style="font-size:10px;text-align:center;"><b>leeres Projekt</b> Stand: 14.03.2015<br />
        (Entferne das <span style="font-weight:bold">append</span> im Block der <span style="font-weight:bold"> pages/main.tpl </span>)</td>
    </tr>
</table>
{/block}