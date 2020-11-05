<?php
namespace App\Components;
use App\Category;

class Recusive {
    private $data;
    private $htmlSelect ='';
    private $html;
    public function __construct($data){
        $this->data = $data;
    }

    public function categoryRecusive($parentId ,$id = 0, $text = '')
    {
        foreach ($this->data as $value) {
            if ($value->parent_id == $id) {
                if (!empty($parentId) && $parentId == $value['id']) {
                    $this->htmlSelect.="<option selected value=".$value['id'].">".$text. $value['name'] . "</option>";
                }
                else {
                    $this->htmlSelect.="<option value=".$value['id'].">".$text. $value['name'] . "</option>";
                }
                $this->categoryRecusive($parentId ,$value['id'], $text. '-');
            }
        }
        return $this->htmlSelect;
    }

    public function Option($str, $parent_id, $id){
        foreach ($this->data as $value){
            if ($value->parent_id == $parent_id){
                if ($parent_id == 0){
                    $str = "";
                }
                if (!empty($id) && $id == $value->id){
                    $this->html .= "<option selected value='".$value->id."'>".$str.$value->name."</option>";
                }
                else{
                    $this->html .= "<option value='".$value['id']."'>".$str.$value->name."</option>";
                }
                $this->Option($str."--", $value['id'], $id);
            }
        }
        return $this->html;
    }
}
