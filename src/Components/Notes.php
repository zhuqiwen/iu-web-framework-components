<?php

namespace Edu\IU\WSB\IUWebFrameworkComponents\Components;

use Edu\IU\RSB\StructuredDataNodes\Text\TextAreaNode;

class Notes extends Component {


    public function __construct(string $notes = '')
    {
        $this->dataNode = new TextAreaNode('notes', $notes);
    }


}