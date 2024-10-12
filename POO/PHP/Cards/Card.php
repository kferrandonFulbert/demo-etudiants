<?php
class Card
{

    private string $_titre;
    private string $_desc;
    private string $_img;

    public function __construct(string $unTitre, string $uneDescription, string $uneImg)
    {
        $this->_titre = $unTitre;
        $this->_desc = $uneDescription;
        $this->_img = $uneImg;
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

    public function render(string $taillBoostrap = "")
    {
?>
        <div class="card <?= $taillBoostrap; ?>" >
            <img src="<?= $this->_img; ?>" class="card-img-top img-fluid" alt="...">
            <div class="card-body">
                <h5 class="card-title"><?= $this->_titre; ?></h5>
                <p class="card-text"><?= $this->_desc; ?></p>
            </div>
        </div>
<?php
    }
}
