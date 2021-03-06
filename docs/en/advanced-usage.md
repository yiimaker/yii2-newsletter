Advanced usage
==============

Services
--------
This is configuration property of frontend and backend modules
used for work with data layer in controller.

You can use default database service `ymaker\newsletter\common\services\DbService`
or implement another service, for this you should implement a `ymaker\newsletter\common\services\ServiceInterface`
basic interface.

##### Configuration options of default service
`db` - database connection configuration.

`mode` - mode for validation of data from newsletter form. This service provides two modes:

* Generic it is the mode that has only a string validator.
* E-mail has string and email validators.

Events
------
Default database service has `after subscribe` event. If data is successfully saved in database,
event object will contain data from newsletter form in `contacts` property.
You can use it in your code `ymaker\newsletter\common\events\SubscribeEvent`.

Subscribe action
----------------
You can use `ymaker\newsletter\frontend\actions\SubscribeAction` in your controllers instead of
default frontend module.