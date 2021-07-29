<form action="" method="post">
        <input type="text" name="message">
        <input type="submit" name="submit">
</form>
<?php
        if(isset($_POST['submit'])){
                $apiToken = "1836368650:AAH1ucBnhWpQak9urzXky3gNk4R7f_0zi2c";
                $data = [
                        'chat_id' => '-1001285574385',
                        'text' => $_POST['message']
                ];
                $response = file_get_contents("https://api.telegram.org/bot$apiToken/sendMessage?" . http_build_query($data));
        }
?>