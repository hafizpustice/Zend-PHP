<?php
interface Element
{
    /**
     * Constructor function. Must pass existing config, or leave as
     * is for new element, where the default will be used instead.
     *
     * @param array $config Element configuration.
     */
    public function __construct($config = []);

    /**
     * Get the definition of the Element.
     *
     * @return array An array with 'title', 'description' and 'type'
     */
    public static function get_definition();

    /**
     * Get Element config variable.
     *
     * @return array Associative array of Element Config.
     */
    public function get_config();

    /**
     * Set Element config variable.
     *
     * @param array $config New configuration variable.
     *
     * @return void
     */
    public function set_config($config);
}

abstract class Base implements Element
{

    /**
     * Element configuration variable
     *
     * @var array
     */
    protected $config = [];

    /**
     * Get Element config variable.
     *
     * @return array Associative array of Element Config.
     */
    public function get_config()
    {
        return $this->config;
    }

    /**
     * Create an eForm Element instance
     *
     * @param array $config Element config.
     */
    public function __construct($config = [])
    {
        $this->set_config($config);
    }
}

class MyElement extends Base
{

    public static function get_definition()
    {
        return [
            'type' => 'MyElement',
        ];
    }

    public function set_config($config)
    {
        // Do something here
        $this->config = $config;
    }
}

$element = new MyElement([
    'foo' => 'bar',
]);

print_r($element->get_config());