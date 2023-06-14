<?php


namespace rednaoeasycalculationforms\core\Managers\FormManager\Fields;


use rednaoeasycalculationforms\core\Managers\ConditionManager\Comparator\SingleValueComparator;

class FBTextField extends FBFieldWithPrice
{
    public function GetComparator()
    {
        return new SingleValueComparator($this->GetForm(),$this);
    }

}