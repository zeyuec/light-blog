<?php
Light::importModel('post');
class PostController extends LController {
    public function listAction() {
        $currentPage = isset($_GET['p']) ? intval($_GET['p']) : 1;
        
        $pageCount = PostModel::model()->getPageCount();
        if ($currentPage < 0 || $currentPage > $pageCount) {
            $currentPage = 1;
        }
        
        $postList = PostModel::model()->getList($currentPage);
        $this->smarty->assign('currentPage', $currentPage);
        $this->smarty->assign('pageCount', $pageCount);
        
        $this->smarty->assign('postList', $postList);
        $this->smarty->display('post-list.tpl');
    }

    public function viewAction() {
        $id = intval($_GET['p']);
        $post = PostModel::model()->getPost($id);
        if ($post == null) {
            LRouter::redirectToRoot();
        } else {
            $this->smarty->assign('post', $post);
            $this->smarty->assign('title', $post['title']);
            $this->smarty->display('post-view.tpl');
        }
    }
}
?>