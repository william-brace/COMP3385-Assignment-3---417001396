<?php

namespace Framework;

use Framework\Mapper_Abstract;


abstract class GenCollection_Abstract {
    protected $mapper;
    protected $total = 0;
    protected $raw = [];

    private $result;
    private $pointer = 0;
    private $objects = [];

    public function __construct(array $raw=[], Mapper_Abstract $mapper=null)
    {
        $this->raw = $raw;
        $this->total = count($raw);

        if (count($raw) && is_null($mapper)) {
            throw new AppException("need Mapper to generate objects");
        }

        $this->mapper = $mapper;
    }

    public function add(DomainObject $object)
    {
        $class = $this->targetClass();

        if (! ($object instanceof $class )) {
            throw new AppException("This is a {$class} collection");
        }

        $this->notifyAccess();
        $this->objects[$this->total] = $object;
        $this->total++;
    }

    public function getGenerator()
    {
        for ($x = 0; $x < $this->total; $x++) {
            yield $this->getRow($x);
        }
    }

    abstract public function targetClass(): string;

    protected function notifyAccess()
    {

    }

    private function getRow($num)
    {
        $this->notifyAccess();

        if ($num >= $this->total || $num < 0) {
            return null;
        }

        if (isset($this->objects[$num])) {
            return $this->objects[$num];
        }

        if (isset($this->raw[$num])) {
            $this->objects[$num] = $this->mapper->createObject($this->raw[$num]);
            return $this->objects[$num];
        }
    }
}