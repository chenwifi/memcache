
<?php

interface hasher{
    public function _hash($key);
}

interface distribution{
    public function lookup($key);
}
