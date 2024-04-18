<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
    <link rel="stylesheet" href="css/home.min.css">
    <title>Review</title>
</head>

<body>
    <div class="review-wrapper">
        <div class="name-title">
            <h1>Tell Us, how was your experience?
                <span> ->John Doe</span>
            </h1>
        </div>
        <div class="review">
            <form action="">
                <div class="input-area">
                    <label for="review-giver">Your Full Name</label>
                    <input type="text" name="revire-giver">
                </div>
                <div class="input-area">
                    <label for="review-giver">Your Email</label>
                    <input type="text" name="revire-giver">
                </div>
                <div class="input-area">
                    <label for="rating">How would you rate your experience?</label>
                    <select name="rating" id="">
                        <option value="" disabled selected>Rate your experience</option>
                        <option value="5">Excellent</option>
                        <option value="4">Very Good</option>
                        <option value="3">Average</option>
                        <option value="2">Poor</option>
                        <option value="1">Terrible</option>
                    </select>
                </div>
                <div class="input-area">
                    <label for="rating">Write your review</label>
                    <textarea name="review-text" id="" cols="30" rows="10"></textarea>
                </div>
                <div class="submit">
                    <button type="submit">
                        Submit Review
                    </button>
                </div>
            </form>
        </div>
    </div>
</body>

</html>