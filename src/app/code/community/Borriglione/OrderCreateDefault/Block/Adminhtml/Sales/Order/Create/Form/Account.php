<?php
class Borriglione_OrderCreateDefault_Block_Adminhtml_Sales_Order_Create_Form_Account
    extends Mage_Adminhtml_Block_Sales_Order_Create_Form_Account
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
        $data = parent::getFormValues();

        //Set default values if original value is null
        foreach (Mage::helper('borriglione_ordercreatedefault/data')
            ->getUnserializedDefaultValues($this->getStore(), $this->getQuote()->getId()) as $defaultValue) {
            if (true === array_key_exists($defaultValue['element_id'], $data)
                && '' == $data[$defaultValue['element_id']]) {
                $data[$defaultValue['element_id']] = $defaultValue['value'];
            }
        }

        return $data;
    }
}