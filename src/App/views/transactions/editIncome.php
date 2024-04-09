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
            Edytuj przychód
          </div>
          <form method="POST" class="bottom">
            <?php include $this->resolve("partials/_csrf.php"); ?>
            <label for="amount">Kwota</label>
            <input value="<?php echo e($transaction['amount'] ?? ''); ?>" type="number" name="amount" class="input" id="price" step="0.01" placeholder="Podaj kwotę">
            <label for="date">Data</label>
            <input value="<?php echo e($transaction['formatted_date'] ?? ''); ?>" type="date" name="date" class="input" id="date">
            <label for="category">Kategoria</label>
            <select id="category" name="category">
              <option value="<?php echo e($transaction['income_category_assigned_to_user_id'] ?? ''); ?>">
              <?php echo e($transaction['name'] ?? ''); ?>
              </option>

              <?php foreach ($_SESSION['incomesCategory'] as $income) {
                echo "<option value={$income['id']}>{$income['name']}</option>";
              }
              ?>

            </select>
            <label for="comment">Komantarz</label>
            <input value="<?php echo e($transaction['income_comment'] ?? ''); ?>" type="text" name="comment" class="input" id="comment" placeholder="Wpisz komentarz">

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