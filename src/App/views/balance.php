<?php include $this->resolve("partials/_header.php"); ?>

<body>

  <?php include $this->resolve("partials/_mainNav.php"); ?>

  <header>
    <?php include $this->resolve("partials/_bootNav.php"); ?>

    <!-- Modal -->
    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
      <div class="modal-dialog">
        <div class="modal-content">
          <div class="modal-header">
            <h1 class="modal-title fs-5" id="exampleModalLabel">Wybierz okres</h1>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
          </div>
          <form method="POST">
            <?php include $this->resolve("partials/_csrf.php"); ?>
            <div class="modal-body">
              <label for="start-date"> Od</label>
              <input type="date" name="begin" id="start-date">
              <label for="end-date"> Do</label>
              <input type="date" name="end" id="end-date">
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Zamknij</button>
              <input type="submit" value="Zastosuj" class="btn btn-primary" data-bs-dismiss="modal"></button>
            </div>
          </form>
        </div>
      </div>
    </div>
  </header>

  <main>
    <div class="hero">
      <div class="hero-shadow"></div>

      <div class="hero-main balance">
        <div class="wrapper">
          <div class="top">
            <h1><?= $_SESSION['title'] ?></h1>
          </div>
        </div>

        <div class="tab">
          <div class="wrapper">
            <div class="top">
              Przychody
            </div>
            <div class="bottom">
              <ul>
                <?php foreach ($incomes as $income) : ?>
                  <li>
                    <div class='amount'> <?= $income['amount']; ?></div>
                    <div class='category'> <?= $income['name']; ?></div>
                    <div class='date'> <?= $income['formatted_date']; ?></div>
                    <div class='comment'> <?= $income['income_comment']; ?></div>
                    <div class='buttons'>
                      <button class='edit'><a href="/addIncome/<?= e($income['id']); ?>"> <i class='bi bi-pencil'></i></a></button>
                      <form action="/addIncome/<?php echo e($income['id']); ?>" method="POST">
                        <input type="hidden" name="_METHOD" value="DELETE" />

                        <?php include $this->resolve("partials/_csrf.php"); ?>
                        <button type="submit" class='delete'><i class='bi bi-trash'></i></button>
                      </form>
                    </div>
                  </li>
                <?php endforeach; ?>
              </ul>
            </div>
          </div>

          <div class="wrapper">
            <div class="top">
              Wydatki
            </div>
            <div class="bottom">
              <ul>
                <?php foreach ($expenses as $expense) : ?>
                  <li>
                    <div class='amount'> <?= $expense['amount']; ?></div>
                    <div class='category'> <?= $expense['name']; ?></div>
                    <div class='date'> <?= $expense['formatted_date']; ?></div>
                    <div class='comment'> <?= $expense['expense_comment']; ?></div>
                    <div class='buttons'>
                      <button class='edit'> <a href="/addExpense/<?= e($expense['id']); ?>"> <i class='bi bi-pencil'></i></a>
                      </button>
                      <form action="/addExpense/<?php echo e($expense['id']); ?>" method="POST">
                        <input type="hidden" name="_METHOD" value="DELETE" />

                        <?php include $this->resolve("partials/_csrf.php"); ?>
                        <button type="submit" class='delete'><i class='bi bi-trash'></i></button>
                      </form>

                    </div>
                  </li>
                <?php endforeach; ?>
              </ul>
            </div>
          </div>
        </div>

        <div class="wrapper">
          <div class="top">
            bilans
          </div>
          <div class="bottom">
            <h2>Wynik: <span><?= $balance ?></span></h2>
            <?= $result ?>

          </div>
        </div>
      </div>
      <a href="#piechart"><i class="bi bi-chevron-down bounce-top"></i></a>
    </div>
  </main>

  <section class="piechart" id="piechart">
    <div class="hero">
      <div class="hero-shadow"></div>
      <div class="hero-main piechart-main">
        <h2>Na co najwięcej wydajesz?</h2>
        <div class="chart">
          <canvas id="pie"></canvas>
        </div>
      </div>
    </div>

  </section>



  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.1/jquery.min.js"> </script>
  <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
  <script>
    window.addEventListener('DOMContentLoaded', (event) => {
      const languagesData = {
        labels: [
          <?php
          foreach ($popularExpenses as $popularExpense) {
            echo "'" . $popularExpense['name'] . "',";
          }
          ?>
        ],
        datasets: [{
          data: [
            <?php
            foreach ($popularExpenses as $popularExpense) {
              echo "'" . $popularExpense['sum'] . "',";
            }
            ?>
          ],
          backgroundColor: ['#FF6384', '#36A2EB', '#FFCE56', '#4CAF50', '#9C27B0'],
        }, ],
      }
      const config = {
        type: 'pie',
        data: languagesData,
        options: {
          responsive: true,
          plugins: {
            legend: {
              position: window.innerWidth >= 576 ? 'right' : 'bottom',
            },
            title: {
              display: false,
              text: 'Wydatki',
            },
          },
        },
      }

      const ctx = document.getElementById('pie').getContext('2d')

      new Chart(ctx, config)

      document.getElementById('piechart').style.display = 'block';
    });
  </script>



  <?php include $this->resolve("partials/_footer.php"); ?>