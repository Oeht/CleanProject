<?xml version="1.0" ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN"
    "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<title>
{block name="frontend_page_title"}
    Beschreibung der Seite
{/block}
</title>
{block name="frontend_resource_files"}{/block}
</head>
    <body>
    <div class="container">
        <div class="row">
            <div class="frontend_top_container">
            {block name="frontend_top_container"}
                TOP
            {/block}
            </div>
        </div>
        <div class="row-fluid">
            <div class="row">
                <div class="frontend_left_container col-md-3">
                {block name="frontend_left_container"}
                    LEFT
                {/block}
                </div>
                <div class="frontend_right_container col-md-9">
                {block name="frontend_right_container"}
                    <h4>{block name="frontend_content_header"}frontend_content_header: empty{/block}</h4>
                    {block name="frontend_content"}frontend_content: empty{/block}
                {/block}
                </div>
            </div>
        </div>
        <div class="row">
            <div class="frontend_bottom_container">
            {block name="frontend_bottom_container"}
                BOTTOM
            {/block}
            </div>
        </div>
    </div>
    </body>
</html>