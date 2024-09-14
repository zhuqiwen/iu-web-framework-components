<?php

namespace Edu\IU\WSB\IUWebFrameworkComponents\Components\Chunks;
use Edu\IU\RSB\StructuredDataNodes\Asset\LinkableNode;
use Edu\IU\RSB\StructuredDataNodes\Text\TextInputNode;
use Edu\IU\Wcms\WebService\WCMSClient;

class InteractivePanelChunk extends Chunk implements ChunkInterface {

    public function __construct(string $header, string $subhead, string $link = '', string $headerLevel = 'h2', string $position = 'Full')
    {
        parent::__construct($this->getChunkType());

        $this->header_node->setValueText($header);
        $this->header_level_node->setValueText($headerLevel);
        $this->subhead_node->setValueText($subhead);
        $this->position_node->setValueText($position);


        $details = [
            $this->header_node,
            $this->header_level_node,
            $this->position_node,
            $this->subhead_node,
            $this->constructLinkNode($link)
        ];

        $this->addChildrenToDetailsNode($details);
    }

}