<?php

namespace A2nt\ImageHotspot;

use SilverStripe\Assets\Image;
use SilverStripe\Forms\FieldGroup;
use SilverStripe\Forms\LiteralField;
use SilverStripe\Forms\TextField;
use SilverStripe\View\Requirements;

class ImageHotspotField extends FieldGroup
{
    public function __construct($name, $title = null, Image $image = null)
    {
        if (! $image) {
            return parent::__construct($title);
        }

        Requirements::css('image-pin/client/dist/css/app.css');
        Requirements::javascript('image-pin/client/dist/js/app.js');

        $fields = [
            LiteralField::create(
                $name . 'Image',
                '<div id="' . $name . '" class="form__field group-item field field--small field--image-hotspot"'
                . ' style="position:relative">'
                . '<img id="' . $name . 'Image" src="' . $image->Link() . '" alt="Image" />'
                . '<div class="pin"></div>'
                . '</div>'
            ),
            TextField::create($name . 'X'),
            TextField::create($name . 'Y'),
        ];

        $this->setName($name)->setValue('');
        parent::__construct($title, $fields);
    }
}
