<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Contact Us</title>

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" 
    integrity="sha512-9usAa10IRO0HhonpyAIVpjrylPvoDwiPUiKdWk5t3PyolY1cOd4DSE0Ga+ri4AuTroPR5aQvXU9xC6qOPnzFeg=="
     crossorigin="anonymous" referrerpolicy="no-referrer" />

    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }
        .container {
            display: flex;
            flex-direction: row;
            height: 100vh;
        }
        .map, .contact-form, .contact-details {
            flex: 1;
            display: flex;
            justify-content: center;
            align-items: center;
            padding: 10px;
        }
        
        .contact-details, .contact-form {
            background-color: #f0f0f0;
            padding: 50px;
        }
        .contact-details {
            border-right: 1px solid #ccc;
        }
        .contact-details p, .contact-form p {
            margin: 10px 0;
        }
        .contact-form form {
            display: flex;
            flex-direction: column;
        }
        .contact-form input, .contact-form textarea {
            padding: 10px;
            margin: 10px 0;
            border: 1px solid #ccc;
            border-radius: 5px;
        }
        .contact-form button {
            padding: 10px;
            background-color: #007bff;
            color: #fff;
            border: none;
            border-radius: 5px;
            cursor: pointer;
        }
        .contact-form button:hover {
            background-color: #0056b3;
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="map">
            <img src="./images/Screenshot (15).png" alt="">
        </div>
        <div class="contact-details">
            <div>
                <h2>Our Contact Details</h2>
                <p>Phone:+254 739 318 940 </p>
                <p>Email:kilei12@gmail.com</p>
        <i class="fa-solid fa-location-dot"></i>Zimmerman,Near Power Star Supermarket.
        <br>
        <h2>Our Payment Details</h2>
        <p>For Our customers who will pay via Mobile Money (Mpesa) </p>
        <p>Our Till Number:975467 </p>

            </div>
        </div>
        
          
</body>
</html>
