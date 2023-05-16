A small part of a program (or web application based on Laravel) to organize the work of a bicycle **delivery company**:


* Login for manager and drivers

* Department of Management (CRUD) Bicycles: Bike Type – Plate Number – Current Status Description – Current Status (in Company / Abroad / Available / Disabled)
* CRUD Department Drivers: Name – ID Number – Date of Birth – Photo of the Driver
 Connect drivers to bicycles so that each bike knows who is currently using it in a way that can determine the time of exit and return.
 Send a **notification **to the manager's account when a bicycle comes out and when it returns
 
** Techniques used ** :
   -   bootstrap for modal
   -   laravelcollective/html for form builder
   -  mailgun-mailer for mail service
