<?php

namespace Edu\IU\WSB\IUWebFrameworkComponents\Components\Chunks;
class CodeSnippetChunk extends Chunk implements ChunkInterface {


    public function __construct(string $code, string $snippetType, string $position = 'Full')
    {
        parent::__construct($this->getChunkType());

        $this->snippet_type_node->setValueText($snippetType);
        $this->code_node->setValueText($code);
        $this->position_node->setValueText($position);

        $details = [
            $this->position_node,
            $this->code_node,
            $this->snippet_type_node,
        ];

        $this->addChildrenToDetailsNode($details);
    }

}