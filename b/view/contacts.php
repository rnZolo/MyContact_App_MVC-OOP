<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <script src="https://cdn.tailwindcss.com"></script>
        <link href="https://cdn.jsdelivr.net/npm/daisyui@3.5.1/dist/full.css" rel="stylesheet" type="text/css" />
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.0/jquery.min.js" integrity="sha512-3gJwYpMe3QewGELv8k/BX9vcqhryRdzRMxVfq6ngyWXwo03GFEzjsUm8Q7RZcHPHksttq7/GFoxjCVUjkjvPdw==" 
            crossorigin="anonymous" referrerpolicy="no-referrer"></script>
        <script src="https://cdn.tailwindcss.com"></script>
        <link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/toastify-js/src/toastify.min.css">
        <script type="text/javascript" src="https://cdn.jsdelivr.net/npm/toastify-js"></script>
        <script src="./js/delete_button.js" defer></script>
        <title>My Contact</title>

    </head>
    <body class=" w-full h-fit min-h-screen flex flex-col justify-start gap-8 text-xl p-[5%] pt-[10%] relative" >
        <table  class="table table-zebra max-w-[100%] text-lg text-white">
                <?php
                    include_once './php/response.inc.php'
                ?>
            <form action="<?php $_SERVER['PHP_SELF'];?>" method="post" class="relative">
                <button type="submit" name="add_btn" class="btn bg-green-500 hover:bg-green-800 text-white absolute right-4 top-4">Add +</button>
            </form>

            </form>
            <thead >
                <tr class="bg-zinc-900">
                    <th class="text-2xl text-white text-center">NO.</th>
                    <th class="text-2xl text-white text-center">Name</th>
                    <th class="text-2xl text-white text-center">Alias</th>
                    <th class="text-2xl text-white text-center">Phone #</th>
                    <th class="text-2xl text-white text-center">Action</th>
                </tr>
            </thead>
            <tbody >
                <?php
                    $count = 1;
                    while($row = $datas->fetch_assoc()){
                        $i = self::inc($row['contact_id']);
                        echo '<tr class="w-full">
                                <th class="text-center">'.$count.'</th>
                                <td class="text-left">'.$row['contact_name'].'</td>
                                <td class="text-center">'.$row['contact_nickname'].'</td>
                                <td class="text-center">'.$row['contact_number'].'</td>
                                <td class=" text-center flex gap-3 justify-center">
                                <a href="?update='.$i.'" class="btn w-fit bg-yellow-600 hover:bg-yellow-800 text-white" >Update</a>
                                <span class="delBtn btn bg-red-600 hover:bg-red-800 text-white">DELETE</span>
                                <div class"confirm flex gap-6 relative m-1" style="display: none;">
                                    <a href="?del='.$i.'" class="btn sure-del w-fit bg-orange-600 hover:bg-orange-800 text-white">Confirm</a>
                                    <span  class="close-del btn bg-green-500 hover:bg-green-800 text-white absolute ">Cancel</span>                              
                                </div>
                                </td>
                            </tr>'; 
                        $count++;
                    }
                    self::disconnect();
                ?>
            </tbody>
        </table>

    </body>
</html>
