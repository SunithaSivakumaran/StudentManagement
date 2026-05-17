# 🎓 Student Management System

A comprehensive PHP & MySQL-based web application for managing student records, course enrollment, and multi-role access control with secure authentication.

## 📌 Overview

Student Management System is a full-featured educational platform that enables administrators to manage student records while allowing students to view their profiles and select courses. The system features role-based access control, secure authentication, and course management across multiple departments.

## 🚀 Key Features

- **🔐 Multi-Role Authentication** - Admin and Student roles with secure login
- **👥 Student Management** - Add, view, update, and delete student records
- **📚 Course Management** - 30+ pre-loaded courses organized by department
- **🎯 Course Selection** - Students can select and enroll in courses
- **👤 Profile Management** - View and edit personal student information
- **🏢 Department Organization** - Computer Science, Physical Science, Biological Science
- **🔒 Security** - Password hashing, input sanitization, SQL injection prevention
- **📊 Admin Dashboard** - Comprehensive student list and management interface

## 💻 Technologies Used

- **Backend:** PHP with MySQLi
- **Database:** MySQL
- **Frontend:** HTML, CSS, JavaScript
- **Security:** Password hashing, Prepared Statements

## 🗄️ Database Schema

### Tables:
- **users** - User authentication (admin/student roles)
- **students** - Student profiles with personal information
- **courses** - Course catalog (30+ courses per department)
- **selections** - Student course enrollments

## 🔒 Security Features

- ✅ Password hashing using `password_hash()`
- ✅ Input sanitization to prevent XSS attacks
- ✅ Prepared statements for safe database queries
- ✅ SQL injection prevention
- ✅ Session-based authentication
- ✅ Role-based access control

## ⚙️ Installation & Setup

1. **Install XAMPP** (or similar PHP/MySQL environment)
2. **Start Services:**
   - Start Apache
   - Start MySQL
3. **Create Database:**
   - Name: `student_management`
4. **Setup Project:**
   - Place project folder in `htdocs`
5. **Initialize Database:**
   - Run `base.php` to create tables and pre-load courses
6. **Access Application:**
   ```
   http://localhost/StudentManagement/
   ```

## 👥 User Roles & Workflows

### **Admin Portal**
- Register new students
- View all student records
- Access individual student profiles
- Manage student information

### **Student Portal**
- View personal profile
- Edit profile information
- Select courses by department
- View course enrollment status

## 🎓 Sample Data

### Pre-loaded Courses (30 per department):
**Computer Science:**
- CS001: Intro to Programming 1
- CS002: Intro to Programming 2
- CS003: Data Structures 1
- ... and 27 more

**Physical Science & Biological Science:**
- Similar course structures for each department

## 📁 Project Structure

```
StudentManagement/
├── index.php                 # Login page
├── adminHome.php            # Admin dashboard
├── studentProfile.php       # Student profile page
├── regStudent.php           # Student registration
├── updateStudent.php        # Update student info
├── db_conn.php             # Database connection
├── base.php                # Database initialization
├── functions/
│   ├── login.php           # Authentication logic
│   ├── adminFunc.php       # Admin functions
│   └── studentFunc.php     # Student functions
├── stlyle.css              # Styling
└── footer.html             # Footer template
```

## 🚀 Usage Examples

### Admin Access:
1. Login with admin credentials
2. View all registered students
3. Register new students
4. Access student profiles for details

### Student Access:
1. Login with student credentials
2. View personal profile
3. Select courses from available catalog
4. Update profile information

## 🔐 Authentication

Default role: **Student**
- Admins have full management capabilities
- Students have read/write access to their own data only

## 👩‍💻 Author

**Sunitha Sivakumaran**  
Student Project for Learning Purposes

---

*Feel free to fork, contribute, and improve this project!*
