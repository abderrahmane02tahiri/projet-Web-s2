<!DOCTYPE html>
<html>
  <head>
    <title>Contact Us - Parallax Page</title>
    <style>
      /* CSS Styling */
      body {
        margin: 0;
        font-family: Arial, sans-serif;
        background-color: #f2f2f2;
      }

      .parallax {
        background-image: url("background.jpg");
        background-attachment: fixed;
        background-position: center;
        background-repeat: no-repeat;
        background-size: cover;
        height: 100vh;
        position: relative;
        overflow: hidden;
      }

      .overlay {
        position: absolute;
        top: 0;
        left: 0;
        width: 100%;
        height: 100%;
        background-color: rgba(0, 0, 0, 0.5);
      }

      .content {
        text-align: center;
        position: absolute;
        top: 50%;
        left: 50%;
        transform: translate(-50%, -50%);
        color: #ffffff;
      }

      .content h1 {
        font-size: 48px;
        margin-bottom: 20px;
      }

      .content p {
        font-size: 24px;
        margin-bottom: 40px;
      }

      .contact-form {
        width: 400px;
        margin: 0 auto;
        background-color: #ffffff;
        padding: 20px;
        border-radius: 10px;
      }

      .contact-form input[type="text"],
      .contact-form textarea {
        width: 100%;
        padding: 10px;
        margin-bottom: 15px;
        border: 1px solid #dddddd;
        border-radius: 5px;
        resize: none;
      }

      .contact-form input[type="submit"] {
        width: 100%;
        padding: 10px;
        background-color: #4caf50;
        color: #ffffff;
        border: none;
        border-radius: 5px;
        cursor: pointer;
      }

      .contact-form input[type="submit"]:hover {
        background-color: #45a049;
      }
    </style>
  </head>
  <body>
    <div class="parallax">
      <div class="overlay"></div>
      <div class="content">
        <h1>Contact Us</h1>
        <p>Feel free to reach out to us for any inquiries.</p>
        <div class="contact-form">
          <form>
            <input
              type="text"
              name="name"
              placeholder="Your Name"
              required
            /><br />
            <input
              type="email"
              name="email"
              placeholder="Your Email"
              required
            /><br />
            <textarea
              name="message"
              placeholder="Your Message"
              rows="5"
              required
            ></textarea
            ><br />
            <input type="submit" value="Submit" />
          </form>
        </div>
      </div>
    </div>

    <script>
      // JavaScript code goes here if needed
    </script>
  </body>
</html>
