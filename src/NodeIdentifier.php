<?php

namespace IMEdge\Inventory;

use gipfl\Json\JsonSerialization;
use Ramsey\Uuid\Uuid;
use Ramsey\Uuid\UuidInterface;

class NodeIdentifier implements JsonSerialization
{
    public function __construct(
        public readonly UuidInterface $uuid,
        public readonly string $name,
        public readonly string $fqdn,
    ) {
    }

    public static function fromSerialization($any): NodeIdentifier
    {
        if (! is_object($any)) {
            throw new \RuntimeException('Cannot unserialize NodeIdentifier: ' . get_debug_type($any));
        }

        return new NodeIdentifier(Uuid::fromString($any->uuid), $any->name, $any->fqdn);
    }

    public function jsonSerialize(): object
    {
        return (object) [
            'uuid' => $this->uuid,
            'name' => $this->name,
            'fqdn' => $this->fqdn,
        ];
    }
}
