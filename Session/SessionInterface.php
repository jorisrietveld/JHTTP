<?php
/**
 * Author: Joris Rietveld <jorisrietveld@gmail.com>
 * Created: 18-11-2016 20:08
 * Licence: GNU General Public licence version 3 <https://www.gnu.org/licenses/quick-guide-gplv3.html>
 */

namespace JHTTP\Session;


use JHTTP\Session\Storage\MetaDataContainer;

/**
 * Interface SessionContract.
 *
 * @package JHTTP\Session
 */
interface SessionInterface
{
    /**
     * Starts the session.
     *
     * @return bool
     */
    public function start() : bool;

    /**
     * Gets the session ID.
     *
     * @return string
     */
    public function getId() : string;

    /**
     * Sets the session ID.
     *
     * @param string $sessionId
     * @return mixed
     */
    public function setId( string $sessionId );

    /**
     * Gets the session name.
     *
     * @return string
     */
    public function getName() : string;

    /**
     * Sets the session name.
     *
     * @param string $sessionName
     */
    public function setName( string $sessionName );

    /**
     * Invalidate the session, Clear all parameters stored in it and regenerate its id.
     *
     * @param null $lifeTime time the browser cookie expires in seconds, null will leave it unchanged.
     * @return mixed
     */
    public function invalidate( int $lifeTime = NULL ) : bool;

    /**
     * Migrates the current session with its parameters to an new one with an new ID.
     *
     * @param bool $destroy Destroy the old session or leave it to garbage collection.
     * @param null $lifeTime time the browser cookie expires in seconds, null will leave it
     *                       unchanged from the old session.
     * @return bool
     */
    public function migrate( bool $destroy = FALSE, int $lifeTime = NULL ) : bool;

    /**
     * Checks if an attribute is defined.
     *
     * @param string $name The attribute name
     * @return bool true if defined otherwise return false.
     */
    public function has( string $attributeName ) : bool;

    /**
     * Returns an attribute if it exists otherwise it returns the value given in the $default argument.
     *
     * @param string $name    The attribute name
     * @param mixed  $default The default value if not found
     *
     * @return mixed
     */
    public function get( string $attributeName, $default = null);

    /**
     * Sets an session attribute.
     *
     * @param string $name
     * @param mixed  $value
     */
    public function set( string $attributeName, $value );

    /**
     * Returns all the sessions attributes.
     *
     * @return array Attributes
     */
    public function all();

    /**
     * Sets new attributes to the session removing the old ones.
     *
     * @param array $attributes Attributes
     */
    public function replace( array $attributes );

    /**
     * Removes an attribute from the session.
     *
     * @param string $name
     *
     * @return mixed The removed value or null when it does not exist
     */
    public function remove( string $name );

    /**
     * Clears all sessions attributes.
     */
    public function clear();

    /**
     * Checks if an session has started.
     *
     * @return bool
     */
    public function isStarted() : bool;

    /**
     * Registers a Session container for storage in the session.
     *
     * @param $sessionContainer $sessionStorageContainer
     */
    public function registerContainer( SessionContainerInterface $sessionContainer );

    /**
     * Gets a session container instance by name.
     *
     * @param string $name
     *
     * @return SessionContainerInterface
     */
    public function getContainer( string $name ) : SessionContainerInterface;

    /**
     * Gets session metadata.
     *
     * @return MetaDataContainer
     */
    public function getMetadataContainer() : MetaDataContainer;
}