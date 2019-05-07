<?php

class YouCanAddClosureAsParam
{
    protected $text = 'punks';

    public function execute(callable $closure)
    {
        try {
            $reflection = new ReflectionFunction($closure);
            $param = reset($reflection->getParameters())->name;
            $this->$param = call_user_func($closure, $this->$param);
            echo $this->$param;
        } catch (Throwable $exception) {
            var_dump($exception);
        }
    }
}

$object = new YouCanAddClosureAsParam();

$name = 'not dead';
$punk = function ($text) use ($name) {
    return $text . ' ' . $name;
};
$object->execute($punk);
