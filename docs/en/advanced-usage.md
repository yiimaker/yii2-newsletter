Advanced usage
==============

Services
--------
This is configuration property of frontend and backend modules
uses for work with data layer in controller.

You can use default database service `ymaker\newsletter\common\services\DbService`
or implement another service, for this you should to implement a `ymaker\newsletter\common\services\ServiceInterface`
basic interface.

##### Configuration options of default service
`db` - database connection configuration.

`mode` - mode for validation of data from newsletter form. This service provider two modes:

* Generic it's mode has only string validator.
* E-mail has string and email validators.

Events
------
Default database service has `after subscribe` event. If data will be successfully saved in database - 
event object will be contain data from newsletter form in `contacts` property.
You can use it in your code `ymaker\newsletter\common\events\SubscribeEvent`.

Subscribe action
----------------
You can use `ymaker\newsletter\frontend\actions\SubscribeAction` in your controllers instead
default frontend module.