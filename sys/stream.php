<?php
if (isset($_POST['conversacom'])) {
    include_once "../defines.php";
    require_once('../class/BD.class.php');
    BD::conn();

    $userOnline = (int)$_GET['user'];
    $timestamp=($_GET['timestamp']==0)? time() : strip_tags(trim($_GET['timestamp']));
    $lastid = (isset($_GET['lastid'])&& !empty($_GET['lastid'])) ? $_GET['lastid']: 0;

    if (empty($timestamp)) {
        die(json_encode(array('status' => 'erro' )));
    }
    $tempoGasto = 0;
    $lastidQuery = '';

    if (empty($lastid)) {
        $lastidQuery = 'AND `id` >'.$lastid;
    }

    if ($_GET['timestamp'] == 0) {
        $verifica=BD::conn()->prepare("SELECT * FROM `mensagens` WHERE `lido` = 0 ORDER BY `id` DESC");
    }else {
        $verifica=BD::conn()->prepare("SELECT * FROM `mensagens` WHERE `time`>= $timestamp'.$lastidQuery' AND `lido` = 0 ORDER BY `id` DESC");
    }
    $verifica->execute();
    $resultados = $verifica->rowCount();
    if($resultados <= 0){
        while ($resultados <= 0) {
            if($resultados <= 0) {
                if ($tempoGasto >= 30) {
                    die(json_encode(array('status'=> 'vazio', 'lastid' => 0, 'timestamp'=>time())));
                    exit;
                }
            //decansar o codigo por um segundo
            sleep(1);
            $verifica=BD::conn()->prepare("SELECT * FROM `mensagens` WHERE `time`>= $timestamp'.$lastidQuery' AND `lido` = 0 ORDER BY `id` DESC");
            $verifica->execute();
            $resultados = $verifica->rowCount();
            $tempoGasto += 1;
            }    
        }
    }

    $novasMensagens= array();

    if ($resultados >= 1) {
        while ($row = $verifica->fetch()) {
            $fotoUser = '';
            $janela_de = 0;
            if($userOnline == $row['id_de']){
                $janela_de = $row['id_para'];
            }elseif ($userOnline == $row['id_para']) {
                $janela_de = $row['id_de'];
                $pegaUsr = BD::conn()->prepara("SELECT `foto`FROM `user` WHERE `id` = '$row[id_de]'");
                $pegaUsr->execute();
                while ($usr = $pegaUsr->fetch()) {
                    $fotoUser = ($usr['foto']== '') ? 'default.png' : $usr['foto'];
           
                }
            }
            $msg = $row['mensagens'];
            $novasMensagens[] = array(
                'id' => $row['id'],
                'mensagens' => utf8_decode($msg),
                'foto' => $fotoUser,
                'id_de' => $row['id_de'],
                'id_para' => $row['id_para'],
                'janela_de'=> $janela_de
            );
        }
    }
    $ultimaMsg = end($novasMensagens);
    $ultimoId = $ultimaMsg['id'];
    die(json_encode(array('status'=>'resultados', 'timestamp' => time(), 'lastid' =>$ultimoId, 'dados' =>$novasMensagens)));
}
?>