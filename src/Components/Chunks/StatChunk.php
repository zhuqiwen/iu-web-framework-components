<?php

namespace Edu\IU\WSB\IUWebFrameworkComponents\Components\Chunks;
class StatChunk extends Chunk implements ChunkInterface {


    public function __construct(string $statNumber, string $content  = '', string $linkLabel = 'link label', string $link = 'https://www.iu.edu', string $position = 'Full')
    {
        parent::__construct($this->getChunkType());

        $this->content_node->setValueText($content);
        $this->position_node->setValueText($position);
        $this->link_label_node->setValueText($linkLabel);
        $this->stat_number_node->setValueText($statNumber);

        $details = [
            $this->stat_number_node,
            $this->content_node,
            $this->position_node,
            $this->link_label_node,
            $this->constructLinkNode($link)
        ];

        $this->addChildrenToDetailsNode($details);
    }

}