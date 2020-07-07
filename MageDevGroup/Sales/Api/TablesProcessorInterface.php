<?php
namespace MageDevGroup\Sales\Api;

interface TablesProcessorInterface
{
    /**
     * Creating table
     *
     * @param string $tableName
     * @param array $options
     */
    public function createTable(string $tableName, array $options = []): void ;
}
