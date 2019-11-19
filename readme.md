## INSTALATION

!!!You need Docker to run this app!!!

Clone repository

`git clone git@github.com:likrot/dziedzina.git`

In app folder run command

`docker-compose up -d` 

after all

`composer install`

Create database if not exists

`docker exec -it <db_container> mysql -u root -p`
`CREATE DATABASE laravel_app`

## API REQUESTS

You can use `GET`, `PUT` and `POST` methods.

### Routes

* put - `/material-group/{id}`
* post and get - `/material-group`

body for `POST` and `PUT` methods:

```
    {
        "name": "barwione"
    }

```

* put - `/unit-of-measure/{id}`
* post and get `/unit-of-measure`

body for `POST` and `PUT` methods:

```

    {
        "name": "metry",
        "skrot": "m"
    }

```

* put - `/material/{id}`
* post and get `/material`

body for `POST` and `PUT` methods:

```

    {
        "name": "bawełna",
        "code": "4c23c2312",
        "group": 3,
        "unit": 1
    }

```

## ToDo
