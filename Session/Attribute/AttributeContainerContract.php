<?php
/**
 * Author: Joris Rietveld <jorisrietveld@gmail.com>
 * Created: 19-11-2016 00:45
 * Licence: GNU General Public licence version 3 <https://www.gnu.org/licenses/quick-guide-gplv3.html>
 */

namespace JHTTP\Session\Attribute;


use JHTTP\Session\SessionContainerContract;

interface AttributeContainerContract extends SessionContainerContract
{
    /**
     * Checks if an attribute is defined.
     *
     * @param string $name The attribute name
     * @return bool true if the attribute is defined, false otherwise
     */
    public function has( string $name ) : bool;

    /**
     * Returns an attribute.
     *
     * @param string $name    The attribute name
     * @param mixed  $default The default value if not found
     * @return mixed
     */
    public function get( string $name, $default = null );

    /**
     * Sets an attribute.
     *
     * @param string $name
     * @param mixed  $value
     */
    public function set( string $name, $value );

    /**
     * Returns all the attributes.
     *
     * @return array Attributes
     */
    public function all() : array;

    /**
     * Replaces the current attributes with new ones.
     *
     * @param array $attributes Attributes
     */
    public function replace( array $attributes );

    /**
     * Removes an attribute.
     *
     * @param string $name
     * @return mixed The removed value or null when it does not exist
     */
    public function remove( string $name );
}