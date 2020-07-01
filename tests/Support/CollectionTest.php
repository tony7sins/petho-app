<?php
namespace Tests;

use App\Support\Collection;
use PHPUnit\Framework\TestCase;

class CollectionTest extends TestCase
{
    /** @test */
    public function empty_instantiated_collection_returns_nothing()
    {
        $collection = new Collection();

        $this->assertEmpty($collection->get());
    }

    /** @test */
    public function count_is_correct_for_items_that_parresed_in()
    {
        $collection = new Collection([
            'one', 'two', 'three',
        ]);

        $this->assertEquals(3, $collection->count());
    }

    /** @test */
    public function items_returnes_match_items_passed_in()
    {
        $collection = new Collection([
            'one', 'two', 'three',
        ]);

        $this->assertCount(3, $collection->get());
        $this->assertEquals($collection->get()[0], 'one');
        $this->assertEquals($collection->get()[1], 'two');
    }

    /** @test */
    public function collection_is_instance_of_iterator_aggrigate()
    {
        $collection = new Collection();

        $this->assertInstanceOf(\IteratorAggregate::class, $collection);
    }

    /** @test */
    public function collection_can_be_iterated_with_ArrayInterator()
    {
        $collection = new Collection([
            'one', 'two', 'three',
        ]);

        $items = [];

        foreach ($collection as $item) {
            $items[] = $item;
        }

        $this->assertCount(3, $items);
        $this->assertInstanceOf(ArrayIterator::class, $collection->getIterator());
    }

    /** @test */
    public function collection_can_be_merged_with_another_collection()
    {
        $collectionOne = new Collection(['one', 'two']);
        $collectionTwo = new Collection(['three', 'four', 'five']);

        $collectionOne->merge($collectionTwo);

        $this->assertCount(5, $collectionOne->get());
        $this->assertEquals(5, $collectionOne->count());
    }

    /** @test */
    public function can_add_to_existing_collection()
    {
        $collection = new Collection(['one', 'two']);
        $collection->add(['three', 'four', 'five']);

        $this->assertEquals(5, $collection->count());

    }

    /** @test */
    public function can_can_be_cloned()
    {
        $collection = new Collection(['one', 'two']);
        $collectionClone = $collection->cloneIt();

        $this->assertEquals($collection->count(), $collectionClone->count());
        $this->assertEquals($collection->get()[0], $collectionClone->get()[0]);

        $this->assertEqualsCanonicalizing($collection, $collectionClone);

        $collection->add(['three', 'four']);

        $collectionClone2 = $collection->cloneWith($collectionClone);

        $this->assertEquals(6, $collectionClone2->count());
        $this->assertEquals('two', $collectionClone2->get()[5]);
    }

    /** @test */
    public function can_get_item_by_key_or_get_null()
    {
        $collection = new Collection(['one', 'two']);

        $this->assertEquals('one', $collection->getItem(0));
        $this->assertEquals(null, $collection->getItem(5));
    }

    /** @test */
    public function returns_json_encoded_items()
    {
        $collection = new Collection([
            ['username' => 'jason'],
            ['username' => 'jim'],
        ]);

        $this->assertEquals('[{"username":"jason"},{"username":"jim"}]', $collection->toJson());
        $this->assertInternalType('string', $collection->toJson());
        $this->assertCount(3, $collection->addFromJson('[{"username":"july"}]')->get());
        $this->assertCount(3, $collection->get());
    }

    /** @test */
    public function json_encoding_a_collection_object_return_json()
    {
        $collection = new Collection([
            ['username' => 'jason'],
            ['username' => 'jim'],
        ]);

        $encoded = json_encode($collection);

        $this->assertInternalType('string', $encoded);
        $this->assertEquals('[{"username":"jason"},{"username":"jim"}]', $encoded);

    }
}
