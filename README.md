# Assignment In Slim 4 with MySQL

## How to setup

### Installation
1. Update database credentials located at config/env.php
2. Run `composer install`
3. Run migrations using `./phinx migrate`
4. Run Seeders using `./phinx seed:run`
5. Run `composer start` it will run using http://localhost:8080

### User's APIs
1. Fetching users use this end point GET `http://localhost:8080/api/users`


2. ####Save new user
    
    Endpoint: 


   `http://localhost:8080/api/users`

   Method: POST

   Params | format | required
         --- | --- | ---
   first_name | number | Yes
   last_name | string | Yes
   email | string | Yes


3. ####Update user

   Endpoint: 


   `http://localhost:8080/api/users/{id}`

   Method: PUT

   body: 

   Params | format | required
      --- | --- | ---
   first_name | number | Yes
   last_name | string | Yes
   email | string | Yes

5. ####GET Single User by ID
   Endpoint: 

   
   `http://localhost:8080/api/users/{id}`

   Method: `GET`


### Location APIs
1. ####Fetching location use this end point GET 


`http://localhost:8080/api/locations`


2. ####GET Location by ID
   Endpoint: 

   
`http://localhost:8080/api/locations/{id}`

   Method: `GET`


### Transaction APIs
   Fetching transactions use this end point GET 

   
   `http://localhost:8080/api/transactions`

User Query Params to filter out the data.


   QueryParam | format 
   --- | --- 
   locationId | number 
   fromDate | string
   toDate | string

   

