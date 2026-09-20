# StudyMate — Student Productivity Web Application

> A full-stack student productivity application developed as part of the **DecodeLabs Full Stack Development Internship — Batch 2026**.

---

## 📌 About the Project

**StudyMate** is a student productivity web application designed to help students organize their academic activities through reminders and personal study notes.

The project was developed as part of the **DecodeLabs Full Stack Development Internship**, with a focus on applying frontend, backend, database, API, authentication, and responsive web development concepts together in a functional application.

The application uses JavaScript on the frontend to communicate with PHP-based API endpoints, while MySQL is used for persistent data storage.

---

## ✨ Features

### 🔐 User Authentication
- User registration
- User login and logout
- Session-based authentication
- Password hashing using Bcrypt
- Protected application pages

### 🔔 Reminders
- Add personal reminders
- View recent reminders on the dashboard
- View all reminders
- Mark reminders for deletion
- Delete reminders through the backend API

### 📝 Notes
- Create personal study notes
- View recent notes on the dashboard
- View all notes
- Delete notes through the backend API

### 🎨 Responsive Interface
- Mobile-first design
- Responsive desktop and mobile layouts
- Semantic HTML5 structure
- CSS Grid and Flexbox
- Responsive navigation
- Accessible and user-friendly interface

### 🔄 API-Based Communication
The frontend communicates with the backend using JavaScript `fetch()` requests.

Data is exchanged between the frontend and backend using JSON.

---

## 🏗️ System Architecture

```text
                 ┌─────────────────────┐
                 │      User / UI      │
                 │   HTML + CSS + JS   │
                 └──────────┬──────────┘
                            │
                       fetch() / HTTP
                            │
                            ▼
                 ┌─────────────────────┐
                 │      PHP APIs       │
                 │ Authentication      │
                 │ Notes               │
                 │ Reminders           │
                 └──────────┬──────────┘
                            │
                     MySQL Queries
                            │
                            ▼
                 ┌─────────────────────┐
                 │       MySQL         │
                 │      Database       │
                 └─────────────────────┘
```

The general data flow is:

```text
JavaScript
    ↓
HTTP Request
    ↓
PHP API
    ↓
MySQL Database
    ↓
PHP API
    ↓
JSON Response
    ↓
JavaScript
    ↓
DOM Update
```

---

## 🔌 API Workflow

StudyMate uses PHP-based API endpoints for communication between the frontend and backend.

### Authentication

```text
Registration
    ↓
JavaScript
    ↓
POST Request
    ↓
PHP Registration API
    ↓
Validate Data
    ↓
Hash Password
    ↓
MySQL
    ↓
JSON Response
```

Login follows a similar process:

```text
Login Form
    ↓
JavaScript fetch()
    ↓
POST / Login API
    ↓
PHP
    ↓
MySQL
    ↓
Password Verification
    ↓
PHP Session
    ↓
JSON Response
    ↓
Dashboard
```

---

## 🔔 Reminder API

The reminder functionality uses API endpoints for creating, retrieving, and deleting reminders.

### Main Operations

```text
POST
Add Reminder
```

```text
GET
Retrieve Recent Reminders
```

```text
GET
Retrieve All Reminders
```

```text
POST
Delete Reminder
```

The dashboard retrieves a limited number of recent reminders, while the dedicated Reminders page displays the complete collection.

---

## 📝 Notes API

The notes functionality follows a similar API-based workflow.

### Main Operations

```text
POST
Add Note
```

```text
GET
Retrieve Recent Notes
```

```text
GET
Retrieve All Notes
```

```text
POST
Delete Note
```

The dashboard displays recent notes, while the dedicated Notes page displays the complete collection.

---

## 🛠️ Technology Stack

### Frontend

* HTML5
* CSS3
* JavaScript
* DOM Manipulation
* Fetch API
* Async/Await
* JSON

### Backend

* PHP
* PHP Sessions
* MySQLi
* JSON APIs

### Database

* MySQL

### Development

* Visual Studio Code
* XAMPP
* Git
* GitHub

---

## 🔒 Security Practices

The project implements several basic security practices during authentication and database operations.

### Password Hashing

Passwords are stored using PHP's password hashing functionality with Bcrypt rather than storing plain-text passwords.

```php
password_hash($password, PASSWORD_BCRYPT);
```

Passwords are verified using:

```php
password_verify($password, $hashedPassword);
```

### Prepared Statements

Database queries use MySQLi prepared statements to reduce the risk of SQL injection.

```text
User Input
    ↓
Prepared Statement
    ↓
MySQL
```

### Session Authentication

Authenticated users are assigned PHP sessions.

Protected pages verify the session before allowing access.

### Output Escaping

User-generated content displayed in PHP pages is escaped using:

```php
htmlspecialchars()
```

JavaScript-created content uses:

```javascript
textContent
```

instead of inserting user input directly as HTML.

---

## 📁 Project Structure

```text
StudyMate/
│
├── api/
│   ├── auth/
│   │   ├── login.php
│   │   └── logout.php
│   │
│   ├── register_api/
│   │   └── index.php
│   │
│   ├── notes_api/
│   │   ├── add-note.php
│   │   ├── get-note.php
│   │   ├── main-note-api.php
│   │   └── delete-note.php
│   │
│   └── reminder_api/
│       ├── add-reminder.php
│       ├── get-reminder.php
│       ├── main-reminder-api.php
│       └── delete-reminder.php
│
├── about/
│   ├── index.php
│   └── style.css
│
├── home/
│   ├── index.php
│   ├── home.css
│   └── script.js
│
├── login/
│   ├── login.html
│   ├── login.css
│   └── login.js
│
├── register/
│   ├── register.html
│   └── register.css
│
├── note/
│   └── ...
│
├── reminder/
│   └── ...
│
├── config/
│   └── db.php
│
├── README.md
└── .gitignore
```

> Database credentials and other sensitive configuration files should not be committed to a public repository.

---

## 🧠 Internship Learning Objectives

This project was developed as part of the **DecodeLabs Full Stack Development Internship — Batch 2026**.

The project provided practical experience with:

* Responsive frontend development
* Semantic HTML
* CSS layout systems
* JavaScript DOM manipulation
* Event handling
* Fetch API
* Async/Await
* JSON data exchange
* HTTP requests and responses
* PHP backend development
* API-based communication
* MySQL database integration
* Authentication and sessions
* Prepared SQL statements
* Password hashing
* Client-server architecture
* Git and GitHub

---

## 📚 What I Learned

One of the main learning outcomes from this project was understanding how frontend and backend components work together.

Instead of treating the frontend and backend as separate pieces, StudyMate helped me understand the complete flow:

```text
User Action
     ↓
JavaScript Event
     ↓
fetch()
     ↓
HTTP Request
     ↓
PHP API
     ↓
Database Operation
     ↓
JSON Response
     ↓
JavaScript
     ↓
DOM Update
```

The project also helped me understand how technologies such as JavaScript, PHP, MySQL, JSON, sessions, and APIs can be combined to build a complete web application.

---

## 🚀 Future Improvements

The current version focuses on the core requirements of the internship project.

Possible future improvements include:

* Adding unique IDs for notes and reminders
* Editing existing notes and reminders
* Adding due dates and timestamps
* Adding reminder priorities
* Improving API endpoint organization
* Consolidating duplicate read endpoints
* Adding stronger API validation
* Improving error handling
* Adding additional accessibility improvements
* Improving authentication and session security
* Deploying the complete application to a production hosting environment

---

## 🎓 Internship Context

This project was created as part of the:

**DecodeLabs Full Stack Development Internship**

**Batch:** 2026

**Project:** StudyMate — Student Productivity Web Application

The project was developed to demonstrate practical application of full-stack web development concepts covered during the internship.

---

## 👨‍💻 Developer

**Adish Jagan AV**

B.Tech Computer Science and Engineering Student

Interested in:

* Full Stack Development
* Backend Development
* APIs
* Databases
* Networking
* Practical Software Engineering

---

## 📌 Disclaimer

StudyMate is an educational and internship project created for learning and demonstration purposes.

It is not intended to be used as a production-grade productivity platform without additional security, scalability, testing, and infrastructure improvements.

---

## ⭐ Project

**StudyMate**

> Organize your studies. Manage your reminders. Keep your notes together.

Built as part of the **DecodeLabs Full Stack Development Internship — Batch 2026**.
