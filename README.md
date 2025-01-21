# Pet Store API Application

This is a simple application that communicates with the Pet Store REST API: [Petstore Swagger API](https://petstore.swagger.io/). It allows adding, retrieving, updating, and deleting pets through a user-friendly interface.

## Project Overview

This project demonstrates the integration with a sample REST API to manage pet data. The application features:
Displaying a list of pets.
Viewing details of a selected pet.
Adding new pets.
Updating pet details.
Deleting pets.

## Branch: pets-api

### Description
This branch implements the functionality for displaying a list of pets fetched from the Pet Store API. The following actions are part of this implementation:
Fetching data from the /pet endpoint of the API.
Displaying the list of pets in a user-friendly manner.

## Available Routes

- List of pets: `/pets`
- Pet details: `/pets/{id}`
- Create new pet: `/pets/create`

Note: Replace `{id}` in the pet details URL with the actual ID of the pet you want to view. For example: `/pets/9223372016900015388`

To add a new pet, navigate to `/pets/create` and fill out the form with the pet's details.
