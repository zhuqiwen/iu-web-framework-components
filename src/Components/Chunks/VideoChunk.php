<?php

namespace Edu\IU\WSB\IUWebFrameworkComponents\Components\Chunks;
use Edu\IU\RSB\StructuredDataNodes\Asset\FileNode;
use Edu\IU\RSB\StructuredDataNodes\Text\TextInputNode;

class VideoChunk extends Chunk implements ChunkInterface {


    public function __construct(string $urlOrPath, string $caption = '', string $position = 'Full')
    {
        $videoType = $this->getVideoType($urlOrPath);

        parent::__construct($this->getChunkType());

        $this->caption_node->setValueText($caption);
        $this->position_node->setValueText($position);
        $this->video_type_node->setValueText($videoType);


        $details = [
            $this->caption_node,
            $this->position_node,
            $this->video_type_node,
            $this->constructVideoUrlPathNode($videoType, $urlOrPath)
        ];

        $this->addChildrenToDetailsNode($details);
    }

    public function getVideoType(string $urlOrPath):string
    {
        if (str_starts_with($urlOrPath, 'https://')){
            //YouTube, Vimeo, or Kaltura
            $type = match (true){
                str_starts_with($urlOrPath, 'https://www.youtube.com/'), str_starts_with($urlOrPath, 'https://youtube.com/'), str_starts_with($urlOrPath, 'https://youtu.be/') => 'YouTube',
                str_starts_with($urlOrPath, 'https://www.vimeo.com/'), str_starts_with($urlOrPath, 'https://vimeo.com/') => 'Vimeo',
                str_contains($urlOrPath, 'kaltura.com/') => 'Kaltura',
            };
        }else{
            $type = 'HTML5';
        }

        return $type;

    }

    public function constructVideoUrlPathNode(string $videoType, string $urlOrPath):FileNode|TextInputNode
    {

        if ($videoType == 'HTML5'){
            $nodeName = match (true){
                str_ends_with($urlOrPath, 'mp4') => 'mp4_node',
                str_ends_with($urlOrPath,'webm') => 'webm_node',
            };
            $this->{$nodeName}->setValueFilePath($urlOrPath);
            $node = $this->{$nodeName};
        }else{
            $this->url_node->setValueText($urlOrPath);
            $node = $this->url_node;
        }

        return $node;

    }


}