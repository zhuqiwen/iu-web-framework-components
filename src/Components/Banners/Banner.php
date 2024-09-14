<?php

namespace Edu\IU\WSB\IUWebFrameworkComponents\Components\Banners;
use Edu\IU\WSB\IUWebFrameworkComponents\Components\ComponentInterface;
use Edu\IU\RSB\StructuredDataNodes\BaseNode;
use Edu\IU\RSB\StructuredDataNodes\GroupNode;
use Edu\IU\RSB\StructuredDataNodes\Text\DropdownNode;

abstract class Banner implements ComponentInterface {

    use BannerTraits;
    public GroupNode $dataNode;

    public function __construct(string $bannerType)
    {
        $this->dataNode = new GroupNode('banner');
        $this->dataNode->addChild(new DropdownNode('type', $bannerType));
    }

    public function getDataNode(): BaseNode
    {
        return  $this->dataNode;
    }
}