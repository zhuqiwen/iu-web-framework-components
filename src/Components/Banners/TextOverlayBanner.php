<?php

namespace Edu\IU\WSB\IUWebFrameworkComponents\Components\Banners;
use Edu\IU\RSB\StructuredDataNodes\Asset\FileNode;
use Edu\IU\RSB\StructuredDataNodes\Text\TextAreaNode;
use Edu\IU\RSB\StructuredDataNodes\Text\TextInputNode;

class TextOverlayBanner extends Banner{


    public function __construct(string $imagePath, string $header, string $subhead, string $linkOrPath = 'https://www.iu.edu', string $linkLabel = 'link label')
    {
        parent::__construct('Text Overlay');

        $this->buildTextImageTextOverlayNode($imagePath, $header, $subhead, $linkOrPath, $linkLabel);
    }
}