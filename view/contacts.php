<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <script src="https://cdn.tailwindcss.com"></script>
        <link href="https://cdn.jsdelivr.net/npm/daisyui@3.5.1/dist/full.css" rel="stylesheet" type="text/css" />
        <script src="https://cdn.tailwindcss.com"></script>
        <title>My Contact</title>
    </head>
    <body class=" w-full h-fit min-h-screen flex flex-col justify-start gap-8 text-xl p-[5%] pt-[10%] relative" >
        <table  class="table table-zebra max-w-[100%] text-lg text-white">
            <form action="<?php $_SERVER['PHP_SELF'];?>" method="post" class="relative">
                <button type="submit" name="add_btn" class="btn bg-green-500 hover:bg-green-800 text-white absolute right-4 top-4">Add +</button>
            </form>
            <form action="<?php $_SERVER['PHP_SELF'];?>" method="post" class="h-fit relative">
                <div class="flex gap-6 relative">
                    <input type="text" placeholder="Search here" class="input input-bordered input-primary w-fit min-w-[300px] max-w-xs" />
                    <select class="select select-primary w-fit max-w-xs">
                        <option disabled selected>Order by</option>
                        <option>column</option>
                    </select>
                    <select class="select select-primary w-fit max-w-xs">
                        <option disabled selected>Sort by</option>
                        <option>ASC</option>
                        <option>DESC</option>
                    </select>
                        <button type="submit" name="add_btn" class="btn bg-violet-800 hover:bg-violet-600 text-white">Filter</button>
                </div>
            </form>
            <thead>
                <tr>
                    <th class="text-2xl text-white text-center">NO.</th>
                    <th class="text-2xl text-white text-center">Name</th>
                    <th class="text-2xl text-white text-center">Alias</th>
                    <th class="text-2xl text-white text-center">Phone #</th>
                    <th class="text-2xl text-white text-center">Action</th>
                </tr>
            </thead>
            <tbody>
                <?php
                    $count = 1;
                    while($row = $datas->fetch_assoc()){
                        echo '<tr>
                                <th class="text-center">'.$count.'</th>
                                <td class="text-left">'.$row['contact_name'].'</td>
                                <td class="text-center">'.$row['contact_nickname'].'</td>
                                <td class="text-center">'.$row['contact_number'].'</td>
                                <td class="text-center flex gap-3 justify-center">
                                <a href="?update='.$row['contact_id'].'" class="btn w-fit bg-yellow-600 hover:bg-yellow-800 text-white">Update</a>
                                <a href="?del='.$row['contact_id'].'" class="btn w-fit bg-red-600 hover:bg-red-800 text-white">Delete</a></td>
                            </tr>'; 
                        $count++;
                    }
                ?>
            </tbody>
        </table>
    </body>
</html>
