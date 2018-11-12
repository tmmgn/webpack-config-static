<?php

function get($array, $key, $default = null)
{
    return $array[$key] ? $array[$key] : $default;
}

if (isset($_POST) && !empty($_POST['data'])) {
    $obj = $_POST['data'];
    $my_email = 'test01@test.org';
    $my_email2 = 'test02@test.org';
    $data = $_POST['data'];

    $theme = $data['title'];
    $type = $data['type'];
    $name = get($data, 'modal-name', $data['name']);
    $email = get($data, 'modal-mail', $data['email']);
    $phone = get($data, 'modal-tel', $data['tel']);
    $city = $data['city'];
    
    $mess = "";

    foreach ($data as $key => $value) {
        $mess .= $key . ": " . "<b>" . trim($value) . "</b><br>";
    }

    $ip = $_SERVER['REMOTE_ADDR'];
    $mess .= "IP: <b>" . $ip . "</b><br>";

    $from_set = "From: website address ";
    $set = "\nContent-Type: text/html;\n charset=utf-8\nX-Priority: 0";

    mail($my_email, $theme, $mess, $from_set . $set);
    mail($my_email2, $theme, $mess, $from_set . $set);

    $options = array(
        "status" => 200,
    );

    echo json_encode($options);

}
