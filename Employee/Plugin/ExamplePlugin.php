<?php

namespace Dtn\Employee\Plugin;

class ExamplePlugin
{
    /**
     * @param \Dtn\Employee\Controller\Index\Example $subject
     * @param $title
     * @return string
     */
    public function beforeSetTitle(\Dtn\Employee\Controller\Index\Example $subject, $title)
    {
        $title = $title . " to ";
        return $title;
    }
}