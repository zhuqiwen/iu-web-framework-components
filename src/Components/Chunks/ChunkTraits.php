<?php

namespace Edu\IU\WSB\IUWebFrameworkComponents\Components\Chunks;
use Edu\IU\RSB\StructuredDataNodes\Asset\BlockNode;
use Edu\IU\RSB\StructuredDataNodes\Asset\FileNode;
use Edu\IU\RSB\StructuredDataNodes\Asset\LinkableNode;
use Edu\IU\RSB\StructuredDataNodes\GroupNode;
use Edu\IU\RSB\StructuredDataNodes\Text\CheckboxNode;
use Edu\IU\RSB\StructuredDataNodes\Text\DropdownNode;
use Edu\IU\RSB\StructuredDataNodes\Text\TextAreaNode;
use Edu\IU\RSB\StructuredDataNodes\Text\TextInputNode;
use Edu\IU\RSB\StructuredDataNodes\Text\WysiwygNode;
use Edu\IU\Wcms\WebService\WCMSClient;
use PHPUnit\TextUI\XmlConfiguration\Group;
use ReflectionClass;
use ReflectionException;
use ReflectionProperty;

trait ChunkTraits{



    protected WCMSClient $wcms;
    protected DropdownNode $chunkTypeNode;
    protected GroupNode $detailsNode;


    /**
     * details's children
     */
    public TextInputNode $header_node;
    public DropdownNode $header_level_node;
    public DropdownNode $position_node;
    public DropdownNode $size_node;
    public TextAreaNode $subhead_feature_node;
    public TextAreaNode $subhead_node;
    public TextInputNode $stat_number_node;
    public WysiwygNode $content_node;
    public DropdownNode $image_type_node;
    public FileNode $image_node;
    public DropdownNode $video_type_node;
    public DropdownNode $audio_type_node;
    public DropdownNode $heading_level_node;
    public FileNode $thumbnail_node;
    public FileNode $mp4_node;
    public FileNode $webm_node;
    public FileNode $mp4_described_node;
    public FileNode $webm_described_node;
    public FileNode $vtt_node;
    public FileNode $descriptions_file_node;
    public CheckboxNode $widescreen_node;
    public TextInputNode $url_node;
    public TextInputNode $video_id_described_node;
    public FileNode $mp3_node;
    public DropdownNode $large_image_placement_node;
    public DropdownNode $horizontal_placement_node;
    public DropdownNode $vertical_placement_node;
    public FileNode $essay_large_image_node;
    public FileNode $essay_small_image_1_node;
    public FileNode $essay_small_image_2_node;
    public TextInputNode $title_node;
    public WysiwygNode $caption_node;
    public TextInputNode $attribution_node;
    public TextInputNode $table_caption_node;
    public GroupNode $table_header_node;
    public GroupNode $table_body_node;
    public GroupNode $slide_node;
    public DropdownNode $header_level_accordion_node;
    public GroupNode $fold_node;
    public GroupNode $cta_link_node;
    public DropdownNode $feed_type_node;
    public TextInputNode $feed_name_node;
    public TextInputNode $id_node;
    public BlockNode $block_node;
    public CheckboxNode $alpha_order_node;
    public TextInputNode $count_max_node;
    public DropdownNode $mode_node;
    public DropdownNode $social_type_node;
    public TextInputNode $social_url_node;
    public CheckboxNode $disable_caption_node;
    public TextInputNode $link_label_node;
    public LinkableNode $link_internal_node;
    public TextInputNode $link_external_node;
    public DropdownNode $snippet_type_node;
    public TextAreaNode $code_node;
    public WysiwygNode $transcript_node;


    public function addChildrenToDetailsNode(array $ChildrenToDetails): void
    {
        foreach ($ChildrenToDetails as $child){
            $this->detailsNode->addChild($child);
        }
    }


    /**
     * init all chunk details' children
     * @throws ReflectionException
     */
    public function initDetailsChildren(): void
    {
        $rel = new ReflectionClass($this);
        $properties = $rel->getProperties(ReflectionProperty::IS_PUBLIC );
        $this->detailsNode = new GroupNode('details');

        foreach ($properties as $property){
            $identifier = str_replace('_node', '', $property->getName());
            $identifier = str_replace('_', '-', $identifier);


            $p = new ReflectionProperty($this, $property->getName());

            $nodeClass = $p->getType()->getName();
            $this->{$property->getName()} = new $nodeClass($identifier);


        }

    }

    /**
     * use regex to split the class name without name space by upper case letters
     * then concatenate them by ' ' to get the chunk type name
     * @return string
     */
    public function getChunkType():string
    {
        $reflection = new ReflectionClass($this);

        $type = preg_split('/(?=[A-Z])/', $reflection->getShortName());
        $type = implode(' ', $type);
        return trim($type);
    }

    public function constructLinkNode(string $linkOrPath):LinkableNode|TextInputNode
    {

        if(str_starts_with($linkOrPath, 'https://')){
            //then this is an external link. use Text Input Node
            $this->link_external_node->setValueText($linkOrPath);
            $node = $this->link_external_node;
        }else{
            //TODO: check if $linkOrPath is page, file, or symlink; then set linkableNode
            //an internal link that uses Linkable Node
            $assetId = '';
            $assetPath = '';
            $assetType = '';
            $this->link_internal_node->setValues($assetType, $assetId, $assetPath);
            $node = $this->link_internal_node;
        }

        return $node;
    }

}