# 🎓 Student Management System

A comprehensive **PHP & MySQL-based web application** for managing student records, course enrollment, and multi-role access control with secure authentication.

---

## 📋 Table of Contents

- [Overview](#overview)
- [Key Features](#key-features)
- [Tech Stack](#tech-stack)
- [Database Schema](#database-schema)
- [Project Structure](#project-structure)
- [Installation & Setup](#installation--setup)
- [Usage Guide](#usage-guide)
- [Security Features](#security-features)
- [Default Credentials](#default-credentials)
- [Troubleshooting](#troubleshooting)
- [Contributing](#contributing)
- [Author](#author)

---

## 🎯 Overview

Student Management System is a **full-featured educational platform** designed for institutions to:
- Manage student records efficiently
- Organize courses by department
- Enable students to view profiles and select courses
- Provide secure authentication with role-based access control

The system separates admin and student portals, allowing administrators complete control over student data while giving students access only to their own information.

---

## 🚀 Key Features

### 🔐 Security & Authentication
- Multi-role authentication (Admin & Student)
- Secure password hashing with `password_hash()`
- Session-based authentication
- SQL injection prevention with prepared statements
- Input sanitization against XSS attacks

### 👨‍💼 Admin Features
- Register new students
- View all student records with details
- Access individual student profiles
- Update student information
- Manage student database
- Comprehensive admin dashboard

### 👨‍🎓 Student Features
- View personal profile information
- Edit profile details
- Browse courses by department
- Select and enroll in courses
- Track course enrollment status
- Manage personal information

### 📚 Course Management
- **90+ pre-loaded courses** across three departments
- **Computer Science** (30 courses)
- **Physical Science** (30 courses)
- **Biological Science** (30 courses)
- Well-organized course catalog with unique course codes

---

## 💻 Tech Stack

| Component | Technology |
|-----------|-----------|
| **Backend** | PHP with MySQLi |
| **Database** | MySQL |
| **Frontend** | HTML5, CSS3, JavaScript |
| **Server** | Apache (via XAMPP/WAMP) |
| **Security** | Password hashing, Prepared statements, Input sanitization |

---

## 🗄️ Database Schema

### Tables Overview

#### **users**
- `u_id` - Primary key (AUTO_INCREMENT)
- `username` - Unique username (VARCHAR 25)
- `password` - Hashed password (VARCHAR 255)
- `role` - User role (ENUM: 'admin', 'student')

#### **students**
- `s_id` - Primary key (AUTO_INCREMENT)
- `name` - Student name (VARCHAR 25)
- `u_id` - Foreign key to users table
- `department` - Department (ENUM: Computer Science, Physical Science, Biological Science)
- `pho_no` - Phone number (VARCHAR 10)
- `email` - Email address (VARCHAR 100)
- `DOB` - Date of birth (DATE)
- `gender` - Gender (ENUM: Male, Female)
- `address` - Home address (VARCHAR 100)
- `reg_Date` - Registration date (DATE, defaults to CURRENT_DATE)

#### **courses**
- `course_unit` - Primary key (VARCHAR 10)
- `course_name` - Course name (VARCHAR 50)
- `department` - Department offering course (ENUM)

#### **selections**
- `s_id` - Foreign key to students table
- `course_unit` - Foreign key to courses table
- Tracks student course enrollments

---

## 📁 Project Structure

```
StudentManagement/
├── index.php                 # Login page (entry point)
├── adminHome.php            # Admin dashboard & student management
├── studentProfile.php       # Student profile viewing & editing
├── regStudent.php           # Student registration form
├── updateStudent.php        # Student information update
├── course.php               # Course management
├── db_conn.php              # Database connection configuration
├── base.php                 # Database initialization & setup
├── style.css                # Main stylesheet
├── stlyle.css               # Alternative stylesheet
├── script.js                # JavaScript functions
├── functions/               # (Directory for helper functions)
├── src/                     # (Directory for additional modules)
└── README.md                # This file
```

---

## ⚙️ Installation & Setup

### Prerequisites
- **XAMPP/WAMP** (or any PHP/MySQL environment)
- **PHP 7.4+**
- **MySQL 5.7+**
- **Modern web browser**

### Step-by-Step Installation

#### 1️⃣ Install XAMPP/WAMP
Download and install from [Apache Friends](https://www.apachefriends.org/) or similar

#### 2️⃣ Start Services
```bash
# Start Apache and MySQL from XAMPP Control Panel
# OR if using command line:
sudo /path/to/xampp/xampp start
```

#### 3️⃣ Create Database
```sql
CREATE DATABASE student_management;
```

#### 4️⃣ Configure Database Connection
Edit `db_conn.php`:
```php
$host = "localhost";
$host_name = "root";           // Your MySQL username
$host_pwd = "";                // Your MySQL password
$db_name = "student_management";
```

#### 5️⃣ Place Project in Web Root
```bash
# Copy StudentManagement folder to htdocs
cp -r StudentManagement /path/to/xampp/htdocs/
```

#### 6️⃣ Initialize Database
Open browser and visit:
```
http://localhost/StudentManagement/base.php
```
Expected output:
```
table created successfully
table created successfully
... (4 more table messages)
Sunitha created successfully
```

#### 7️⃣ Access Application
```
http://localhost/StudentManagement/
```

---

## 📖 Usage Guide

### 🔑 Login Portal
Start at **index.php** - Enter your username and password
- Select role: **Admin** or **Student**
- Click **Login**

### 👨‍💼 Admin Workflow

**After Login:**
1. View Admin Dashboard (`adminHome.php`)
2. See all registered students in table format
3. Click on student to view detailed profile
4. Use "Register New Student" to add new students
5. Update student information as needed

**Registering New Student:**
- Navigate to `regStudent.php`
- Fill form with student details
- Verify email and name are unique
- Submit to create student account

### 👨‍🎓 Student Workflow

**After Login:**
1. View your profile (`studentProfile.php`)
2. See personal information and enrollment status
3. Edit profile information if needed
4. Navigate to courses section
5. Select courses by department
6. View course enrollment status

### 📚 Course Selection
- Browse available courses by department
- Select courses to enroll
- View selected courses
- Manage course selections

---

## 🔒 Security Features

| Feature | Implementation |
|---------|-----------------|
| **Password Security** | `password_hash()` with PASSWORD_DEFAULT algorithm |
| **SQL Injection Prevention** | Prepared statements with parameterized queries |
| **XSS Prevention** | Input sanitization and output encoding |
| **Session Management** | PHP session-based authentication |
| **Access Control** | Role-based access (Admin/Student) |
| **Database Constraints** | Foreign keys and unique constraints |
| **Error Handling** | Try-catch blocks for database connections |

### Security Best Practices Followed
✅ Never store plain-text passwords  
✅ Validate all user inputs  
✅ Escape output in HTML context  
✅ Use prepared statements for all queries  
✅ Implement session timeouts  
✅ Separate authentication logic  

---

## 🔐 Default Credentials

⚠️ **IMPORTANT: For Development/Learning Only**

| Role | Username | Password |
|------|----------|----------|
| Admin | `Sunitha` | `Suki1203#` |

**SECURITY WARNING:**
- Change default admin password immediately after setup
- Do NOT use these credentials in production
- Create new admin accounts with strong passwords
- Delete this information from code before deploying

---

## 🐛 Troubleshooting

### Database Connection Error
**Error:** "Couldn't connect to the database"

**Solutions:**
- Verify MySQL is running
- Check credentials in `db_conn.php`
- Ensure database `student_management` exists
- Verify correct host, username, password

### Tables Not Creating
**Error:** "Couldn't create a table"

**Solutions:**
- Ensure database exists
- Check MySQL user has CREATE TABLE permissions
- Run `base.php` before accessing the application
- Check console for detailed mysqli error

### Login Issues
**Can't login with credentials**

**Solutions:**
- Verify `base.php` was executed (creates admin account)
- Check username spelling
- Ensure database tables exist
- Clear browser cookies/cache
- Check PHP error logs

### Styling Not Appearing
**Pages look unstyled**

**Solutions:**
- Check both `style.css` and `stlyle.css` are present
- Verify Apache is serving static files correctly
- Clear browser cache (Ctrl+F5)
- Check file permissions

### Student Profile Not Updating
**Changes don't save**

**Solutions:**
- Verify database write permissions
- Check session is active
- Ensure student record exists
- Review MySQL error logs

---

## 🤝 Contributing

Contributions are welcome! To contribute:

1. **Fork** the repository
2. **Create** a new branch for your feature
3. **Make** your changes
4. **Test** thoroughly
5. **Submit** a pull request with description

### Areas for Enhancement
- Add email verification for registration
- Implement password reset functionality
- Add course pre-requisites logic
- Create student grade tracking
- Implement email notifications
- Add data export functionality (PDF/Excel)
- Improve UI with modern framework (Bootstrap/Tailwind)
- Add more detailed analytics dashboard

---

## 📝 License

This project is open source and available for educational purposes.

---

## 👩‍💻 Author

**Sunitha Sivakumaran**  
📧 Contact via GitHub: [@SunithaSivakumaran](https://github.com/SunithaSivakumaran)

---

## 📞 Support

For issues, questions, or suggestions:
- Open an [Issue](https://github.com/SunithaSivakumaran/StudentManagement/issues)
- Check existing issues for solutions
- Review troubleshooting section above

---

## 🎓 Learning Resources

This project demonstrates:
- Multi-tier architecture (Presentation, Business, Data layers)
- OOP principles in PHP
- Database normalization
- Authentication and authorization
- Input validation and sanitization
- Secure password handling

---

**Happy Learning! 🚀**  
*Last Updated: May 2026*
