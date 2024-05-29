<?php

class ArrayAndObjectAccess implements ArrayAccess
{
    /**
     * Data.
     *
     * @var array
     */
    private $data = [];

    /**
     * Get a data by key.
     *
     * @param string The key data to retrieve
     */
    public function &__get($key)
    {
        return $this->data[$key];
    }

    /**
     * Assigns a value to the specified data.
     *
     * @param string The data key to assign the value to
     * @param mixed  The value to set
     */
    public function __set($key, $value)
    {
        $this->data[$key] = $value;
    }

    /**
     * Whether or not an data exists by key.
     *
     * @param string An data key to check for
     *
     * @return bool
     * @abstracting ArrayAccess
     */
    public function __isset($key)
    {
        return isset($this->data[$key]);
    }

    /**
     * Unsets an data by key.
     *
     * @param string The key to unset
     */
    public function __unset($key)
    {
        unset($this->data[$key]);
    }

    /**
     * Assigns a value to the specified offset.
     *
     * @param string The offset to assign the value to
     * @param mixed  The value to set
     * @abstracting ArrayAccess
     */
    public function offsetSet($offset, $value)
    {
        if (is_null($offset)) {
            $this->data[] = $value;
        } else {
            $this->data[$offset] = $value;
        }
    }

    /**
     * Whether or not an offset exists.
     *
     * @param string An offset to check for
     *
     * @return bool
     * @abstracting ArrayAccess
     */
    public function offsetExists($offset)
    {
        return isset($this->data[$offset]);
    }

    /**
     * Unsets an offset.
     *
     * @param string The offset to unset
     * @abstracting ArrayAccess
     */
    public function offsetUnset($offset)
    {
        if ($this->offsetExists($offset)) {
            unset($this->data[$offset]);
        }
    }

    /**
     * Returns the value at specified offset.
     *
     * @param string The offset to retrieve
     *
     * @return mixed
     * @abstracting ArrayAccess
     */
    public function offsetGet($offset)
    {
        return $this->offsetExists($offset) ? $this->data[$offset] : null;
    }
}

$foo = new ArrayAndObjectAccess();
// Set data as array and object
$foo->fname = 'Yousef';
$foo->lname = 'Ismaeil';
// Call as object
echo 'fname as object '.$foo->fname."\n";
// Call as array
echo 'lname as array '.$foo['lname']."\n";
// Reset as array
$foo['fname'] = 'Cliprz';
echo $foo['fname']."\n";
