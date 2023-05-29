# Survey
The following project was created by Khulanathi Mtshazo.

The following project has 4 pages:
	1. Main.html: this is the main page where we find links to either: fill out the survey, view survey results or help page.
	2. Survey.php: This is the survey page where users get to create and complete a survey.
	3. Results.php: This page is for viewing results about the survey from everybody who participated.
	4. Help.html: This is the help page which helps users with navigation of the web application.
	
The following languages were used to create this web-app:
	1. HTML
	2. CSS
	3. PHP
	4. Javascript

I used myphp admin(mysql) for the database, which has the following structure:
	* user_id: (int)unique number used a primary key to identify a specific survey entry
	* name: (varchar) for the users first name.
	* surname: (varchar) for the users surname.
	* age: (int) user enter age (restricted to min 5 and max 120 input).
	* contact_nbr: (varchar) for the users phone number( restrictred to 10 digits).
	* date: (date) for the date the user submitted on, i wanted to make the date a deafult for today date but thought to leave it like that
	* food_choice: (varchar) for the selected list of favourite food the user will select from option in survey.
	* eat_out: (int) a number from 1-5 of how much the user rates this statement.
	* watch_movie: (int) a number from 1-5 of how much the user rates this statement.
	* watch_tv: (int) a number from 1-5 of how much the user rates this statement.
	* listen_radio: (int)a number from 1-5 of how much the user rates this statement. 
even though i wanted to use firebase database i realised i would take me time to remember how to compile firebase queries since ive only handled it once.


The following web application has no javascript or rather little javascript as it felt like it didnt require a lot but a lot could have been include.

The layout of the web application did not require much adjustment to fit into different devices(pc/phone/tablet).
The only drawback with the system  is that if a user clicks submit without selecting a favourite food the user will be required to re-enter all the data entered.

There is a folder labled Media, this folder contains pictures and a video of the whole system.
