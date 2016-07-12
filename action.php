<?php
/**
 * DokuWiki Plugin makemedians (Action Component)
 *
 * @license GPL 2 http://www.gnu.org/licenses/gpl-2.0.html
 * @author  Oliver Geisen <oliver@denkdose.de>
 */

// must be run within Dokuwiki
if(!defined('DOKU_INC')) die();

class action_plugin_makemedians extends DokuWiki_Action_Plugin {

    /**
     * Registers a callback function for a given event
     *
     * @param Doku_Event_Handler $controller DokuWiki's event controller object
     * @return void
     */
    public function register(Doku_Event_Handler $controller) {

       $controller->register_hook('IO_WIKIPAGE_WRITE', 'AFTER', $this, 'handle_io_wikipage_write');
   
    }

    /**
     * [Custom event handler which performs action]
     *
     * @param Doku_Event $event  event object by reference
     * @param mixed      $param  [the parameters passed as fifth argument to register_hook() when this
     *                           handler was registered]
     * @return void
     */
    public function handle_io_wikipage_write(Doku_Event &$event, $param) {
        // See https://www.dokuwiki.org/devel:event:io_wikipage_write for more information about this event
        if ($event->data[1]) {
            $id = $event->data[1] . ':' . $event->data[2];
            io_createNamespace($id, 'media');
        }
    }

}

// vim:ts=4:sw=4:et:
