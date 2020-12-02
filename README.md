# turnosApp
App para gestionar y administrar turnos

![Dusk Tests](https://github.com/ealcca/turnosApp/workflows/Dusk%20Tests/badge.svg)
![Laravel](https://github.com/ealcca/turnosApp/workflows/Laravel/badge.svg)
[![Codacy Badge](https://api.codacy.com/project/badge/Grade/3c84d5e4214643a28ce48a078d48f111)](https://app.codacy.com/gh/ealcca/turnosApp?utm_source=github.com&utm_medium=referral&utm_content=ealcca/turnosApp&utm_campaign=Badge_Grade)
[![codecov](https://codecov.io/gh/ealcca/turnosApp/branch/master/graph/badge.svg)](https://codecov.io/gh/ealcca/turnosApp)
![Static Code Analysis](https://github.com/ealcca/turnosApp/workflows/Static%20Code%20Analysis/badge.svg)
![Deploy](https://github.com/ealcca/turnosApp/workflows/Deploy/badge.svg)

## Deployed demo 🚀

https://my-shifts-app.herokuapp.com/

## Install project

# Clone the repository

```
$ git clone https://github.com/ealcca/turnosApp.git
```

# Install dependencies

```
$ composer install
```

# Create .env 

```
$ cp .env.example .env
```

# Edit .env

* DB_CONNECTION=pgsql
* DB_HOST=database
* DB_PORT=5432
* DB_DATABASE=mydb
* DB_USERNAME=myuser
* DB_PASSWORD=thisisasecretpassword

# Generate key

```
$ php artisan key:generate
```

# Run migrate and seeder

```
$ php artisan migrate --seed
```

# Lift containers

```
$ docker-compose up
```





