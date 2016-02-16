## download lumen 
    run the command "composer update"

## configurate .env
    run the command "cp .env.example .env"
    and configurate your database
    
## create the tables in database
    run the command "php artisan migrate"
    
## create data faker with seeds
    run the command "php artisan db:seed"
    
## download the dependency js and css
    run the command "bower install"

## compile the files .css,less and js
    run the command "gulp --production"

## test the application
    run the command "php artisan serve"
    
### was add the layers service and validators in the app

* Controller: makes the intermediation of the view with Entitie
    * Service: is responsible by the business rule, comunication with Entitie
    * Validator: is responsible by rules of the fields in the Entitie
    * Entitie: is responsible by manipulation and persists of the data
* View: render the response of the Controller
* Route: makes the intermediation from request(view) and response(controller)


## in home page 
    have the list of the contact filter by letter, start with 'A'
    
### The application have three CRUD basic
* Register of the contact(person)
* Register of the person phone(phone)
* Register of the person email(email)

### thank you very much 'code.education' for more this knowledge acquired 

