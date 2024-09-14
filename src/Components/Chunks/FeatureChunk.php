<?php

namespace Edu\IU\WSB\IUWebFrameworkComponents\Components\Chunks;
class FeatureChunk extends Chunk implements ChunkInterface {

    public function __construct(string $header, string $subhead, string $content, string $imagePath = '', string $link = 'https://www.iu.edu', string $linkLabel = 'link label', string $headerLevel = 'h3', string $position = 'Full')
    {
        parent::__construct($this->getChunkType());

        $this->position_node->setValueText($position);
        $this->header_level_accordion_node->setValueText($headerLevel);
        $this->header_node->setValueText($header);
        $this->subhead_feature_node->setValueText($subhead);
        $this->content_node->setValueText($content);

        $details = [
            $this->position_node,
            $this->header_level_accordion_node,
            $this->header_node,
            $this->subhead_feature_node,
            $this->content_node,
            $this->constructLinkNode($link)
        ];


        $this->addChildrenToDetailsNode($details);

    }

}