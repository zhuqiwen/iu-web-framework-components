<?php

namespace Edu\IU\WSB\IUWebFrameworkComponents\Components\Chunks;
class CalloutChunk extends Chunk implements ChunkInterface {

    public function __construct(string $content, string $imagePath = '', string $position = 'Full')
    {
        parent::__construct($this->getChunkType());

        $this->content_node->setValueText($content);
        $this->position_node->setValueText($position);
        $this->image_node->setValueFilePath($imagePath);

        $details = [
            $this->position_node,
            $this->content_node,
            $this->image_node,
        ];

        $this->addChildrenToDetailsNode($details);

    }
}