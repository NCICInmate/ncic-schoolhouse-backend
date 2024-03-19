# NCIC Schoolhouse 2.0 Backend

## Installation
Start by cloning the repository 
```
git clone https://github.com/Marshall-Smith0/ncic-schoolhouse-backend.git
```

Copy .env.example to .env 
```
cp .env.example .env
```

Start up the Docker container
```
docker-compose up -d
```
If you change anything with `.env` 
```
docker-compose down
```

From here you will have to be working within the docker container for each of the commands. You do this by adding `docker-compose exec escola_lms_app bash -c` before each of the commands.

Install the composer files
```
docker-compose exec escola_lms_app bash -c "composer install"
```

Run a fresh migration and then seed the database
```
docker-compose exec escola_lms_app bash -c "php artisan migrate:fresh --seed"
```

#### Any time you run `docker-compose down` you will need to re-run these commands 

#### If you are going to use the from the seeder and would like to view this information then you will need to set up the Postgres database. 

### Postgres Databse
There are two ways of viewing the Postgres database: 

The first is using `adminer-1`. This is one of the ports that is opened up within the docker container. This will open up a screen where you put in the information for the Postgres DB found in the `.env` file. 

The second way is using pgAdmin.

## License

[![FOSSA Status](https://app.fossa.com/api/projects/git%2Bgithub.com%2FEscolaLMS%2FAPI.svg?type=large)](https://app.fossa.com/projects/git%2Bgithub.com%2FEscolaLMS%2FAPI?ref=badge_large)
