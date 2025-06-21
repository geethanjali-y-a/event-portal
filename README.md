 🎓 College Event Management Portal

📌 Project Overview

This dynamic Event Management Portal is developed for schools and colleges to organize and manage events efficiently. The system includes features for participant registration, event creation, role-based access, result tracking, and certificate downloads — all managed through a user-friendly web interface.
 👥 User Roles & Functionalities

👨‍🎓 Participants
- Register for events using:
  - Name
  - Phone Number
  - Identity Card Number
- View event details
- Track results
- Download certificates if they have participated or won

🧑‍💼 Event Co-ordinators
- Add or delete events **organized by volunteer co-ordinators**
- View, update, or delete **only their own events** after login with valid credentials

🛡️ Admin
- Full control of the portal
- View all:
  - Events
  - Participants
  - Event co-ordinators
- Manage access and view logs

---

✨ Key Features

- 📝 Participant Registration
- 🗂️ Event Creation & Management
- 🎯 Role-Based Access Control (RBAC)
- 📊 Result Tracking
- 🧾 Certificate Generation & Download
- 🔐 Login System for Admins & Co-ordinators

---

🛠️ Tech Stack

| Component       | Technology Used            |
|----------------|----------------------------|
| **Frontend**    | HTML5, CSS3                |
| **Backend**     | Java (Servlets/JSP or Java Web Framework) |
| **Database**    | SQL (MySQL/PostgreSQL)     |

---

📁 Folder Structure

```

event-management-portal/
├── src/                        # Java source files (Servlets/Controllers)
├── web/                        # HTML, CSS, JSP files
├── database/                   # SQL scripts
├── certificates/               # Auto-generated certificates
├── README.md

 🚀 Getting Started

1. Clone the repository
  bash
   git clone https://github.com/your-username/event-management-portal.git
   cd event-management-portal


2. Set up the database

   * Use SQL tools to import `event_portal.sql` (located in the `database/` folder)
   * Ensure tables for `participants`, `events`, `coordinators`, and `admin` are created

3. Run the server

   * Use Apache Tomcat (for Servlets/JSP) or relevant Java Web framework
   * Deploy project in the `webapps` folder of Tomcat

4. Access the portal

   * Go to `http://localhost:8080/event-management-portal/`

---

📃 Sample Credentials

| Role         | Username   | Password  |
| ------------ | ---------- | --------- |
| Admin        | admin      | admin123  |
| Co-ordinator | john\_cord | event2025 |

> *These are sample logins for testing purposes. Change in production.*

---

 📈 Future Enhancements

* Email/SMS notifications for event updates
* QR code check-in system
* Calendar integration (Google/Outlook)
* Analytics dashboard for event stats

 



