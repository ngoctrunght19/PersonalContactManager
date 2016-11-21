<?php
 
class View_Loader
{
    private $__content = array();
     
    public function load($view, $data = array()) 
    {
       
        extract($data);
         
        ob_start();
        require_once 'pcmgr' . '/template/' . $view . '.php';
        $content = ob_get_contents();
        ob_end_clean();
         
        // Gán nội dung vào danh sách view đã load
        $this->__content[] = $content;
    }
     
    public function show()
    {
        foreach ($this->__content as $html){
            echo $html;
        }
    }
}