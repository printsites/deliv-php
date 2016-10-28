<?php

namespace Deliv\Resource;

use Deliv\Helper\ResourceMap;

/**
 * Abstract Resource.
 */
abstract class AbstractResource
{

    /**
     * Populate class with matching parameters from stdClass
     * @param \stdClass $data
     */
    public function __construct(\stdClass $data)
    {
        foreach (get_object_vars($data) as $attribute => $value) {
            //
            // We basically recursively parse the responses into resources we know about.
            if (is_object($value)) {
                $resource = (isset(ResourceMap::attributeResourceMap()[$attribute]) ? ResourceMap::attributeResourceMap()[$attribute] : null);
                $this->$attribute = ResourceMap::resourceFactory($value,
                    $resource);
            } elseif (is_array($value)) {
                $resource = (isset(ResourceMap::attributeResourceMap()[$attribute]) ? ResourceMap::attributeResourceMap()[$attribute] : null);
                $list = [];
                foreach ($value as $item) {
                    $list[] = ResourceMap::resourceFactory($item, $resource);
                }
                $this->$attribute = $list;
            } else {
                $this->$attribute = $value;
            }
        }
    }
}
