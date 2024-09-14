<?php

namespace Edu\IU\WSB\IUWebFrameworkComponents\Components;

use Edu\IU\RSB\StructuredDataNodes\BaseNode;
use Edu\IU\RSB\StructuredDataNodes\GroupNode;

interface ComponentInterface {

    // all components: Section, notes, banner, social media, news, event, and profile details need to be able to generate data node
    public function getDataNode(): BaseNode;
}