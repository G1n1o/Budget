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
            Edytuj wydatek
          </div>
          <form method="POST" class="bottom">
            <?php include $this->resolve("partials/_csrf.php"); ?>
            <label for="amount">Kwota</label>
            <input value="<?php echo e($transaction['amount'] ?? ''); ?>" type="number" name="amount" class="input" id="price" step="0.01" placeholder="Podaj kwotę">
            <label for="date">Data</label>
            <input value="<?php echo e($transaction['formatted_date'] ?? ''); ?>" type="date" name="date" class="input" id="date">
            <label for="category">Kategoria</label>
            <select id="category" name="category">
              <option value="<?php echo e($transaction['expense_category_assigned_to_user_id'] ?? ''); ?>">
                <?php echo e($transaction['name'] ?? ''); ?>
              </option>

              <?php foreach ($_SESSION['expensesCategory'] as $expense) {
                echo "<option value={$expense['id']}>{$expense['name']}</option>";
              } ?>

            </select>
            <label for="comment">Komantarz</label>
            <input value="<?php echo e($transaction['expense_comment'] ?? ''); ?>" type="text" name="comment" class="input" id="comment" placeholder="Wpisz komentarz">

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
        <div class="classLimit">
          <div class="wrapper limit info">
            <div class="top">LIMIT</div>
            <div class="text" id="limitInfo">Wybierz kategorię</div>
          </div>
          <div class="wrapper limit value">
            <div class="top">SUMA WYDATKÓW</div>
            <div class="text" id="limitValue">Wybierz kategorię i datę</div>
          </div>
          <div class="wrapper limit left">
            <div class="top">LIMIT INFO</div>
            <div class="text" id="limitLeft">Informacja o pozostałym limicie</div>
          </div>
        </div>
      </div>
    </div>
  </main>

  <script src="/js/expenseLimit.js"></script>
  <?php include $this->resolve("partials/_footer.php"); ?>