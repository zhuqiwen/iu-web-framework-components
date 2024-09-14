<?php

namespace Edu\IU\WSB\IUWebFrameworkComponents\Components\Banners;
use Edu\IU\RSB\StructuredDataNodes\Asset\FileNode;
use Edu\IU\RSB\StructuredDataNodes\Text\WysiwygNode;

class VideoBanner extends Banner{

    public function __construct(string $videoPath, string $transcript = '')
    {
        parent::__construct('Video');

        if (str_ends_with($videoPath, 'mp4')){
            $videoNode = new FileNode('mp4');
        }else{
            $videoNode = new FileNode('webm');
        }
        $videoNode->setValueFilePath($videoPath);
        $this->dataNode->addChild($videoNode);

        $this->dataNode->addChild(new WysiwygNode('transcript', $transcript));

    }

}