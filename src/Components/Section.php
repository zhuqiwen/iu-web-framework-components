<?php

namespace Edu\IU\WSB\IUWebFrameworkComponents\Components;

use Edu\IU\RSB\StructuredDataNodes\GroupNode;
use Edu\IU\RSB\StructuredDataNodes\Text\DropdownNode;
use Edu\IU\RSB\StructuredDataNodes\Text\TextInputNode;

class Section extends Component {


    public function __construct(array $chunkNodes)
    {
        $this->dataNode = new GroupNode('section');

        $this->dataNode->addChild(new TextInputNode('internal-label', ''));
        $this->dataNode->addChild(new DropdownNode('type', 'On Page'));
        //TODO: setup section details
        $detailsNode = new GroupNode('details');
        $this->dataNode->addChild($detailsNode);

        foreach ($chunkNodes as $chunkNode){
            $this->dataNode->addChild($chunkNode);
        }
    }

}