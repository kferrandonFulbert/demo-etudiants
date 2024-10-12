<?php
include_once "Systeme.php";
class Carousel
{

    private string $_titre;
    private string $_desc;
    private string $_img;

    public function __construct()
    {
    }

    /**
     * Get the value of _titre
     */
    public function get_titre()
    {
        return $this->_titre;
    }

    /**
     * Set the value of _titre
     *
     * @return  self
     */
    public function set_titre($_titre)
    {
        $this->_titre = $_titre;

        return $this;
    }

    /**
     * Get the value of _desc
     */
    public function get_desc()
    {
        return $this->_desc;
    }

    /**
     * Set the value of _desc
     *
     * @return  self
     */
    public function set_desc($_desc)
    {
        $this->_desc = $_desc;

        return $this;
    }

    /**
     * Get the value of _img
     */
    public function get_img()
    {
        return $this->_img;
    }

    /**
     * Set the value of _img
     *
     * @return  self
     */
    public function set_img($_img)
    {
        $this->_img = $_img;

        return $this;
    }

    public function render($items)
    {
?>
        <div id="carouselExampleCaptions" class="carousel slide">
            <div class="carousel-indicators">
                <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
                <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="1" aria-label="Slide 2"></button>
                <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="2" aria-label="Slide 3"></button>
            </div>
            <div class="carousel-inner col-6">
                <?php
                $limit = 3;
                $i = 0;
                foreach ($items as $item) {
                    if ($i < 3) {
                        //var_dump($item->get_info());
                ?>
                        <div class="carousel-item active">
                            <img src="<?= $item->get_img(); ?>" class="d-block w-100" alt="...">
                            <div class="carousel-caption d-none d-md-block">
                                <h5><?= $item->get_nom(); ?></h5>
                                <p><?= $item->get_info(); ?></p>
                            </div>
                        </div>
                <?php
                    }
                    $i++;
                }
                ?>
            </div>
            <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Previous</span>
            </button>
            <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Next</span>
            </button>
        </div>
<?php
    }
}
