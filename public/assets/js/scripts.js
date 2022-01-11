$(document).ready(function () {
  const emailRegex =
    /^([\w-\.]+)@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.)|(([\w-]+\.)+))([a-zA-Z]{2,4}|[0-9]{1,3})(\]?)$/;
  const passwordRegex = /^(?=.*\d)(?=.*[a-z])(?=.*[A-Z])(?=.*[a-zA-Z]).{8,18}$/;

  $("#RegisterLink").on("click", function (e) {
    $.ajax({
      url: "models/view_model.php",
      data: { replace: 1 },
      type: "GET",
      dataType: "json",
      success: function (data) {
        $("#loginForm").html(data);
      },
    });
  });

  $("#Login").on("submit", function (e) {
    e.preventDefault();

    let email = $("#email").val();
    let password = $("#password").val();

    if (email == "") {
      Swal.fire({
        icon: "error",
        text: "Email cannot be blank!",
      });
    } else if (!emailRegex.test(email)) {
      Swal.fire({
        icon: "error",
        text: "Please Enter a Valid Email!",
      });
    } else if (password == "") {
      Swal.fire({
        icon: "error",
        text: "Password cannot be blank!",
      });
    } else {
      $.ajax({
        url: "controllers/Login_Register_Controller.php",
        type: "POST",
        data: { email, password, Login: 1 },
        success: function (response) {
          if (response == 1) {
            Swal.fire({
              icon: "success",
              text: "Logged In Successfully!",
            }).then((result) => {
              location.reload();
            });
          } else if (response == 2) {
            Swal.fire({
              icon: "error",
              text: "Please enter a valid Email!",
            });
          } else if (response == 3) {
            Swal.fire({
              icon: "error",
              text: "Email Does not Exists!",
            });
          } else if (response == 4) {
            Swal.fire({
              icon: "error",
              text: "Incorrect Email or Password!",
            });
          } else if (response == 5) {
            Swal.fire({
              icon: "error",
              text: "Something went wrong with the server!",
            });
          }
        },
      });
    }
  });

  $(document).on("submit", "#Register", function (e) {
    e.preventDefault();

    let name = $("#name").val();
    let email = $("#email").val();
    let password = $("#password").val();

    if (name == "") {
      Swal.fire({
        icon: "error",
        text: "Name cannot be blank!",
      });
    } else if (email == "") {
      Swal.fire({
        icon: "error",
        text: "Email cannot be blank!",
      });
    } else if (!emailRegex.test(email)) {
      Swal.fire({
        icon: "error",
        text: "Please Enter a Valid Email!",
      });
    } else if (password == "") {
      Swal.fire({
        icon: "error",
        text: "Password cannot be blank!",
      });
    } else if (!passwordRegex.test(password)) {
      Swal.fire({
        icon: "error",
        text: "Password must contain 8-18 characters, 1 lower and 1 upper and 1 number!",
      });
    } else {
      $.ajax({
        url: "controllers/Login_Register_Controller.php",
        type: "POST",
        data: { name, email, password, Register: 1 },
        success: function (respose) {
          if (response == 1) {
            Swal.fire({
              icon: "success",
              text: "Account Created Successfully!",
            }).then((result) => {
              location.reload();
            });
          } else if (response == 2) {
            Swal.fire({
              icon: "error",
              text: "Name cannot be blank!",
            });
          } else if (response == 3) {
            Swal.fire({
              icon: "error",
              text: "Email cannot be blank!",
            });
          } else if (response == 4) {
            Swal.fire({
              icon: "error",
              text: "Password cannot be blank!",
            });
          } else if (response == 5) {
            Swal.fire({
              icon: "error",
              text: "Please enter a valid Email!",
            });
          } else if (response == 6) {
            Swal.fire({
              icon: "error",
              text: "Password must contain 1 upper, 1 lower, and 1 number!",
            });
          } else if (response == 7) {
            Swal.fire({
              icon: "error",
              text: "Something went wrong creating your account!",
            });
          }
        },
      });
    }
  });
});
