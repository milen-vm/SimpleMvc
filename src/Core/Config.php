<?php
namespace SimpleMvc\Core;

class Config
{

    private static $instance = null;

    private static $configs = [];

    private function __construct($configs)
    {
        self::$configs = $configs;
    }

    /**
     * @param array $configs
     * @return \SimpleMvc\Core\Config
     */
    public static function getInstance($configs = [])
    {
        if (self::$instance === null) {
            self::$instance = new self($configs);
        }

        return self::$instance;
    }

    public function get($str)
    {
        $keys = explode('.', $str);
        $result = self::$configs;

        foreach ($keys as $key) {
            if (!is_array($result)) {
                throw new \InvalidArgumentException("The configs is not array. Key '{$key}' can not be found.");
            }

            if (!isset($result[$key])) {
                throw new \InvalidArgumentException("Key '{$key}' not found in configuration array.");
            }

            $result = $result[$key];
        }

        return $result;
    }
}