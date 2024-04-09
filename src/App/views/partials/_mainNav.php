<nav class="nav">
    <div class="nav-logo">
        <svg class="nav-logo-icon" fill="#fff" viewBox="0 0 1000 1000" xmlns="http://www.w3.org/2000/svg" stroke="#fff">
            <g id="SVGRepo_bgCarrier" stroke-width="0"></g>
            <g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g>
            <g id="SVGRepo_iconCarrier">
                <path d="M820 257q-13-8-53-20-36-11-48-17l-4-2q-20-11-31-15-17-7-32-10-37-5-85 15-73 30-115 68t-63 91q-5 12-8 24l-4 15q-1 4-2 5.5t-6 2.5q-11 10-38 21-15 6-47.5 17T244 467q-12 7-24 21-8 9-20 27-9 14-21 46l-7 17q-4 12-11 20-4 4-13 10-6 4-8.5 7t-2.5 8q0 9 9 12t21-.5 21-12.5 16-25q5-10 12-30 8-25 13-34 10-17 25.5-26.5t35-8.5 34.5 14q14 11 20 26 3 6 7 27 5 22 9 34 6 19 15 29 16 19 39 28 25 11 56 6 24-3 46 3t32.5 17.5 5 23T527 721q-12 2-35 2h-1q-12 0-23-1-2-8-6-13.5t-8-8.5l-4-2q-20-14-49-17-26-2-51 5 7-13 5-32.5T343 624q-26-25-77-23.5T193 627q-9 11-9.5 31.5T192 690q-30-4-57 2-35 8-46 32-6 13-2 38 2 20 27.5 33t58 13 57-14 25.5-35q2-29-7-42 29 5 59-3-5 8-4 33l1 5q1 22 26 36 29 15 66 13 40-2 63-24l4-6q4-8 6-20 10 2 37 2 23 0 44.5-6.5T580 729q10-14 9-40 0-15-5.5-44t-2.5-35q16-11 48-5 19 3 54 16 21 7 27 8 34 5 74-10 29-10 58-28 18-12 23-17l10-10q37-43 39-119 2-60-21-109-25-52-73-79zM170 769q-20 0-38-6-27-9-27-26.5t26-26.5q18-6 38.5-6t38.5 6q26 9 26 26.5T208 763q-18 6-38 6zm100-89q-21 0-39-6-26-8-26-25.5t26-26.5q18-6 38.5-6t38.5 6q26 9 26 26.5T308 674q-18 6-38 6zm117 81q-21 0-39-6-26-8-26-25.5t26-26.5q18-6 38.5-6t38.5 6q26 9 26 26.5T425 755q-18 6-38 6zm194-178q-4-40-21-77-18-42-45-64-20-16-49-26-22-8-44-10-18-2-22.5.5t-5-1 5.5-9.5 16-10q13-6 29-8 39-4 73 10 39 16 63 54 16 26 20.5 54.5t-1 52T581 583z">
                </path>
            </g>
        </svg>
        <a href="/balance">Home<span>Budget</span></a>
    </div>
    <?php if (isset($_SESSION['user'])) : ?>
        <div class="nav-buttons one">
            <div class="nav-user">
                Zalogowany: <?= $_SESSION['userName']; ?>
            </div>

            <a href="/logout"> <button class="log-out">
                    <svg viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">


                        <path fill-rule="evenodd" clip-rule="evenodd" d="M19 23H11C10.4477 23 10 22.5523 10 22C10 21.4477 10.4477 21 11 21H19C19.5523 21 20 20.5523 20 20V4C20 3.44772 19.5523 3 19 3L11 3C10.4477 3 10 2.55229 10 2C10 1.44772 10.4477 1 11 1L19 1C20.6569 1 22 2.34315 22 4V20C22 21.6569 20.6569 23 19 23Z" fill="#fff"></path>
                        <path fill-rule="evenodd" clip-rule="evenodd" d="M2.48861 13.3099C1.83712 12.5581 1.83712 11.4419 2.48862 10.6902L6.66532 5.87088C7.87786 4.47179 10.1767 5.32933 10.1767 7.18074L10.1767 9.00001H16.1767C17.2813 9.00001 18.1767 9.89544 18.1767 11V13C18.1767 14.1046 17.2813 15 16.1767 15L10.1767 15V16.8193C10.1767 18.6707 7.87786 19.5282 6.66532 18.1291L2.48861 13.3099ZM4.5676 11.3451C4.24185 11.7209 4.24185 12.2791 4.5676 12.6549L8.1767 16.8193V14.5C8.1767 13.6716 8.84827 13 9.6767 13L16.1767 13V11L9.6767 11C8.84827 11 8.1767 10.3284 8.1767 9.50001L8.1767 7.18074L4.5676 11.3451Z" fill="#fff"></path>

                    </svg>
                    Wyloguj</button></a>
        </div>


    <?php else : ?>
        <div class="nav-buttons">
            <a href="/register">
                <button class="signup">
                    <svg version="1.1" id="_x32_" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" viewBox="-46.08 -46.08 604.16 604.16" xml:space="preserve" fill="#000000" stroke="#000000" stroke-width="0.00512">
                        <g>
                            <path class="st0" d="M259.993,460.958c14.498,14.498,75.487-23.002,89.985-37.492l59.598-59.606l-52.494-52.485l-59.597,59.597 C282.996,385.462,245.504,446.46,259.993,460.958z">
                            </path>
                            <path class="st0" d="M493.251,227.7c-14.498-14.49-37.996-14.49-52.485,0l-71.68,71.678l52.494,52.486l71.671-71.68 C507.741,265.695,507.741,242.198,493.251,227.7z M399.586,308.882l-9.008-8.999l50.18-50.18l8.991,8.99L399.586,308.882z">
                            </path>
                            <path class="st0" d="M374.714,448.193c-14.071,14.055-67.572,51.008-104.791,51.008c-0.008,0,0,0-0.008,0 c-17.47,0-28.484-7.351-34.648-13.516c-44.758-44.775,36.604-138.56,37.492-139.439l4.123-4.124 c-3.944-4.354-5.644-10.348-5.644-22.302c0-8.836,0-25.256,0-40.403c11.364-12.619,15.497-11.048,25.103-60.596 c19.433,0,18.178-25.248,27.34-47.644c7.479-18.238,1.212-25.632-5.072-28.655c5.14-66.463,5.14-112.236-70.296-126.435 c-27.349-23.438-68.606-15.48-88.158-11.57c-19.536,3.911-37.159,0-37.159,0l3.355,31.49 C97.74,70.339,112.05,116.112,107.44,142.923c-5.994,3.27-11.407,10.809-4.269,28.254c9.17,22.396,7.906,47.644,27.339,47.644 c9.614,49.548,13.747,47.976,25.111,60.596c0,15.148,0,31.567,0,40.403c0,25.248-8.58,25.684-28.134,36.612 c-47.14,26.35-108.572,41.659-119.571,124.01C5.902,495.504,92.378,511.948,213.434,512 c121.04-0.052,207.524-16.496,205.518-31.558c-3.168-23.702-10.648-41.547-20.68-55.806L374.714,448.193z">
                            </path>
                        </g>
                    </svg>
                    Zarejestruj
                </button>
            </a>
            <a href="/login"> <button class="login">
                    <svg viewBox="0 0 512 512" version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" fill="#000000">
                        <title>log-in</title>
                        <g id="Page-1" stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                            <g id="icon" fill="#ffffff" transform="translate(42.666667, 42.666667)">
                                <path d="M405.333333,3.55271368e-14 L405.333333,426.666667 L170.666667,426.666667 L170.666667,341.333333 L213.333333,341.333333 L213.333333,384 L362.666667,384 L362.666667,42.6666667 L213.333333,42.6666667 L213.333333,85.3333333 L170.666667,85.3333333 L170.666667,3.55271368e-14 L405.333333,3.55271368e-14 Z M74.6666667,138.666667 C108.491057,138.666667 137.06239,161.157677 146.241432,192.000465 L320,192 L320,234.666667 L298.666667,234.666667 L298.666667,277.333333 L234.666667,277.333333 L234.666667,234.666667 L146.241432,234.666202 C137.06239,265.508989 108.491057,288 74.6666667,288 C33.4294053,288 7.10542736e-15,254.570595 7.10542736e-15,213.333333 C7.10542736e-15,172.096072 33.4294053,138.666667 74.6666667,138.666667 Z M74.6666667,181.333333 C56.9935547,181.333333 42.6666667,195.660221 42.6666667,213.333333 C42.6666667,231.006445 56.9935547,245.333333 74.6666667,245.333333 C92.3397787,245.333333 106.666667,231.006445 106.666667,213.333333 C106.666667,195.660221 92.3397787,181.333333 74.6666667,181.333333 Z" id="Combined-Shape"> </path>
                            </g>
                        </g>

                    </svg>
                    Zaloguj</button></a>
        </div>
    <?php endif; ?>
</nav>