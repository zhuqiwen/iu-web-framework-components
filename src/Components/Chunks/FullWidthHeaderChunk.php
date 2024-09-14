<?php

namespace Edu\IU\WSB\IUWebFrameworkComponents\Components\Chunks;
use Edu\IU\RSB\StructuredDataNodes\Text\DropdownNode;
use Edu\IU\RSB\StructuredDataNodes\Text\TextInputNode;

class FullWidthHeaderChunk extends Chunk implements ChunkInterface{

    public function __construct(string $header, string $headerLevel = 'h2')
    {
        parent::__construct($this->getChunkType());

        $this->header_node->setValueText($header);
        $this->header_level_node->setValueText($headerLevel);

        $details = [
            $this->header_node,
            $this->header_level_node
        ];

        $this->addChildrenToDetailsNode($details);

    }
}