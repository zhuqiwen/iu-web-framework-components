<?php

namespace Edu\IU\WSB\IUWebFrameworkComponents\Components\Chunks;
class ImageChunk extends Chunk implements ChunkInterface {



    public function __construct(string $imagePath, string $caption = '', string $attribution = '', string $position = 'Full')
    {
        parent::__construct($this->getChunkType());

        $this->position_node->setValueText($position);
        $this->caption_node->setValueText($caption);
        $this->attribution_node->setValueText($attribution);
        $this->image_node->setValueFilePath($imagePath);
        //TODO: essay and slides, if needed
        $this->image_type_node->setValueText('Single');

        $details = [
            $this->position_node,
            $this->image_type_node,
            $this->image_node,
            $this->caption_node,
            $this->attribution_node
        ];

        $this->addChildrenToDetailsNode($details);
    }
}