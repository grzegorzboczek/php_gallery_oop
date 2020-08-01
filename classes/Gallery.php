<?php

    class Gallery
    {
        private $image_id;
        private string $images_directory;

        public int $first = 0;
        public int $last;


        function __construct($images_directory)
        {
            $this->images_directory = $images_directory;
        }

        // Get image ID from anchor (link) with GET
        public function getImageID() 
        {
            // 1. Save images array from images directory
            $images_array = scandir($this->images_directory);

            // 2. Delete 2 first array elements ("." and "..");
            array_shift($images_array);
            array_shift($images_array);

            if(isset($_GET['imageID']) && $_GET['imageID'] < 0 || $_GET['imageID'] > (count($images_array) - 1))
            {
                $this->image_id = 0;
                return $this->image_id;
            }

            if(isset($_GET['imageID']))
            {
                $this->image_id = $_GET['imageID'];
                $this->image_id = (int)$this->image_id;

                return $this->image_id;
            } 
            else
            {
                $this->image_id = 0;
                return $this->image_id;
            }
        }

        // Return image
        public function returnImage()
        {
            // 1. Save images array from images directory
            $images_array = scandir($this->images_directory);

            // 2. Delete 2 first array elements ("." and "..");
            array_shift($images_array);
            array_shift($images_array);

            // Check for empty array (no images error)
            if(count($images_array) === 0) {
                exit("Error. You don't have images. Add some to 'includes/images'.");
            }

            // 3. Get image_id
            $this->getImageID();

            // 4. Get current img name
            $current_img_name = $images_array[$this->image_id];

            $full_img_path = "$this->images_directory/$current_img_name";
            return $full_img_path;
        }

        // Return image name / title
        public function returnTitle()
        {
            // 1. Save images array from images directory
            $images_array = scandir($this->images_directory);

            // 2. Delete 2 first array elements ("." and "..");
            array_shift($images_array);
            array_shift($images_array);

            // 3. Get image_id
            $this->getImageID();

            // 4. Get current img name
            $current_img_name = $images_array[$this->image_id];

            return $current_img_name;
        }

        public function lastImgId()
        {
            // 1. Save images array from images directory
            $images_array = scandir($this->images_directory);

            $last = (count($images_array) - 3);
            return $last;
        }

        public function nextImg() 
        {
            $this->getImageID();

            $images_array = scandir($this->images_directory);
            $array_length = (count($images_array) - 3);
            $array_length = (int)$array_length;

            if($this->image_id === 0)
            {
                $this->image_id++;
                return 1;
            }

            if($this->image_id < $array_length)
            {
                $this->image_id++;
                return $this->image_id;
            }

            if($this->image_id >= $array_length)
            {
                $this->image_id = 0;
                return $this->image_id;
            }
        }

        public function previousImg() 
        {
            $this->getImageID();

            $images_array = scandir($this->images_directory);
            $array_length = (count($images_array) - 3);
            $array_length = (int)$array_length;

            if($this->image_id === 0)
            {
                $this->image_id = $array_length;
                return $this->image_id;
            }

            if($this->image_id <= $array_length)
            {
                $this->image_id = $this->image_id - 1;
                return $this->image_id;
            }
        }
    }

?>