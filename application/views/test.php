<html>
    <body>
<?php
    
    echo form_open('MyAuth/getPermId');
    echo form_input('permName');
    echo form_textarea('permDefinition');
    echo form_submit('submit');
    echo form_close();
?>
        </body>
    </html>
    