<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./css/bootstrap.min.css">
    <link rel="stylesheet" href="./css/style.css">
    <title>Document</title>
</head>
<body>
    <?php include('navbar.php') ?>
      <section class="hero">
          <div class="container">
              <div class="row">
                  <div class="col-md-6 m-auto">
                      <h1 style="color: #5c34c2;" class="text-center mt-5 ">Virtual Building Manager</h1>
                  </div>
              </div>
              <div class="row">
                  <div class="col-md-10 m-auto">
                      <p class="text-center mt-4 mb-5">Lorem ipsum dolor sit amet consectetur adipisicing elit. Sunt, ratione vitae explicabo nostrum nihil iusto dolore minima magnam est rem delectus officia deleniti laboriosam doloremque!
                      </p>
                  </div>
              </div>
              <div class="row d-flex">
                 <div class="custom-parent">
                    <a href="register-company.php" class="custom-btn ml-md-auto mx-3">Register Company</a>
                <a href="company-login.php" class="custom-btn mr-md-auto">Login</a>
                 </div>  
              </div>
          </div>
      </section>

      <div class="container">
          <div class="row">
              <div class="col-12">
                  <h1 style="color: #5c34c2;" class="text-center mb-3">Features</h1>
              </div>
          </div>
          <div class="row">
              <div class="col-12 mb-3">
                  <hr>
              </div>
          </div>
          <div class="row">
            <div class="col-md-4 col-sm-6 mb-5 mx-sm-0 mx-5 px-sm-3  d-flex align-items-stretch">
                    <div class="custom-card p-3">Lorem ipsum, dolor sit amet consectetur adipisicing elit. Placeat mollitia, illum ut laborum dolor iusto impedit nostrum rerum, pariatur voluptas minima corrupti quia doloribus in labore itaque. Nihil temporibus, non eos nam illum blanditiis aut accusamus, nostrum, dolore rerum aliquid?</div>
            </div>
            <div class="col-md-4 col-sm-6 mb-5 mx-sm-0 mx-5 px-sm-3  d-flex align-items-stretch">
                <div class="custom-card p-3">Lorem ipsum, dolor sit amet consectetur adipisicing elit. Placeat mollitia, illum ut laborum dolor iusto impedit nostrum rerum, pariatur voluptas minima corrupti quia doloribus in labore itaque. Nihil temporibus, non eos nam illum blanditiis aut accusamus, nostrum, dolore rerum aliquid?</div>
        </div>
        <div class="col-md-4 col-sm-6 mb-5 mx-sm-0 mx-5 px-sm-3  d-flex align-items-stretch">
            <div class="custom-card p-3">Lorem ipsum, dolor sit amet consectetur adipisicing elit. Placeat mollitia, illum ut laborum dolor iusto impedit nostrum rerum, pariatur voluptas minima corrupti quia doloribus in labore itaque. Nihil temporibus, non eos nam illum blanditiis aut accusamus, nostrum, dolore rerum aliquid?</div>
    </div>
          </div>
      </div>

      <div class="container">
        <div class="row">
            <div class="col-12">
                <h1 style="color: #5c34c2;" class="text-center mb-3 mt-3">Contact Us</h1>
            </div>
        </div>
        <div class="row">
            <div class="col-12 mb-3">
                <hr>
            </div>
        </div>
        <div class="row">
            <div class="col-md-9 m-auto">
                <form>
                    <div class="form-row">
                      <div class="form-group col-md-6">
                        <label for="inputEmail4">Name</label>
                        <input type="text" class="form-control" id="inputEmail4">
                      </div>
                      <div class="form-group col-md-6">
                        <label for="inputPassword4">Phone</label>
                        <input type="password" class="form-control" id="inputPassword4">
                      </div>
                    </div>
                    <div class="form-group">
                      <label for="inputAddress">Email</label>
                      <input type="email" class="form-control" id="inputAddress" placeholder="1234 Main St">
                    </div>
                    <div class="form-group">
                        <label for="exampleFormControlTextarea1">Message</label>
                        <textarea class="form-control" id="exampleFormControlTextarea1" rows="5"></textarea>
                      </div>
                      <div class="row">
                        <div class="col-2 ml-auto mr-auto mb-5 mt-4">
                            <button style="padding: 5px 30px;" class="custom-btns" type="submit" name="save-button" name="save-button">Send</button>
                        </div>
                    </div>
                  </form>
            </div>
        </div>
      </div>

      <div class="container">
            <div class="row">
                <div class="col-12 mb-3">
                    <hr>
                </div>
            </div>
            <div class="row">
                <div class="col">
                    <p class="text-center">Virtual Building Manager © 2021. All rights reserved</p>
                </div>
            </div>
      </div>

    
      <script src="./js/jquery.min.js"></script>
      <script src="./js/bootstrap.min.js"></script>
</body>
</html>