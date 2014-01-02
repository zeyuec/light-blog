<?php
class UserModel extends LModel {
    public static function model($className = __CLASS__) {
        return parent::model($className);
    }

    public function getUserNameByUid($uid) {
        $pdo = $this->getPdo();
        $sql = "SELECT `username` FROM `user` WHERE `uid`=".$uid;
        $cmd = $pdo->prepare($sql);
        $cmd->execute();
        $ret = $cmd->fetch();
        return $ret['username'];
    }
}

?>
