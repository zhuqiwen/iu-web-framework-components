<?php

namespace Edu\IU\WSB\IUWebFrameworkComponents\Components\Chunks;
use Edu\IU\RSB\StructuredDataNodes\Text\DropdownNode;
use Edu\IU\RSB\StructuredDataNodes\Text\TextInputNode;
use Edu\IU\RSB\StructuredDataNodes\Text\WysiwygNode;

class TextChunk extends Chunk implements ChunkInterface {

    public function __construct(string $header, string $content, string $headerLevel = 'h2', string $position = 'Full')
    {
        parent::__construct($this->getChunkType());

        $this->header_node->setValueText($header);
        $this->header_level_node->setValueText($headerLevel);
        $this->content_node->setValueText($content);
        $this->position_node->setValueText($position);

        $details = [
            $this->header_node,
            $this->content_node,
            $this->header_level_node,
            $this->position_node,
        ];

        $this->addChildrenToDetailsNode($details);
    }


}