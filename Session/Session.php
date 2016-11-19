<?php
/**
 * Author: Joris Rietveld <jorisrietveld@gmail.com>
 * Created: 18-11-2016 19:47
 * Licence: GNU General Public licence version 3 <https://www.gnu.org/licenses/quick-guide-gplv3.html>
 */

namespace JHTTP\Session;


use JHTTP\Session\Attribute\AttributeContainer;
use JHTTP\Session\Attribute\AttributeContainerInterface;
use JHTTP\Session\Flash\FlashContainer;
use JHTTP\Session\Flash\FlashContainerInterface;
use JHTTP\Session\Storage\MetaDataContainer;
use JHTTP\Session\Storage\NativeSessionStorage;
use JHTTP\Session\Storage\SessionStorageInterface;
use Traversable;

class Session implements \IteratorAggregate, \Countable, SessionInterface
{

    /**
     * Session storage driver.
     *
     * @var SessionStorageInterface
     */
    protected $storage;

    /**
     * The name of the registered flash container.
     *
     * @var string
     */
    private $flashName;

    /**
     * The name of the registered attributes container.
     *
     * @var string
     */
    private $attributeName;

    /**
     * Initiate an new session instance.
     *
     * @param SessionStorageInterface     $storage    A SessionStorageContract instance
     * @param AttributeContainerInterface $attributes An AttributeContainerContract instance, on default it will create an Attribute\AttributeContainer.
     * @param FlashContainerInterface     $flashes    A FlashContainerContract instance, on default it will create a Flash\FlashContainer)
     */
    public function __construct( SessionStorageInterface $storage = null, AttributeContainerInterface $attributes = null, FlashContainerInterface $flashes = null )
    {
        $this->storage = $storage ?: new NativeSessionStorage();
        $attributes = $attributes ?: new AttributeContainer();

        $this->attributeName = $attributes->getName();
        $this->registerContainer( $attributes );

        $flashes = $flashes ?: new FlashContainer();
        $this->flashName = $flashes->getName();
        $this->registerContainer( $flashes );
    }

    /**
     * Starts the session.
     *
     * @return bool
     */
    public function start() : bool
    {
        // TODO: Implement start() method.
    }

    /**
     * Gets the session ID.
     *
     * @return string
     */
    public function getId() : string
    {
        // TODO: Implement getId() method.
    }

    /**
     * Sets the session ID.
     *
     * @param string $sessionId
     * @return mixed
     */
    public function setId( string $sessionId )
    {
        // TODO: Implement setId() method.
    }

    /**
     * Gets the session name.
     *
     * @return string
     */
    public function getName() : string
    {
        // TODO: Implement getName() method.
    }

    /**
     * Sets the session name.
     *
     * @param string $sessionName
     */
    public function setName( string $sessionName )
    {
        // TODO: Implement setName() method.
    }

    /**
     * Invalidate the session, Clear all parameters stored in it and regenerate its id.
     *
     * @param null $lifeTime time the browser cookie expires in seconds, null will leave it unchanged.
     * @return mixed
     */
    public function invalidate( int $lifeTime = null ) : bool
    {
        // TODO: Implement invalidate() method.
    }

    /**
     * Migrates the current session with its parameters to an new one with an new ID.
     *
     * @param bool $destroy  Destroy the old session or leave it to garbage collection.
     * @param null $lifeTime time the browser cookie expires in seconds, null will leave it
     *                       unchanged from the old session.
     * @return bool
     */
    public function migrate( bool $destroy = false, int $lifeTime = null ) : bool
    {
        // TODO: Implement migrate() method.
    }

    /**
     * Checks if an attribute is defined.
     *
     * @param string $name The attribute name
     * @return bool true if defined otherwise return false.
     */
    public function has( string $attributeName ) : bool
    {
        // TODO: Implement has() method.
    }

    /**
     * Returns an attribute if it exists otherwise it returns the value given in the $default argument.
     *
     * @param string $name    The attribute name
     * @param mixed  $default The default value if not found
     *
     * @return mixed
     */
    public function get( string $attributeName, $default = null )
    {
        // TODO: Implement get() method.
    }

    /**
     * Sets an session attribute.
     *
     * @param string $name
     * @param mixed  $value
     */
    public function set( string $attributeName, $value )
    {
        // TODO: Implement set() method.
    }

    /**
     * Returns all the sessions attributes.
     *
     * @return array Attributes
     */
    public function all()
    {
        // TODO: Implement all() method.
    }

    /**
     * Sets new attributes to the session removing the old ones.
     *
     * @param array $attributes Attributes
     */
    public function replace( array $attributes )
    {
        // TODO: Implement replace() method.
    }

    /**
     * Removes an attribute from the session.
     *
     * @param string $name
     *
     * @return mixed The removed value or null when it does not exist
     */
    public function remove( string $name )
    {
        // TODO: Implement remove() method.
    }

    /**
     * Clears all sessions attributes.
     */
    public function clear()
    {
        // TODO: Implement clear() method.
    }

    /**
     * Checks if an session has started.
     *
     * @return bool
     */
    public function isStarted() : bool
    {
        // TODO: Implement isStarted() method.
    }

    /**
     * Registers a Session container for storage in the session.
     *
     * @param $sessionContainer $sessionStorageContainer
     */
    public function registerContainer( SessionContainerInterface $sessionContainer )
    {
        // TODO: Implement registerContainer() method.
    }

    /**
     * Gets a session container instance by name.
     *
     * @param string $name
     *
     * @return SessionContainerInterface
     */
    public function getContainer( string $name ) : SessionContainerInterface
    {
        // TODO: Implement getBag() method.
    }

    /**
     * Gets session metadata.
     *
     * @return MetaDataContainer
     */
    public function getMetadataContainer() : MetaDataContainer
    {
        // TODO: Implement getMetadataBag() method.
    }

    /**
     * Gets the flashbag interface.
     *
     * @return FlashContainerInterface
     */
    public function getFlashContainer()
    {
        return $this->getContainer( $this->flashName );
    }

    /**
     * Get an array iterator so you can iterate through the items stored in the parameter property.
     *
     * @return \ArrayIterator
     */
    public function getIterator()
    {
        return new \ArrayIterator( $this->storage->getContainer( $this->attributeName )->all());
    }

    /**
     * Count
     */
    public function count()
    {
        return count( $this->storage->getContainer( $this->attributeName )->all()) ;
    }
}