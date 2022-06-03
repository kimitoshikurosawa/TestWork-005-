<p align="center"><a href="https://laravel.com" target="_blank"><img src="https://scontent.fabj3-1.fna.fbcdn.net/v/t39.30808-6/255370737_119216047215979_8008653198281607217_n.jpg?stp=dst-jpg_p180x540&_nc_cat=109&ccb=1-7&_nc_sid=e3f864&_nc_eui2=AeHwrwJKR7Rn9zgE8mDRpQn1znp6WintC8jOenpaKe0LyGW_FjiUeM2H1RzIyxlqTno&_nc_ohc=1v6wrpKtrBEAX9do5Q6&_nc_ht=scontent.fabj3-1.fna&oh=00_AT9usRh-wDZ9t3ThisUxpZPdbXhX0rCm4PmEUizYnf1Sfw&oe=629EF0F4" width="400"></a></p>



## Petition App, Test assignment for Mello Interactive

As an interactive service platform for content creators, it is important to listen to the community, that's why we build this little application that have two table the petitions and catagory as topics.
The project contain postman-collection folder for Postman test and deployment on docker.

<!-- GETTING STARTED -->
## Getting Started

We gonna explain the steps to deploy the application

### Prerequisites

The project use docker compose to work 
* docker compose
  <a href="https://docs.docker.com/compose/install/"> Installation guide </a>

### Installation

Here we list the step to lunch the project._

1. The key is already define in the .env file
2. Clone the repo
   ```sh
   git clone https://misagokim@bitbucket.org/misagokim/testwork-005.git
   ```
3. Lunch docker container with compose
   ```sh
   docker compose up
   ```
4. Once the container is up execute this command to fill the database
   ```js
   docker compose exec backend php artisan migrate
   ```

<p align="right">(<a href="#top">back to top</a>)</p>



<!-- USAGE EXAMPLES -->
## Usage

The project run on port 127.0.0.01:8000 
The endpoint :
- /api/petitions/display/{id} : this endpoint display a specific petition.
- /api/petitions/category/{id} : this endpoint display a petition by category.
- /api/petitions/search/{keyword} : this endpoint return a simple search by keyword.
- /api/petitions/sort/{api_token} : this endpoint requires the api key to apply filters and sort petitions.
- /api/petitions/create/{api_token} : this endpoint requires the api token and create a new petition.
- /api/categories/{api_token} : this endpoint requires the api token and create a new  category.

The postman collection is on root folder `postman-collection`



<p align="right">(<a href="#top">back to top</a>)</p>



<!-- CONTACT -->
## Contact

Kimana MISAGO - [@Kim_Pliskin](https://twitter.com/Kim_Pliskin) - misagokim@gmail.com


<p align="right">(<a href="#top">back to top</a>)</p>
