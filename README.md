## Group Members
- Member 1: Ainu Maisarah Binti Ami Nuddin (2216320) 
- Member 2: Arina Batrisyia Sobhan Binti Mohd Razali (2217572)
- Member 3: Muhammad Hasif Irfan Bin A.Mazlam (2219299)
- Member 4: Muhammad Syahmi Bin Noorhisham (2213991)
- Member 5: Muhd Iskandar Bin Yong Fui Min (2214527) 

#  Moonlit Lagoon Hotel - Hotel Management System

## Introduction of the Web Application
  A **Hotel Management System** is a web application platform designed to simplify hotel operations and provide an enhanced experience for guests. It enables administrators and customers to efficiently manage various aspects of hotel services, such as user accounts, room allocations, bookings, payments and ratings and reviews. By incorporating CRUD (Create, Read, Update, Delete) functionalities, the system ensures effective data handling, making it a reliable and user-friendly solution for the hospitality industry.

  The system’s features cover five main areas: **User Profiles, Bookings, Payments, Reviews & Ratings and Admin Control Panel**. Customers can create and manage user profiles, search for and book their prefered rooms as well as leave reviews for their stays, while administrators can oversee room allocations, track bookings and manage guest details in bookings. These features work together to ensure both convenience for customers and operational efficiency for our hotel staff. For instance, users can view booking histories, update personal details, or cancel reservations, while admins can adjust room allocation and monitor customer bookings.
   
  Overall, the **Hotel Management System** provides a robust and integrated approach to handling hotel operations. It simplifies complex tasks like managing payments or processing customer bookings and provide more efficient and satisfying guest experience. With its intuitive design and emphasis on data accuracy, the system enhances productivity for hotel staff while offering convenience to customers. This makes it an essential tool for modernizing hotel management processes.
    
## Objectives of the Web Application
The objectives of this Hotel Management System are: 

1. To enable users to manage their personal information and booking details for successful hotel reservation through the implementations of CRUD functionalities, ensuring all user data is accurately stored and securely updated in the database.

2. To provide hotel administrators with tools for managing customer information, managing room details and monitoring reservations records to ensure efficient data processing.

3. To implement review and rating features that allow customers to provide feedback on their stay and access reliable information for future booking decisions.

## Features and Functionalities of the Web Application
The features and functionalities of Hotel Management System is equipped with five main features: User Profiles, Bookings, Reviews & Ratings, Payments and Admin Control Panel. The system allows for smooth management of user accounts, easy booking processes, valuable guest feedback through reviews, and secure payment transactions. By integrating these functionalities, Moonlit Lagoon Hotel enhances both customer satisfaction and operational efficiency, creating a comprehensive solution for modern hotel management system.

1. User Profiles are designed to manage user accounts effectively. The creation process involves registering users with essential details such as name, email, and password. Customers can then read and access their profiles, including viewing their booking history. They can also see their bookings and cancel them directly from their user profile. The update feature allows users to edit their profile information, such as personal details and profile photo, ensuring their profiles are always up to date. In case of account deactivation, customers can delete or deactivate their accounts, with admins overseeing the process. 

2. Customers can create bookings by selecting their preferred check-in and check-out dates, room type and the number of guests. The system allow customers to filter available options based on their specific preferences. Once a booking is made, customers can review the details of their reservation, including the dates, room type, and the number of guests. After selecting their preferred options, customers will be directed to the payment page where they can complete their transaction. Additionally, customers have the flexibility to manage their bookings through their profile, including the option to cancel their reservations using a delete feature. Admins have the ability to view and manage bookings.

3. The payment system is responsible for managing all aspects of booking payments. After confirming their booking, customers will be presented with a payment summary that includes important details such as the check-in and check-out dates, the room type and the cancellation policy. To complete the payment, customers will be prompted to enter their bank details, including the name on the bank card, the card number, expiration date, and CVV. These details are required to securely process the payment. Once the payment has been successfully processed, a popup notification will appear on the screen, confirming the transaction and displaying the booking ID for reference. 

4. Reviews and Ratings are an essential feature for gathering customer feedback on services. After their stay, customers can leave reviews and ratings for the rooms, sharing their experiences with future guests. These reviews are displayed on the booking pages, helping others make informed decisions. Customers can rate their experience using a 5-star system, including categories like comfort, staff, facilities, value for money, and overall rating. Additionally, customers have the option to update their reviews, allowing them to revise feedback if necessary, and they can also delete their reviews, providing full control over the content they share. 

5. Admin Control Panel are for managing the hotel management system's operations effectively. It provides admins with a full access to booking details, including guest ID and guest name, their contact number, room details, their room type and price as well as check-in and check-out dates. Admins can update booking details, such as room allocations, guest information, and check-in and check-out dates, ensuring all records are accurate and up to date. They can also manage cancellations by deleting bookings, helping to maintain an organized system. This feature streamlines booking management, allowing admins to address changes quickly and resolve issues efficiently.

## Entity-Relationship Diagram (ERD)
The ERD Diagram of Hotel Management System
![WhatsApp Image 2025-01-15 at 21 02 52_f9a9e083](https://github.com/user-attachments/assets/73eee6ef-4b37-41d6-b59f-c7abac34c467)



## Sequence Diagram
The Sequence Diagram of Hotel Management System
![SequenceDiagram](https://github.com/user-attachments/assets/5729f510-64b5-4bd2-8312-d47d4442076d)


## Project System Captured Screen 

1. Home page
![1](https://github.com/user-attachments/assets/c474ba2b-4cbf-4c00-912a-2d37cedfe0ce)
![image](https://github.com/user-attachments/assets/959803ca-7dce-4fb2-936f-a0ae32c97388)
![image](https://github.com/user-attachments/assets/ca2e26f2-4c76-4305-bda2-a65ee9010ff5)

When a user clicks on the 'Rooms', they will be redirected to the Rooms page. Visitors who do not have an account or are not logged in will be able to view the available rooms but will not have access to the booking functionality.

2. Sign up Page 
![2](https://github.com/user-attachments/assets/23ec1e61-e00e-42c4-a84f-ce4bba40a437)

When customers wish to book a room, they will be required to sign up and create an account. During the registration process, we will collect their name, email address, and password.

3. Log in (Guest) Page
![3](https://github.com/user-attachments/assets/0c483c95-5cc9-45bf-aafb-d710ffcc073a)

After completing the sign-up process, customers will be redirected to the login page.

5. User Profile Page
![5](https://github.com/user-attachments/assets/0b00b3b5-f1ca-4047-9d26-0e6b8f7b5691)
![6](https://github.com/user-attachments/assets/966b8768-faec-4942-bd26-3f2605ab9a66)
![7](https://github.com/user-attachments/assets/b59cce20-4f3a-4759-a329-5719ea2462c2)

Customers have the ability to update their profile information, including their photo, name, email, and password. Customers could view their booking history and have the option to cancel booking. Customers also have the option to delete their account if they wish to do so.

When customer wants to cancel booking
![8](https://github.com/user-attachments/assets/9e35dc91-5b6a-4f77-b7b5-5c60cb9b193f)

User profile after cancel booking
![9](https://github.com/user-attachments/assets/bb6836ca-c4f2-4909-b672-283daa7f5215)

6. Booking Page
![image](https://github.com/user-attachments/assets/6ef71018-9edc-4a05-9c29-3ef0bcb084bd)

Customers need to fill in the Check-in date, Check-out date and guest number before booking. Customer also can use the filter to search room type they want. After customers click 'Book Now' button, it will store the booking information in data base and redirect to payment page.
<<<<<<< HEAD
7. Payment Page
 ![10](https://github.com/user-attachments/assets/605711ca-d62b-40b7-901e-c93c4f08af07)

![11](https://github.com/user-attachments/assets/d9388726-6291-4ab2-aeb6-50531f9a00a2)
=======
After applying filters
![image](https://github.com/user-attachments/assets/0cfc9246-4544-4afc-b942-e2f6667ef692)
>>>>>>> 8cd60cc72de294842a8dac4544617e4905c51b19

8. Payment Page

User pay the booking using card
![WhatsApp Image 2025-01-15 at 21 45 37_50e2e4de](https://github.com/user-attachments/assets/3cdcab0f-26fe-44b2-978e-e276a938eda9)
![WhatsApp Image 2025-01-15 at 21 45 36_c833c5b6](https://github.com/user-attachments/assets/adf489b2-033b-4936-8c71-331683791ef4)
![WhatsApp Image 2025-01-15 at 21 45 37_88a3231e](https://github.com/user-attachments/assets/ddd72412-489d-4f2c-95f0-a21d022f5456)
![WhatsApp Image 2025-01-15 at 21 45 36_cd1b37cc](https://github.com/user-attachments/assets/8424a640-1133-46e1-9df2-76c4abc3e843)

After payment successful user will go to success page and generate booking Id 
![WhatsApp Image 2025-01-15 at 21 45 43_73455457](https://github.com/user-attachments/assets/0e92bd39-e176-481b-9a35-8dad42a4ee5f)


10. Reviews and Ratings Page
![WhatsApp Image 2025-01-15 at 20 52 40_98ec53d8](https://github.com/user-attachments/assets/253c0d09-bc4f-4d06-924c-73427c0fe2d8)
![WhatsApp Image 2025-01-15 at 20 52 54_c98dc1f2](https://github.com/user-attachments/assets/dbb236c0-2e68-4a34-b461-6f3c5abcbe3e)
![WhatsApp Image 2025-01-15 at 20 53 09_ff854395](https://github.com/user-attachments/assets/8f7995a1-59f9-4450-b315-568e033728ab)
![WhatsApp Image 2025-01-15 at 20 53 25_7a41c869](https://github.com/user-attachments/assets/c4c09b6a-9548-4695-9594-0064a40d36ba)
![WhatsApp Image 2025-01-15 at 20 53 52_daebe695](https://github.com/user-attachments/assets/33017097-65a1-4dd9-8db4-cb8c88dbc6c3)

When user wants to edit their review 
![WhatsApp Image 2025-01-15 at 20 54 46_526bc68f](https://github.com/user-attachments/assets/431dfd0f-b367-4261-b9be-5e36f4fe2060)


12. Log in (Admin) Page
![AdminLogin](https://github.com/user-attachments/assets/a811c2b3-4046-403c-ac66-afe741bbc00c)    

13. Admin Control Panel Page
![AdminPage](https://github.com/user-attachments/assets/154acf9e-2104-4594-a5bb-208bfc589974)

## Challenges/Difficulties in Developing the System
1. Making sure the data from the website page is passed on to the database.
2. XAMPP and MySQL frequently switching ports, causing difficulties in accessing the localhost.
3. Identify the mistakes in coding after error message occurs or function not working.
4. making sure everyone get the same code and can run the code 
   
## References
1. Bukit Bintang Accommodation | JW Marriott Hotel Kuala Lumpur. (n.d.). Marriott Bonvoy. https://www.marriott.com/en-us/hotels/kuldt-jw-marriott-hotel-kuala-lumpur/rooms/
2. The Regency Hotel – Kuala Lumpur. (n.d.). https://theregencyhotel.my/kualalumpur/
3. Wondershare Edraw. (2021, December 9). UML Sequence Diagram Tutorial | Easy to Understand with Examples [Video]. YouTube. https://www.youtube.com/watch?v=gzKe7yt8qEo
