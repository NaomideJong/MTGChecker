<?php include __DIR__ . '/../header.php';?>
<?php include __DIR__ . '/../../private/loginhandler.php' ?>
<div class="px-4 py-2 flex flex-col items-center justify-center">
    <div class="flex flex-col justify-center shadow-md px-4 sm:px-6 md:px-8 lg:px-10">
        <div class="self-center font-bold text-3xl text-white pb-2">
            Welcome back!
        </div>

        <div class="flex justify-center border-white rounded border-2 border-solid">
            <?php include __DIR__ . '/../../private/error.php' ?>
            <form method="post" action="loginhandler.php" >
                <div class="flex flex-col mt-2 mb-5">
                    <label for="username" class="mb-1 sm:text-sm text-xs text-white">
                        User Name:
                    </label>
                    <input type="text" class="px-3 py-1 text-sm placeholder-gray-500 rounded"
                           name="username" id="username" placeholder="Username">
                </div>
                <div class="flex flex-col mb-5">
                    <label for="password" class="mb-1 text-xs sm:text-sm text-white">
                        Password:
                    </label>
                    <input type="password"  class="px-3 py-1 text-sm placeholder-gray-500 rounded"
                           name="password" id="password" placeholder="Password">
                </div>

                <div class="flex flex-col w-full mb-2">
                    <button type="submit" name="loginbutton" value="Login"
                            class="py-1 text-sm sm:text-base bg-gradient-to-br from-cyan-500 to-blue-500 text-black rounded">
                        Log In
                    </button>
                </div>
            </form>
        </div>
    </div>
    <div class="flex justify-center items-center my-2">
        <a href="/home/register" target="blank"
           class="items-center text-white font-medium text-sm text-center">
            Don't have an account? <br/>
            <span class="font-semibold underline">
                Register here!
            </span>
        </a>
    </div>
</div>

<?php include __DIR__ . '/../footer.php';?>

