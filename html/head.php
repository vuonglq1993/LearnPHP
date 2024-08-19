
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Home</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
  <style>
        /* Extra small devices (portrait phones, less than 576px) */
        @media (max-width: 575.98px) {
        .custom-class {
            /* Add your custom styles here */
            background-color: red;
        }
    }

    /* Small devices (landscape phones, 576px and up) */
    @media (min-width: 576px) and (max-width: 767.98px) {
        .custom-class {
            /* Add your custom styles here */
            background-color: blue;
        }
    }

    /* Medium devices (tablets, 768px and up) */
    @media (min-width: 768px) and (max-width: 991.98px) {
        .custom-class {
            /* Add your custom styles here */
            background-color: green;
        }
    }

    /* Large devices (desktops, 992px and up) */
    @media (min-width: 992px) and (max-width: 1199.98px) {
        .custom-class {
            /* Add your custom styles here */
            background-color: yellow;
        }
    }

    /* Extra large devices (large desktops, 1200px and up) */
    @media (min-width: 1200px) {
        .custom-class {
            /* Add your custom styles here */
            background-color: purple;
        }
    }
    body {
      background: linear-gradient(45deg, #e1e5f2 25%, #ffffff 45%, #e1e5f2 65%, #ffffff 85%);
    }
    .mb{
      margin-bottom: 17rem;
    }
    .overall{
     display: block;
    }
    .left-part{
      display: inline-block;
      margin-left:  clamp(1rem, 20vw,100rem);
      max-width: clamp(20rem, 30rem,100rem);
    }
    .right-part{
      display: inline-block;
      margin-right:clamp(1rem, 20vw,100rem);
      max-width: clamp(20rem, 30rem,100rem);
    }
    .borderbbbb{
      margin-top: 5rem;
      float: top;
      padding-bottom: 30rem;
      border: 1px solid black;
      padding: 10px;
      margin-bottom: 1rem;
      border-radius: 5px;
      background-color: white;
    }
    .formborder{
      border: none;
      border-radius: 50px;
      background-color: white;
      padding: 1rem;

    }
    .marginbot{
      margin-bottom: 8rem;
    }
  </style>
</head>