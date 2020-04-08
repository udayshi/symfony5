 php bin/console debug:event-dispatcher
 php bin/console debug:event-dispatcher kernel.exception



services:
    App\Events\CustomKernel:
        arguments: ['@doctrine.orm.entity_manager']
        tags:
            - { name: kernel.event_listener, event: kernel.terminate }
            - { name: kernel.event_listener, event: kernel.request }
            - { name: kernel.event_listener, event: kernel.controller }