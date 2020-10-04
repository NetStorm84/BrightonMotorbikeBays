
# Brighton Bike Bays

Brighton and Hove City Council publish a list of all Motorbike Parking Bays in the City, but only by road name, not an exact GPS location. This is where this Laravel application comes in...

I will be adding the desired features as and when I get time. Please feel free to submit a pull request if anyone has any enhancements.

## Contributing

If you would like to contribute to this project, please follow the below steps to get a local version up and running. This repository contains a docker-compose file to get you up and running quickly, to use this you will need to have docker and docker-compose installed.

- Clone the repo to a directory on you computer
- CD in to the directory
- run `docker-compose up -d` to run the docker-compose file in detached mode
- run `composer install --ignore-platform-reqs` to download the composer vendor directory
- Add the domain `brigthonbikebays.local` to you /etc/hosts file.
- run `cp .env.example .env` to create the environment file
- Log in to the docker containing by running `docker exec -it brigthonbikebays bash`
- run `php artisan key:generate` to generate auth keys
- navigate to http://brsan key:generate` to generateightonbikebays.local to view the site locally

## Database
The Bike Bays are stored in a Sqlite database that took me a long time to gather the data for the database, if you use this data for any other project please attribute the copyright to me.

## Current features

- Shows accurate location of bike bay on Google Maps
- Street View image of bike bay
- Different icon depending if the bay has secure locking points

Current application is availiable at the below URL
<a href="http://brightonbikebays.magenificent.com">brightonbikebays.magenificent.com</a>

<strong>Please Note: The database does not currently contain all bike bays in Brighton, this is being updated as and when I have the time.</strong>
