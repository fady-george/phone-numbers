<?php

class Filter
{
    public function filterBy($parameters, $data)
    {
        foreach ($parameters as $key => $parameter) {
            if ($parameter) {
                $data = array_filter($data, function ($data) use ($key, $parameter) {
                    return $data[$key] == $parameter;
                }, ARRAY_FILTER_USE_BOTH);
            }
        }
        return $data;
    }
}
