<?php include $this->resolve("partials/_header.php"); ?>

<body>

  <?php include $this->resolve("partials/_mainNav.php"); ?>

  <header>
    <?php include $this->resolve("partials/_bootNav.php"); ?>
  </header>

  <main>
    <div class="hero">
      <div class="hero-shadow"></div>
      <div class="hero-main">


        <div class="container">

          <div class="accordion" id="accordionExample">

            <div class="accordion-item">
              <h2 class="accordion-header" id="headingOne">
                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseOne" aria-expanded="false" aria-controls="collapseOne">
                  Edycja Kategorii Przychodów
                </button>
              </h2>
              <div id="collapseOne" class="accordion-collapse collapse" aria-labelledby="headingOne" data-bs-parent="#accordionExample">
                <div class="accordion-body">

                  <div class="accordion" id="accordionExampleOne">

                    <div class="accordion-item">
                      <h2 class="accordion-header" id="headingOneOne">
                        <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseOneOne" aria-expanded="false" aria-controls="collapseOneOne">
                          Dodaj nową kategorię
                        </button>
                      </h2>
                      <div id="collapseOneOne" class="accordion-collapse collapse" aria-labelledby="headingOneOne" data-bs-parent="#accordionExampleOne">
                        <div class="accordion-body">

                          <form method="POST" action="/addNewIncomeCategory">
                            <?php include $this->resolve("partials/_csrf.php"); ?>
                            <div class="form-floating mb-3">
                              <input type="text" name="newCategory" class="form-control" id="floatingInput">
                              <label for="floatingInput">Podaj nazwę nowej kategorii</label>
                            </div>
                            <?php if (!empty($errors)) : ?> <p class="error">
                                <?php foreach ($errors as $error) {
                                  echo $error[0];
                                  break;
                                } ?>
                              </p>
                            <?php endif; ?>
                            <button class="btn blue-btn" type="submit">Dodaj</button>

                          </form>


                        </div>
                      </div>
                    </div>

                    <div class="accordion-item">
                      <h2 class="accordion-header" id="headingOneTwo">
                        <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseOneTwo" aria-expanded="false" aria-controls="collapseOneTwo">
                          Edytuj istniejącą kategorię
                        </button>
                      </h2>
                      <div id="collapseOneTwo" class="accordion-collapse collapse" aria-labelledby="headingOneTwo" data-bs-parent="#accordionExampleOne">
                        <div class="accordion-body">

                          <form method="POST" action="/editIncomeCategory">
                            <?php include $this->resolve("partials/_csrf.php"); ?>
                            <select id="incomeCategory" name="category" class="form-select" aria-label="Default select example">
                              <option value="" disabled selected>--Wybierz kategorię--</option>
                              <?php foreach ($_SESSION['incomesCategory'] as $income) {
                                echo "<option value={$income['id']}>{$income['name']}</option>";
                              }
                              ?>
                            </select>

                            <div class="form-floating mb-3">
                              <input type="text" name="newNameCategory" class="form-control" id="floatingInput" required>
                              <label for="floatingInput">Nowa nazwa kategorii</label>
                            </div>
                            <button class="btn blue-btn" type="submit">Zamień</button>
                          </form>

                        </div>
                      </div>
                    </div>

                    <div class="accordion-item">
                      <h2 class="accordion-header" id="headingOneThree">
                        <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseOneThree" aria-expanded="false" aria-controls="collapseOneThree">
                          Usuń wybraną kategorię
                        </button>
                      </h2>
                      <div id="collapseOneThree" class="accordion-collapse collapse" aria-labelledby="headingOneThree" data-bs-parent="#accordionExampleOne">
                        <div class="accordion-body">
                          <form method="POST" action="/deleteIncomeCategory">
                            <?php include $this->resolve("partials/_csrf.php"); ?>
                            <select id="incomeCategory" name="category" class="form-select" aria-label="Default select example">
                              <option value="" disabled selected>--Wybierz kategorię--</option>
                              <?php foreach ($_SESSION['incomesCategory'] as $income) {
                                echo "<option value={$income['id']}>{$income['name']}</option>";
                              } ?>
                            </select>
                            <button class="btn blue-btn" type="submit">Usuń</button>
                          </form>
                        </div>
                      </div>
                    </div>

                  </div>


                </div>
              </div>
            </div>

            <div class="accordion-item">
              <h2 class="accordion-header" id="headingTwo">
                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                  Edycja Kategorii Wydatków
                </button>
              </h2>
              <div id="collapseTwo" class="accordion-collapse collapse" aria-labelledby="headingTwo" data-bs-parent="#accordionExample">
                <div class="accordion-body">


                  <div class="accordion" id="accordionExampleTwo">

                    <div class="accordion-item">
                      <h2 class="accordion-header" id="headingTwoOne">
                        <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseTwoOne" aria-expanded="false" aria-controls="collapseTwoOne">
                          Dodaj nową kategorię
                        </button>
                      </h2>
                      <div id="collapseTwoOne" class="accordion-collapse collapse" aria-labelledby="headingTwoOne" data-bs-parent="#accordionExampleTwo">
                        <div class="accordion-body">
                          <form method="POST" action="/addNewExpenseCategory">
                            <?php include $this->resolve("partials/_csrf.php"); ?>
                            <div class="form-floating mb-3">
                              <input type="text" name="newCategory" class="form-control" id="floatingInput">
                              <label for="floatingInput">Podaj nazwę nowej kategorii</label>
                            </div>
                            <?php if (!empty($errors)) : ?> <p class="error">
                                <?php foreach ($errors as $error) {
                                  echo $error[0];
                                  break;
                                } ?>
                              </p>
                            <?php endif; ?>
                            <button class="btn blue-btn" type="submit">Dodaj</button>
                          </form>
                        </div>
                      </div>
                    </div>

                    <div class="accordion-item">
                      <h2 class="accordion-header" id="headingTwoTwo">
                        <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseTwoTwo" aria-expanded="false" aria-controls="collapseTwoTwo">
                          Edytuj istniejącą kategorię
                        </button>
                      </h2>
                      <div id="collapseTwoTwo" class="accordion-collapse collapse" aria-labelledby="headingTwoTwo" data-bs-parent="#accordionExampleTwo">
                        <div class="accordion-body">
                          <form method="POST" action="/editExpenseCategory">
                            <?php include $this->resolve("partials/_csrf.php"); ?>
                            <select id="expenseCategory" name="category" class="form-select" aria-label="Default select example">
                              <option value="" disabled selected>--Wybierz kategorię--</option>
                              <?php foreach ($_SESSION['expensesCategory'] as $expense) {
                                echo "<option value={$expense['id']}>{$expense['name']}</option>";
                              } ?>
                            </select>
                            <div class="form-floating mb-3">
                              <input type="text" name="newNameCategory" class="form-control" id="floatingInput" required>
                              <label for="floatingInput">Nowa nazwa kategorii</label>
                            </div>
                            <button class="btn blue-btn" type="submit">Zamień</button>
                          </form>
                        </div>
                      </div>
                    </div>

                    <div class="accordion-item">
                      <h2 class="accordion-header" id="headingTwoThree">
                        <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseTwoThree" aria-expanded="false" aria-controls="collapseTwoThree">
                          Dodaj/edytuj limit dla kategorii
                        </button>
                      </h2>
                      <div id="collapseTwoThree" class="accordion-collapse collapse" aria-labelledby="headingTwoThree" data-bs-parent="#accordionExampleTwo">
                        <div class="accordion-body">
                          <form method="POST" action="/editLimitForCategory">
                            <?php include $this->resolve("partials/_csrf.php"); ?>
                            <select id="expenseLimitCategory" name="category" class="form-select" aria-label="Default select example">
                              <option value="" disabled selected>--Wybierz kategorię--</option>
                              <?php foreach ($_SESSION['expensesCategory'] as $expense) {
                                echo "<option value={$expense['id']}>{$expense['name']}</option>";
                              } ?>
                            </select>
                            <div class="form-floating mb-3">
                              <input type="text" name="newLimit" class="form-control" id="floatingLimitInput">
                              <label for="floatingLimitInput">Wartość limitu</label>
                            </div>
                            <button class="btn blue-btn" type="submit">Zapisz</button>
                          </form>
                        </div>
                      </div>
                    </div>

                    <div class="accordion-item">
                      <h2 class="accordion-header" id="headingTwoFour">
                        <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseTwoFour" aria-expanded="false" aria-controls="collapseTwoFour">
                          Usuń wybraną katogrię
                        </button>
                      </h2>
                      <div id="collapseTwoFour" class="accordion-collapse collapse" aria-labelledby="headingTwoFour" data-bs-parent="#accordionExampleTwo">
                        <div class="accordion-body">
                          <form method="POST" action="/deleteExpenseCategory">
                            <?php include $this->resolve("partials/_csrf.php"); ?>
                            <select id="expenseCategory" name="category" class="form-select" aria-label="Default select example">
                              <option value="" disabled selected>--Wybierz kategorię--</option>
                              <?php foreach ($_SESSION['expensesCategory'] as $expense) {
                                echo "<option value={$expense['id']}>{$expense['name']}</option>";
                              } ?>
                            </select>
                            <button class="btn blue-btn" type="submit">Usuń</button>
                          </form>
                        </div>
                      </div>
                    </div>

                  </div>
                </div>
              </div>
            </div>

            <div class="accordion-item">
              <h2 class="accordion-header" id="headingThree">
                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
                  Edycja Ustawień Konta
                </button>
              </h2>
              <div id="collapseThree" class="accordion-collapse collapse" aria-labelledby="headingThree" data-bs-parent="#accordionExample">
                <div class="accordion-body">
                  <div class="accordion" id="accordionExampleThree">

                    <div class="accordion-item">
                      <h2 class="accordion-header" id="headingThreeOne">
                        <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseThreeOne" aria-expanded="false" aria-controls="collapseThreeOne">
                          Zmiana danych użytkownika
                        </button>
                      </h2>
                      <div id="collapseThreeOne" class="accordion-collapse collapse" aria-labelledby="headingThreeOne" data-bs-parent="#accordionExampleThree">
                        <div class="accordion-body">

                          <form method="POST" action="/changeUserData">
                            <?php include $this->resolve("partials/_csrf.php"); ?>
                            <div class="form-floating mb-3">
                              <input value="<?= $user['user_name']; ?>" type="text" name="username" class="form-control" id="floatingInput">
                              <label for="floatingInput">Imię</label>
                            </div>
                            <div class="form-floating mb-3">
                              <input value="<?= $user['last_name']; ?>" type="text" name="lastname" class="form-control" id="floatingInput">
                              <label for="floatingInput">Nazwisko</label>
                            </div>
                            <div class="form-floating mb-3">
                              <input value="<?= e($oldFormData['email'] ?? $user['email']); ?>" type="text" name="email" class="form-control" id="floatingInput">
                              <label for="floatingInput">Email</label>
                            </div>
                            <?php if (!empty($errors)) : ?> <p class="error">
                                <?php foreach ($errors as $error) {
                                  echo $error[0];
                                  break;
                                } ?>
                              </p>
                            <?php endif; ?>
                            <button class="btn blue-btn" type="submit">Zapisz</button>
                          </form>


                        </div>
                      </div>
                    </div>

                    <div class="accordion-item">
                      <h2 class="accordion-header" id="headingThreeTwo">
                        <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseThreeTwo" aria-expanded="false" aria-controls="collapseThreeTwo">
                          Zmiana hasła
                        </button>
                      </h2>
                      <div id="collapseThreeTwo" class="accordion-collapse collapse" aria-labelledby="headingThreeTwo" data-bs-parent="#accordionExampleThree">
                        <div class="accordion-body">
                          <form method="POST" action="/changeUserPassword">
                            <?php include $this->resolve("partials/_csrf.php"); ?>
                            <div class="form-floating mb-3">
                              <input type="password" name="newPassword" class="form-control" id="floatingInput">
                              <label for="floatingInput">Podaj nowe hasło</label>
                            </div>
                            <div class="form-floating mb-3">
                              <input type="password" name="confirmNewPassword" class="form-control" id="floatingInput">
                              <label for="floatingInput">Powtórz hasło</label>
                            </div>
                            <?php if (!empty($errors)) : ?> <p class="error">
                                <?php foreach ($errors as $error) {
                                  echo $error[0];
                                  break;
                                } ?>
                              </p>
                            <?php endif; ?>
                            <button class="btn blue-btn" type="submit">Zapisz</button>
                          </form>
                        </div>
                      </div>
                    </div>

                  </div>
                </div>
              </div>
            </div>

          </div>
        </div>
      </div>
    </div>
  </main>


  <script src="/js/limit.js"></script>
  <?php include $this->resolve("partials/_footer.php"); ?>