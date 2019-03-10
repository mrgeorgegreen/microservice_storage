The microservice will provide an HTTP (JSON) API for clients to manage any type of file providing

the abilities listed below :
* Store files (Storing eventual files metadata as well)
* Get list of stored files
* Delete files
* Download files
* Retrieve total used storage space


# Scarth for REST in PhpStorm

POST http://localhost:80/
Content-Type: application/json

{
    "method": "store",
    "params": {
      "name": "gg34",
      "file": "iVBORw0KGgoAAAANSUhEUgAAAAEAAAABCAYAAAAfFcSJAAAAEElEQVR42mL4//8/A0CAAQAI/AL+`26JNFgAAAABJRU5ErkJggg=="
    }
}

###

POST http://localhost:80/
Content-Type: application/json

{
  "method": "download",
  "params": {
    "name": "gg34"
  }
}

###

POST http://localhost:80/
Content-Type: application/json

{
  "method": "list",
  "params": {

  }
}


###

POST http://localhost:80/
Content-Type: application/json

{
  "method": "delete",
  "params": {
    "name": "gg34"
  }
}

###
