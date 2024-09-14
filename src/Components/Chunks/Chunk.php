<?php

namespace Edu\IU\WSB\IUWebFrameworkComponents\Components\Chunks;
use Edu\IU\RSB\StructuredDataNodes\BaseNode;
use Edu\IU\RSB\StructuredDataNodes\GroupNode;
use Edu\IU\RSB\StructuredDataNodes\Text\DropdownNode;
use ReflectionException;

abstract class Chunk{

    use ChunkTraits;

    /**
     * @throws ReflectionException
     */
    public function __construct(string $chunkType)
    {
        $this->chunkTypeNode = new DropdownNode('type', $chunkType);
        $this->detailsNode = new GroupNode('details');

        $this->initDetailsChildren();;

    }


    /**
     * @return GroupNode
     */
    public function toDataNode(): GroupNode
    {
        $chunkGroupNode = new GroupNode('chunk', $this->chunkTypeNode);
        $chunkGroupNode->addChild($this->detailsNode);

        return $chunkGroupNode;
    }


}