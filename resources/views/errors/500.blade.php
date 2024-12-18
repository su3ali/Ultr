<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>500 - Internal Server Error</title>
    <link rel="stylesheet" href="{{ asset('css/app.css') }}"> <!-- Link your app's CSS -->
    <style>
        /* Global styles for the body */
        body {
            display: flex;
            justify-content: center;
            align-items: center;
            min-height: 100vh;
            margin: 0;
            background-color: #f4f4f4;
            /* Softer background color for a clean look */
            font-family: Arial, sans-serif;
            /* Fallback font for consistency */
        }

        /* Error page container */
        .error-page {
            text-align: center;
        }

        /* Error image styling */
        .error-page img {
            max-width: 80%;
            /* Responsive image size */
            height: auto;
            box-shadow: 0px 6px 15px rgba(0, 0, 0, 0.15);
            /* Slightly larger shadow for depth */
            border-radius: 12px;
            /* Smoother rounded corners */
            transition: transform 0.3s ease;
            /* Add hover effect */
        }

        /* Hover effect for the image */
        .error-page img:hover {
            transform: scale(1.05);
            /* Slight zoom effect on hover */
        }

        /* Responsive adjustments for smaller screens */
        @media (max-width: 768px) {
            .error-page img {
                max-width: 90%;
            }
        }
    </style>
</head>

<body>
    <div class="error-page">
        <img src="{{ asset('images/500-error.png') }}" alt="500 Internal Server Error">
    </div>
</body>

</html>
