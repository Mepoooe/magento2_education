<?php

namespace Mikhail\StarWars\Plugin\Helper;

class DataPlugin
{
    //function beforeMETHOD($subject, $arg1, $arg2){}
    //function aroundMETHOD($subject, $proceed, $arg1, $arg2){return $proceed($arg1, $arg2);}
    //function afterMETHOD($subject, $result){return $result;}

    public function afterGetEntityById($subject, $result)
    {
        $newResult = [];

        foreach ($subject->attributeList as $attribute) {
            $newResult[$attribute] = $result->$attribute;
        }

        return $newResult;
    }
}
