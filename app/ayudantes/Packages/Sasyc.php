<?php

namespace Ayudantes\Packages;


class Sasyc {

    public static function aprobar(){
        $pdo = DB::connection('oracle')->getPdo();
        $sql = "begin :ret := check_if_file_exists(:filename); end;";
        $stmt = $pdo->prepare($sql);
        $stmt->execute();
    }
}