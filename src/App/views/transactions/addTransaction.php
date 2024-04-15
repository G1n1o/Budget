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
        <div class="wrapper transaction">
          <div class="top">
            Dodaj <?= $_SERVER['REQUEST_URI'] === '/addExpense' ? 'Wydatek' : 'Przychód'; ?>
          </div>
          <form method="POST" class="bottom">
            <?php include $this->resolve("partials/_csrf.php"); ?>
            <label for="amount">Kwota</label>
            <input value="<?php echo e($oldFormData['amount'] ?? ''); ?>" type="number" name="amount" class="input" id="price" step="0.01" placeholder="Podaj kwotę">
            <label for="date">Data</label>
            <input value="<?php echo e($oldFormData['date'] ?? $_SESSION['date'] ?? ''); ?>" type="date" name="date" class="input" id="date">
            <label for="category">Kategoria</label>
            <select id="category" name="category">
              <option value="" disabled selected>--Wybierz kategorię--</option>

              <?php if ($_SERVER['REQUEST_URI'] === '/addExpense') {

                foreach ($_SESSION['expensesCategory'] as $expense) {
                  echo "<option value={$expense['id']}>{$expense['name']}</option>";
                }
              } else {

                foreach ($_SESSION['incomesCategory'] as $income) {
                  echo "<option value={$income['id']}>{$income['name']}</option>";
                }
              }
              ?>

            </select>
            <label for="comment">Komantarz</label>
            <input value="<?php echo e($oldFormData['comment'] ?? ''); ?>" type="text" name="comment" class="input" id="comment" placeholder="Wpisz komentarz">

            <?php if (!empty($errors)) : ?> <p class="error" style="color:red;font-size: 1.6rem;">
                <?php foreach ($errors as $error) {
                  echo $error[0];
                  break;
                } ?>
              </p>
            <?php endif; ?>

            <div class="buttons">
              <input type="submit" value="Dodaj" class="btn blue-btn">
            </div>


          </form>

        </div>
      </div>
    </div>
  </main>

 
  <?php include $this->resolve("partials/_footer.php"); ?>