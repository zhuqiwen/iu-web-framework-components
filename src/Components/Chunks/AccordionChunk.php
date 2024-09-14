<?php

namespace Edu\IU\WSB\IUWebFrameworkComponents\Components\Chunks;
use Edu\IU\RSB\StructuredDataNodes\GroupNode;
use Edu\IU\RSB\StructuredDataNodes\Text\TextInputNode;
use Edu\IU\RSB\StructuredDataNodes\Text\WysiwygNode;

class AccordionChunk extends Chunk implements ChunkInterface {


    public function __construct(array $folds, string $headerLevel = 'h2', string $position = 'Full')
    {
        parent::__construct($this->getChunkType());

        $this->position_node->setValueText($position);
        $this->header_level_accordion_node->setValueText($headerLevel);

        $details = [
            $this->position_node,
            $this->header_level_accordion_node
        ];

        $details = array_merge($details, $this->constructFoldNode($folds));

        $this->addChildrenToDetailsNode($details);

    }


    /**
     * $folds = [
     *     [
     *         'label' => 'some label',
     *         'content' => '<p>content</p>'
     *     ],
     *     [
     *         'label' => 'some label 2',
     *         'content' => '<p>content 2</p>'
     *     ],
     *     ...
     * ]
     *
     * @param array $folds
     * @return array
     */
    public function constructFoldNode(array $folds): array
    {
        $foldNodesArray = [];
        foreach ($folds as $fold){
            $labelNode = new TextInputNode('label', $fold['label']);
            $contentNode = new WysiwygNode('content', $fold['content']);
            $foldNode = new GroupNode('fold');
            $foldNode->addChild($labelNode);
            $foldNode->addChild($contentNode);

            $foldNodesArray[] = $foldNode;
        }

        return $foldNodesArray;
    }


}