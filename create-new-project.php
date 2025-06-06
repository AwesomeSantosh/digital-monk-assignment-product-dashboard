<?php

require_once 'check_login.php';



?>

<!DOCTYPE html>

<html lang="en">

<head>

<meta charset="UTF-8">

<title>Add Product</title>

<meta name="viewport" content="width=device-width, initial-scale=1">

<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">

<!-- new file -->

<!-- <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet"> -->

    <!-- Bootstrap CSS -->

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">

    <style>

        body {

            padding: 50px;

        }



        .form-container {

            max-width: 600px;

            margin: auto;

        }

         #imagePreview {

        max-width: 200px;

        margin-top: 10px;

    }





    .image-preview-container {

           display: flex;

           overflow-x: auto; /* Allow horizontal scrolling */

       }



       .image-preview-item {

           margin-right: 10px;

           margin-bottom: 10px;

       }



       .image-preview-item img {

           max-width: 150px; /* Adjust image width as needed */

           height: auto;

       }







    </style>

<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>



</head>

<body>



    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">

    <div class="container-fluid">

        <a class="navbar-brand" href="#">Product Listing</a>

        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">

            <span class="navbar-toggler-icon"></span>

        </button>

        <div class="collapse navbar-collapse justify-content-end" id="navbarNav">

            <ul class="navbar-nav">

                <!-- Add your other navigation links here -->

                <li class="nav-item">

                    <a href="product-grid.php" target="_blank" class="btn btn-success" >Product Grid View</a> </li>

                    &nbsp;&nbsp;&nbsp;

                <li class="nav-item">

                    <a href="view_projects.php" class="btn btn-warning "target="_blank" >Dashboard</a> </li>

                 &nbsp;&nbsp;&nbsp;

                <!-- Logout Button -->

                <li class="nav-item">

                    <a class="nav-link" href="logout.php">

                        <button type="button" class="btn btn-danger">Logout</button>

                    </a>

                </li>

            </ul>

        </div>

    </div>

</nav>



<div class="container mt-5">

   <!--  <div class="row">

        <div class="mb-8 float-left"> </div>

        <div class="mb-4 float-right">

           

        </div>

    </div> -->



    <h2>Add New Product</h2>

 

    <div id="message"></div>

    <form id="createProjectForm" enctype="multipart/form-data">

          <div class="mb-3">

            <label for="title" class="form-label">Title:</label>

            <input type="text" id="title" name="title" class="form-control" required>

        </div>



        <div class="mb-3">

            <label for="description" class="form-label">Description:</label>

            <textarea id="description" name="description" rows="4" class="form-control" required></textarea>

        </div>



        <div class="mb-3">

            <label for="tags" class="form-label">Categories (comma-separated):</label>

            <input type="text" id="tags" name="tags" class="form-control" required>

        </div>



        <div class="mb-3">

            <label for="main_image" class="form-label">Main Image:</label>

            <input type="file" id="main_image" name="main_image" class="form-control" accept="image/*" required>

            <!-- Image Preview Container -->

            <div id="imagePreview"></div>

            <!-- Remove Image Option -->

            <button type="button" id="removeImageBtn" class="btn btn-danger mt-2" style="display:none;">Remove Image</button>

        </div>



        <div class="mb-3">

            <label for="secondary_images" class="form-label">Secondary Images:</label>

            <input type="file" id="secondary_images" name="secondary_images[]" class="form-control" multiple accept="image/*">

            <!-- Image Preview Container -->

                      <div class="image-preview-container mt-2"></div>





            <!-- Remove Image Option -->

            <!-- <button type="button" id="removeImageBtn2" class="btn btn-danger mt-2" style="display:none;">Remove Image</button> -->

        </div>

        <input type="submit" value="Create Project" class="btn btn-primary"> 

        <button type="button" class="btn btn-secondary" onclick="location.href='view_projects.php'">Cancel</button>

    </form>





</div>







<script>

$(document).ready(function() {



    // Image Preview and Remove Functionality

    $('#main_image').change(function() {

        const file = this.files[0];

        if (file) {

            const reader = new FileReader();

            reader.onload = function(e) {

                $('#imagePreview').html('<img src="' + e.target.result + '" class="img-thumbnail" alt="Preview">');

                $('#removeImageBtn').show(); // Show remove image button

            };

            reader.readAsDataURL(file);

        }

    });



    // Remove Image Functionality

    $('#removeImageBtn').click(function() {

        $('#main_image').val(''); // Clear the file input

        $('#imagePreview').empty(); // Clear the image preview container

        $(this).hide(); // Hide remove image button

    });





    $('#secondary_images').change(function() {

            $('.image-preview-container').empty(); // Clear previous previews

            const files = Array.from(this.files);

            

            files.forEach((file, index) => {

                const reader = new FileReader();

                reader.onload = function(e) {

                    const previewHtml = `

                        <div class="image-preview-item">

                            <img src="${e.target.result}" class="img-thumbnail" alt="Preview">

                            <button type="button" class="btn btn-danger btn-sm mt-2 remove-secondary-image" data-index="${index}">&times;</button>

                        </div>

                    `;

                    $('.image-preview-container').append(previewHtml);

                };

                reader.readAsDataURL(file);

            });

        });



        // Remove Secondary Image Functionality

        $(document).on('click', '.remove-secondary-image', function() {

            const indexToRemove = $(this).data('index');

            const files = Array.from($('#secondary_images')[0].files);

            

            files.splice(indexToRemove, 1); // Remove file from array

            $('#secondary_images').prop('files', new FileList(...files)); // Update file input's files property

            $(this).parent('.image-preview-item').remove(); // Remove preview from DOM

        });







/*    $('#secondary_images').change(function() {

          $('.image-preview-container').empty(); // Clear previous previews

          const files = Array.from(this.files);

          

          files.forEach((file, index) => {

              const reader = new FileReader();

              reader.onload = function(e) {

                  const previewHtml = `

                      <div class="image-preview-item">

                          <img src="${e.target.result}" class="img-thumbnail" alt="Preview">

                          <button type="button" class="btn btn-danger btn-sm mt-2 remove-secondary-image" data-index="${index}">Remove</button>

                      </div>

                  `;

                  $('.image-preview-container').append(previewHtml);

              };

              reader.readAsDataURL(file);

          });

      });*/



      // Remove Secondary Image Functionality

      $(document).on('click', '.remove-secondary-image', function() {

          const indexToRemove = $(this).data('index');

          const files = Array.from($('#secondary_images')[0].files);

          

          files.splice(indexToRemove, 1); // Remove file from array

          $('#secondary_images').prop('files', new FileList(...files)); // Update file input's files property

          $(this).parent('.image-preview-item').remove(); // Remove preview from DOM

      });





    $('#createProjectForm').submit(function(e) {

        e.preventDefault();

         $('#submitBtn').prop('disabled', true).val('Creating...');

        let formData = new FormData(this);

        

        $.ajax({

            url: 'create_project.php',

            type: 'POST',

            data: formData,

            processData: false,

            contentType: false,

            dataType: 'json', // Expect JSON response

            success: function(response) {

                if (response.success) {

                    $('#message').html('<div class="alert alert-success">' + response.message + '</div>');

                    // Reset the form after successful submission

                    $('#createProjectForm')[0].reset();

                     $('#imagePreview').empty(); 

                    $('.image-preview-container').empty();

                     $('#submitBtn').prop('disabled', false).val('Create Project');

                } else {

                    $('#message').html('<div class="alert alert-danger">' + response.message + '</div>');

                     $('#submitBtn').prop('disabled', false).val('Create Project');

                }

            },

            error: function() {

                $('#message').html('<div class="alert alert-danger">Error occurred while processing request.</div>');

                $('#submitBtn').prop('disabled', false).val('Create Project');

            }

        });

    });

});

</script>



</body>

</html>

