# CatererHub
Here is a link to the demo: https://youtu.be/nZuMW3kZHcc
CatererHub is an e-commerce platform designed to connect caterers with event planners in Ghana. It enables seamless interaction between service providers and event organizers, allowing caterers to advertise their services and event planners to find and hire caterers for their needs.

## Table of Contents
1. [Overview](#overview)
2. [Features](#features)
3. [Installation](#installation)
4. [Usage](#usage)
5. [Database Schema](#database-schema)


## Features
- **For Caterers:**
  - Create and manage advertisements for services.
  - Upload images and videos of catering setups and event styles.
  - Interact with potential clients (event planners).

- **For Event Planners:**
  - Browse caterer ads with details, images, and pricing.
  - Contact caterers for bookings or inquiries.

- **General Features:**
  - Secure authentication and role-based authorization.
  - Responsive web interface for accessibility on various devices.

## Installation
### Requirements
- PHP 8.0+
- MySQL 5.7+
- A web server (e.g., Apache or Nginx)

## Usage
1. **Caterer Registration and Login:**
   - Caterers can register by providing business details and a valid email address.
   - Login with the registered email and password to manage services.

2. **Event Planner Browsing:**
   - Event planners can browse advertisements, view caterer details, and send inquiries or booking requests.


## Database Schema
The database schema includes the following tables:
- **Caterers:** Contains caterer details such as `id`, `name`, `email`, and `password`.
- **Event_Planners:** Stores event planner information.
- **Caterer_Ads:** Handles advertisements created by caterers.
- **Caterer_Images:** Stores images related to caterer ads.
- **Ad_Interactions:** Tracks interactions between caterers and event planners.
- **Posts:** Handles platform-related posts or announcements.


