<nav class="flex items-center py-5 mb-5 border-b border-gray-100 shodow">
    <div class="container flex items-center justify-between px-3 mx-auto max-w-7xl md:px-0">
        <ul class="flex items-center gap-3 sm:flex-wrap md:flex-nowrap">
            <li>
                <a href="./form.php" class="inline-block my-3 font-medium text-gray-600 transition-colors hover:underline hover:text-gray-900">Formulaire</a>
            </li>
            <li>

                <a href="./operator.php" class="inline-block my-3 font-medium text-gray-600 transition-colors hover:underline hover:text-gray-900">Operator</a>
            </li>
            <li>

                <a href="./poo.php" class="inline-block my-3 font-medium text-gray-600 transition-colors hover:underline hover:text-gray-900">POO</a>
            </li>
            <li>

                <a href="./games.php" class="inline-block my-3 font-medium text-gray-600 transition-colors hover:underline hover:text-gray-900">Games</a>
            </li>
            <li>

                <a href="./chat.php" class="inline-block my-3 font-medium text-gray-600 transition-colors hover:underline hover:text-gray-900">Chat</a>
            </li>
        </ul>
        <ul class="flex items-center gap-3 sm:flex-wrap md:flex-nowrap">

            <?php if (!isset($_SESSION['user'])) : ?>
                <li>

                    <a href="./signin.php" class="inline-block my-3 font-medium text-gray-600 transition-colors hover:underline hover:text-gray-900">Login</a>
                </li>
                <li>

                    <a href="./signup.php" class="inline-block my-3 font-medium text-gray-600 transition-colors hover:underline hover:text-gray-900">Signin</a>
                </li>

            <?php else : ?>
                <li>
                    <a href="./profile.php" class="inline-block my-3 font-medium text-gray-600 transition-colors hover:underline hover:text-gray-900">Profile</a>
                </li>
                <li>
                    <a href="./deconnection.php" class="inline-block my-3 font-medium text-gray-600 transition-colors hover:underline hover:text-gray-900">Se deconnecter</a>
                </li>
            <?php endif; ?>
        </ul>
    </div>
</nav>