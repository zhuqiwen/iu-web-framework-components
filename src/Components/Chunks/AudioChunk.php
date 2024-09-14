<?php

namespace Edu\IU\WSB\IUWebFrameworkComponents\Components\Chunks;
class AudioChunk extends Chunk implements ChunkInterface {

    public function __construct(string $mp3Path, string $attribution = '', string $caption = '', string $transcript = '', string $position = 'Full')
    {
        parent::__construct($this->getChunkType());

        $this->position_node->setValueText($position);
        $this->audio_type_node->setValueText('HTML5');
        $this->mp3_node->setValueFilePath($mp3Path);
        $this->attribution_node->setValueText($attribution);
        $this->caption_node->setValueText($caption);
        $this->transcript_node->setValueText($transcript);

        $details = [
            $this->position_node,
            $this->audio_type_node,
            $this->mp3_node,
            $this->attribution_node,
            $this->caption_node,
            $this->transcript_node
        ];

        $this->addChildrenToDetailsNode($details);
    }

}