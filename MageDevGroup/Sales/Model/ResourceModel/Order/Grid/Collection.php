<?php

namespace MageDevGroup\Sales\Model\ResourceModel\Order\Grid;

use Magento\Framework\DB\Sql\Expression;

/**
 * Order grid collection
 */
class Collection extends \Magento\Sales\Model\ResourceModel\Order\Grid\Collection
{
    /**
     * @return void
     */
    protected function _renderFiltersBefore()
    {
        $select = $this->getSelect();
        $select->join(
            ['tl' => 'sales_order_item'],
            'tl.order_id=main_table.entity_id AND tl.product_type="simple"',
            [
                'order_id',
                'product_name_and_sku' => new \Magento\Framework\DB\Sql\Expression('GROUP_CONCAT(DISTINCT sku, " / ", name)')
            ]
        );
        $select->group('order_id');
        return parent::_renderFiltersBefore();
    }
}
