# Team Heisenburg Build 5 ------>shoppingCart System, Order Logic fixed, ACL for user access, siteConfig/Admin section + more ???.

Eddie:-
*Fixed up the orderDetail logic so it will now subtract from the stock levels for new orderDetails
*Fixed up the orderDetail delete() method so it will now return the stock levels back to the warehouse.
*Will display the ordered item total and discount subtracted -- may need GST 10% added at some point.
*Fixed up the edit orderDetail method so it will now auto correct the stock levels accordingly i.e - user decides to order less stock then stock is returned to the stock level and vice versa if the user decides they want more items then these are deducted from the stock levels and ensuring they are =to or above 0.
*ShoppingCart Page , *database S.cart entry.... 


---------------------------------------------------------------------------------
# Team Heisenburg Build 4 ------> Forgot Password system added, Item images & File Upload, better email templates, HTML tags in News Page, 


No Notes done by Eddie lol oops.

--------------------------------------------------------------------------------------
# Team Heisenburg Build 3 ------> News System / Better Email system / more ???.

We have added a section of the admin site where rick can set some news for his customers to view similar to a simple blog system that only rick or admin's can edit or add too.  We will also be finishing off the email system to send out html emails customised to each individual customers name, better selection system for users to email, begin the customer types grouping for email sending and a send to all checkbox on selection page,
Things we finished already are: Username as login for quicker login in development, Started news system and some user role checks for editing, 

** URGENT STUFF & NOTES FROM MID YEAR EXPO TALKS:

**  Other stuff is:

* Get the cakePHP Flash CSS put back in by Shash the CSS man!!!! ---> shows error messages, success messages is vital for users.



* jQuery data table with search on tables

* TinyMCE editor with javascript.

* Add quantity of items using positive or negative numbers for Qty on hand. i.e. QTY: -10 will = 290-10 = 280 total

* Add action to allow order status to be marked as complete or shipped, etc. 

* Make sure suppliers are tied to only their products!!

* Make items the landing page or page most important to ricks business 

* Make a forget password that creates a new password only as all passwords are hashed...

----------------------------------------------------------------------------------

# Team Heisenburg Build 2 ------> Order system / Managment backend.

Our second build is all the scafolding and logic needed for the backend of our order processing system, this sub system will have a shopping cart front end on it that will allow users to place and monitor new orders, view and re order from older orders, and generally purchase Ricks goods via an online GUI we design in a later build cycle.


Still to Do List

Everything...

----------------------------------------------------------------------------------

# Team Heisenburg build1 ----> Customer Contact Email subsystem v1.0

We have decided to change build 1 from the proposed connect and display live myob data to the email customer system as we were un able to get a hold of our clients database before the due date so we will be attempting
a user login
a customer display table and both mass email and single client email via checkboxes on each line of the customer display table.
A custom form for building a custom message for the emails and also a file attachment for catalogues or reports.

Working so Far
simple User login / register -->needs to be altered to only allow rick to enable accounts after revieving email notifications.
Customer display table
Mass & single email functionality
Custom form for email building


Still to do.

Login and ACL (Access control lists) for account types  ----> Still needed 19/5/15
Fix the database to include more customer details -------> Done 19/05/15
fix the databse to include a username -------------------> Done 19/05/15
fix login to use username and password for quicker login  ---> done
fix sign up with a password confirmation  --------------------> done
add a forgot my password link and system ---------------------> done
Add form validation on email composer.  ----------------------> Still needed
Add HTML and Text email templates  in the Template folder ----> Done
Fix email so the message comes from the templates ------------> Done
........
Reason for outstanding tasks is MYOB research was taking up a lot of time untill we were told not to look at it yet by POD 
