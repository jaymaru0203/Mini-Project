<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <link rel="stylesheet" href="style.css">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <script src="https://kit.fontawesome.com/a076d05399.js"></script>
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.6.3/css/all.css" integrity="sha384-UHRtZLI+pbxtHCWp1t77Bi1L4ZtiqrqD80Kn4Z8NTSRyMA2Fd33n5dQ8lWUE00s/" crossorigin="anonymous">
      <!-- AOS -->
  <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">
  

  <title>OTP</title>
</head>
<body>

    <div class="alert alert-success alert-block text-center my-5 mx-auto" style="width: 80%;">
        <button type="button" class="close" data-dismiss="alert">×</button>	
            <strong>OTP Sent Successfully to {{ Session()->get('user') }}!</strong>
    </div>

    <div class="container-fluid my-5 pt-5">
        <h2 class="text-center">Enter the OTP</h2>
        <h6 class="text-center text-muted mt-2 mb-5">Kindly Enter the OTP Sent to Your Registered Mail ID to Proceed</h6>
        <div class="justify-content-center text-center mb-5">
            <form action="/submitOTP/" method="post">
                @csrf
                <input type="number" name="otp" id="otp" min="1000" max="9999" maxlength="4" step="1" style="width: 30%; font-size: 40px; padding: 5px; text-align: center;"><br><br>
                <input type="email" name="user_email" id="user_email" value="{{ Session()->get('user') }}" hidden><br>
                <button class="btn btn-danger btn-lg" type="submit">Back</button>
                <button class="btn btn-success btn-lg" type="submit">Submit</button>
            </form>
        </div>
    </div>

    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>

</body>
