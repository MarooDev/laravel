# Pet API Integration

This Laravel application integrates with the Petstore Swagger API to manage a list of pets.

## Available Routes

- List of pets: `/pets`
- Pet details: `/pets/{id}`
- Create new pet: `/pets/create`
- Edit pet: `/pets/{id}/edit`
- Delete pet: Accessible via the pet list

Note: Replace `{id}` in the pet details and edit URLs with the actual ID of the pet you want to view or edit. For example: `/pets/9223372016900015388` or `/pets/9223372016900015388/edit`

## Features

1. **View Pets**: Navigate to `/pets` to see a list of all pets.
2. **Pet Details**: Click on the "Details" link next to a pet to view its full information.
3. **Add New Pet**: Use the "Add New Pet" link on the pets list page or navigate to `/pets/create` to add a new pet to the store.
4. **Edit Pet**: Click on the "Edit" link next to a pet in the list or navigate to `/pets/{id}/edit` to modify an existing pet's information.
5. **Delete Pet**: On the pets list page, click the "Delete" link next to a pet to remove it from the store. A confirmation prompt will appear before deletion.

## Usage

- To add a new pet, use the "Add New Pet" link and fill out the form with the pet's details.
- To edit an existing pet, click the "Edit" link next to the pet in the list and update the information in the form.
- To delete a pet, click the "Delete" link next to the pet in the list. Confirm the action when prompted.

## Error Handling

The application includes error handling for API interactions. If an error occurs during any operation, you will be redirected back with an error message explaining what went wrong.

## Success Messages

After successfully adding, editing, or deleting a pet, you will see a success message confirming the action.
