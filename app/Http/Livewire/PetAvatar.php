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
    var $width 	= 100; 			//the final width of your icon
    var $height = 100;			//the final height of the icon
    var $parts  = array(); 		//the different images that will be superimposed on top of each other
    /**
     * 	SET WIDTH
     * This function sets the final width of our avatar icon. Because we want the image to be
     * proportional we don't need to set the height (as it will distort the image)
     * The height will automatically be computed.
     *
     * @param Integer $width
     */
    function set_width($width)
    {
        //setting the width
        $this->width  = $width;
    }
    /**
     * 	SET FILENAME
     * This sets the final filename of our icon. We set this variable if we want
     * to save the icon to the hard drive.
     *
     * @param String $filename
     */
    function set_filename($filename)
    {
        $this->filename = $filename;
    }

    /**
     * SET BACKGROUND
     * From this function we can add one of two types of backgrounds
     * either an image or a solid color.
     *
     * @param String $background
     */
    function set_background($background)
    {
        $this->background_source = $background;
    }

    /**
     * 	ADD LAYER
     * This is the meat and potatoes of this class (And it's so small!)
     * This function let's us add images to our final composition
     *
     * @param String $filename
     */
    function add_layer($filename)
    {
        //by using the syntax $this->parts[] we are automatically incrementing the array pointer by 1
        //There is no need to do $this->parts[$index] = $filename;
        // $index = $index + 1;
        $this->parts[] = $filename;
    }
    /**
     * 	BUILD BACKGROUND
     *  This function takes our background information and compiles it
     */
    function build_background()
    {
        //----------------------------------------
        // Getting the height
        //----------------------------------------
        //grabbing the first image in the array
        $first_image = $this->parts[0];

        //getting the width and height of that image
        list($width, $height) = getimagesize($first_image);

        //finding the height of the final image (from a simple proportion equation)
        $this->height = ($this->width/$width)*$height;


        //----------------------------------------
        // Compiling the background
        //----------------------------------------
        //the background canvas, it will be the same width and height
        $this->background = imagecreatetruecolor($this->width, $this->height);
        //----------------------------------------
        // Adding a background color
        // I'm going to be sending hex color values (#FFFFFF),
        //----------------------------------------
        //checking to make sure it's a color
        if(substr_count($this->background_source, "#")>0)
        {
            //converting the 16 digit hex value to the standard 10 digit value
            $int = hexdec(str_replace("#", "", $this->background_source));

            //getting rgb color
            $background_color = imagecolorallocate ($this->background, 0xFF & ($int >> 0x10), 0xFF & ($int >> 0x8), 0xFF & $int);

            //filling the background image with that color
            imagefill($this->background, 0,0,$background_color);

            //----------------------------------------
            // Adding a background image
            // If $background is not a color, assume that it's an image
            //----------------------------------------
        }else{
            //getting the width and height of the image
            list($bg_w, $bg_h) = getimagesize($this->background_source);

            // Make sure that the background image is a png as well.
            $img = imagecreatefrompng($this->background_source);

            //This function copies and resizes the  image onto the background canvas
            imagecopyresampled($this->background, $img, 0,0,0,0,$this->width, $this->height, $bg_w, $bg_h);
        }
    }
    /**
     * Build Composition
     * This function compiles all the information and builds the image
     */
    function build_composition()
    {
        //----------------------------------------
        // The Canvas
        // Creating the canvas for the final image, by default the canvas is black
        //----------------------------------------
        $this->canvas = imagecreatetruecolor($this->width, $this->height);

        //----------------------------------------
        // Adding the background
        // If the background is set, use it gosh darnit
        //----------------------------------------
        if($this->background)
        {
            imagecopyresampled($this->canvas, $this->background, 0,0,0,0,$this->width, $this->height, $this->width, $this->height);
        }

        //----------------------------------------
        // Adding the body parts
        // Here we go, the best part
        //----------------------------------------
        //looping through the array of parts
        for($i=0; $i<count($this->parts); $i++)
        {
            //getting the width and height of the body part image, (should be the same size as the canvas)
            list($part_w, $part_h) = getimagesize($this->parts[$i]);

            //storing that image into memory (make sure it's a png image)
            $body_part = imagecreatefrompng($this->parts[$i]);

            //making sure that alpha blending is enabled
            imageAlphaBlending($body_part, true);

            //making sure to preserve the alpha info
            imageSaveAlpha($body_part, true);

            //finally, putting that image on top of our canvas
            imagecopyresampled($this->canvas, $body_part, 0,0,0,0,$this->width, $this->height, $part_w, $part_h);
        }
    }
    /**
     * 	OUTPUT
     *  This function checks to see if we're going to ouput to the header or to a file
     */
    function output()
    {
        // If the filename is set, save it to a file
        if(!empty($this->filename))
        {
            //notice that this function has the added $this->filename value (by setting this you are saving it to the hard drive)
            imagejpeg($this->canvas, $this->filename,100);

            //Otherwise output to the header
        }else{
            //before you can output to the header, you must tell the browser to interpret this document
            //as an image (specifically a jpeg image)
            header("content-type: image/jpeg");

            //Output, notice that I ommitted $this->filename
            imagejpeg($this->canvas, "", 100);
        }
        //Removes the image from the buffer and frees up memory
        imagedestroy($this->canvas);
    }
    /**
     * BUILD
     * The final function, this builds the image and outputs it
     */
    function build()
    {
        //Builds the background
        $this->build_background();

        //builds the image
        $this->build_composition();

        //outputs the image
        $this->output();
    }


}
