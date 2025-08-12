#################################README##########################################

#PROJECT-NIRAVANA

1)Unzip the project folder in xampp/htdocs


2)start Apache and MySQL in XamPP 


3)Open PHP MyAdmin page


4)Create table naming "users"


5)In the SQL execute the commands one by one 

CREATE TABLE registration (
    id INT AUTO_INCREMENT PRIMARY KEY,
    username VARCHAR(100) NOT NULL UNIQUE,
    email VARCHAR(150) NOT NULL UNIQUE,
    password VARCHAR(255) NOT NULL,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);



CREATE TABLE contact_messages (
    id INT AUTO_INCREMENT PRIMARY KEY,
    first_name VARCHAR(50),
    last_name VARCHAR(50),
    email VARCHAR(100),
    message TEXT,
    submitted_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);



#############################BOOM###############################
