<?php

class WhiteList
{
    private $fields;
    private $orders;

    function __construct()
    {
        $this->fields = [
            "date",
            "score"
        ];

        $this->orders = [
            "desc",
            "asc"
        ];
    }

    function isSafeField($field) {
        return (in_array($field, $this->fields));
    }

    function isSafeOrder($order) {
        return (in_array($order, $this->orders));
    }
}
