
# E-Learning

[![MIT License](https://img.shields.io/badge/License-MIT-blue.svg)](https://choosealicense.com/licenses/mit/) [![Laravel](https://img.shields.io/badge/Laravel-10-green.svg)](https://laravel.com/) [![Tailwind](https://img.shields.io/badge/Tailwind-lastest-green.svg)](https://tailwindcss.com/) [![Mysql](https://img.shields.io/badge/mysql-lastest-green.svg)](https://www.mysql.com/) 
## Project Description

This project aims to develop a Learning Management System (LMS) that facilitates effective teaching and learning. The LMS will provide an interactive platform allowing instructors to manage learning materials, and learners to access them seamlessly. One of the key features to be implemented is the ability to upload learning materials.

## Table of Content

 - [How to Install and Run the Project](#How-to-Install-and-Run-the-Project)
 - [How to Use the Project](#How-to-Use-the-Project)
 - [Credits](#Credits)
 - [License](#license)
 - [How to Contribute to the Project](#How-to-Contribute-to-the-Project)

## How to Install and Run the Project
To install and run the Splace Classroom project locally, please follow these steps:

 1.Clone the repository from GitHub:    
```bash
  git clone https://github.com/lutfianRhdn/E-Learning.git
```

Navigate to the project directory:
```bash
  cd E-Learning
```
Install the project dependencies using a package manager such as composer:
```bash
  composer install
```

Install the project dependencies using a package manager such as npm or yarn:
```bash
  npm install
```
or
```bash
  yarn install
```
Copy example environment file to new file
```bash
  cp .env.example .env
```

Run Migration and seeder.
```bash
  php artisan migrate --seed
```

Run the development server.
```bash
  npm run dev
```
Run the development server.
```bash
  php artisan serv
```
Access the website locally at http://localhost:8000.

## How to Use the Project

Once you have accessed the Splace Classroom, you can perform the following actions:
- Add Master Data: must Add Master data on admin(class,users,course).
- Add Course Resource: Login Teacher Account and go to course detail can upload the resource.

## Credits


The Space Classroom project was developed by  [@LutfianRhdn](https://www.github.com/LutfianRhdn).

## License

This project is licensed under the MIT License.


