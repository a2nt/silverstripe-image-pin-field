<?php

namespace A2nt\ImageHotspot;

use SilverStripe\Forms\FieldList;
use SilverStripe\ORM\DataExtension;

class ImageHotspotDataExtension extends DataExtension
{
    private static $db = [
        'HotspotImageX' => 'Float(3,2)',
        'HotspotImageY' => 'Float(3,2)',
    ];

    public function updateCMSFields(FieldList $fields)
    {
        $name = $this->getHotspotName();
        $fields->removeByName([$name . 'X', $name . 'Y']);

        $fields->addFieldToTab(
            'Root.Main',
            ImageHotspotField::create(
                $name,
                'Select Hotspot',
                $this->owner->{$name}()
            )
        );
    }

    public function getHotspotName()
    {
        $name = $this->owner->config()->get('hotspot_field_name');

        return  $name ? $name : 'HotspotImage';
    }

    public function extraStatics($class = null, $extension = null)
    {
        $data = parent::extraStatics($class, $extension);
        $name = $this->getHotspotName();
        \var_dump($class);
        \var_dump($extension);
        \var_dump($data);
        die('aaaa');
        return \array_merge($data, [
            'db' => [
                $name . 'X' => 'Int',
                $name . 'Y' => 'Int',
            ],
        ]);
    }
}
