<?php

namespace Dtn\Employee\Controller\Index;

class Example extends \Magento\Framework\App\Action\Action
{

    protected $title;

    /**
     * @return \Magento\Framework\App\ResponseInterface|\Magento\Framework\Controller\ResultInterface|void
     */
    public function execute()
    {
        echo $this->setTitle('Welcome Giang');
        echo $this->getTitle();
    }

    /**
     * @param $title
     * @return mixed
     */
    public function setTitle($title)
    {
        return $this->title = $title;
    }

    /**
     * @return mixed
     */
    public function getTitle()
    {
        return $this->title;
    }
}
