<?php

namespace App\Support;

use \ArrayIterator as Iterator;

class Collection implements \IteratorAggregate, \JsonSerializable
{
    private $items = [];

    public function __construct(array $items = [])
    {
        $this->items = $items;
    }

    public function getIterator(): \Iterator
    {
        return new Iterator($this->items);
    }

    public function jsonSerialize(): array
    {
        return $this->get();
    }

    public function count(): int
    {
        return count($this->items);
    }

    public function get(): array
    {
        return $this->items;
    }

    public function merge(Collection $collection): Collection
    {
        return $this->add($collection->get());
    }

    public function add(array $items): Collection
    {
        $this->items = array_merge($this->get(), $items);

        return $this;
    }

    public function toJson(): string
    {
        return json_encode($this->items);
    }

    public function addFromJson(string $jsonString = ''): Collection
    {
        $this->add(json_decode($jsonString));

        return $this;
    }

    /**
     * @return mixed|null
     */
    public function getItem(int $key)
    {
        return isset($this->items[$key]) ? $this->items[$key] : null;
    }

    public function cloneIt(?array $array = []): Collection
    {
        return new Collection(array_merge($this->get(), $array));
    }

    public function cloneWith(Collection $collection): Collection
    {
        return new Collection(array_merge($this->get(), $collection->get()));
    }
}