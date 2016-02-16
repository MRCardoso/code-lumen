config the environment
    
### run the command "bower install"
    to download the dependency js and css

### run the command "gulp --production"
    to compile the files .css,less and js

## was add the layers service and validators in the app

* Controller: makes the intermediation of the view with Entitie
    * Service: is responsible by the business rule, comunication with Entitie
    * Validator: is responsible by rules of the fields in the Entitie
    * Entitie: is responsible by manipulation and persists of the data
* View: render the response of the Controller
* Route: makes the intermediation from request(view) and response(controller)
