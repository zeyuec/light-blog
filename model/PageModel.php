<?php
class PageModel extends LModel {
    public static function model($className = __CLASS__) {
        return parent::model($className);
    }

    public function getPageByTitle($title) {
        $pdo = $this->getPdo();
        $sql = "SELECT * FROM `page` WHERE title='".$title."' LIMIT 1";
        $cmd = $pdo->prepare($sql);
        $cmd->execute();
        $ret = $cmd->fetch();
        $page = array(
            'title' => $ret['title'],
            'content' => Markdown($ret['content']),
            );
        return $page;
    }
}
?>