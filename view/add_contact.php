<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <?php
            include_once './php/links_scripts.inc.php';
        ?>
        
        <title>My Contact</title>
    </head>
    <body class=" w-full h-fit min-h-screen flex flex-col justify-start place-items-center text-xl p-[5%] pt-[10%] relative" >
                <?php
                    include_once './php/response.inc.php'
                ?>
        <div class="min-h-[300px] w-[50%] max-w-[500px] min-w-[350px]">
                <a href="index.php" class="btn p-4 bg-green-500 hover:bg-green-800
                text-white absolute left-5 top-5">Back</a>
                <!-- action="<?php //$_SERVER['PHP_SELF'];?>" method="post" -->
            <!-- <form id="form" class="w-full h-fit min-h-[300px] 
                ring-2 ring-green-300 flex flex-col p-4 gap-6 rounded-lg">
                <h1 class="text-2xl font-black text text-green-500 my-3 text-center">ADD</h1>
                <label for="realname" clas="w-full">Name: <input type="text" name="realname" id="realname" class="p-2 w-full input input-success" autofocus></label>
                <label for="nickname" clas="w-full">Alias: <input type="text" name="nickname" id="nickname" class="p-2 w-full input input-success"></label>
                <label for="number" clas="w-full">Phone Number: <input type="text" name="number" id="number" class="p-2 w-full input input-success"></label>
                <button type="submit" name="add_contact" id="add_contact" class=" btn p-2 my-3 bg-green-500 hover:bg-green-800 text-white">ADD</button>
            </form> -->

            <form action="<?php $_SERVER['PHP_SELF'];?>" method="post" id="form" class="w-full h-fit min-h-[300px] 
                ring-2 ring-green-300 flex flex-col p-4 gap-6 rounded-lg">
                <h1 class="text-2xl font-black text text-green-500 my-3 text-center">ADD</h1>
                <label for="realname" clas="w-full">Name: <input type="text" name="realname" id="realname" class="p-2 w-full input input-success" autofocus></label>
                <label for="nickname" clas="w-full">Alias: <input type="text" name="nickname" id="nickname" class="p-2 w-full input input-success"></label>
                <label for="number" clas="w-full">Phone Number: <input type="text" name="number" id="number" class="p-2 w-full input input-success"></label>
                <button type="submit" name="add_contact" id="add_contact" class=" btn p-2 my-3 bg-green-500 hover:bg-green-800 text-white">ADD</button>
            </form>
        </div>
    </body>
</html>
