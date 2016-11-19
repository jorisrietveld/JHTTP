<?php
/**
 * Author: Joris Rietveld <jorisrietveld@gmail.com>
 * Created: 19-11-2016 00:45
 * Licence: GNU General Public licence version 3 <https://www.gnu.org/licenses/quick-guide-gplv3.html>
 */

namespace JHTTP\Session\Attribute;


use Traversable;

class AttributeContainer implements \IteratorAggregate, \Countable, AttributeContainerInterface
{
    /**
     * Checks if an attribute is defined.
     *
     * @param string $name The attribute name
     * @return bool true if the attribute is defined, false otherwise
     */
    public function has( string $name ) : bool
    {
        // TODO: Implement has() method.
    }

    /**
     * Returns an attribute.
     *
     * @param string $name    The attribute name
     * @param mixed  $default The default value if not found
     * @return mixed
     */
    public function get( string $name, $default = null )
    {
        // TODO: Implement get() method.
    }

    /**
     * Sets an attribute.
     *
     * @param string $name
     * @param mixed  $value
     */
    public function set( string $name, $value )
    {
        // TODO: Implement set() method.
    }

    /**
     * Returns all the attributes.
     *
     * @return array Attributes
     */
    public function all() : array
    {
        // TODO: Implement all() method.
    }

    /**
     * Replaces the current attributes with new ones.
     *
     * @param array $attributes Attributes
     */
    public function replace( array $attributes )
    {
        // TODO: Implement replace() method.
    }

    /**
     * Removes an attribute.
     *
     * @param string $name
     * @return mixed The removed value or null when it does not exist
     */
    public function remove( string $name )
    {
        // TODO: Implement remove() method.
    }

    /**
     * Retrieve an external iterator
     *
     * @link  http://php.net/manual/en/iteratoraggregate.getiterator.php
     * @return Traversable An instance of an object implementing <b>Iterator</b> or
     *        <b>Traversable</b>
     * @since 5.0.0
     */
    public function getIterator()
    {
        // TODO: Implement getIterator() method.
    }

    /**
     * Count elements of an object
     *
     * @link  http://php.net/manual/en/countable.count.php
     * @return int The custom count as an integer.
     *        </p>
     *        <p>
     *        The return value is cast to an integer.
     * @since 5.1.0
     */
    public function count()
    {
        // TODO: Implement count() method.
    }

    /**
     * Get the name of the container.
     *
     * @return string
     */
    public function getName() : string
    {
        // TODO: Implement getName() method.
    }

    /**
     * Initialize the container.
     *
     * @param array $array
     * @return mixed
     */
    public function initialize( array &$array )
    {
        // TODO: Implement initialize() method.
    }

    /**
     * Get the storage key from the container.
     *
     * @return string
     */
    public function getStorageKey() : string
    {
        // TODO: Implement getStorageKey() method.
    }

    /**
     * Clear all data from the container.
     *
     * @return mixed
     */
    public function clear()
    {
        // TODO: Implement clear() method.
    }

}