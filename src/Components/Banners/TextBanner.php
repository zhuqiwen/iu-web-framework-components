<?php

namespace Edu\IU\WSB\IUWebFrameworkComponents\Components\Banners;
use Edu\IU\RSB\StructuredDataNodes\Asset\LinkableNode;
use Edu\IU\RSB\StructuredDataNodes\Text\DropdownNode;
use Edu\IU\RSB\StructuredDataNodes\Text\TextAreaNode;
use Edu\IU\RSB\StructuredDataNodes\Text\TextInputNode;

class TextBanner extends Banner{

    public function __construct(string $header, string $subhead, string $linkOrPath = 'https://www.iu.edu', string $linkLabel = '')
    {
        parent::__construct('Text');

        $this->dataNode->addChild(new TextInputNode('header', $header));
        $this->dataNode->addChild(new TextAreaNode('subhead', $subhead));
        $this->dataNode->addChild(new TextInputNode('link-label', $linkLabel));
        $this->dataNode->addChild($this->getLinkNode($linkOrPath));
    }

//    public function getLinkNode(string $linkOrPath):LinkableNode|TextInputNode
//    {
//        if (str_starts_with($linkOrPath, 'https://')){
//            $node = new TextInputNode('link-external', $linkOrPath);
//        }else{
//            $node = new LinkableNode('link-external');
//            //TODO: check linkable type and get asset id
//            $assetType = '';
//            $assetId = '';
//            $node->setValues($assetType, $assetId, $linkOrPath);
//        }
//
//        return $node;
//    }

}