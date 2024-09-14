<?php

namespace Edu\IU\WSB\IUWebFrameworkComponents\Components\Chunks;
use Edu\IU\RSB\StructuredDataNodes\GroupNode;
use Edu\IU\RSB\StructuredDataNodes\Text\RadioNode;
use Edu\IU\RSB\StructuredDataNodes\Text\TextInputNode;

class TableChunk extends Chunk implements ChunkInterface {


    public function __construct(array $rows = [['row cell']], array $headers = ['header'], string $tableTitle = 'table title', string $position = 'Full')
    {
        //normalize rows array to be 2-dimensional
        $this->normalizeRowsAndHeaders($rows, $headers);


        parent::__construct($this->getChunkType());

        $this->table_caption_node->setValueText($tableTitle);
        $this->position_node->setValueText($position);
        $this->constructTableHeaderCellsNode($headers);
        $this->constructTableBodyNode($rows);


        $details = [
            $this->table_caption_node,
            $this->position_node,
            $this->table_header_node,
            $this->table_body_node,
        ];

        $this->addChildrenToDetailsNode($details);
    }

    public function constructTableBodyNode(array $rows): void
    {
        foreach ($rows as $row){
            $rowNode = new GroupNode('table-row');
            foreach ($row as $cell){
                $cellNode = new GroupNode('tcell');
                $cellNode->addChild(new RadioNode('tcell-type', 'Standard'));
                $cellNode->addChild(new RadioNode('tcell-standard', $cell));

                $rowNode->addChild($cellNode);
            }
            $this->table_body_node->addChild($rowNode);
        }
    }

    public function constructTableHeaderCellsNode(array $headers):void
    {
        foreach ($headers as $header){
            $this->table_header_node->addChild(new TextInputNode('header-cell', $header));
        }

    }

    public function normalizeRowsAndHeaders(array &$rows, array &$headers):void
    {
        foreach ($rows as $index => $row){
            if (!array($row)){
                $rows[$index] = [$row];
            }
        }
        //size of cells in each row should be == size of headers
        foreach ($rows as $index => $row){
            if (sizeof($row) > sizeof($headers)){
                //append new items to headers
                $headers = array_pad($headers, sizeof($row), 'missing header');
            }elseif(sizeof($row) < sizeof($headers)){
                //append new items to rows
                $rows[$index] = array_pad($row, sizeof($headers), 'missing cell content');
            }
        }

    }
}