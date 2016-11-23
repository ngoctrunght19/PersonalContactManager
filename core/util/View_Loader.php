<?php
 
class View_Loader
{
    private $__content = array();
     
    public function load($view, $data = array()) 
    {
       
        extract($data);
         
        ob_start();
        require_once 'pcmgr' . '/view/template/' . $view . '.php';
        $content = ob_get_contents();
        ob_end_clean();
         
        // Gán nội dung vào danh sách view đã load
        $this->__content[] = $content;
    }

    public function loadTwoView($view1, $view2, $data = array()) 
    {
       
        extract($data);
         
        ob_start();
        require_once 'pcmgr' . '/view/template/' . $view1 . '.php';
        $content1 = ob_get_contents();
        require_once 'pcmgr' . '/view/template/' . $view1 . '.php';
        $content2 = ob_get_contents();
        ob_end_clean();
         
        // Gán nội dung vào danh sách view đã load
        $this->__content[] = $content1;
        $this->__content[] = $content2;
    }
     
    public function show()
    {
        foreach ($this->__content as $html){
            echo $html;
        }
    }
}