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
    <body class=" w-full h-fit min-h-screen flex flex-col justify-start gap-8 text-xl p-[5%] pt-[10%] relative" >
        <table  class="table table-zebra max-w-[100%] text-lg text-white ">
                <?php
                    include_once './php/response.inc.php'
                ?>
            <form action="<?php $_SERVER['PHP_SELF'];?>" method="post" class="relative">
                <button type="submit" name="add_btn" class="btn bg-green-500 hover:bg-green-800 text-white absolute right-4 top-4">Add +</button>
            </form>
            <div class="w-full flex justify-start gap-3">
            <form  action="<?php $_SERVER['PHP_SELF'];?>" method="post" id="search" class="flex fle-wrap h-fit relative">
                    <input type="text" placeholder="Search here" name="search" id="s_val" class="input input-bordered input-primary w-fit min-w-[300px] max-w-fit" />
                        <button type="submit" name="search_btn" id="search_btn" class="max-w-[100px] btn bg-violet-800 hover:bg-violet-600 text-white">Search</button>
                        <a href="." class="max-w-[100px] btn bg-violet-800 hover:bg-violet-600 text-white"><i class="bi bi-arrow-clockwise"></i></a>
            </form> 
            </div>
            <thead >
            <span class="page ml-auto"></span>
                <tr class="bg-zinc-900">
                    <th class="text-2xl text-white text-center">NO.</th>
                    <th class="text-2xl text-white text-center">Name</th>
                    <th class="text-2xl text-white text-center">Alias</th>
                    <th class="text-2xl text-white text-center">Phone #</th>
                    <th class="text-2xl text-white text-center">Action</th>
                </tr>
            </thead>
            <tbody class="">
                <?php
                    $count = 1;
                    while($row = $datas->fetch_assoc()){
                        $i = self::inc($row['contact_id']);
                        echo '<tr class="data w-full h-[100px] max-h-[100px]">
                                <th class="text-center  h-[100px] max-h-[100px]">'.$count.'</th>
                                <td class="text-left  h-[100px] max-h-[100px]">'.$row['contact_name'].'</td>
                                <td class="text-center  h-[100px] max-h-[100px]">'.$row['contact_nickname'].'</td>
                                <td class="text-center  h-[100px] max-h-[100px]">'.$row['contact_number'].'</td>
                                <td class=" text-center flex gap-3 justify-center  h-[100px] max-h-[100px]">
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
