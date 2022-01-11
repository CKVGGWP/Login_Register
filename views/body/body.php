<body>

    <?php $id = isset($_SESSION['user']) ? $_SESSION['user'] : ''; ?>

    <main class="container d-flex justify-content-center align-items-center vh-100">
        <?php ?>
        <div class="col-md-3 col-lg-3"></div>
        <div class="col-md-6 col-lg-6 justify-content-center align-items-center">
            <?php if (empty($id)) : ?>
                <div class="card" id="loginPanel">
                    <div class="card-header text-center">
                        <strong>
                            <i class="fas fa-sign-in-alt"></i>
                            <span>Login/Register</span>
                        </strong>
                    </div>
                    <div class="card-body">
                        <div class="col-md-12" id="loginForm">
                            <form method="POST" class="clearfix" id="Login">
                                <div class="form-group">
                                    <div class="input-group mb-3">
                                        <span class="input-group-text">
                                            <i class="fas fa-envelope"></i>
                                        </span>
                                        <input type="email" id="email" class="form-control">
                                    </div>
                                    <div class="input-group mb-3">
                                        <span class="input-group-text">
                                            <i class="fas fa-lock"></i>
                                        </span>
                                        <input type="password" id="password" class="form-control">
                                    </div>
                                    <button type="submit" class="btn btn-primary">Login</button>
                                    <div class="text-center">
                                        <a href="#" id="RegisterLink">Register Here</a>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>

            <?php else : ?>

                <div class="card" id="loginPanel">
                    <div class="card-header text-center">
                        <strong>
                            <i class="fas fa-user"></i>
                            <span>Hello, Name</span>
                        </strong>
                    </div>
                    <div class="card-body">
                        <table class="table table-condensed table-responsive table-striped">
                            <thead>
                                <tr>
                                    <th class="text-center" colspan="2">Information</th>
                                </tr>
                                <tr>
                                    <th class="text-center">Name</th>
                                    <th class="text-center">Email Address</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td></td>
                                    <td></td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>

            <?php endif ?>
        </div>
        <div class="col-md-3 col-lg-3"></div>
    </main>
</body>