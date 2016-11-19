<?php
/**
 * Author: Joris Rietveld <jorisrietveld@gmail.com>
 * Created: 19-11-2016 01:13
 * Licence: GNU General Public licence version 3 <https://www.gnu.org/licenses/quick-guide-gplv3.html>
 */

namespace JHTTP\Session\Flash;


class FlashContainer implements FlashContainerContract
{
    /**
     * Adds a flash message.
     *
     * @param string $type
     * @param string $message
     */
    public function add( string $type, string $message )
    {
        // TODO: Implement add() method.
    }

    /**
     * Registers a message for a given type.
     *
     * @param string       $type
     * @param string|array $message
     */
    public function set( string $type, $message )
    {
        // TODO: Implement set() method.
    }

    /**
     * Gets flash messages for a given type without destroying it.
     *
     * @param string $type    Message category type
     * @param array  $default Default value if $type does not exist
     *
     * @return array
     */
    public function peek( string $type, array $default = [] ) : array
    {
        // TODO: Implement peek() method.
    }

    /**
     * Gets all flash messages.
     *
     * @return array
     */
    public function peekAll() : array
    {
        // TODO: Implement peekAll() method.
    }

    /**
     * Gets and removes flash from the stack.
     *
     * @param string $type
     * @param array  $default Default value if $type does not exist
     * @return array
     */
    public function get( string $type, array $default = [] ) : array
    {
        // TODO: Implement get() method.
    }

    /**
     * Gets and removes flashes from the stack.
     *
     * @return array
     */
    public function all() : array
    {
        // TODO: Implement all() method.
    }

    /**
     * Sets all flash messages.
     *
     * @param array $messages
     */
    public function setAll( array $messages )
    {
        // TODO: Implement setAll() method.
    }

    /**
     * Has flash messages for a given type?
     *
     * @param string $type
     *
     * @return bool
     */
    public function has( string $type ) : bool
    {
        // TODO: Implement has() method.
    }

    /**
     * Returns a list of all defined types.
     *
     * @return array
     */
    public function keys() : array
    {
        // TODO: Implement keys() method.
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