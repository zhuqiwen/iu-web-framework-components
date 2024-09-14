<?php

namespace Edu\IU\WSB\IUWebFrameworkComponents\Components\Chunks;
use Edu\IU\RSB\StructuredDataNodes\Asset\FileNode;
use Edu\IU\RSB\StructuredDataNodes\Text\DropdownNode;
use Edu\IU\RSB\StructuredDataNodes\Text\WysiwygNode;

class PullquoteChunk extends Chunk implements ChunkInterface {

    public function __construct(string $content, string $imagePath = '', string $attribution = '', string $position = 'Full')
    {
        parent::__construct($this->getChunkType());

        $this->content_node->setValueText($content);
        $this->position_node->setValueText($position);
        $this->image_node->setValueFilePath($imagePath);
        $this->attribution_node->setValueText($attribution);

        $details = [
            $this->position_node,
            $this->content_node,
            $this->image_node,
            $this->attribution_node
        ];

        $this->addChildrenToDetailsNode($details);

    }
}