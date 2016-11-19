<?php
/**
 * Author: Joris Rietveld <jorisrietveld@gmail.com>
 * Created: 19-11-2016 00:50
 * Licence: GNU General Public licence version 3 <https://www.gnu.org/licenses/quick-guide-gplv3.html>
 */

namespace JHTTP\Session\Flash;


use JHTTP\Session\SessionContainerInterface;

interface FlashContainerInterface extends SessionContainerInterface
{
    /**
     * Adds a flash message.
     *
     * @param string $type
     * @param string $message
     */
    public function add( string $type, string $message );

    /**
     * Registers a message for a given type.
     *
     * @param string       $type
     * @param string|array $message
     */
    public function set( string $type, $message );

    /**
     * Gets flash messages for a given type without destroying it.
     *
     * @param string $type    Message category type
     * @param array  $default Default value if $type does not exist
     *
     * @return array
     */
    public function peek( string $type, array $default = [] ) : array;

    /**
     * Gets all flash messages.
     *
     * @return array
     */
    public function peekAll() : array;

    /**
     * Gets and removes flash from the stack.
     *
     * @param string $type
     * @param array  $default Default value if $type does not exist
     * @return array
     */
    public function get( string $type, array $default = [] ) : array;

    /**
     * Gets and removes flashes from the stack.
     *
     * @return array
     */
    public function all() : array;

    /**
     * Sets all flash messages.
     *
     * @param array $messages
     */
    public function setAll( array $messages );

    /**
     * Has flash messages for a given type?
     *
     * @param string $type
     *
     * @return bool
     */
    public function has( string $type ) : bool;

    /**
     * Returns a list of all defined types.
     *
     * @return array
     */
    public function keys() : array;
}