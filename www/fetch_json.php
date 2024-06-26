<?php
define('PROFILE_PATH', dirname(__FILE__) . '/data/profiles/');
define('RECORD_DIR',dirname(__FILE__) . '/data/records/cmd/');
define('TWEAK_DIR', dirname(__FILE__) . '/data/tweaks/');
define('TWEAKER', dirname(__FILE__) . '/tweaker/mergeTweak.xsl');
define('BASE_URL', "Go for it.");

require(dirname(__FILE__) . '/classes/CcfParser.class.php');

if (isset($_POST["cmdi_url"])) {
    $record = null;
    get_struc($_POST["cmdi_url"], $record);
} else {
    throw_error();
}

function get_struc($file, $record) {
    $parser = new Ccfparser();
    $arr = explode(":", $_POST["cmdi_id"]);
    if (isset($arr[2])) {
        $tweakFile =  TWEAK_DIR .  $arr[2]. '.xml';
    }
    else
    {
        $tweakFile = TWEAK_DIR . 'dummy.xml';
    }

    if (file_exists($tweakFile)) {
        $struc = $parser->parseTweak($file, $tweakFile, TWEAKER, $record);
    } else {
        $struc = $parser->parseTweak($file, null, null, $record);
    }
    send_json($struc);
}


function send_json($struc)
{
    header('Content-Type: application/json; charset=UTF-8');
    header('Access-Control-Allow-Origin: *');
    echo $struc;
}

function throw_error($error = "Bad request")
{
    $response = json_encode(array("error" => $error));
    send_json($response);
}
