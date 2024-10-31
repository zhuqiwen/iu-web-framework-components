<?php

namespace Edu\IU\WSB\IUWebFrameworkComponents\Components;

use Edu\IU\RSB\StructuredDataNodes\BaseNode;
use Edu\IU\RSB\StructuredDataNodes\GroupNode;
use Edu\IU\RSB\StructuredDataNodes\Text\DropdownNode;
use Edu\IU\RSB\StructuredDataNodes\Text\TextInputNode;
use Edu\IU\WSB\IUWebFrameworkComponents\Components\Chunks\Chunk;

class Section extends Component {


    /**
     * @param array $chunkNodes, array of objects of Chunk, or BaseNode
     */
    public function __construct(array $chunkNodes)
    {
        $this->dataNode = new GroupNode('section');

        $this->dataNode->addChild(new TextInputNode('internal-label', ''));
        $this->dataNode->addChild(new DropdownNode('type', 'On Page'));
        //TODO: setup section details
        $detailsNode = new GroupNode('details');
        $this->dataNode->addChild($detailsNode);



        foreach ($chunkNodes as $chunkNode){
            if ($chunkNode instanceof Chunk){
                $this->dataNode->addChild($chunkNode->toDataNode());
            }elseif ($chunkNode instanceof BaseNode){
                $this->dataNode->addChild($chunkNode);
            }else{
                throw new \RuntimeException('Chunks array has be contain object of Chunk, or BaseNode');
            }

        }
    }

}