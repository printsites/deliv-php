<?php

namespace Deliv\Helper;

class Misc
{
    /**
     * PHPs ISO8601 Date formatting isn't what deliv wants even though it also wants ISO8601.
     * @param $time
     * @return false|string
     */
    public static function formatTimestamp($time) {
      return gmdate('Y-m-d\TG:i:s\Z', $time);
    }
}
