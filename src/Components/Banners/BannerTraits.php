<?php

namespace Edu\IU\WSB\IUWebFrameworkComponents\Components\Banners;

use Edu\IU\RSB\StructuredDataNodes\Asset\FileNode;
use Edu\IU\RSB\StructuredDataNodes\Asset\LinkableNode;
use Edu\IU\RSB\StructuredDataNodes\Text\TextAreaNode;
use Edu\IU\RSB\StructuredDataNodes\Text\TextInputNode;

trait BannerTraits{

    public function getLinkNode(string $linkOrPath):LinkableNode|TextInputNode
    {
        if (str_starts_with($linkOrPath, 'https://')){
            $node = new TextInputNode('link-external', $linkOrPath);
        }else{
            $node = new LinkableNode('link-external');
            //TODO: check linkable type and get asset id
            $assetType = '';
            $assetId = '';
            $node->setValues($assetType, $assetId, $linkOrPath);
        }

        return $node;
    }


    public function buildTextImageTextOverlayNode(string $imagePath, string $header, string $subhead, string $linkOrPath, string $linkLabel):void
    {
        $imageNode = new FileNode('image');
        $imageNode->setValueFilePath($imagePath);
        $this->dataNode->addChild($imageNode);

        $this->dataNode->addChild(new TextInputNode('header', $header));
        $this->dataNode->addChild(new TextAreaNode('subhead', $subhead));
        $this->dataNode->addChild(new TextInputNode('link-label', $linkLabel));
        $this->dataNode->addChild($this->getLinkNode($linkOrPath));

    }
}