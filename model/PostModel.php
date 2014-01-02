<?php
Light::importModel('user');
class PostModel extends LModel {
    public static function model($className = __CLASS__) {
        return parent::model($className);
    }

    public function getPageCount() {
        $pdo = $this->getPdo();
        $sql = "SELECT count(*) FROM `post`";
        $cmd = $pdo->prepare($sql);
        $cmd->execute();
        $ret = $cmd->fetch();

        $count = $ret[0];
        return (int)ceil($count/Light::DEFAULT_POSTS_PER_PAGE);
    }
    
    public function getList($page = 1) {
        $postList = array();
        
        // get data
        $pdo = $this->getPdo();
        $limitStart = ($page-1) * Light::DEFAULT_POSTS_PER_PAGE;
        $limitCount = Light::DEFAULT_POSTS_PER_PAGE;
        $sql = "SELECT * FROM `post` ORDER BY `create_time` DESC LIMIT $limitStart, $limitCount";
        $cmd = $pdo->prepare($sql);
        $cmd->execute();
        $ret = $cmd->fetchAll();
        
        // pack
        foreach ($ret as $r) {
            $postList[] = $this->parsePostDbRetToArray($r);
        }
        return $postList;
    }

    public function getPost($id) {
        $pdo = $this->getPdo();
        $sql = "SELECT * FROM `post` WHERE pid=".$id." LIMIT 1";
        $cmd = $pdo->prepare($sql);
        $cmd->execute();
        $ret = $cmd->fetch();

        $post = $this->parsePostDbRetToArray($ret);
        
        return $post;
    }

    private function parsePostDbRetToArray($ret) {
        if (false == $ret) {
            return null;
        } else {
            $author = UserModel::model()->getUserNameByUid($ret['uid']);
            $post = array(
                'title' => $ret['title'],
                'author' => $author,
                'create_time' => $ret['create_time'],
                'summary' => Markdown($ret['summary']),
                'content' => Markdown($ret['content']),
                'more' => '/post/view/p/'.$ret['pid'],
                );
            return $post;
        }
    }
}
?>