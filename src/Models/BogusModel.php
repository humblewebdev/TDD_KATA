<?php
namespace App\Models;

class BogusModel
{
    /**
     * @var string $name
     */
    private $name;

    /**
     * Build greeting message
     *
     * @return string
     */
    public function getMessage()
    {
        return 'Hello ' . $this->name . '!';
    }

    /**
     * Set name value
     *
     * @param string $name
     * @return $this
     */
    public function setName($name)
    {
        $this->name = $name;
        return $this;
    }
}
