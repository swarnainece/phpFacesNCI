<?php

class Image
{
    /**
     * @var array
     */
    private $bitmap;
    /**
     * @var int
     */
    private $width;
    /**
     * @var int
     */
    private $height;
    /**
     * @param string $path
     */
    public function __construct($path)
    {
        if (!file_exists($path)) {
            throw new InvalidArgumentException("image not found");
        }
        $image = $this->createImage($path);
        $this->bitmap = $this->createBitmap(
            $image,
            $this->width = imagesx($image),
            $this->height = imagesy($image)
        );
    }
    /**
     * Create new image resource from image path.
     *
     * @param string $path
     *
     * @return resource
     *
     * @throws InvalidArgumentException
     */
    private function createImage($path)
    {
        $info = getimagesize($path);
        $type = $info[2];
         

        $image = null;
        if ($type == IMAGETYPE_JPEG) {
            $image = imagecreatefromjpeg($path);

        }
        if ($type == IMAGETYPE_GIF) {
            $image = imagecreatefromgif($path);
            
        }
        if ($type == IMAGETYPE_PNG) {
            $image = imagecreatefrompng($path);
        }
        if (!$image) {
            throw new InvalidArgumentException("image invalid");
        }
        return $image;
    }
    /**
     * Creates new bitmap from image resource.
     *
     * @param resource $image
     * @param int $width
     * @param int $height
     *
     * @return array
     */
    private function createBitmap($image, $width, $height)
    {
        $bitmap = [];
        for ($y = 0; $y < $height; $y++) {
            $bitmap[$y] = [];
            for ($x = 0; $x < $width; $x++) {
                $color = imagecolorat($image, $x, $y);
                $bitmap[$y][$x] = [
                    "r" => ($color >> 16) & 0xFF,
                    "g" => ($color >> 8) & 0xFF,
                    "b" => $color & 0xFF
                ];
            }
        }
        return $bitmap;
    }
    /**
     * Difference between two bitmap states.
     *
     * @param Image $image
     * @param callable $method
     *
     * @return Difference
     */
    public function difference(Image $image, callable $method)
    {
        $transformation = new Difference1();


         $bitmap = $transformation(
            $this->bitmap, $image->bitmap, $this->width, $this->height, $method
        );

         #echo count($bitmap) ;
            
        
    
        return new Difference(
            $this->cloneWith("bitmap", $bitmap)
        );
    }
    /**
     * @param string $property
     * @param mixed $value
     *
     * @return Image
     */
    private function cloneWith($property, $value)
    {
        $clone = clone $this;
        $clone->$property = $value;
        return $clone;
    }
    /**
     * @return array
     */
    public function getBitmap()
    {
        return $this->bitmap;
    }
    /**
     * @return int
     */
    public function getWidth()
    {
        return $this->width;
    }
    /**
     * @return int
     */
    public function getHeight()
    {
        return $this->height;
    }
}



class EuclideanDistance
{
    /**
     * RGB color distance for the same pixel in two images.
     *
     * @link https://en.wikipedia.org/wiki/Euclidean_distance
     *
     * @param array $p
     * @param array $q
     *
     * @return float
     */
    public function __invoke(array $p, array $q)
    {
        $r = $p["r"] - $q["r"];
        $r *= $r;
        $g = $p["g"] - $q["g"];
        $g *= $g;
        $b = $p["b"] - $q["b"];
        $b *= $b;
        return (float) sqrt($r + $g + $b);
    }
}

class Difference
{
    /**
     * @var array
     */
    private $bitmap;
    /**
     * @var int
     */
    private $width;
    /**
     * @var int
     */
    private $height;
    /**
     * @param Image $image
     */
    public function __construct(Image $image)
    {
        $this->bitmap = $image->getBitmap();
        $this->width  = $image->getWidth();
        $this->height = $image->getHeight();
    }
    /**
     * @return array
     */
    public function getBitmap()
    {
        return $this->bitmap;
    }
    /**
     * @return int
     */
    public function getWidth()
    {
        return $this->width;
    }
    /**
     * @return int
     */
    public function getHeight()
    {
        return $this->height;
    }
    /**
     * New Difference with scaled differences.
     *
     * @param float $factor
     *
     * @return Difference
     */
    public function withScale($factor)
    {
        $maximum = $this->maximum();
        $transformation = new Transformation\Scale();
        $bitmap = $transformation(
            $this->bitmap, $this->width, $this->height, $maximum, $factor
        );
        return $this->cloneWith("bitmap", $bitmap);
    }
    /**
     * Maximum difference for all bitmap pixels.
     *
     * @return int
     */
    private function maximum()
    {
        $calculation = new Calculation\Maximum();
        return $calculation(
            $this->bitmap, $this->width, $this->height
        );
    }
    /**
     * New Difference from reduced standard deviation.
     *
     * @return Difference
     */
    public function withReducedStandardDeviation()
    {
        $deviation = $this->standardDeviation();
        $transformation = new Transformation\ReducedStandardDeviation();
        $bitmap = $transformation(
            $this->bitmap, $this->width, $this->height, $deviation
        );
        return $this->cloneWith("bitmap", $bitmap);
    }
    /**
     * Standard deviation for all bitmap pixels.
     *
     * @return float
     */
    private function standardDeviation()
    {
        $average = $this->average();
        $calculation = new Calculation\StandardDeviation();
        return $calculation(
            $this->bitmap, $this->width, $this->height, $average
        );
    }
    /**
     * Average difference for all bitmap pixels.
     *
     * @return int
     */
    private function average()
    {
        $calculation = new Calculation\Average();
        return $calculation(
            $this->bitmap, $this->width, $this->height
        );
    }
    /**
     * @param string $property
     * @param mixed $value
     *
     * @return Difference
     */
    private function cloneWith($property, $value)
    {
        $clone = clone $this;
        $clone->$property = $value;
        return $clone;
    }
    
    /**
     * Percentage of different pixels in the bitmap.
     *
     * @return float
     */
    public function percentage()
    {
        $calculation = new Percentage();
        return $calculation(
            $this->bitmap, $this->width, $this->height
        );
    }
}

class Difference1
{
    /**
     * Difference between all pixels of two images.
     *
     * @param array $bitmap
     * @param array $bitmap2
     * @param int $width
     * @param int $height
     * @param callable $method
     *
     * @return array
     */
    public function __invoke(array $bitmap1, array $bitmap2, $width, $height, callable $method)
    {
        $new = [];
        for ($y = 0; $y < $height; $y++) {
            $new[$y] = [];
            for ($x = 0; $x < $width; $x++) {
                $new[$y][$x] = $method(
                    $bitmap1[$y][$x],
                    $bitmap2[$y][$x]
                );
            }
        }
        return $new;
    }
}



class Percentage
{

    public function __invoke(array $bitmap, $width, $height)
    {
        $total = 0;
        $different = 0;
        for ($y = 0; $y < $height; $y++) {
            for ($x = 0; $x < $width; $x++) {
                $total++;
                if ($bitmap[$y][$x] > 0) {
                    $different++;
                }
            }
        }
        return (float) (($different / $total) * 100);
    }
}

?>

