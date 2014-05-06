<?php
/**
 * Default Values Source Block
 * 
 * @category   Borriglione
 * @package    Borriglione_OrderCreateDefault
 * @copyright  Copyright (c) 2014 André Herrn <info@andre-herrn.de>
 * @license    http://opensource.org/licenses/osl-3.0.php  Open Software License (OSL 3.0)
 */
class Borriglione_OrderCreateDefault_Block_Adminhtml_System_Config_Form_Field_DefaultValues
    extends Mage_Adminhtml_Block_System_Config_Form_Field_Array_Abstract
{
    /**
     * Constructor
     *
     * @return void
     */
    public function __construct()
    {
        $this->addColumn('element_id', array(
            'label' => Mage::helper('borriglione_ordercreatedefault')->__('Element Id'),
            'style' => 'width:250px',
        ));
        
        $this->addColumn('value', array(
            'label' => Mage::helper('borriglione_ordercreatedefault')->__('Value'),
            'style' => 'width:250px',
        ));

        $this->_addAfter = false;
        $this->_addButtonLabel = Mage::helper('borriglione_ordercreatedefault')->__('Add default value');
        parent::__construct();
    }
}