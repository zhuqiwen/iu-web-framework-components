<?php

namespace Edu\IU\WSB\IUWebFrameworkComponents\Components\Chunks;
class CodeChunk extends Chunk implements ChunkInterface {


    public function __construct(string $code, string $position = 'Full')
    {
        parent::__construct($this->getChunkType());

        $this->code_node->setValueText($code);
        $this->position_node->setValueText($position);

        $details = [
            $this->code_node,
            $this->position_node,
        ];

        $this->addChildrenToDetailsNode($details);
    }

}