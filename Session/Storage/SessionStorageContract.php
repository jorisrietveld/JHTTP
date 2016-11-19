<?php
/**
 * Author: Joris Rietveld <jorisrietveld@gmail.com>
 * Created: 19-11-2016 00:13
 * Licence: GNU General Public licence version 3 <https://www.gnu.org/licenses/quick-guide-gplv3.html>
 */

namespace JHTTP\Session\Storage;


use JHTTP\Session\SessionContainerContract;

interface SessionStorageContract
{
    /**
     * Starts the session.
     *
     * @return bool True if started
     *
     * @throws \RuntimeException If something goes wrong starting the session.
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
     * Checks if an session has started.
     *
     * @return bool
     */
    public function isStarted();

    /**
     * Regenerates session id that represents this storage
     *
     * @param bool $destroy  Destroy session when regenerating?
     * @param int $lifetime time the browser cookie expires in seconds, null will leave it unchanged from the old session.
     *
     * @return bool True if the session is regenerated, otherwise return false.
     *
     * @throws \RuntimeException If an error occurs while regenerating this storage
     */
    public function regenerate( bool $destroy = false, int $lifetime = null) : bool;

    /**
     * Clear all session data in memory.
     */
    public function clear();

    /**
     * Gets a SessionContainerContract by its name.
     *
     * @param string $name
     * @return SessionContainerContract
     *
     * @throws \InvalidArgumentException If the container does not exist
     */
    public function getContainer( string $name ) : SessionContainerContract;

    /**
     * Registers a SessionContainerContract for use.
     *
     * @param SessionContainerContract $sessionContainer
     */
    public function registerContainer( SessionContainerContract $sessionContainer );

    /**
     * Returns the container with the sessions metadata.
     *
     * @return MetaDataContainer
     */
    public function getMetadataContainer();
}