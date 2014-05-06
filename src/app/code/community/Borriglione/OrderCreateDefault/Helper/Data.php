<?php
/**
 * Basic Helper
 * 
 * @category   Borriglione
 * @package    Borriglione_OrderCreateDefault
 * @copyright  Copyright (c) 2014 André Herrn <info@andre-herrn.de>
 * @license    http://opensource.org/licenses/osl-3.0.php  Open Software License (OSL 3.0)
 */
class Borriglione_OrderCreateDefault_Helper_Data extends Mage_Core_Helper_Abstract
{
    /**
     * Get default values
     * 
     * @param int $storeId
     * @return array
     */
    public function getUnserializedDefaultValues($storeId = null, $quoteId = null)
    {
        //Get serialized config values
        $defaultValues = unserialize(
            Mage::getStoreConfig('sales/order_create_default/values', $storeId)
        );

        //Replace quote_id with adminsession quote id
        foreach ($defaultValues as $key => $defaultValue) {
            $defaultValue['value'] = str_replace('{{quote_id}}', $quoteId, $defaultValue['value']);
            $defaultValues[$key] = $defaultValue;
        }

        return $defaultValues;
    }
}