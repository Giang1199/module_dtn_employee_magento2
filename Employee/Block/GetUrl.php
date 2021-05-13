<?php

namespace Dtn\Employee\Block;

use Magento\Framework\View\Element\Template;

class GetUrl extends Template
{
    /**
     * GetUrl constructor.
     * @param Template\Context $context
     * @param array $data
     */
    public function __construct(Template\Context $context, array $data = [])
    {
        parent::__construct($context, $data);
    }

    /**
     * @return Url
     */
    public function getFormAction(){

        return "https://magento242.local/dtnemployee/form/save";

    }
}