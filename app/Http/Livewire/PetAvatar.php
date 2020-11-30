<?php


namespace App\Http\Livewire;


class PetAvatar
{

    /**
     * PetAvatar constructor.
     */
    public function __construct()
    {
    }

    var $filename; 				//the filename of the image
    var $width 	= 400; 			//the final width of icon
    var $height = 400;			//the final height of the icon
    var $parts  = array(); 		//the different images that will be superimposed on top of each other

    /**
     * SET WIDTH
     * This function sets the final width of the pet avatar icon.
     *
     * @param Integer $width
     */
    function set_width($width)
    {
        $this->width  = $width;
    }

    /**
     * 	SET FILENAME
     * Sets the final filename of the pet avatar.
     *
     * @param String $filename
     */
    function set_filename($filename)
    {
        $this->filename = $filename;
    }

    /**
     * 	ADD LAYER
     * Add images to the final composition
     *
     * @param String $filename
     */
    function add_layer($filename)
    {
        //by using the syntax $this->parts[] we are automatically incrementing the array pointer by 1
        $this->parts[] = $filename;
    }

    function setTransparency($new_image,$image_source)
    {

        $transparencyIndex = imagecolortransparent($image_source);
        $transparencyColor = array('red' => 255, 'green' => 255, 'blue' => 255);

        if ($transparencyIndex >= 0) {
            $transparencyColor = imagecolorsforindex($image_source, $transparencyIndex);
        }

        $transparencyIndex    = imagecolorallocate($new_image, $transparencyColor['red'], $transparencyColor['green'], $transparencyColor['blue']);
        imagefill($new_image, 0, 0, $transparencyIndex);
        imagecolortransparent($new_image, $transparencyIndex);

    }
    /**
     * Build Composition
     * This function compiles all the information and builds the image
     */
    function build_composition()
    {
        // Creating the canvas for the final image, by default the canvas is black
        $this->canvas = imagecreatetruecolor($this->width, $this->height);

        // Adding the body parts looping through the array of parts
        for($i=0; $i<count($this->parts); $i++)
        {
            list($part_w, $part_h) = getimagesize($this->parts[$i]);

            $body_part = imagecreatefrompng($this->parts[$i]);

            imageAlphaBlending($body_part, true);

            imageSaveAlpha($body_part, true);

            imagecopyresampled($this->canvas, $body_part, 0,0,0,0,$this->width, $this->height, $part_w, $part_h);
        }
    }
    /**
     * 	OUTPUT
     *  Output image to a file
     */
    function output()
    {
        imagejpeg($this->canvas, $this->filename,100);

        imagedestroy($this->canvas);
    }
    /**
     * BUILD
     * Builds the image and outputs it
     */
    function build()
    {
        //builds the image
        $this->build_composition();

        //outputs the image
        $this->output();
    }
}
