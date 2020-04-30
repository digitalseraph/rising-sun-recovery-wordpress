# Rising Sun Recovery Website

## Getting Started

These instructions will get you a copy of the project up and running on your local machine for development and testing purposes.
See deployment for notes on how to deploy the project on a staging and production environment.

### Prerequisites

You will need to install the following software to run this application:

* A MySQL database
* Vagrant
* Homestead

### Installation

Step by step instructions on installing the application on your local machine

1. Clone this repo
2. Setup Homestead
    1. You may need to add the following line to the nginx configuration to allow larger file uploads
    2. SSH into the vagrant box: `vagrant box ssh` or `homestead ssh`
    3. Edit the file located at `/etc/nginx/site-available/risingsunrecovery.test`
    4. Add this line under the server block: `client_max_body_size = 500m`
3. Browse to url (<http://risingsunrecovery.test>)
4. Start the WordPress quick setup

### Docker Container

To spin up the docker container run:

```shell
docker-compose up -d
```

## WordPress Information

This site uses the Kunco Theme from ThemeForest. This theme uses the following WordPress Plugins:

* **Contact Form 7**: Allow you create contact forms on Contact Page.
* **MailChimp**: to use newsletter function
* **Revolution Slider**: premium responsive slider.
* **Visual Composer**: powerful visual composer to create page layout.
* **WooCommerce**: The Shop engine for your WordPress site.
* **Gaviasthemer for Themes**: Implement rick functions for themes base on wpo framework and load widgets for theme used.
* **Metabox**: Create custom meta boxes and custom fields for any post type in WordPress.

### Plugins

Some plugins may require additional setup. Details are here.

#### WooCommerce

1. Browse to <http://risingsunrecovery.test/wp-admin/index.php?page=wc-setup>

#### Creating an Admin User Account

> @TODO

#### Importing a Database

> @TODO

### Running Tests

> @TODO

## Deployments

> @TODO
>

### Staging

> @TODO

### Production

> @TODO

## Built with

* [Ruby on Rails](https://github.com/rails/rails) -  Rails is a web-application framework that includes everything needed to create database-backed web applications
* [Rails Admin](https://github.com/sferik/rails_admin) - a Rails engine that provides an easy-to-use interface for managing your data
* [AWS Elastic Beanstalk](https://aws.amazon.com/documentation/elastic-beanstalk/) - Allows you to quickly deploy and manage applications in the AWS Cloud

## Contributing

Please read [CONTRIBUTING.md](CONTRIBUTING.md) for details on our code of conduct, and the process for submitting pull requests to us.

## Versioning

We use [SemVer](http://semver.org/) for versioning. For the versions available, see the [tags on this repository](https://bitbucket.org/huddleinc/gofan-admin/src/master). 

## Authors

> @TODO

<!--
See also the list of [contributors](https://github.com/your/project/contributors) who participated in this project.
-->

## License

> @TODO

<!--
This project is licensed under the MIT License - see the [LICENSE.md](LICENSE.md) file for details
-->

## Acknowledgments

* Hat tip to anyone who's code was used
* Inspiration
* etc
