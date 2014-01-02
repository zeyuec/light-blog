<?php
Light::importModel('page');
class PageController extends LController {
    public function aboutAction() {
        $ret = PageModel::model()->getPageByTitle('About');
        $this->smarty->assign('content', $ret['content']);
        $this->smarty->assign('title', $ret['title']);
        $this->smarty->display('page-default.tpl');
    }

    public function projectAction() {
        $ret = PageModel::model()->getPageByTitle('Project');
        $this->smarty->assign('content', $ret['content']);
        $this->smarty->assign('title', $ret['title']);
        $this->smarty->display('page-default.tpl');
    }
}