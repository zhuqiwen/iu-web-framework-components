<?php

namespace Edu\IU\WSB\IUWebFrameworkComponents\Components\Chunks;
use Edu\IU\RSB\StructuredDataNodes\GroupNode;
use Edu\IU\RSB\StructuredDataNodes\Text\TextInputNode;
use Edu\IU\RSB\StructuredDataNodes\Text\WysiwygNode;

class CallToActionChunk extends Chunk implements ChunkInterface {


    public function __construct(array $links, string $header, string $headerLevel = 'h3', string $position = 'Full')
    {
        parent::__construct($this->getChunkType());

        $this->position_node->setValueText($position);
        $this->header_level_accordion_node->setValueText($headerLevel);

        $details = [
            $this->position_node,
            $this->header_level_accordion_node
        ];

        $details = array_merge($details, $this->constructLinkNodeS($links));

        $this->addChildrenToDetailsNode($details);

    }


    /**
     * $links = [
     *     [
     *         'label' => 'some label',
     *         'link' => 'https://www.iu.edu'
     *     ],
     *     [
     *         'label' => 'some label 2',
     *         'link' => '/some/path/to/asset'
     *     ],
     *     ...
     * ]
     *
     * @param array $links
     * @return array
     */
    public function constructLinkNodes(array $links): array
    {
        $linkGroupNodesArray = [];
        foreach ($links as $link){
            $labelNode = new TextInputNode('label', $link['label']);
            $linkNode = $this->constructLinkNode($link);

            $linkGroupNode = new GroupNode('link');
            $linkGroupNode->addChild($labelNode);
            $linkGroupNode->addChild($linkNode);

            $linkGroupNodesArray[] = $linkGroupNode;
        }

        return $linkGroupNodesArray;
    }

}