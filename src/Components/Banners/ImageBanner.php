<?php

namespace Edu\IU\WSB\IUWebFrameworkComponents\Components\Banners;

use Edu\IU\RSB\StructuredDataNodes\Asset\FileNode;

class ImageBanner extends Banner{

    public function __construct(string $imagePath)
    {
        parent::__construct('Image');
        $imageNode = new FileNode('image');
        $imageNode->setValueFilePath($imagePath);
        $this->dataNode->addChild($imageNode);
    }

}