<?php

namespace Edu\IU\WSB\IUWebFrameworkComponents\Components;

use Edu\IU\Framework\GenericUpdater\Asset\Foldered\File;
use Edu\IU\RSB\StructuredDataNodes\Asset\FileNode;
use Edu\IU\RSB\StructuredDataNodes\BaseNode;
use Edu\IU\RSB\StructuredDataNodes\GroupNode;
use Edu\IU\RSB\StructuredDataNodes\Text\DropdownNode;
use Edu\IU\RSB\StructuredDataNodes\Text\TextAreaNode;
use Edu\IU\RSB\StructuredDataNodes\Text\TextInputNode;
use PHPUnit\TextUI\XmlConfiguration\Group;

class ProfileDetails extends Component {

    public function __construct(array $profileDetails)
    {
        $this->dataNode = new GroupNode('profile-details');
        $detailsNodesArray = $this->getDetailsNodes($profileDetails);

        foreach ($detailsNodesArray as $node){
            $this->dataNode->addChild($node);
        }
    }

    public function getDetailsNodes(array $profilesDetails):array
    {
        //TODO: add more details; the following is just a demo
        $nodesArray = [];
        if (isset($profilesDetails['first-name'])){
            $nodesArray[] = new TextInputNode('first-name', $profilesDetails['first-name']);
        }
        if (isset($profilesDetails['last-name'])){
            $nodesArray[] = new TextInputNode('last-name', $profilesDetails['last-name']);
        }
        if (isset($profilesDetails['campus'])){
            $nodesArray[] = new DropdownNode('campus', $profilesDetails['campus']);
        }
        if (isset($profilesDetails['short-bio'])){
            $nodesArray[] = new TextAreaNode('short-bio', $profilesDetails['short-bio']);
        }

        if (isset($profilesDetails['title'])){
            $nodesArray[] = new TextInputNode('title', $profilesDetails['title']);
        }

        $nodesArray[] = $this->buildContactGroup($profilesDetails);
        $nodesArray[] = $this->buildImageGroup($profilesDetails);
        $nodesArray[] = $this->buildAddressGroup($profilesDetails);



        return $nodesArray;
    }


    public function buildAddressGroup(array $profilesDetails):GroupNode
    {
        $addressGroup = new GroupNode('address-group');

        if(isset($profilesDetails['city'])){
            $addressGroup->addChild(new TextInputNode('city', $profilesDetails['city']));
        }

        //TODO: add more inputs
        return $addressGroup;
    }
    public function buildImageGroup(array $profilesDetails):GroupNode
    {
        $imageGroupNode = new GroupNode('image-group');
        if (isset($profilesDetails['image'])){
            $imageNode = new FileNode('image', '', $profilesDetails['image']);
            $imageGroupNode->addChild($imageNode);
        }

        return $imageGroupNode;
    }

    public function buildContactGroup(array $profilesDetails):GroupNode
    {
        $contactGroupNode = new GroupNode('contact-group');
        if (isset($profilesDetails['email'])){
            $contactGroupNode->addChild(new TextInputNode('email', $profilesDetails['email']));
        }

        if (isset($profilesDetails['phone'])){
            $contactGroupNode->addChild(new TextInputNode('phone-number', $profilesDetails['phone']));
        }

        if (isset($profilesDetails['website'])){
            $contactGroupNode->addChild(new TextInputNode('website-url', $profilesDetails['website']));
        }

        return $contactGroupNode;
    }
}