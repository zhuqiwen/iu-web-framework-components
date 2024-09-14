<?php

namespace Edu\IU\WSB\IUWebFrameworkComponents\Components;


use Edu\IU\RSB\StructuredDataNodes\BaseNode;

trait ComponentTraits{

    public BaseNode $dataNode;

    public function getDataNode(): BaseNode
    {
        return $this->dataNode;

    }
}