<nav class="navbar navbar-expand-md navbar-dark bg-dark">
  <div class="container-fluid">
    <button class="navbar-toggler collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#navbarsExample08" aria-controls="navbarsExample08" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>

    <div class="navbar-collapse justify-content-md-center collapse" id="navbarsExample08">
      <ul class="navbar-nav" id="navList">
        <li class="nav-item">
          <a class="nav-link" href="/addIncome"><i class=" bi bi-cash-coin"></i>Dodaj przychód</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" aria-current="page" href="/addExpense"><i class="bi bi-basket"></i>Dodaj wydatek</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="/balance"><i class="bi bi-bar-chart"></i>Przeglądaj bilans</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="/settings"><i class="bi bi-gear"></i>Ustawienia</a>
        </li>

        <li id="hiddenOption" class="nav-item dropdown hide">
          <a class="nav-link dropdown-toggle" href="#" data-bs-toggle="dropdown" aria-expanded="false">Wybierz
            okres</a>
          <ul class="dropdown-menu">
            <li><a class="dropdown-item" href="/currentMonth">Bieżący miesiąc</a></li>
            <li><a class="dropdown-item" href="/previousMonth">Poprzedni miesiąc</a></li>
            <li><a class="dropdown-item" href="/currentYear">Obecny rok</a></li>
            <li><a class="dropdown-item" href="#exampleModal" data-bs-toggle="modal">Niestandardowy</a></li>
          </ul>
        </li>

      </ul>
    </div>
  </div>
</nav>