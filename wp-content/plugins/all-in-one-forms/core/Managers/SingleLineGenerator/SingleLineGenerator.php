<?php

namespace rednaoeasycalculationforms\core\Managers\SingleLineGenerator;

use rednaoeasycalculationforms\core\Managers\FormManager\FormBuilder;
use rednaoeasycalculationforms\Utilities\ObjectSanitizer;

class SingleLineGenerator
{
    /** @var FormBuilder */
    public $FormBuilder;
    public $Options;
    public function __construct($formBuilder)
    {
        $this->FormBuilder=$formBuilder;
        if($formBuilder!=null)
            require_once $this->FormBuilder->Loader->DIR.'vendor/autoload.php';
    }

    public function GetText($content){
        if($content==null)
            return '';

        if(is_string($content))
            return $content;

        $content=ObjectSanitizer::Sanitize($content,["content"=>[(object)[
            "content"=>(object)[
                "type"=>''
            ]
        ]]]);



        $text='';
        foreach($content->content as $currentItem)
        {
            switch ($currentItem->type)
            {
                case 'text':
                    $text.=$currentItem->text;
                    break;
                case 'field':
                    $obj=ObjectSanitizer::Sanitize($currentItem,(object)['attrs'=>(object)["Type"=>'',"Value"=>""]]);
                    if($obj->attrs->Type=='Field')
                    {
                        if($this->FormBuilder==null)
                            break;
                        $field=$this->FormBuilder->GetFieldById($obj->attrs->Value);
                        if($field!=null)
                            $text.=$field->ToText();
                    }
                    $text.= apply_filters('allinoneforms_get_single_line_text','',$obj->attrs);

            }
        }

        return $text;
    }

}