<?php
namespace App\Helpers;

use Iterator;

class ChunkIterator
{
    public function __construct(protected Iterator $iterator, protected int $chunks)
    {
    }

    public function get()
    {
        $chunks = [];

        for ($i = 0; $this->iterator->valid() ; $i++) {
            $chunks[] = $this->iterator->current();

            $this->iterator->next();

            if (count($chunks) == $this->chunks) {
                yield $chunks;
                $chunks = [];
            }
        }

        if (count($chunks)) {
            yield $chunks;
        }
    }
}
