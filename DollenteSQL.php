CREATE TABLE Student (
    StudentID INT NOT NULL,
    FirstName varchar(255),
    LastName varchar(255),
    DateOfBirth INT(255),
    email varchar(255),
    Phone INT(255),
    PRIMARY KEY(StudentID)
    
);



CREATE TABLE Course (
    CourseID int NOT NULL,
    CourseName varchar(255),
    Credits varchar(255),
    PRIMARY KEY(CourseID) 
);

CREATE TABLE Enrollment (
    EnrollmentID int NOT NULL,
    StudentID int(255),
    CourseID int(255),
    EnrollmentDate int(255),
    Grade int(255),
    PRIMARY KEY(EnrollmentID),
    FOREIGN KEY(StudentID) REFERENCES Student(StudentID),
    FOREIGN KEY(CourseID) REFERENCES Course(CourseID)
);


CREATE TABLE Instructor (
    InstructorID int NOT NULL,
    FirstName varchar(255),
    LastName varchar(255),
    email varchar(255),
    Phone INT(255),
    PRIMARY KEY(InstructorID) 
);

//insert into Student(StudentID, FirstName, LastName, DateOfBirth, email, Phone)
//values (13, "Taylor", "De Maguiba", 050900,taylor@gmail.com,09888205967)

