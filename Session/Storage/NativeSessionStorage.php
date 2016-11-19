<?php
/**
 * Author: Joris Rietveld <jorisrietveld@gmail.com>
 * Created: 19-11-2016 01:01
 * Licence: GNU General Public licence version 3 <https://www.gnu.org/licenses/quick-guide-gplv3.html>
 */

namespace JHTTP\Session\Storage;


use JHTTP\Session\SessionContainerInterface;
use JHTTP\Session\Storage\Handler\SessionHandlerInterface;

class NativeSessionStorage implements SessionStorageInterface
{
    protected $containers;
    protected $started;
    protected $closed;
    //protected $saveHandler;
    protected $metaDataContainer;


    /**
     * Initiate an new NativeSessionStorage instance.
     *
     * @see http://php.net/session.configuration for options.
     * List of options for $options array with their defaults.
     *
     * session.cache_limiter, "" (use "0" to prevent headers from being sent entirely).
     * session.cookie_domain, ""
     * session.cookie_httponly, ""
     * session.cookie_lifetime, "0"
     * session.cookie_path, "/"
     * session.cookie_secure, ""
     * session.entropy_file, ""
     * session.entropy_length, "0"
     * session.gc_divisor, "100"
     * session.gc_maxlifetime, "1440"
     * session.gc_probability, "1"
     * session.hash_bits_per_character, "4"
     * session.hash_function, "0"
     * session.name, "PHPSESSID"
     * session.referer_check, ""
     * session.serialize_handler, "php"
     * session.use_cookies, "1"
     * session.use_only_cookies, "1"
     * session.use_trans_sid, "0"
     * session.upload_progress.enabled, "1"
     * session.upload_progress.cleanup, "1"
     * session.upload_progress.prefix, "upload_progress_"
     * session.upload_progress.name, "PHP_SESSION_UPLOAD_PROGRESS"
     * session.upload_progress.freq, "1%"
     * session.upload_progress.min-freq, "1"
     * session.url_rewriter.tags, "a=href,area=href,frame=src,form=,fieldset="
     *
     * @param array                   $options           Session configuration options
     * @param SessionHandlerInterface $handler
     * @param MetaDataContainer       $metaDataContainer The Metadata container.
     */
    public function __construct( array $options = [], $handler = NULL, MetaDataContainer $metaDataContainer = NULL )
    {
        // Disable the session cache because it is managed by the HeaderBag.
        session_cache_limiter( '' );
        // Enable cookies.
        ini_set( 'session.use_cookies', 1 );

        // Shutdown the session.
        session_register_shutdown();

        $this->setMetadataContainer( $metaDataContainer );
        $this->setOptions( $options );
        $this->setSaveHandler( $handler );
    }

    /**
     * Sets the session ini values.
     *
     * @param array $options
     */
    public function setOptions( array $options )
    {
        $validOptions = [
            'session.cache_limiter',
            'session.cookie_domain',
            'session.cookie_httponly',
            'session.cookie_lifetime',
            'session.cookie_path',
            'session.cookie_secure',
            'session.entropy_file',
            'session.entropy_length',
            'session.gc_divisor',
            'session.gc_maxlifetime',
            'session.gc_probability',
            'session.hash_bits_per_character',
            'session.hash_function',
            'session.name',
            'session.referer_check',
            'session.serialize_handler',
            'session.use_cookies',
            'session.use_only_cookies',
            'session.use_trans_sid',
            'session.upload_progress.enabled',
            'session.upload_progress.cleanup',
            'session.upload_progress.prefix',
            'session.upload_progress.name',
            'session.upload_progress.freq',
            'session.upload_progress.min-freq',
            'session.url_rewriter.tags',
        ];

        foreach ($options as $key => $value)
        {
            if ( in_array( $key, $validOptions, false ) )
            {
                ini_set( $key, $value );
            }
        }
    }

    public function setSaveHandler( $saveHandler = NULL )
    {
        if ( !$saveHandler instanceof NativeSessionStorage && !$saveHandler instanceof \SessionHandlerInterface && null !== $saveHandler )
        {
            throw new \InvalidArgumentException( 'Must be instance of NativeSessionHandler or implement \SessionHandlerInterface or be null.' );
        }

        // Wrap $saveHandler in proxy and prevent double wrapping of proxy
        if ( !$saveHandler instanceof AbstractProxy && $saveHandler instanceof \SessionHandlerInterface )
        {
            $saveHandler = new SessionHandlerProxy( $saveHandler );
        }
        elseif ( !$saveHandler instanceof AbstractProxy )
        {
            $saveHandler = new SessionHandlerProxy( new \SessionHandler() );
        }
        $this->saveHandler = $saveHandler;

        if ( $this->saveHandler instanceof \SessionHandlerInterface )
        {
            session_set_save_handler( $this->saveHandler, false );
        }
    }

    /**
     * Starts the session.
     *
     * @return bool True if started
     *
     * @throws \RuntimeException If something goes wrong starting the session.
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
     * Checks if an session has started.
     *
     * @return bool
     */
    public function isStarted()
    {
        // TODO: Implement isStarted() method.
    }

    /**
     * Regenerates session id that represents this storage
     *
     * @param bool $destroy  Destroy session when regenerating?
     * @param int  $lifetime time the browser cookie expires in seconds, null will leave it unchanged from the old session.
     *
     * @return bool True if the session is regenerated, otherwise return false.
     *
     * @throws \RuntimeException If an error occurs while regenerating this storage
     */
    public function regenerate( bool $destroy = false, int $lifetime = null ) : bool
    {
        // TODO: Implement regenerate() method.
    }

    /**
     * Clear all session data in memory.
     */
    public function clear()
    {
        // TODO: Implement clear() method.
    }

    /**
     * Gets a SessionContainerContract by its name.
     *
     * @param string $name
     * @return SessionContainerInterface
     *
     * @throws \InvalidArgumentException If the container does not exist
     */
    public function getContainer( string $name ) : SessionContainerInterface
    {
        // TODO: Implement getContainer() method.
    }

    /**
     * Registers a SessionContainerContract for use.
     *
     * @param SessionContainerInterface $sessionContainer
     */
    public function registerContainer( SessionContainerInterface $sessionContainer )
    {
        // TODO: Implement registerContainer() method.
    }

    /**
     * Returns the container with the sessions metadata.
     *
     * @return MetaDataContainer
     */
    public function getMetadataContainer()
    {
        // TODO: Implement getMetadataContainer() method.
    }

    /**
     * Sets the MetadataBag.
     *
     * @param MetaDataContainer $metaDataContainer
     */
    public function setMetadataContainer( MetaDataContainer $metaDataContainer = null )
    {
        if ( null === $metaDataContainer )
        {
            $metaDataContainer = new MetaDataContainer();
        }

        $this->metadataBag = $metaDataContainer;
    }

}