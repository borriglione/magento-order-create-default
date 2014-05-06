<?php
class Borriglione_OrderCreateDefault_Block_Adminhtml_Sales_Order_Create_Shipping_Address
    extends Mage_Adminhtml_Block_Sales_Order_Create_Shipping_Address
{
    /**
     * Return Form Elements values
     *
     * Modification: Add default values from config
     *
     * @return array
     */
    public function getFormValues()
    {
        $values = $this->getCreateOrderModel()->getBillingAddress()->getData();

        //Set default values if original value is null
        foreach (Mage::helper('borriglione_ordercreatedefault/data')
            ->getUnserializedDefaultValues($this->getStore(), $this->getQuote()->getId()) as $defaultValue) {
            if (true === array_key_exists($defaultValue['element_id'], $values)
                && '' == $values[$defaultValue['element_id']]) {
                $values[$defaultValue['element_id']] = $defaultValue['value'];
            }
        }

        return $values;
    }
}