<?php

namespace IMEdge\Inventory;

interface CentralInventory
{
    /**
     * @param InventoryAction[] $actions
     */
    public function shipBulkActions(array $actions): void;

    public function getCredentials(): array;

    public function loadTableSyncPositions(NodeIdentifier $nodeIdentifier): array;
}
