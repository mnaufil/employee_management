# Auth Profile Management – Laravel 11

A **production-ready Authentication & Profile Management system** built with **Laravel 11** and **Tailwind CSS**, focusing on **security, clarity, and real-world best practices**.

This project was intentionally built **without Breeze, Jetstream, or UI kits** to deeply understand how Laravel authentication, sessions, validation, file uploads, and security actually work under the hood.

---

## 🚀 Features

### 🔐 Authentication
- User Registration
- User Login & Logout
- Secure password hashing
- Session regeneration after login
- Rate-limited login attempts (anti brute-force)
- Custom professional **429 – Too Many Requests** page

### 👤 Profile Management
- View user profile
- Update name & email
- Unique validation (email & name)
- Upload profile photo
- Delete / replace profile photo
- Profile photo named using **user ID**
- Secure storage using Laravel filesystem

### 🔑 Password Management
- Change password
- Current password verification
- Logout from all other devices after password change

---

## 🎨 UI / UX (Minimal SaaS Theme)

- Minimal **blue / gray SaaS-style UI**
- Built entirely with **Tailwind CSS**
- No UI component libraries
- Clean typography & spacing
- Clear primary and secondary actions
- Accessible form validation
- Consistent layout across all pages

### Pages Styled
- Login
- Register
- Dashboard
- Profile view
- Edit profile
- Change password
- Custom error pages

The UI was intentionally kept **simple and professional**, prioritizing usability and consistency over visual noise.

---

## 🧠 Security Practices Implemented

- CSRF protection on all forms
- Rate limiting on login (`throttle`)
- Session fixation prevention
- Password hashing using Laravel `Hash`
- Logout all other sessions on password change
- File upload validation (type & size)
- Secure file storage outside public root
- Controlled file naming (no user-supplied filenames)
- Authorization via `auth()->user()` (never trusting request IDs)
- Mass assignment protection

---

## 🛠 Tech Stack

- **Laravel 11**
- **PHP 8+**
- **Tailwind CSS**
- **MySQL**
- **Vite**
- **Git & GitHub**

---

## 📂 Project Structure (Key Files)

app/
├── Http/Controllers/
│ ├── Auth/
│ └── ProfileController.php
├── Models/User.php

resources/
├── views/
│ ├── auth/
│ ├── profile/
│ ├── dashboard.blade.php
│ └── layouts/app.blade.php

routes/
└── web.php