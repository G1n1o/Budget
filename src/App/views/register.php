<?php include $this->resolve("partials/_header.php"); ?>

<body>

    <?php include $this->resolve("partials/_mainNav.php"); ?>

    <main>
        <div class="hero">
            <div class="hero-shadow"></div>
            <div class="hero-main">
                <img src="./img/budget.png" alt="budget-image">
                <div class="hero-main-text">
                    <form method="POST" class="form">
                    <?php include $this->resolve("partials/_csrf.php"); ?>
                        <h1>
                            <svg class="nav-logo-icon" fill="#fff" viewBox="0 0 1000 1000" xmlns="http://www.w3.org/2000/svg" stroke="#fff">
                                <path d="M820 257q-13-8-53-20-36-11-48-17l-4-2q-20-11-31-15-17-7-32-10-37-5-85 15-73 30-115 68t-63 91q-5 12-8 24l-4 15q-1 4-2 5.5t-6 2.5q-11 10-38 21-15 6-47.5 17T244 467q-12 7-24 21-8 9-20 27-9 14-21 46l-7 17q-4 12-11 20-4 4-13 10-6 4-8.5 7t-2.5 8q0 9 9 12t21-.5 21-12.5 16-25q5-10 12-30 8-25 13-34 10-17 25.5-26.5t35-8.5 34.5 14q14 11 20 26 3 6 7 27 5 22 9 34 6 19 15 29 16 19 39 28 25 11 56 6 24-3 46 3t32.5 17.5 5 23T527 721q-12 2-35 2h-1q-12 0-23-1-2-8-6-13.5t-8-8.5l-4-2q-20-14-49-17-26-2-51 5 7-13 5-32.5T343 624q-26-25-77-23.5T193 627q-9 11-9.5 31.5T192 690q-30-4-57 2-35 8-46 32-6 13-2 38 2 20 27.5 33t58 13 57-14 25.5-35q2-29-7-42 29 5 59-3-5 8-4 33l1 5q1 22 26 36 29 15 66 13 40-2 63-24l4-6q4-8 6-20 10 2 37 2 23 0 44.5-6.5T580 729q10-14 9-40 0-15-5.5-44t-2.5-35q16-11 48-5 19 3 54 16 21 7 27 8 34 5 74-10 29-10 58-28 18-12 23-17l10-10q37-43 39-119 2-60-21-109-25-52-73-79zM170 769q-20 0-38-6-27-9-27-26.5t26-26.5q18-6 38.5-6t38.5 6q26 9 26 26.5T208 763q-18 6-38 6zm100-89q-21 0-39-6-26-8-26-25.5t26-26.5q18-6 38.5-6t38.5 6q26 9 26 26.5T308 674q-18 6-38 6zm117 81q-21 0-39-6-26-8-26-25.5t26-26.5q18-6 38.5-6t38.5 6q26 9 26 26.5T425 755q-18 6-38 6zm194-178q-4-40-21-77-18-42-45-64-20-16-49-26-22-8-44-10-18-2-22.5.5t-5-1 5.5-9.5 16-10q13-6 29-8 39-4 73 10 39 16 63 54 16 26 20.5 54.5t-1 52T581 583z">
                                </path>
                            </svg>
                            Home<span>Budget</span>
                        </h1>
                        <!-- USERNAME -->
                        <div class="name">
                            <div class="input-icons">
                                <label for="first">First Name</label>
                                <div class="icon-center">
                                    <input class="input" name="username" type="text" id="first" value="<?= e($oldFormData['username'] ?? ''); ?>">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="30" height="30" fill="currentColor" class="bi bi-person-lines-fill" viewBox="0 0 16 16">
                                        <path d="M6 8a3 3 0 1 0 0-6 3 3 0 0 0 0 6zm-5 6s-1 0-1-1 1-4 6-4 6 3 6 4-1 1-1 1H1zM11 3.5a.5.5 0 0 1 .5-.5h4a.5.5 0 0 1 0 1h-4a.5.5 0 0 1-.5-.5zm.5 2.5a.5.5 0 0 0 0 1h4a.5.5 0 0 0 0-1h-4zm2 3a.5.5 0 0 0 0 1h2a.5.5 0 0 0 0-1h-2zm0 3a.5.5 0 0 0 0 1h2a.5.5 0 0 0 0-1h-2z" />
                                    </svg>
                                </div>
                            </div>
                            <!-- LASTNAME -->
                            <div class="input-icons">
                                <label for="last">Last Name</label>
                                <div class="icon-center">
                                    <input class="input" name="lastname" type="text" id="last" value="<?= e($oldFormData['lastname'] ?? ''); ?>">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="30" height="30" fill="currentColor" class="bi bi-person-lines-fill" viewBox="0 0 16 16">
                                        <path d="M6 8a3 3 0 1 0 0-6 3 3 0 0 0 0 6zm-5 6s-1 0-1-1 1-4 6-4 6 3 6 4-1 1-1 1H1zM11 3.5a.5.5 0 0 1 .5-.5h4a.5.5 0 0 1 0 1h-4a.5.5 0 0 1-.5-.5zm.5 2.5a.5.5 0 0 0 0 1h4a.5.5 0 0 0 0-1h-4zm2 3a.5.5 0 0 0 0 1h2a.5.5 0 0 0 0-1h-2zm0 3a.5.5 0 0 0 0 1h2a.5.5 0 0 0 0-1h-2z" />
                                    </svg>
                                </div>
                            </div>
                        </div>

                        <!-- EMAIL -->
                        <div class="input-icons">
                            <label for="email">Email</label>
                            <div class="icon-center">
                                <input class="input" name="email" type="email" id="email" value="<?= e($oldFormData['email'] ?? ''); ?>">
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="currentColor" class="bi bi-envelope-fill" viewBox="0 0 16 16">
                                    <path d="M.05 3.555A2 2 0 0 1 2 2h12a2 2 0 0 1 1.95 1.555L8 8.414.05 3.555ZM0 4.697v7.104l5.803-3.558L0 4.697ZM6.761 8.83l-6.57 4.027A2 2 0 0 0 2 14h12a2 2 0 0 0 1.808-1.144l-6.57-4.027L8 9.586l-1.239-.757Zm3.436-.586L16 11.801V4.697l-5.803 3.546Z" />
                                </svg>
                            </div>
                        </div>
                        <!-- PASSWORD -->
                        <div class="name">
                            <div class="input-icons">
                                <label for="password">Hasło</label>
                                <div class="icon-center">
                                    <input class="input" name="password" type="password" id="password" value="<?= e($oldFormData['password'] ?? ''); ?>">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="currentColor" class="bi bi-eye-fill" id="togglePassword" onclick="togglePasswordVisibility()" viewBox="0 0 16 16">
                                        <path d="M10.5 8a2.5 2.5 0 1 1-5 0 2.5 2.5 0 0 1 5 0z" />
                                        <path d="M0 8s3-5.5 8-5.5S16 8 16 8s-3 5.5-8 5.5S0 8 0 8zm8 3.5a3.5 3.5 0 1 0 0-7 3.5 3.5 0 0 0 0 7z" />
                                    </svg>
                                </div>
                            </div>

                            <div class="input-icons">
                                <label for="password">Powtórz hasło</label>
                                <div class="icon-center">
                                    <input class="input" name="confirmPassword" type="password" id="confirmPassword" value="<?= e($oldFormData['confirmPassword'] ?? ''); ?>">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="currentColor" class="bi bi-eye-fill" viewBox="0 0 16 16" id="toggleConfirmPassword" onclick="toggleConfirmPasswordVisibility()">
                                        <path d="M10.5 8a2.5 2.5 0 1 1-5 0 2.5 2.5 0 0 1 5 0z" />
                                        <path d="M0 8s3-5.5 8-5.5S16 8 16 8s-3 5.5-8 5.5S0 8 0 8zm8 3.5a3.5 3.5 0 1 0 0-7 3.5 3.5 0 0 0 0 7z" />
                                    </svg>
                                </div>
                            </div>
                        </div>

                        <?php if (!empty($errors)) : ?> <p class="error">
                                <?php foreach ($errors as $error) {
                                    echo $error[0];
                                    break;
                                } ?>
                            </p>
                        <?php endif; ?>

                        <div class="buttons">
                            <input type="submit" value="Zarejestruj" class="btn blue-btn">
                        </div>
                    </form>

                </div>
            </div>
        </div>
    </main>




    <?php include $this->resolve("partials/_footer.php"); ?>